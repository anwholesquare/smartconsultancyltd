<?php


/******************* Helper Functions ************************/

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_encode_string' ) ) {
	function cs_encode_string( $string ) {
		return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
	}
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
	function cs_decode_string( $string ) {
		return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
	}
}



/*************** Demo Content Settings *******************/
function themestek_action_rss2_head(){
	// Get theme configuration
	$sidebars = get_option('sidebars_widgets');
	// Get Widgests configuration
	$sidebars_config = array();
	foreach ($sidebars as $sidebar => $widget) {
		if ($widget && is_array($widget)) {
			foreach ($widget as $name) {
				$name = preg_replace('/-\d+$/','',$name);
				$sidebars_config[$name] = get_option('widget_'.$name);
			}
		}
	}

	// Get Menus
	$locations = get_nav_menu_locations();
	$menus     = wp_get_nav_menus();
	$menuList  = array();
	foreach( $locations as $location => $menuid ){
		if( $menuid!=0 && $menuid!='' && $menuid!=false ){
			if( is_array($menus) && count($menus)>0 ){
				foreach( $menus as $menu ){
					if( $menu->term_id == $menuid ){
						$menuList[$location] = $menu->name;
					}
				}
			}
		}
	}

	$config = array(
			'page_for_posts'   => get_the_title( get_option('page_for_posts') ),
			'show_on_front'    => get_option('show_on_front'),
			'page_on_front'    => get_the_title( get_option('page_on_front') ),
			'posts_per_page'   => get_option('posts_per_page'),
			'sidebars_widgets' => $sidebars,
			'sidebars_config'  => $sidebars_config,
			'menu_list'        => $menuList,
		);
	if ( defined('THEMESTEK_THEME_DEVELOPMENT') ) {
		echo sprintf('<wp:theme_custom>%s</wp:theme_custom>', base64_encode(serialize($config)));
	}
}

if ( defined('THEMESTEK_THEME_DEVELOPMENT') ) {
	add_action('rss2_head', 'themestek_action_rss2_head');
}

/**********************************************************/




if( !class_exists( 'themestek_liviza_one_click_demo_setup' ) ) {


	class themestek_liviza_one_click_demo_setup{


		function __construct(){
			add_action( 'wp_ajax_liviza_install_demo_data', array( &$this , 'ajax_install_demo_data' ) );
		}


		/**
		 * Decide if the given meta key maps to information we will want to import
		 *
		 * @param string $key The meta key to check
		 * @return string|bool The key if we do want to import, false if not
		 */
		function is_valid_meta_key( $key ) {
			// skip attachment metadata since we'll regenerate it from scratch
			// skip _edit_lock as not relevant for import
			if ( in_array( $key, array( '_wp_attached_file', '_wp_attachment_metadata', '_edit_lock' ) ) )
				return false;
			return $key;
		}




		/**
		 * Added to http_request_timeout filter to force timeout at 60 seconds during import
		 * @return int 60
		 */
		function bump_request_timeout() {
			return 600;
		}



		/**
		 * Map old author logins to local user IDs based on decisions made
		 * in import options form. Can map to an existing user, create a new user
		 * or falls back to the current user in case of error with either of the previous
		 */
		function get_author_mapping() {

			if ( ! isset( $_POST['imported_authors'] ) )
				return;

			$create_users = $this->allow_create_users();

			foreach ( (array) $_POST['imported_authors'] as $i => $old_login ) {
				// Multisite adds strtolower to sanitize_user. Need to sanitize here to stop breakage in process_posts.
				$santized_old_login = sanitize_user( $old_login, true );
				$old_id = isset( $this->authors[$old_login]['author_id'] ) ? intval($this->authors[$old_login]['author_id']) : false;

				if ( ! empty( $_POST['user_map'][$i] ) ) {
					$user = get_userdata( intval($_POST['user_map'][$i]) );
					if ( isset( $user->ID ) ) {
						if ( $old_id )
							$this->processed_authors[$old_id] = $user->ID;
						$this->author_mapping[$santized_old_login] = $user->ID;
					}
				} else if ( $create_users ) {
					if ( ! empty($_POST['user_new'][$i]) ) {
						$user_id = wp_create_user( $_POST['user_new'][$i], wp_generate_password() );
					} else if ( $this->version != '1.0' ) {
						$user_data = array(
							'user_login' => $old_login,
							'user_pass' => wp_generate_password(),
							'user_email' => isset( $this->authors[$old_login]['author_email'] ) ? $this->authors[$old_login]['author_email'] : '',
							'display_name' => $this->authors[$old_login]['author_display_name'],
							'first_name' => isset( $this->authors[$old_login]['author_first_name'] ) ? $this->authors[$old_login]['author_first_name'] : '',
							'last_name' => isset( $this->authors[$old_login]['author_last_name'] ) ? $this->authors[$old_login]['author_last_name'] : '',
						);
						$user_id = wp_insert_user( $user_data );
					}

					if ( ! is_wp_error( $user_id ) ) {
						if ( $old_id )
							$this->processed_authors[$old_id] = $user_id;
						$this->author_mapping[$santized_old_login] = $user_id;
					} else {
						printf( __( 'Failed to create new user for %s. Their posts will be attributed to the current user.', 'liviza-demosetup' ), esc_html($this->authors[$old_login]['author_display_name']) );
						if ( defined('IMPORT_DEBUG') && IMPORT_DEBUG )
							echo ' ' . $user_id->get_error_message();
						echo '<br />';
					}
				}

				// failsafe: if the user_id was invalid, default to the current user
				if ( ! isset( $this->author_mapping[$santized_old_login] ) ) {
					if ( $old_id )
						$this->processed_authors[$old_id] = (int) get_current_user_id();
					$this->author_mapping[$santized_old_login] = (int) get_current_user_id();
				}
			}
		}



		/**
		 * Install demo data
		 **/
		function ajax_install_demo_data() {

			// Maximum execution time
			@ini_set('max_execution_time', 60000);
			@set_time_limit(60000);

			define('WP_LOAD_IMPORTERS', true);
			include_once( THEMESTEK_LIVIZA_DIR .'demo-content-setup/one-click-demo/wordpress-importer/wordpress-importer.php' );
			$included_files = get_included_files();


			$WP_Import = new themestek_WP_Import;

			$WP_Import->fetch_attachments = true;

			// Getting layout type
			$layout_type = 'default';

			// Getting all $_POST data
			$_POST     = stripslashes_deep( $_POST );

			// getting layout type for correct XML file
			$filename = 'demo.xml';
			if( !empty($_POST['layout_type']) && $_POST['layout_type']=='rtl' ){
				$filename = 'demo-rtl.xml';
			}

			$WP_Import->import_start( THEMESTEK_LIVIZA_DIR .'demo-content-setup/one-click-demo/'.$filename );



			$subaction = $_POST['subaction'];
			if( !empty($_POST['layout_type']) ){
				$layout_type = $_POST['layout_type'];
				$layout_type = strtolower($layout_type);
				$layout_type = str_replace(' ','-',$layout_type);
				$layout_type = str_replace(' ','-',$layout_type);
				$layout_type = str_replace(' ','-',$layout_type);
				$layout_type = str_replace(' ','-',$layout_type);
			}
			$data      = isset( $_POST['data'] ) ? unserialize( base64_decode( $_POST['data'] ) ) : array();
			$answer    = array();
			echo '';  //Patch for ob_start()   If you remove this the ob_start() will not work.


			switch( $subaction ) {

				case( 'start' ):

					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_cat';
					$answer['message']        = __('Inserting Categories...', 'liviza-demosetup');
					$answer['data']           = '';
					$answer['layout_type']	  = $layout_type;

					die( json_encode( $answer ) );

				break;


				case( 'install_demo_cat' ):
					wp_suspend_cache_invalidation( true );
					$WP_Import->process_categories();
					wp_suspend_cache_invalidation( false );

					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_tags';
					$answer['message']        = __('All Categories were inserted successfully. Inserting Tags...', 'liviza-demosetup');
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;

					die( json_encode( $answer ) );
				break;

				case( 'install_demo_tags' ):
					wp_suspend_cache_invalidation( true );
					$WP_Import->process_tags();
					wp_suspend_cache_invalidation( false );

					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_terms';
					$answer['message']        = __('All Tags were inserted successfully. Inserting Terms...', 'liviza-demosetup');
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;

					die( json_encode( $answer ) );
				break;

				case( 'install_demo_terms' ):

					wp_suspend_cache_invalidation( true );
					ob_start();
					$WP_Import->process_terms();
					ob_end_clean();
					wp_suspend_cache_invalidation( false );

					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_posts';
					$answer['message']        = __('All Terms were inserted successfully. Inserting Posts...', 'liviza-demosetup');
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;

					die( json_encode( $answer ) );
				break;


				case( 'install_demo_posts' ):
					//wp_suspend_cache_invalidation( true );
					echo '';  //Patch for ob_start()   If you remove this the ob_start() will not work.
					ob_start();
					echo '';  //Patch for ob_start()   If you remove this the ob_start() will not work.
					$WP_Import->process_posts();
					ob_end_clean();
					//wp_suspend_cache_invalidation( false );

					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_images';
					$answer['message']        = __('All Posts were inserted successfully. Importing images...', 'liviza-demosetup');
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;
					$answer['missing_menu_items']   = base64_encode( serialize( $WP_Import->missing_menu_items ) );
					$answer['processed_terms']      = base64_encode( serialize( $WP_Import->processed_terms ) );
					$answer['processed_posts']      = base64_encode( serialize( $WP_Import->processed_posts ) );
					$answer['processed_menu_items'] = base64_encode( serialize( $WP_Import->processed_menu_items ) );
					$answer['menu_item_orphans']    = base64_encode( serialize( $WP_Import->menu_item_orphans ) );
					$answer['url_remap']            = base64_encode( serialize( $WP_Import->url_remap ) );
					$answer['featured_images']      = base64_encode( serialize( $WP_Import->featured_images ) );

					die( json_encode( $answer ) );
				break;



				case( 'install_demo_images' ):
					$WP_Import->missing_menu_items   = unserialize( base64_decode( $_POST['missing_menu_items'] ) );
					$WP_Import->processed_terms      = unserialize( base64_decode( $_POST['processed_terms'] ) );
					$WP_Import->processed_posts      = unserialize( base64_decode( $_POST['processed_posts'] ) );
					$WP_Import->processed_menu_items = unserialize( base64_decode( $_POST['processed_menu_items'] ) );
					$WP_Import->menu_item_orphans    = unserialize( base64_decode( $_POST['menu_item_orphans'] ) );
					$WP_Import->url_remap            = unserialize( base64_decode( $_POST['url_remap'] ) );
					$WP_Import->featured_images      = unserialize( base64_decode( $_POST['featured_images'] ) );

					ob_start();
					$WP_Import->backfill_parents();
					$WP_Import->backfill_attachment_urls();
					$WP_Import->remap_featured_images();
					$WP_Import->import_end();
					ob_end_clean();

					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_slider';
					$answer['message']        = __('All Images were inserted successfully. Inserting demo sliders...', 'liviza-demosetup');
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;

					die( json_encode( $answer ) );
				break;




				case( 'install_demo_slider' ):

					$json_message		= __('RevSlider plugin not found. Setting the widgets and options...', 'liviza-demosetup');

					if ( class_exists( 'RevSlider' ) ){
						$json_message	= __('All demo sliders inserted successfully. Setting the widgets and options...', 'liviza-demosetup');

						// List of slider backup ZIP that we will import
						$slider_array	= array(
							THEMESTEK_LIVIZA_DIR . 'demo-content-setup/sliders/home-slider-1.zip',
							THEMESTEK_LIVIZA_DIR . 'demo-content-setup/sliders/home-slider-2.zip',
							THEMESTEK_LIVIZA_DIR . 'demo-content-setup/sliders/home-slider-3.zip',
						);



						$slider			= new RevSlider();
						foreach($slider_array as $filepath){
							if( file_exists($filepath) ){
								$result = $slider->importSliderFromPost(true,true,$filepath);
							}
						}

					}

					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_settings';
					$answer['message']        = $json_message;
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;

					die( json_encode( $answer ) );

				break;





				case( 'install_demo_settings' ):


					/**** Breacrumb NavXT related changes ****/
					$breadcrumb_navxt_settings						= array();
					$breadcrumb_navxt_settings['hseparator']		= '<span class="themestek-bread-sep"> &nbsp; &rarr; &nbsp;</span>';  // General > Breadcrumb Separator
					$breadcrumb_navxt_settings['Hhome_template']	= '<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to %title%." href="%link%" class="%type%"><i class="fa fa-home"></i><span class="hide">%htitle%</span></a></span> ';  // General > Home Template
					$breadcrumb_navxt_settings['Hhome_template_no_anchor']	= '<span property="itemListElement" typeof="ListItem"><span property="name">%htitle%</span><meta property="position" content="%position%"></span>';  // General > Home Template

					// Getting existing settings
					$bcn_options    = get_option('bcn_options');
					if( !empty($bcn_options) && is_array($bcn_options) ){
						// options already exists... so merging changes with existing options
						$breadcrumb_navxt_settings = array_merge($bcn_options, $breadcrumb_navxt_settings);
					}
					update_option( 'bcn_options', $breadcrumb_navxt_settings );

					/**** Finish Breadcrumb NavXT changes ****/



					/**** START CodeStart theme options import ****/

					$theme_options = array();
					$theme_options['overlay']	= 'eNrtXXtz3DaS_9uu8nfA6WorcZ0o8THvONpVtFpcJ3dZK1wnK5tLXaVYGBIzw4hDcEmORpOUP9B9jftk140HCXJIWrIlx66zvYpMoNFo_BpoNBqPpTPXm8x-z2fT2UF-HSUBj3l28FU-G88O_tW2R-OQ4pczhGwW8CTcI2KMuraNX6PZQUx3fFPgx2B2sI1CJgpPZgeLTRz7mOCzmK1ZUuQHX9GZO_s9mtmy6IrRkAHXaObIhAXnBSa8yWfAIOZLXuxSwRCEidZ0Kf6ts9htoT6_p9sdy84u8HMqc_0FTwqscIpNRd50HcU7IZwzO3i1SaKCk9c0yUWSNzuY0-B6k1oVnQucT7OIxofkWxbfsFwiCughyaGIlbMsWig4bijQJEIU4DKWwDhcMAYKaBUZ0C94tsZUe3agRETprDz6TTTInR24Iy1ZHCXMWrFouSp03lhzjFkB-Fh5SoMoWYrU2YGt8KmpyLXxr9KKhEKgsOR8GTOB8FgCFa2XCJOHMEFlUajYOd5obCtpi9VmPbc2WSy-gWpVFOns-DiObqLf6FGxAv3mBbt2jwK-Pg7ZmjvH29SCzlOA3o83acxpmB_nUcHyY_cYRTu2nWOs3tquINVyhvYt_Bylslmq--gqXCeDh69SVvVGASuB8HPQ8fVuH49KcTUoVHJDWpGKjAHhZcznNPaxby0zvklC5D1G3maPVnzGKqlWXCcoLWMpo0W9wpRD01winhipDvymRUGDFY42IwMaqLuaSml2l4X4I6WGCqMkYdmnJLQY9GhMRG8Ww8LRdkhngIx-sMkLbg5FHPiLOc0sUzSoKNPjTxP486Vf1t60nGgrJdHHApnA6oZl7bZhOl4EUtlacLRVVfsgVYwRYYDcGolcMNCv8QtDD_4IycaKdkWTMIYuFAUoOYXG_S4NTjTPaLZTJXEQRwtpk6dlprDcdMtyvpZziTDeZEEtmmV8a4V8m2jQdZEGXCf1ibWTXCKyXDCmTWlCVYl8KWWDBoKG5ReRv6yfeBaHP-mpzJDsJvDRPANNrpoQR2AzqIDCm9TlEebJl_bKn29yKJjnvq51YEsxBZUlqSxNZQkxghULruMoL4SqXFyvBVs_iHnO3hvhQR3hTdqDr2vv4auE-MQBLseCBLZ1LDh7JH7ZeGh7SLNrQadZgfuzZGJgbdaJX7lK0DDPF3_LIQZmqoBJHW3RPGP0OuVRot0qR7lb7rSL0Kosm0GP_kS-4lu_4OkcQZwLTwtbKlNqVm1cIhuwzNhOS2VQtQx8bYDlwFe0PZZk0CBqYWmLP3rYK-qYLQpfu3uuB2xebGISxDTPv0YaMevToDg4eRFHXCcvXCKdRfb0L9Qe84CiSbXSKIFcIsdQBDyq5OQ0DDPoGzPy4lh8f89zcposwXvNyUu-yRIaRi_AATl59rReT3s1LLlhMQf31ajifE2jmDQrwsS_sFu6TmOG7oyu5HgTnzTQFfNSiYU3hKH131X1OQ_AXQUpkuv8F2AQRjf7MsIYmxeJXCdBg9GQkf28KMFhCJLT1vJLBsVovF-whRXOSNY6bMtZ0ZRZ-T83NGNt2cUuZpaoPgpa8rfCR7Z2oJ22xkGnsqpJmqwytvj6XDC6RFTEDP6hFPIN59fklJyBwdnEhegWSikvjin8XDCCDRX0jM5BC033wJSrH9FKbW5VYy2cucFY6MleUmLD1ApKUlfJZYfQHkI9F_uD6Zi6Fc81tDpCXWvuwu-dyMULmg1tob-lN4zQZEf-cwNIA0z5n3VDBOmcF6qZOAn8m00c1yOTyYQMh0PVeC2GXFwbxTMbSIBCEDSkggnbNz0fsfZZFNqlU2TCtMk-X5q2KXqvCw5zRnDtL1wiwBdEu5WgQElzSKxZGFEL29hhM-gWBnKnzVh5XCcXm0wP5hfH8C37y34dCpwTx3XIf4DtJq-LjLHikJxC54CBFNGqpyEMVQvkCrxqwvAOTWhvQbrisLAMaBw_rvx1DRSrKKvEn0zbxBeardUq5vAT0tEkWOr3qEU2oaMh0q0XbW-x7hKD1Qja6dmEfIML-zyG1BHIUinIrfVTMF7Ur63X5bK52Z37ZtrxPmljbsTZMIM5_0v7UPw98pznuqhcXLT6d6wMp8-OEv1TvFcKWbUW0hx72DQ5RuXCPmAIJAWcpMU08GtrqFdvqGilh4ksT8HqRDfM7yk9VaVd51D-zz6ajp7raI4qaLCq-3qGC1wnvF-MI63pbV29Q1vLWYNRWyBD77JYGVQQpae2xqCuhL7uMW0j7lUW8m9IXxdjOGroNGc0C1alGUX5RIofJan0WV3ogle7lBHw3kNytWIJ-QEtBzlPCrnQrEVSFL__z5ElFWHLGS9ncmcFay6eqEAkgCEHX6dL4e5RdDgUSAjeHBJ3Rz7h45KDMecPG_Mc9sU8QcmbNAWTTeUyqSX46Qy6g5_OpDf46fQFhnqCn245fE3UukbTqALXh3UGGg50ZqrRBwSVWtBatZP3G1hgEmY8xfjGh1fjGC3schPT7F3C1--hwfbwdehNBsN-DSq4upUykFE6rZJ24n6VTI1iDxXbA54Jt6rvRpAPzUTA0KQS7X6_Z7zPDO7iMgZXQM21f8s8LQJpJW1_4x_OjIoarfnSGhz9mi73ERXzx9ie3htWVwV1ibFSeU9g2QL_SmBNsHpCII5BhjMvjINypwrE-fhHuhyV7SNdrvTuN9LDcDpVwWPgXDCrEwtFlbuFgmm5XDDsMAMDA9F8M78DqFDi75s4-niM56Rn72_yB0OKjkcYZOCl9eyofnSI9u2mju6PKIM_rtsLGra7BO0mYltVFuAvIxfD2uA31lCjYRVAKglw57xCX0mfcM2Jhjd-gYSwAgZXW1vsM1qwJc925BTcb5jm8hnZK1HQpS4BNV7RZYMYnaOSGIxoIeNSi4iFWswfIDVcJ1U6gZmBZaquiVGcbooVz3R1XDDIqUho1mir8wLyBEDfaqg8WlCRYkzjUadkr5yS5a8H2YVzwckZVjsPsjVBQfs2zbBLNzdvPu-cvW1jZ1SDV4ww3Y9_Olwnp5fw84_T774__eb7c_K3i0vy88WPWn6jHEwuZVGlarFxU1HMN-BZVMFY7CFnF6-uTs-uyI-vu-nLuCj0Cr3ckJFLTdvcPkKT4Y_KHSmT9g5OXZP-sYdP57Y1dvvoVhqVt2_3e0OPemG1F2q2osfjGutjTJ1oAsXA93y32oyrF3hbPMtuKfDemD7WoQnPARxcJ-U8Xxe8_xSAdJzvgcpegY_EUN-z39URqzeq39Uve1xcupMbd9oVQIt3plPJ__4PweUPOY1jcokpOblk4BjdsPCoaTZKVuUJFcw19lwwJSEa7l-0C6i2697LXCfG4B9d8TX4bS-B3c3j-m9diwyMNx-9g0s8DEfT8fDdXWLsQ2imLZNryBZ0E5ebUlW-ZTRdbGoP3elgoGdkg26lnQPzWI6KpTt768OPI57XszR0u73uweMEgQRS7lwnh5TXsz5RKD4KUt6nh1RPn_IesU8NPjmk-k4Qe4PHQ2r46SHVE6z27MdDavTpIWU_bBzlLkip3eE_IDDqofoffOYb2vffwKpwekd3Be9u3CkW-rHuCHo9Ha8_yuy1ATpldDp_j5AollI7Fx80DPruXbIvBPouRq7yoLtBcsQFIDzw-tnA9aKkAj8apfFHjpLT4z5cMFf7aPjW0Li6AqaDbyq4-SHaPH5fUzTp3ywRZyXzXCJa8wQk80WkVWi2auuwra0X-ZbG4aO0tdmKKjjUoSCoax7zpR9H66jwWULnsYyOXDDPHcv1mlTQiIiHINQLcrV5MVYE6hCrz24DlqWaXYObrhH3N9Y8Y2XQFGS_hDTyd0hU34LQ2FJRFWitYvac36q4nhqVxSpjTMeocQtDnRP18xXF2nQgF4B4jSkzHeTYp8VATBQwcXtxoG8v4iYEDdic82t9fxG31rdRUcgbja4OXYUhXCIVzTx1vixaLssd45RnxYLHERfNK48CizN9ePjZqVqgCTMW04KFVQswpHB5_v3p1flfyQ-XF_9-fnZVxpr3ixkwyipcXB0J36ftXDC0lS8exTVcJ2C8AVFRpRn_lQWFH7KCRnHeOKmcLnSG2CMwcNaHx5w9opoGz-LIiDo2KR9sOwVEZeu02PVtoYgtvvqx1E99-0Qciixo45jTG-z0d9EPCPe6HEGfNfRBNeTeSUNin0puG0eflfTBleTdSUlQ_GcmBf2snQ-mnTfSr6lmMuPKiXQPymPfkxrZ250Nz-ks8O4eB_oUEW58sbx0OtTWBAtRTdAgz65VDH58zPCmj7xI1NzhnvYQ1-4VyUVyuoBO0eE5OLbON7yFqXYHA06DFUYr-lxcIdeg6_WEzi5Oz7797tVLvRO3V6rDEfJaSDv8oDaue27QwCDq94KC1R28oAZRjxfUpPxsID6EF9SpnxYv6LOG_ggvqFND7V7QZyX9EV5Qp5IaXtBn7XxIL6icyNq9G8Dj9benl-fabajI3-JiTLppmx5G6UHsTd-OPl-qnVwnv5XM1XDXyKoZHk_xbnkrr6bTXCJO6zK69tltkdFaR8xVXCeUs7e4sI2IdFAbNgj8G3Ufl3yXLHh5XCexa-K5B2uA7lwiCDYpNe5Ud9vL-zE-v00ZbqcErJexdz_GDp6Ryhh5fR3F0l3q5Dy4N8xnLCuiRQSKZf2sh_diDTTn4SZ4G8hqSwnZ9fTmQUXR4VEbPPZ8aig9sAdvvbljP9TNHajMmi97bu2Mxu4ffvIaR7W4IOzYh84hXg923edlEJxlGc8EaNHSVxA92FNgdeYP8TDSVB_vFpLkFn_bCe_atPapP4ZU4knnoGmBavkuiuj6Wt814MvD2XiJ4fTlOXl1cUX-dvHjq79qp6Ikx1wnAzZrowTwes2zbHdI5psCH4ogKXQRsuMbgk-YxLA0x8cRFjwjIWc5SXhB2C3ITCAlg3GEBzrJDzGjOSMb-JGXpMkyumEJmbOYb0nByVwiSkKyXdFijzOwwWJYM14wJXjK80jru5S7cZV7oK9yXCdgTHN9YBHdLHwG4RUvVlJosBDyAYT0xGhlovLXtFwwFYQoUqblxnOmedmgXCLbEbpEsbZRsVwi2EtJGC0WDI8Ek2u22_IszI9eHKdcJ9p25dCt9B2TvYfXzHxlrGr50ypfmOU1W89Z1ngtBPchWqh8tIhp82WRsSmRink0-Y1aaNA9EJdumgwNYu3h9MhXOkENdnNQQflcIqeiVZ5Jk9tgj6JTthqp7DDmDSMD3S3nMBGsWRbsKcGEwyBTbtyeyowGzOcpujl7JIYOimgNc-y8hQ8SSR8UbQPOwXlRC5jIN3KmJZkGI6FrvRyvgmmtlPVLGaa71cPWDMjdjat7B664cxxHwfWdmXp3Q6CKCvaylXOY2rHcIN5Ftglwhq7cHgxmXq2inKBTQOD3j3gdTDyrpIl1nK_OYVWsY7kIsOtPw2wSC02chUNfux4HXCfPnj558qRB1kFxYpyJx1cYfpEvuOxxyFmq3roy8leOzlZnqA5OYIY4vyRnF69eX13-eHb13cUrsJaOph-U7MpjVwdgRqEDC-upZm2w3IDNlu4IjBQGpvN1Af8uNgkL_wW4DRQ3Q5Dq1ZlBE7q3OXbDyrFTb-Y0XTvDqZM5JeWxYJMf12rs9O4e6ZZ7xzWNO151x1hxHbBcMDyOgCtHxh4Cy79EazTiBLy1L79AsHJAC72s_Egej6BplAuooOyf5eGMr7-Jsh1NYOja9qEHPwP4GcLPCH7Gtv3F86-ePX329KitA8_mDJwD9vuzpzrhiy-AWgMzI3Seg6NfMEhEQw227NlTwEf8JpXC5fWBGZFP3QyHh6T6j33k2CjCNgqLFbTT_hN8yINN-uuNFM-UDER60ioGgT8oARmKovgpJDO-rWscxdXBmhkR_8SI-H99af_pefX585cWFHuuy635b-9SKn-HQvz-ZdoLCIq2XCIIapFbeSCsDYnWS8R0TW_VqbIZGbvprSRcXDlHykgcwsfgqDIasky2jBKh81wnKQ0xWXyIMz2yE87IgeqGB4ek75hQs77fZdvK40EzMrWFVEKx1Rm4Wrqg3upW2LZKlnJaqneU1CpZ3pOCHJHxjrKrfo53sAbeWLalBtcTHGumIO60FKRe-Ku9lrtue8s9pVwnvVwwTRc-PkNezXZjDExsklwiK9_JrJEI78e4_2PQOgZtHm-0LQ32KHBFX8UrJiUT0ghRO3XqWtXofjaKlaFQVUjL4FRCEMv0GMUCfNVoP14zV75qXm7LrboQmFTUuoGaWFdvRFwwDZI6BkalLSCY5HUQxvvlShRUqToKkraOwqSMBTaggEnkH1FOq5umTaKaMAa106TWQlwwzU0LTR2MoWTUBGLUQl9Hw6sX3JXLFKNYCYdcJ0WpQzFUUbA9HK4gtRYX7QZBkzo1UgOBQhOMFIFYr9Vjg8iEvMT0XFyvpJqk9bbbZplaW2SRst22TLbKRVwivv8UJVwiiFK9oKufDjK8Ch2mHpS5v-5nlkVx1hRXQsxguF3LnfNwhyGV2uOekz0SltR4OOLdsSjxe0Sc7jVAv_ZZeXPSO2o0DJZt8kV1FXGci9MJ2FXFixUFF7F7ccBZZ07Va8hmgfojI0t_AX7iJmOhL15wVzR4h7h6fwR9XvV2j6q0fEVP_x9HqHTbvGZfcnP3DnKobfuSwtzSbyUYNQmaR0GQCg9YtO-VVAc7lKBVN1KL3rzxNn3Ngy2LeXhhgYmwiJ-L-8YVqEILGLT19YUFnlaF3_wfdKzcmg';
					$theme_options['infostack']	= 'eNrtXety3DaW_m1X-R2wmppKXFyrlnjpezyaURTF8ZTHytrKZFNbKRaaRHcjYhMski2pk_ID7Wvsk-05uJAgm01dLDl2le1RZIIfDg8-XDAHBweXoVPPH0__yKeT6V5-wZNQxFwi2_smn46me39xnOEoovjkDuA1C0USbYEYo57j4NNwuhfTjVgX-NCf7l3xiMnM4-nefB3HASYELGYrlhT53jd06k3_4FNHZV0yGjGQyqeuSpgLUWDC-3wKAmKxEMUmlQJBGb6iC_lv84pdF_rxNb3asOzkDB9cJ-ptMBdJgR-cYFFRNl3xeCOVc6d7b9YJLwR5R5NcXCb5070ZDS_Waa_CeSD5OOM03lwnP7D4khU8pPskhyy9nGV8rum4pIBJpCogZaSIcYEMVLBXZICfi2yFqc50T6uI2vVy_rsskDfd84ZGs5hcJ6y3ZHyxLMy7kZEYswL46eUpDXmykKnTPUfzU6tcIs_Bv7pWFBWShYUQi5hJhkeKKL5aIE0-0gQf45EW5_qD0URrWyzXq1lvncWSb6y5okinh4cxv-S_04NiCfWbF-zCOwjF6jBiK-EdXqU9aDwF1PvhOo0FjfLDnBcsP_QPUbVDxz3Ez_fcgXMNPwepKpBuOOZjo_FDfkx95L0mUxU-yKFeLzbbHFSVVSu-Tm7oKVNRMLC6iMWMxgG2p0Um1kmEskco227FWs5IXCfVvgkMZyxltKh_MBVQKC4SK9WF37QoaLjEHma9gAKa5qVTmk1kLv8oreGDPElY9jkpLTs6GhDZgmVXcI3tMS9AxyBcXOeFsLsfdvb5jGY9WzX4UGb6nAEEs0VQfr1pLdE-KtCnQpnk6pJl7fZgMpqHqrKN4mifqvJB6tUS-ow0Ol4NXCIJDGryosiHP1KzkcYuaRLF0IR4iJpTKNwfysjwWUazjc6J3ZfPlR2elC-ltaZXLBcrNX5Ig03mtEezTFxc9VwicZUY0k2WhiT9iF9cJwXvAU3r0mzqHPlC6QYFhBpWT0T96v0ssjj62QxflmaXYYAmGTC5LkLMwWZQSYU_rusjDVOgLFUwW-eQMc8D89W-o9SUqJ5C9QyqXCfVCJcsvIh5Xsiq8vwWboMwFjn7YIb7dYbXaQe_nrPFr1biM1wnuOwLitjWvuBuQYKy8FD2iGYXEmdEgcuzYLJjrVdJULlHUDA_kH_LLgZmqoCBHG3RLGP0XCIVPDGulKtdLG-yC9irLJuFx1wiFVwibZqvsdJ0kbGN-byFaunhxtKqHq6xHSaj31wwtYh05B_TvzU6ZvNcIjC-3AQK-2IdkzCmef43hMhxnYbF3tGLmB_9zGIY9Bk5F-TfPKdpBvVKjsmr1YovMoo2k5yIVUqTDfmZzdAFIOdslca0YC_AgTh69vTF4To-apRKGv5KB6Dmf6pWlIsQXFxAaEzJRf4r5I_4ZaleCVKCwC2kWbjcO7KzyyTZ9n59cQiZGx_vqPh-C2ZHnbvGmc6LTcz0cMWTuYB-FF6YAURBglmRaE9cXLWWKrnkXDCTX7KCUPJ9xhj5EYprki00cqJH3r8oe1V9ZLWOC4792nxOOldj5RUHUC5jBn6gl4xghf3XGhiDGsz_bookoTNR6AKjpflPh7ieT8bjMRkMBpqGUg_pdMdTByCAkICGVjAqBDuH_XGJy5fiKlA1v_fNTE5PXFyb0WDOgWrQ7VrRAh-2G8aKRZxio4BWy01cItmyTNIgxVwilA23l_IE4If86MXSP3otoF1cJwuYOeUvDuF5W7rm5eilWGcJjfg-EuOQb3E2kseqqVUNDjmotFfzulL9oXsL9du1Z8kliwXM0UrNV5TH_2DXFHodQw_9BvXP5nMeMvIDlGJKnMnUceiK9Egf_pGumqWo10Gx5FlVCH9y70KkSwFzrpDGcVUMMFTYysZkMpncUATZRU4g9xbpXq3hUejFQW1mNxyYurHbZ5fX6Y22sQ1Li7Y1g6Hia2df_j3w3ecmq5rrBLf9mt_fmaV7xPBLLavy-jindJpmZLHbA7UgzVwi-vVcIsry-ZjI8hQsCL9kQUfuic7tufvqf87BZPjcTPl1RktU3TmwxnzpLmGwYUWv6zU7cIyeNf6MMbGqXFxlK2ehMvfEMRzU2d_J1qQN2VlFKLyhel2HgYpIoA5yCAt4kipHxoMGdr5JGQGXLlwi50uWkB_lQHyaFGr2UZteqzFxV4hh3DbHxiH4AUMMkqcbAg3j_sN_sgw36FBLzkQ5FLtL8GNEoiNSQIbqWTudAW8LscMVQCDlCYJ3h8Dg4a1cMPslHjb4NegKfkElr9OUZSHN2Y4omNvfHQVzx51RMLcrWtARBfPKLmqztqvTDCtyA3BK0Tig81F1MlwwVNWCFqkd3m09QUiUiRRcJ70fvxpHaEUX65hm94ljfkANtscxI3_cH3TXoKZrd6X01bBmqqQd3FIlvj8ch0MzZJTZHirgAzIT0aueG5EfNBMhQ5NKjLv8gUEgO-KHExBexKw5T5R-N9Z1Cu6K-oiMrpTY7sI_nBmVX-zNFr3-wW_pYptROX6MnMmdafVLWtWvh2CWzfGvYtZmq2O-7FowHLShI5RrFqDOp9_VVbds7-pqana3rh5Fk4kOKYIEcKd7qKpaN5JCdYxnpx3oW4zm69ktSIUc_1rH_NOxnuOOVaDxn0wpeh5RmIGb1rG29skx2rWuNrw7owz-eF5cJ2lY7pK0S86udF6gH2NdZYyu6vzWDKlvxX5KXDCuoVbsa-0TYSTR6DIoEBjSAnxtY7JPaMEWXCLbkGPwv2Gcy6dkK0dBFyYHfPGcLhpg9I5KMFjRQk6A-ZyzyKj5I6TmpEpcJzA0sEx_a2xlp-tiKTLzOSDkWCY0v-jolWO1FtwVwywXmSsoTuEfdUx-jMHD88DLGVTxaFWasKBdSynYpJsh_S_rKTeF-4c1emUPM-3451Ny_BZ-_n386vXxt69Pyfdnb8kvZz8Z_a18MLiUWXVVy3B-hZiti0JY4VRAnZy9OT8-OVwnP73bja8HVJVrq1wijQbbXFxUXDDeh8GwXFynsLG38Oqa-MfuPjsXM7HZ82tlVG5eBPYHPvWjaoXMLkWHxzUyG1p2sgmIfuAHXrVEU89wA6Vou7YyfDCnj7WU7rvA47gc5-uKd68Nq8jnHVjZyvCJGOo7trs6Y_VCdbv6ZYtLN2q1ybgCaPFOTCr5v_8lOP8hx3FM3mJKTt4ycIwuWXTQNBulqHIBw6uvXFwpIBruX40LuGAJy2j8QT4xRv_oUqzAb3sJ4i4f13_bNcnAaPLBPVxc4kE0nIwG93eJsQ2hme7ZUiM2p-u4XFxEqt73rKLLFdCBN-n3zYhs4ZbGObA3a-hIubs1P_w0AnodU0Nvt9fdf5wokGTK--yY8jvmXCeaxUdhyv_8mOpoU_4jtqn-Z8dU115Sv_94TA0-P6Y6otW-83hMDT8_ppyHjaPchim9BPxcJwRGfaz-Bx_5Bs7dV7Aqnu7pruAu_lvFQj_VJUG_o-F1R5n9NkJn3mw8m39cMKEeCpRLFx81DHr_JtkVAr2PkRvPJgPafbRcMD-mt0F-MXCdLOnAj2Fp9ImzpHtjKxMg1TkY3Bga14eBTPBNBzc_RplHH2qKxt2LJXJzY17wlUhAs0BGWmXNVmUdtJX1LL-icfQoZW2WogoO7agg-NYsFosg5iteBCyhs1iH-u0VBwmRAQ-JM_NxNcBhnE0C1JpAGLDrkGWpkabBG5ab6bIE4_LGSmSs2oYLjVww0si_IFE_S6C1oqI_YCoVX8_EtQ7r6U5ZLDPGTIgaVzD0ts4gX1L8WjOOO2xDYQSGh0weYOubA2y4-kBDNhPiwhxhw0X1K14U6lCbZ2JWUYQc8amvd4_xxaJcXCpORVbMRcyFLFi5fVfu1YN_99xKdwPMGO5njirdMZbw9vT18fnpd-THt2f_PD05L4PM29ksAtVcJzwTAt_G7qCyVS7umbVHXtwQX6HSTPzGwlwiiFhBeVxc7ibW6pLvTs-PX71-Z5LTuQHKxQKLd7ONzN0CVXxcMB1cJzG3wo9N5IOtq4CqbJUWm661FLnWV9_m-7mvo8gtkAVtbHh6j53gNvUDyr0re9SXGvqoNeTdqobkgpVaP-ZfKumjV5J_q0qC7L8wpeiX2vlotfNeeTjVyGadFVHuQrnJe1xcg7W6HcDbux-O357K8rg78fd3QNDF4LhcMMby0gfRSxQswlqC8vhO7cPgz8cMj-ioI0FND2nSATYL2GZ1Eh2FObSJHY6E65j3lvMwMX5hKGi4xKhFl2fkWbhOx-jk7Pjkh1dvXpoVua1cXDv8XCK_BbrDLWqTuuUV9S1Qi1NkmMP55PIWTlAD1OEENZFf7MPHcIJ21k-LE_Slhv4MXCdoZw21O0FfKunPcIJ2VlLDCfpSOx_TCSoHspudG3QbKvgNLsZ4N7bpYZQexNbw7Zp9psZ5ClphnqG7BqtGeNzNeyVaZTWdFrlrl9FVwK6LjNYaYq4boRq95dFrZGQH2rJB4N8cR5E8XvcqmYvyXDDiroHnDqKBurMwXFyn1Gya6rSXdxN8ep0yXFxWCVmnYP9ugl3cK5Ux8u6Cx8pd2im5f2eaT1hW8DmHimXdogd3Eg2Y02gd3kSyXlpCcR2tuV8hdnjUlowtn7qP-8v7Nx3hGVb3Oy34SlxcN0_wtJzd8Rx3cugMDzEC23NGuw_suGO19-pP3XON_Vie_3WdfXcfT_-Ovedl-JtlmcgkTXwRaFIe7GqouvCHuChnYjZ2S03ynrhpb3dtIPvcL8cp-aQzqGnJqlk_kIcp-qa-a8SX27Lx-MLxy1Py5uycfH_205vvjBtRwvGk_3pl5VwwWe9Elm32yWxd4JUOJIUmQjZiTWDsIzFMxmHAXCJzkZFIsJwkoiDsGnQmkJKxlcCtnOTHmNGckTX8qPPRZMEvWUJmLBZXpBBkzpOIXFwtabElGcRgNvwyni0luL_zwNR3qbc5da3vruibU9wJmM_cbFVExwrvOngjiqVSGmyCuuwgPbJKmej3K1pAFUSoUmb0xh2meVmgXCLbELpAta54sSTYSknE53OGm4HJBdtcXIksyg9eHKZH5elyaFbmdMnWjRz2e22eau9cJ9V7aYhXbDVj5syn2WKLCxEtqFwwbWDawMoxvtRIRzma8oYtGHQI5HGbpkALbHyaDv1Kt6chbgZVUN7KqLHaF2lK628hdupWg6oGY6_0WexeCQG2f8WycKsSbDosmHbctqrMKsBsJi_w2YJYdVDwFYyqsxY5CFJeXCfaBhx186IWXCJR99tMSpghI6ErMwGvwmetyMb9NpaD1SHWDsHdTqp3C6m4Zhzz8OLWQv3bMVDFATvFqjFML1muke9cIluHOEJXjg6GL8-XPFwn8tol-P0THgQjXCcW2ET26hKWxSpWbr9Tv8JlnfTQxPWw6xufY-_o2dNcJ0-eNGA7EPZFTHgBg76BaUtCzlIZYTuy3y9d81rvnto7ghHi9C05OXvz7vztT1wn56_O3oC1dA2-X4orN1xc7YEZhQYsracetcFyAzdXdEPwJiswne8K-HexTlj0HyCtr6VZilT3yfSb1N10GntQncaWV6SGosObU29K5KEUkx_WvtibLdq9u0c64L7jgMYtT7ljdLhOWAgeRyi0I-PgvU3_4Cs04gS8ta-_QrJyYAu9rPxAbYygKc8lVZD372pbxt--5dmGJtB1HWffh58-_AzgZwg_I8f56vk3z54-e3rQ1oCnMwbOAfvj2VOT8NVXgDbETAmd5eDaFwwS0VCDLXv2FPiRv0lV4ergwJSom2wGg31S_cc5cB1U4YpHxRLK6fwVHtSWJvP0XqlnawYqPWlVg8Af1IAMZFZ8lJpZz70L7MXVlpopkf_EGPh_f-389Xn1-MvXPcj23ORbid_vkyu_RyZx9zztGSSiLQuSWuS9PJTWhvDVAjld0Wu9n2xKRl56rYBL90AbiX146B9URkPlyRY8kXX-JKURJssHuZtHNcIp2dPNcG-fdG0Qan7vD1W2cmPQlEwcqZWs2Gr3Wy1doq9MKRxHXCcrPXu6dZRonaxOSMEb-eKeuut2jqev-v5IlaVG1xPsa7ZcIt6kVKSe-Zutkntee8l9XU9mAprOA7yKuhrtRhiKWFwnRVZep1iDSO_HOvljYV0Lm8drY0vDLQTO4asIxbgUQhpBabeOrn0a3c9GtjL4qTMZHdxKCdKzPUY5AV82yo8HzLWvmpcLcctdDIwrtCmgAZvPWzE_C1LnwPpoCwk2vE7CaDtfyYLOVWdBYessjMvoX4MKGETwMsrqjGkTVFPGQrtNtFECMJctmDoZAyWoScSwBV9nw69n3JTTFCtbSYevVKlTMdBxry0eziG1FgndTYKBujWoxUBhXDBDDZDztXo0EIWQl5iem5lUE1ovu2PnqZVFZSnL7ajkXjlJxKufeFwigyh6Uj0w4buaV2EC0_3y7W_bL8usOGrKwyB2-NupvZ2JaIMhFTvKJZfH6xCW1GS48soxngQdKk62CmAu5qy8OeUdNQoG0zZ1w7aOMc7kfgRsqvKuikLIaL3c2mxeTvTtuLUMoKTcPaGuOS2Tq9sDqzCG07wVY7YI5uBXrjMWBfIGcI3B08bVTSXoI-sLRLXw8lI98382oNMd-0B-Kc3b2umhF_ZLhL3o3woYNgHNvVwiiMItGO2rKdXWD61o1ez0JDlv3G1e83htUkXCZBglyOXJ5IpUWWt4M1NgjjaItMr8_v8Brc8z8w';
					$theme_options['classic']	= 'eNrtXety3DaW_m1X-R2wPTWVuEYt8dL3eDSjKBrHux4rIymTTW2lWGgS3c2ITbBIti5x-YH2NfbJ9hxcXEiQTVIXS7ZVZXsUmeCHg4MPwMHBAcChM8edzN5ns-msl52Hsc8jnva-y2bjWe9PljUaBxSf7CG8Zj6Pgy0QY9SxLHwazXoRveabHB8Gs95lGDCReTLrLTZR5GGCx1witmZxnvW-ozNn9j6cWTLritGAgdRwZsuEBec5JnzIZiAg4kueX1wnQiAoE67pUvxbv2JXuXp8Sy-vWXp4jI9T-dZb8DjHAqdYVZRN12F0LZSzZ713mzjMOTmlcSaS3FlvTv3zTdIvcQ5IPkhDGu2QH1l0wfLQpzskgyz9jKXhQtFxQQETC1VAylgSYwMZqGA_TwG_4OkaU61ZT6mI2vWz8A9RIWfWc0ZasyiMWX_FwuUq1-_GWmLEcuCnnyXUD-OlSJ31LMVPpYkcC_-qVpFUCBaWnC8jJhgeS6LC9RJpcpEmKCwMlDjbHY6HStt8tVnP-5s0Enxjy-V5Mtvbi8KL8A-6m6-gfbOcnTu7Pl_vBWzN3b3LpA-dXCeHdt_bJBGnQbaXhTnL9gZ7qNqeZe9h8X17aF3Bz25cIiukOo4ubDx5yMJkIR8UmbLyXgbten69zUHZWJXqq-SanlwiFQUDq8uIz2nkYX9apnwTByh7jLLNXqzkjFVSpUxgOGUJo3m1wIRDpUIeG6k2_KZ5Tv0VjjDjBVRQdy-VUu9cIgvxR2oNBYZxzNKnpLQY6GhARA8WQ8HWtke_XDAdPX-T5dwcfjjYF3Oa9k3VoKBUjzkN8OZLryi9bi3RPkrQl0KZ4OqCpc32YDpe-LKxteJon8r6QerlCsaMMDpOBVwiCPQq8oLAhT9Cs7HCrmgcRNCFQh81p1C599LIhPOUptcqXCcO33Ah7fC0eCmsNb1kGV_L-UMYbLKgfZqm_LIf8MtYk66z1CSpRyyd5GEfaNoUZlPlyJZSN6ggtLB8XCLyV_8XnkbBL3r6MjS78D00yYDJVBWiEGwGFVS4k6o-wjB50lJ5800GGbPM06UOLKmmQPUlqq9RfaGGv2L-eRRmuWgqx23g1vMjnrGPZnhQZXiTdPDrWFv8KiWeOMHFWJDENo4FewviFZWHugc0PRc4LQpcXJ4lEwNrs4690j2Cirme-FsMMTBTOUzkaIvmKaPnCQ9j7UrZysVypm3AfmnZDDz6ENmKX3o5T-ZI4lxceFdYU5lSsWr1UW9AGka9tr5y1Cts1YyYjAxqmAaJlvijh7xCR2yRe9q9c1xcEPNqExE_oln2V8SIuZ76eW__VRTuvwr1K7LV9qLJI-5TNKf9JIwhyx5kAQ8q3j8IghT6xYy82hPPb3lGDuIleKsZec03aUyD8BW4HfsvnlfLaS6GxRcs4uCuGkUcrWkYkXpBmPh3sOY89Tk6MbqQvU20XyNXzEkFF1Noof8pS8-4D94pKBGfZ79B_iC82FZRCgKPlab-qrdvZhdJQvnfXu1B5lrhHX1y0IBp747Sz8_y64ipdhdahr6e2STAm-exWlwiyP5aJpcMgEueJNE1eccvtcEyYEiF8gX-JC1oKX29ifIQLY0uR7h7E-mn42jRhulHesEIja_JvzZAFHSc7G-6JgI657mqXCfavr9YxHZcXDKZTMhwOFS1L_QQy4BoZgEEEAJQ0wrmKa_VEZkUODGkZYMXQ3qKXtuCg630z71FCAyDbleSFshp9oc1C0KKfaHXMl7oJfSD1vGycvePN6nuyK_24Fn2mO0yFDv7tmOT_wKbRU7zlLF8hxxA90hpFNKyryEPZQ3karOswvAWVWiuQbLisIjyaRQ9rv7VFshXYVqqP5k2qY-mrVcpVcxd-6SlSrCs7WgWWYWWisheJOreYNkkB6sR1NO1CPkeF7FZBKkj0KVsIKfSUSkMdq-yNh1buh3N_mzOMBM5ISxTJl2J8Ta0Ni_gTJDCXFz3rbUj_u669kudVS7WvFsWhlNHS47u2c0tlCxrC2m2NawbnY651IDUa-hWayiq52JcIssSsDfhBfM6ck9Vbsfekf-zdqejlzpkoTIaoqrOjTFDC3cPgyVrelVt16Gl9azwp02P0eAyW7GKFrmnluagyn4rW9MmZGcTofCa6lUdhjKigjqIec4L40Q6Yg70r7PrhBFwSQNytmIx-QnNAjmKc7l6qoQH5MTZHFwiGcn-X48RTAcPGlwiETz17RtCJQ8cl1GFFiETFS7KGC9mbXsFiwkeq6gaEFwiR1er1-BsIVp8BgTSMEZwexgPHk44WGv-sAG84f0CePawPYBnTzoDeHbjgt1xAnfYGcBzitFpktVcIgU7vYZ54DujXUAvpWIXMMChTVEzuNtsQhlByhNcXK1_-rYbo_lcXG5cIpreq_0G926_5lwwbOBOBje0n6Lr1k3SDG5oEtcdTfyRniuKbA8VqQKZMe-Xz7WQFdoGn6EtJdqr_sjolRmqxOVJmEesvpIV7jm2dQJeiixEhIUKbHflXCcPZrJFif35sj_Y_T1ZbjMqJo6xNb0zrW5Bq_z1EMyyBf6VzJpsdcQGbQOGszUMhGKzBdT58of6oMNUyxXc3YZ6EEynKhYKEmDR0UdV5YaXEKqCU612YGAwmm3mtyAVcvxzE4VfjvWcdGxfTT4zpehuBH4K_lnHpuAXx2jXhuDo7owy-OM4naRhvQvSLkJ2qfIC_WLZqqOI5eA3lkbOsIwMFVww3Pwt2Vfax1xcS6LBhZcjEBa24GRrk31Ic7bk6TU5XDDHG-a5bEa2cuR0qXNAiWd0WQOjb1SAwYrmMuK0CFmg1fwJUjNSphOYGliqypoY2ekmX_FUFweEHIiEeomW2vKWm9hdy9Jid7yEYqjiUefkx5g8tHepA-myNn5Ou_aAsEvX91wivm4E3bRPMarQK0aY7se_HJGDE_j598Gbtwffvz1cIv84PiG_Hv-s9TfyweRSZFVNLfYhSsR8k-e8DLdiDzk8fnd2cHhGfj5tx1fjrtK1lQFJja3vhlww7yNvVGywmNhbeHV1_GMPn9ZdWOz24ZU0KjfvXrtDl7pBubVn1qLD4xrrkzitbAJi4LmeU-4tVTPcQCnarq0MH83pY50BcG3gcVLM81XFuze1ZXD3DqxsZfhCDPUd-12VsWqlul39oscl13IvSrsCaPEOdSr5v_8luP4hB1FETjAlI1wnDByjCxbs1s1GIarY53Cq-1oSiIb7N-0CLlnMUhp9lE-MYT-64mvw216DuIvH9d_aFhkYRt69h0s8DEZTeSDrfi4x9iE0031TasAWdBMVe03l-75RdbFPO3Smg4GekQ3cSjsH5ikTFVwit7fWh08hEjRw2j3vweNEggRbzpNky-1YpygmH4Ut92my1dG33EfsW4NcJ8lW16FYd_B4bA2fJlsdEWzXejy2Rk-TLeth4yu3YUvtCX-GgKmLXcB66NlwaN1jX6vg6Z5uDF5LuFWM9HPsDwKBmyRhqU_l-cAmx9Dt6Hjd0We3idC5M5_MFx9BqIMCxZbGXCcNj96_S3aFRu9j6Cbz6ZB235XAwtS5zqeyIf05DBzkVQEhzdL4S9-2d9uZXDCp1u7wxpC5ut2kg3Iq6Pkp6jz-WFM06d5EEWcjszxcXPMYNPNEBFa0bFnXYVNdj7NLGgWPUtd6LcqgUUsDQVnziC-9KFxch7nHYjqP1BaAuRMhIFwiEFwicHqdrvY0xgqgTq167MpnaaKlKfA1y_QyWoBx22PNU2YeXT2BNPJPSFTPAmjstJjHYgfy9ZxfqXCfGpT5KmVMh65xZ0OdCvWyFcXS6vHdURMKIzOhz8SNvIG-kYe7EtRnc87P9Z083Gy_DPNcXN7Sc3QsKwiQo3DmquNk4XJZbCFcJzzNFzwKuaiYeehX_Ltvl7prYMpcIpqzoNQdYwxcJ0dvD86OfiA_nRz_59HhWRF83s5mECiLcHRofBvbQmWjXFw8cmvOvHjCv0QlKf-d-bkXsJyGUaZ7klKX_HB0dvDm7alOThYaKDYRDN71uTJ7C1TyAXQcRqERlqwjH2y_BVRl6yS_7tpjEXuA1eOoT31_RZyJzKniWh9K-4CD4DbtA8qdFiPqawt90hZybtVCYiNL7iuHXxvpkzeSe6tGguy_Mqno19b5ZK3zQXo45cxmXFw1ke5Ccep7UoE1uh3A2-mPB1wnR6I-div-_g4IuhghboyxrPBB1NYFC7CVoD6uVSkY_PmI4Q0feZWo7iFNO8B6Y1vvWqKjsIA-0eJI2JZ-bzgPU-0X-pz6K4xadHlGjoHrdIwOjw8Of3zz7rXeqdvK1eIXuQ3QFreoSeqWVzQwQA1OkWYO15OrWzhBNVCHE1RHfrUPn8IJam2fBlwn6GsLfQ5cJ6i1hZqdoK-N9DmcoNZGqjlBX1vnUzpBxUR2s3ODbkMJv8HFmLRj6x5G4UFsTd-2Pn-qnVwnrxHmaLorsHKGx1O-l7xRVt1pEad5GV177CpPaaUjZqoTytlbXFzZRkZa0IYNAv9GXcMlb-IFL24ktk08dxAN1B37_iah-jBVp728m-Cjq4ThtorPOgW7dxNs4xmqlJHT8zCS7lKr5MGdaT5kaR4uQmhY1i16eFwn0YA5Cjb-TSSrrSUU19GbByWixaM2ZGz51JB7YA1uutozKi9GLsM1v6rf7Gm40-NY9nTPGu1hBLZvjdsv8tgTeSbrs57FxnEsLgTb1o69g9eBXCfOy1wi_M3SlKeCpnDpKVIe7FtXVeEP8eWfqT7wLTTJ-vymM9-Vieypf-2n4JPOoaUFq3r_wBWdXbd3hfjiuDZeazh4fUTeHZ-Rfxz__O4H7UYUcPw2wGZt5FwwWac8Ta93yHyT4xchSAJdhFxc8w2BuY9EsBjHryAseEoCzjIS85ywK9CZQErK1hyPeJKfXCJGM0Y28CMvTJNleMFiMmcRvyQ5XCeLMA7I5YrmW5JBDGbDkvHOKcFzn7u6vQu99TVs9emLgb7WHYP5zNQRRmORnkHb6qsfW1_VMN8rG1F5Py3fC2u4Zus50xcy9flX3A1oQHloiJIaVky0hUYq1FCXN2rA4Kws7sLUBRpg7Vh06Ff4HjVxc56vim89KqxyCOrSBluIVt0qUNlq5nabwe4l52CA1yz1txrBpMOAKe9pq8mMCsznCXoXWxCjDfJwDVPbvEEOgqTrhwMUp74sr8Qp5MdppgVMkxHTtV4FlzGsRmTtGzWGl9Mh1oyD3U6qcwupuHEbhf75rYW6t2OgDMZ1ipUTido33CDfebrxcZosvQ2MIZ6twozgNVsCv3_GW1rk0Fww6_BaVcIqX0fS97aqH2LZxH20M30c-nri7-2_eP7s2bMarAVhfkMJP4mgPp60JSFjiQhz7ZvvV7Z-rY4w9fbBTB-dkMPjd6dnXCc_H569OX73am9la_ygEFeceurtn8JsmeOIJmrqBPMJ3Fxc0msCI4Vlu-Q0h3_nm5gF_wHSBkqaoUj5jZdBnbqbrkoPy6vS6gs1HS6VfFMg94SYbK9SYn--bHaxHun2ecvtiVteQccQbZUwH6Z9nytvwhqCyL-HazTiBFxcpm-_QbIyYAtdnWxXnk6gSZgJqiDv3-TZiL9-H6bXNIaha1k7LvwM4GcIPyP4GVvWNy-_e_H8xfPdpg48mzOYodn7F891wjffXDBaEzMjdJ6Bf50zSERDDbbsxXPgR_wmZYPLU_0zXCK_LzMc7pDyP9aubaEKl2GQr6Ce1p_hQZ4r0k8fpHqmZqDSs0Y1CPxBDchQZMVHoZnx3D_HUVxcnmuZEfFPDET_97fWn1-Wj79-24dsL3W-Nf_jPrmye2Tid8_TnEEgmrIgqXnWz3xhbUi4Xlwip2t6pQ51zcjYSa4kcGXvKiOxAw-D3dJoyDzpMoxFmz9LaIDJ4kEcqZGdcEZ6qhv2dkjXKZ16ee9l3YrTOTMytYRWomHLI2iVdIG-1LWwLJUs9eyr3lGgVbK8vgRvxIt76q76OV6NGrhjWZcKXc9wrJmKONNCkWrm77Zq7jjNNXdVO-lVYLLw8APX5Ww3xnjAJs6lUyWOpZgQ4f0Y13IMrG1gs2ijbam_hcCFdBkmmBRCSC0ybFfRlaLR_axlK1wikCqT1sEulSB902MUq-BVrf54-1v5qlmxG7ZqY2BSonUFNVgXbwTeDEiVA6PQBhJMeJWE8Xa-ggWVq8qCxFZZmBQhuBoVMIn8O8xoeQG0DqooY6DtOlorAZiLBkyVjKEUVFwnYtSAr7LhVjNeF8sUI1tBhytVqVIxVMGnLR7OILUSjmxcJ0FD7QrUYCDXgJECiPVaNSSHQshrTM_0SqoOrdbdMvNU6lwisxT1tmRyv1gk4leZwlhEMsrvtOpP-hhehV7aDoq3v2-_LLLirCluZZgxaKvyds6Da4xrVBbOky0IiysybPERsDD2OlScblVAf1xcs_TmpHdUqxgs2-R3u1Wgby4OBWBXFR-SyLkImYvzxfrlVH1zt5Kh_HhfGTSw6t-mmC-9BTiQm5QFnviAuMLgnd_yeyHoDKuvfSrhxTft9P9XgUq3zGvxhTRn61xchdpGLxDmFnsjYFQH1E9mIAoPPDTvXZQHLZSiZf9Sq-Gs9mn0imtrkspjJuIlXibuB5ekiubB7yN5-lwiAU_KzB_-H52nS9w';
					$theme_options['rtl']	= 'eNrtXFzpktxGcv4tRvAd4HZsSAwPenD0LWq8I5orKUImHTxWVjg2EGh0dTc0aFwwBtBziMEfPJem_Q4O78auSGq19OxKlrU__RTot9nMOoDC0ZiDMxTp0FCtmS5kZWV-WZWVlVUFe2SYg9GdeDQcteId13cCL4ha78ej_qj1t5rW609s_KZ34TFxAn9SIVwixDY0Db_1Ri3PPgiWCX7pjFp77oTQyoNRa7r0PAsLLOKRBfGTuPW-PTJGd9yRxqrOiT0hwNUd6axgGgQJFtyNR8DAC2ZBchBShiCMu7Bn9G_xiOxcJ1xchk_dXfdLKvWQPbOmgZ9gc0NUFDnbC9c7oKLpo9a1pe8mgXLT9mNaZI5aY9vZWYZqTmdAM9uRa3sbysfE2yWJ69gbSgxV1JhE7pSDsWsDjU8FAS59BosOUKB4ahIB_TSIFliqjVpcXESUTo3dL6k6xqhl9IRknusTdU7c2TwRz_qCo0cSQEeNQ9tx_RktHbU0jk7BQIaG_7hNGBQUhVkQzDxC8e0zoNzFDGEyESZozJ1wdro50PpcXNpkvlxcjNVl5FH2aLckCUebmx5FXZ2Q3XYyBwvHCdkx2k6w2NwLVeg4Cdh8cxl6gT2JN1GgTU3fxEZVvavtw6cdMjV4ZxFN9Aav3gRjfZcDxxS1YrDhzkFV39wwRVWHXCeTgz3htJu0u8ZM3725m5A12p5LK6g4WHjmBWPbs7Bvz6Jg6U9Q9z7qLo9cJ65-nxcVMAFrRyQkdlwilYECYRC7iRv4UqkOv-0ksZ05jnXpARhAdHVeUu6uU_rDpIYGXd9cJ9HbJDR1OujK6Giiw1IXXlA8XDAZLWcZXCeB7ArQ8UzHdqTKokFDkRj_gsAaz6ys9bLfRk_NiN4UyChWuySqw80h4-Gww4wtBEdfmesHpbQrUwdoFEgogFaB32Riwg-VrM9p57Y_8aALuQ5KboNyd5jDc8eRHR3wmjiQ3CmbE4bZQzpz2HskDhZsJqOThzK1VTuKgj11Euz5AnRRpcSJf8XWlcRVAaZl5sJ5jXjGZAMFwcLsm8J-qZ8FkTf5TEykkmS7joXTA9DEXFwFzwWfZlMozEFRHuo8LOYlrPEyhopxbIlWOxoTk1Kp3O8IKpWK4cyJs-O5cUJNZZg12FqOF8TklRHuFBFehg34GloFXy7EWw5wNhYYsLVjQa-QWJnyoPvEjnYonWAFwdeM0IG1XFz4Vh6ogWKmRf9lQwzcVAJBBfqicUTsnTBwfRHU6TzYM4brCNXcs0n0GM_E82DPSoJwjCCOaZyHmrKSglcbMAVmETkQUklUNQNfOGA28Dltg1wn6ZSIalhq9EcMe07tkWliiWDT6IOcl5ee4nh2HH-ANHRmtp2ktXXZc7cuu-KRUrE_NbsXODa6VDV0faiyCVUgovO30h9Wj1dP0q9Wj0fK5U1a9GkQK9v-DMLnWPkoWEa-PXEvw8y_dfHCO_hTbK--OeLvEi-AILq2KQX-9zB9lh6unqYv2ZffrR6uHqQvoOgJUD3NhFnYrvdzsm8vQo9gTFIQZHPpbZUsQeewDDezD_D_Sy5iHDgQWoOk_k78q8sTd7eqBYzGceKbDF4YN5FSfeb6OGBBN7u2_oxANdurVqxhhXOXupjUPZnbIVHjf13aEal7nBx4RKXNu07N8z0azasHYMQ65aD7qfl0rswjMv2gBZ3HTTzyQevDINhRtpUr4JKWXkI7TktY8av0m_QP6Z_AbOmfwWDfwu_D9Dk31-VNGz5cMGzJLg3Du1NDs35ks8UbVV74a46BilM_eBsRLTBK1JcvXDAZdV6c9RIsXt1PX64esb74m9VjUSxRY6fJ4o67bE7gjxdcMJKLXUK0RgP9AVuNoR-iisLYBuYvV09XD5T0t6un8D9A8PdQ9jz9T6EfrTEOEq49Ti5_pym6YSrdblfpdDocEyENW_N5Iw1IBoMBEFWEg0DAkiMquqabJlwiVORk1GWy8ZG5zCFGxdNcMOZcImfHmrpcMDuIts-wAS7yXDBakIlrq6jqqXzR3JTdzuVN-F7lzmHZEk5pA3HRlA9xLRx7rNvlnQ8hyKVnOYVM_J5-DPGP5dpA0qqPahT_-nTqOkT5GLQYKdpwpGn2QlGVDvwRLspaFG2QzN0oV8IcnlqJcB7Ait-xPS9XA-YgBbrQQBkOh0eo8IuIEOUK1K6AbhT6Hbgu2yrkFfqasI3cPZvWGUa_SluaRHHajCA4eE_boP_apn5JVGWrb2tda6X53-ysrdEcC5iZkLm6UKZr3bIrkRqnAx5zNSFcMMU8owRgnaJmUVGqpYmFJA7BWbu7xGqoPeS1DX2D_ae1h71LXCLtxCtKrIpBoRTr0TAZE14Le79o364m5CzAKFxcimR4Vi3LjtDaQ01gUDRCU8Q2rCNuNBbyL0lfFCNXQjhHYkfOPPOLKB8tsVxcP2TBbReagMkDQ5hnyuoBRDOP0udK-jWdU9L_Sf-Sfq-sHq3uwXOYQHnMk75M_4h_ZcsIkTHizdVlyIzeQKtLGw2M06av9OGmbrBcXI5HYwaaXCfTzXWZo85ZNZQljXhWMCZBNnnrc1inBT5PnoLibByujVwijArFmhgCCSGuQ-L12Vr4ciNcMGcXnG2ettuUpwWDLsOQRI7NllY1CVu9sz5hqw8aE7Z6UzKpIWFrZCNZRm3dwOrl4FqwNkEfgoFKPhCBIDcLOq568mZfC0wmURBiTuT1m7GPzna29Njy_KQp91ewYH3KfWIOOt1mC3K41hulw2ZcXGGSeuIak5hmb-D0xMySVTurfCDw9AM1_15KDKKbcMDB4AqNRdivmiOUE8K4csG10BH5App4y-iaFR-ecg8jXCK7sefCNLT5MfhE9Sb9W9U3WaGq6aqt-kTfa38RzqrIsl2VXufE8JoZvOzXWSBMpviPISwj15A_0SUynI1hQGTbbCDOmz_k2fCsH_Ld7smH_GQyHPLMM3CAGFxcRVHZRlwnZZqt8tb4g46EaLwcHwNUqPGPS899c7zooGHjcvAjQ4oRyMSJIDRr2A5-4xBt2grunRxRAj-G0Qga6p2BtuuSvXJuolsY-dKiqi9ljjIC3PHPoeei-4HgZE92rQQJHTuB4Fr47it2QmZBdKBsQ8ANk108Uio1EnsmakCLt-xZiRhDpIwYXFxowhJSU5dMhJj_BKWxkpcrMEeQiLc1kKrby2QeRKI5QHKbFpRb1Pg5B3ZyoXGCGlRIcdF_rhPz8WYO3C5w9xlGx5g-UGe6eDW1DV3vbuhDXFzoDy_l2xhMQVwnsZt24LCLl3eCftqGO2qXqFeAlw460bU_u6ps34DPL7c_-XT7w0-vKr-4fkP5_PptIb9UDyabrCrvV3QXKKcYL5MkkBKzQHXl-rVb21duKbdvrqfPkqHgecQ6hKUrBW15Lwpw71m9bHtLpj1cIkFDdSrRn_eIWrsHvmYMrTk7YHZN25zkG6uyFg0RWF-cyFqLJlB0LNMy8p29YoWjcl5aTYVXxvS8TmCYOuA4yOb9ouDNRwpY-vQEqFQqvNm--3iIFZVqDv2zHhcesJ29LDpASdNvVvdXT1b3aTpt9Tj9Nj1U_u-5glwnspTLNt_UOmrJ1dpi5_hw66qNmTuWnBOsV4_gz3urXCfp_6bP22UXlImVHZ0R_QuI-DbgKwXWPQw45sECgr-PgN3u-QaB61YqmMhun1wiru5OesN-9_RxNXY89O2qzHVCpvbSy7av8ueqpDrdVu8aQ7ZfhvOXRDcX8QU7tDjsT50sSa9XFplvRnZwvdXMhtC90zuXlBJFynj7kDIakDLODynzrUPKaFhgm4PzQ6rz9iHVkNA1O-eHVPftQ0prQEo7P6R6bx1SZ52MOQ5SfNv5R8iummj-U-HUafDnXe3k22E5TqcMV_DuyrESqm_q_qLZ0PGaU9VmHaBjYzwYT18BUAMZ0t2Q15pLPX2XbBq6p3Fyg_GwazdfqcHG-JHb_w9TwXk5OKjLs0UCpf6bPg2Y65FcMK5au3tkfp1fgRMZO54RfR0691_VFQ2ad1xc6OHKOHEXgQ-SWTQ9Sy2b69qt0_V6vGd7k3PRtaxFnlFaYyBoa-wFM8tzF25iEd8ee3zLQN65oCQ0S0LpxHqcTXCYnKME_BCsRfYdEoWCG1wnPiCxWC5TYtwmWQQRyROt7PTS_fQw_S2eTX2Qfp0ecp1oDbE_08-O2wrr4uNxsM-Tgnx0JvOIEJHgxi0RfrLUiuc2NiuywMCeHSBePRiJfEeVHJDfdR0S8wNR7FwiXCfua9gOGQfBjrjKiXv2e26SsMudBhNlFnrLONtxDoMomQaeG1CNsmPE9JwgnqfWRYZcJ1wnpAdjI-LZCRqHH2MzZQr-UMqL41HfR1xcs6fpD0r63_DnCyX9Dg_7VpsQDCSUmTiGyLJXadfgXcsXVZDnabyqkVOFUfAFcRJrQhLb9WLRrdIXq3sg9XerpzwlRjU6XFw9SX8QXTOcikp0bwLt02H2EVwn1_QKUY4SgHTFc6VsZ5nyzLZxQFSyCJODpq0buttYPJr8tm_b0AObiV06d3UXB8tx7APC3cxG3k8Weq0WMo5lIbo_xnaw3Z-M9NqNZB7LSFD9c2JHP1nntVrnLpvEStO4HFZkc_mgQFYbpwzyOIWqpK-tckaxiqkVWoCo3yN4kYjdWypvog8biAvXltiSOpyC_dcEELomnktBw1BEj05gO3PMbTRFT7pEVxs8GRJBJXYyDRqKPkxfpC9p9PQsi56wNI-g9BouawIos4Z0TfxUx7USPnUkoproSZilVwaitvv1Zapj9T5tXY0z6nzYn_IGjuh7g_W05a6Xda2KmXSxCBEaWLVkhnA8BbLckniibC-o5VXuzfTwGLEXsGCCpWnBJcfcHbM4ll4cRETWUEuzMfTc7ckkAkelfOJPg-zOzLoQ7ASsAbrrjrMMbekS3_rI4WSMr-7DUhzicIc0MjZPxhiAvgJLTOXmjuuxYbGWc-fEMF8hUeJOYW2ekGbW3ROxBpqrk6VzFMg8M4nsGnpzXCenWONqJR4VZwu1O1rnqCPl_e4ZvMUF2lHHs_rT4z_6uXwcyPTY33DDMDY6xobWHlxcytJcJySKgoji5M4sjsoxX7OTHw-SLzeJy73YbJH5WbzUYyhOE1JJYjU46kBhIaZ7g6I0pD5cIkrzl45Hw15-2ixD0x6DnSmm2S192teFtQuwZyRcIir4bnUv_QZv1v0FQoNDvFL3JP0DfF7yqECTGOCd1eVcIn-JQhe6cfoDRBOHq39Pv1LS_1CKLGnUgfeyX6TPoORrhb6x4NdIWm0N02RPgHT1CEOT36V_4tWBvK0gNRD-m7gk_0eo8ZW4Xs55Y0blCb08_xJvgr9cXD2Gol8rUPoQhPwanh2iXDAPgQu08VVZKt5-lf_qPhT-nl0_xOYO4cvT9M_wed6-eEF0tgyk0tXGjrja6IPzjvk5GwNhxSvCmARC5V4IXUqCpt_Cw_9il4fDrfQ30Ow9xHn1BF_vsHoM2qEmlAr5fA-iPmOHrL5Lv8dTV3mkl8OElyThOejzbPWgjWAhuE9EUgrqIH94Dl8OqWWgxiGK8wwMI-PDL2bSNjhR-_JmuCXccQzDRpzirrwUSX7O_W_h-TB_TmeaBVmMSVQ61Y6ptxoqC518WD4B35cl4vF9mV-vhgYjHnqsvcxQXCIWQVuDfFlcXFdiNw6SefauPk7Lg60yt06FYq1sBVLWXCflTLiE7l4QwLy2IJFTMYIMh0TGI9OKySQFxuMQI7cKiWSDxF1A2DCu4YNELBBH34dhRZwUsqHs9RPDjEyA4dsLEeLnQXotZfGMsxxBNrCVA_3jcTWOwRX3VDzX2Tk2U_N4CGA9cNn-EWzZHM0T-kvEO4mWDoYf0ioS2r41d2MF4hKiwO_beOGCvtBEEIs1bZHDPFl4bF2jFV-usPRVvKuq4tAX8VSLvYmmRLaGYkt6Dw3edv4Ve2tChUNMQv52Gen5XFwXj_npgtbW7Wv_cPWGcuX6tZu3bty-cuuT69fA7-qCvpOxyw4ktLZuQiCS4IhWeFSiJIjRnn2gwEghcVu5mcDfydJcJ5O_AW4dzk0SJH_TQ6cM3RGx6uAsYtVCi687aj3hjZXSlVJMexQBcyCicgIeqGn4RpWfuwt04gpEo--9i2DFgBZGkXGbbRzaoRtToKDu37Ntyw8-dKMD24ehq2kbJnw68OnCpwefvqa9e-n9ixcuXmjXdeDRmExhnr9z8YIoePddoBbAjBR7HMPaJSFQiI4afNnFC4AP_a3kBmcHa0cKe7tEt7uh5P_T2rqGXCLsuZNkDnpqP4MvbMtffLvLxJMlA5HeqRVDgR-UQOnSqviVSiZ9V3dwFOdbziOF_onJnH9-T_vZpfzr5--pUO2SqLcIvjxNrfgUlYKT16mvQCnqqiCoSazGDvU2iruYIaYLe5-ftxgpfSPcZ4Rzvc2dxAZ86bRzp8HqRDPXpzZ_XCe0XCdYTL_Q3W7WCUdKi3fD1obStIFebu8O0y3bOB8pQ41KRQ2bnw4plFPqPaGFpvFiJqfKe0dGzYvZtQN4Qh-cUnbez_FKQ8fsM10KcL2DY00WxBhmghQrv1_R3DDqNTe5ncSphXBq4QuK89muj7mWpZ9E2TvsCiQ0-pFOxku0ukQbe0vhS50KBSYp8hTMIGOilPaf9FwidaFpDD9L1bJ9Dl5JyKD3MiFUOWCk91PmJfXxHlwnD1VjAUCBqCDFIKcW-gli0bqU05RIihBIjdZgIJMXMehX62Ug8FoZCFJquIjCIMtulqCAOeSXbmzn97bKRAVhJGq9TC2EXDCa3RqaXCIYXcaoDESvhr6IhlmseJCtUqRqGRwmE6UIRZfn9So43ILSQqZ3PQiCVC-QSggkgqDHCehyrZjtRCbKR1gei4VUmbSouybXKejCqmR6a6xYncmE4oUcUgwh8uyd7OkX1YdZVZwj6dFoOZuvFZ6Og8kBJogKN5sGFRLiF3jo9G0-rm81iDisKCBek5fHbiwWKikGizT2bmOeMh3TPQ7smfQGeBLQzQd60E88HPL3ksoVijf2Z9YUosJlRCYWfZcyp8ELePllfoxw-Xv5eKPZa6rEC-R5uSbfUc1Ku3R8F8_L1JjF4qvNuPTC5kLomDE18QwtofkIK6b35sbiNfcL16dZxFxcYYrQhCwCSxyqDcKc292_AjF-acE';

					


					if ( !function_exists( 'themestek_cs_decode_string' ) ) {
						function themestek_cs_decode_string( $string ) {

							// decode the encrypted theme opitons
							$options = unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );

							// changing image path with client website url so image will be fetched from client server directly
							$demo_domains = array(
								'http://liviza.themestek2.com/datasite/',
								'http://liviza.themestek2.com/demo1/',
								'http://liviza.themestek2.com/demo2/',
								'http://liviza.themestek2.com/demo3/',
								'http://liviza.themestek2.com/liviza-rtl/',
								'http://liviza.themestek2.com/',
							);

							// getting current site URL
							$current_url = get_site_url() . '/';

							foreach( $options as $key=>$val ){
								if( !empty($val) && is_string($val) ){
									if( substr($val,0,7) == 'http://' ){
										$val = str_replace( $demo_domains, $current_url, $val );
										$options[$key] = $val;
									}
								}
							}


							return $options;
						}
					}



					// Update theme options according to selected layout

					if( !empty($theme_options[$layout_type]) ){
						$new_options = themestek_cs_decode_string( $theme_options[$layout_type] );
						update_option('liviza_theme_options', $new_options);
					}


					/**** END CodeStart theme options import ****/





					/**** START - Edit "Hello World" post and change *****/
					$hello_world_post = get_post(1);
					if( !empty($hello_world_post) ){
						$newDate = array(
							'ID'		=> '1',
							'post_date'	=> "2014-12-10 0:0:0" // [ Y-m-d H:i:s ]
						);

						wp_update_post($newDate);
					}
					/**** END - Edit "Hello World" post and change *****/





			        // Import custom configuration
					$content = file_get_contents( THEMESTEK_LIVIZA_DIR .'demo-content-setup/one-click-demo/'.$filename );

					if ( false !== strpos( $content, '<wp:theme_custom>' ) ) {
						preg_match('|<wp:theme_custom>(.*?)</wp:theme_custom>|is', $content, $config);
						if ($config && is_array($config) && count($config) > 1){
							$config = unserialize(base64_decode($config[1]));
							if (is_array($config)){
								$configs = array(
										'page_for_posts',
										'show_on_front',
										'page_on_front',
										'posts_per_page',
										'sidebars_widgets',
									);
								foreach ($configs as $item){
									if (isset($config[$item])){
										if( $item=='page_for_posts' || $item=='page_on_front' ){
											$page = get_page_by_title( $config[$item] );
											if( isset($page->ID) ){
												$config[$item] = $page->ID;
											}
										}
										update_option($item, $config[$item]);
									}
								}
								if (isset($config['sidebars_widgets'])){
									$sidebars = $config['sidebars_widgets'];
									update_option('sidebars_widgets', $sidebars);
									// read config
									$sidebars_config = array();
									if (isset($config['sidebars_config'])){
										$sidebars_config = $config['sidebars_config'];
										if (is_array($sidebars_config)){
											foreach ($sidebars_config as $name => $widget){
												update_option('widget_'.$name, $widget);
											}
										}
									}
								}

								if ( isset($config['menu_list']) && is_array($config['menu_list']) && count($config['menu_list'])>0 ){
									foreach( $config['menu_list'] as $location=>$menu_name ){
										$locations = get_theme_mod('nav_menu_locations'); // Get all menu Locations of current theme

										// Get menu name by id
										$term = get_term_by('name', $menu_name, 'nav_menu');
										$menu_id = $term->term_id;

										$locations[$location] = $menu_id;  //$foo is term_id of menu
										set_theme_mod('nav_menu_locations', $locations); // Set menu locations
									}
								}
							}
						}
						
						// Change homepage slider according to selected header
						if( $layout_type == 'overlay' ){
							// Change Homepage
							$front_page_id = get_page_by_title( 'Homepage-1' );
							update_option( 'show_on_front', 'page' );
							update_option( 'page_on_front', $front_page_id->ID );

						} else if( $layout_type == 'infostack' ){
							// Change Homepage
							$front_page_id = get_page_by_title( 'Homepage-2' );
							update_option( 'show_on_front', 'page' );
							update_option( 'page_on_front', $front_page_id->ID );

						} else if( $layout_type == 'classic' ){ // demo 3
							// Change Homepage
							$front_page_id = get_page_by_title( 'Homepage-3' );
							update_option( 'show_on_front', 'page' );
							update_option( 'page_on_front', $front_page_id->ID );
						} 
					}

					// Update term count in admin section
					themestek_update_term_count();
					flush_rewrite_rules(); // flush rewrite rule

					$answer['answer'] = 'finished';
					$answer['reload'] = 'yes';
					die( json_encode( $answer ) );

				break;

			}
			die;
		}



		/**
		 * Fetch and save image
		 **/
		function grab_image($url,$saveto){
			$ch = curl_init ($url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
			$raw=curl_exec($ch);
			curl_close ($ch);
			if(file_exists($saveto)){
				unlink($saveto);
			}
			$fp = fopen($saveto,'x');
			fwrite($fp, $raw);
			fclose($fp);
		}



	} // END class

} // END if



if( !function_exists('themestek_update_term_count') ){
function themestek_update_term_count(){
	$get_taxonomies = get_taxonomies();
	foreach( $get_taxonomies as $taxonomy=>$taxonomy2 ){
		$terms = get_terms( $taxonomy, 'hide_empty=0' );
		$terms_array = array();
		foreach( $terms as $term ){
			$terms_array[] = $term->term_id;
		}
		if( !empty($terms_array) && count($terms_array)>0 ){
			$output = wp_update_term_count_now( $terms_array, $taxonomy );
		}
	}
}
}




// For AJAX callback
$themestek_liviza_one_click_demo_setup = new themestek_liviza_one_click_demo_setup;
