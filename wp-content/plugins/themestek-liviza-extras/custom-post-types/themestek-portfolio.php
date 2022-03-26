<?php

function tste_liviza_cpt_themestek_portfolio(){

	$liviza_theme_options = get_option('liviza_theme_options');
	
	$pf_type_title          = ( !empty($liviza_theme_options['pf_type_title']) ) ? $liviza_theme_options['pf_type_title'] : 'Portfolio' ;
	$pf_type_title_singular = ( !empty($liviza_theme_options['pf_type_title_singular']) ) ? $liviza_theme_options['pf_type_title_singular'] : 'Portfolio' ;
	$pf_type_slug           = ( !empty($liviza_theme_options['pf_type_slug']) ) ? $liviza_theme_options['pf_type_slug'] : 'portfolio' ;
	
	$pf_cat_title          = ( !empty($liviza_theme_options['pf_cat_title']) ) ? $liviza_theme_options['pf_cat_title'] : 'Portfolio Categories' ;
	$pf_cat_title_singular = ( !empty($liviza_theme_options['pf_cat_title_singular']) ) ? $liviza_theme_options['pf_cat_title_singular'] : 'Portfolio Category' ;
	$pf_cat_slug           = ( !empty($liviza_theme_options['pf_cat_slug']) ) ? $liviza_theme_options['pf_cat_slug'] : 'portfolio-category' ;
	
	
	/*
	 *  Custom Post Type
	 */
	$labels = array(
		'name'               => _x( 'Portfolio', 'post type general name', 'tste' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name', 'tste' ),
		'menu_name'          => _x( 'Portfolio', 'admin menu', 'tste' ),
		'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'tste' ),
		'add_new'            => _x( 'Add New', 'portfolio', 'tste' ),
		'add_new_item'       => esc_attr__( 'Add New Portfolio', 'tste' ),
		'new_item'           => esc_attr__( 'New Portfolio', 'tste' ),
		'edit_item'          => esc_attr__( 'Edit Portfolio', 'tste' ),
		'view_item'          => esc_attr__( 'View Portfolio', 'tste' ),
		'all_items'          => esc_attr__( 'All Portfolio', 'tste' ),
		'search_items'       => esc_attr__( 'Search Portfolio', 'tste' ),
		'parent_item_colon'  => esc_attr__( 'Parent Portfolio:', 'tste' ),
		'not_found'          => esc_attr__( 'No portfolio found.', 'tste' ),
		'not_found_in_trash' => esc_attr__( 'No portfolio found in Trash.', 'tste' )
	);
	
	
	
	
	if( trim($pf_type_title)!='Portfolio' || trim($pf_type_title_singular)!='Portfolio' ){
		// Getting Team Member Title
		
		$labels = array(
			'name'               => esc_attr_x( $pf_type_title, 'post type general name', 'tste' ),
			'singular_name'      => esc_attr_x( $pf_type_title_singular, 'post type singular name', 'tste' ),
			'menu_name'          => esc_attr_x( $pf_type_title_singular, 'admin menu', 'tste' ),
			'name_admin_bar'     => esc_attr_x( $pf_type_title_singular, 'add new on admin bar', 'tste' ),
			'add_new'            => esc_attr_x( 'Add New', 'portfolio', 'tste' ),
			'add_new_item'       => esc_attr__( 'Add New '.$pf_type_title_singular, 'tste' ),
			'new_item'           => esc_attr__( 'New '.$pf_type_title_singular, 'tste' ),
			'edit_item'          => esc_attr__( 'Edit '.$pf_type_title_singular, 'tste' ),
			'view_item'          => esc_attr__( 'View '.$pf_type_title_singular, 'tste' ),
			'all_items'          => esc_attr__( 'All '.$pf_type_title, 'tste' ),
			'search_items'       => esc_attr__( 'Search '.$pf_type_title_singular, 'tste' ),
			'parent_item_colon'  => esc_attr__( 'Parent '.$pf_type_title_singular.':', 'tste' ),
			'not_found'          => esc_attr__( 'No '.strtolower($pf_type_title_singular).' found.', 'tste' ),
			'not_found_in_trash' => esc_attr__( 'No '.strtolower($pf_type_title_singular).' found in Trash.', 'tste' )
		);
	}
	
	
	
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-screenoptions',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'with_front' => false, 'slug' => $pf_type_slug ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' /*, 'custom-fields'*/ )
	);

	register_post_type( 'themestek-portfolio', $args );
	
	


	
	//Registaring Taxonomy for Post Type Portfolio
	
	$labels = 	array(
		'name'              => esc_attr__('Portfolio Category', 'tste'),
		'singular_name'     => esc_attr__('Portfolio Category', 'tste'),
		'search_items'      => esc_attr__('Search Portfolio Category', 'tste'),
		'all_items'         => esc_attr__('All Portfolio Category', 'tste'), 
		'parent_item'       => esc_attr__('Parent Portfolio Category', 'tste'),
		'parent_item_colon' => esc_attr__('Parent Portfolio Category:', 'tste'), 
		'edit_item'         => esc_attr__('Edit Portfolio Category', 'tste'),
		'update_item'       => esc_attr__('Update Portfolio Category', 'tste'),
		'add_new_item'      => esc_attr__('Add New Portfolio Category', 'tste'),
		'new_item_name'     => esc_attr__('New Portfolio Category Name', 'tste'),
		'menu_name'         => esc_attr__('Portfolio Category', 'tste'),
	);
	
	

	if($pf_cat_title != '' && $pf_cat_title != esc_attr__('Portfolio Category', 'tste')){
		
		$labels = array(
			'name'              => sprintf( esc_attr__('%s', 'tste'), $pf_cat_title ),
			'singular_name'     => sprintf( esc_attr__('%s', 'tste'), $pf_cat_title_singular ),
			'search_items'      => sprintf( esc_attr__('Search %s', 'tste'), $pf_cat_title ),
			'all_items'         => sprintf( esc_attr__('All %s', 'tste'), $pf_cat_title ),
			'parent_item'       => sprintf( esc_attr__('Parent %s', 'tste'), $pf_cat_title_singular ),
			'parent_item_colon' => sprintf( esc_attr__('Parent %s:', 'tste'), $pf_cat_title_singular ),
			'edit_item'         => sprintf( esc_attr__('Edit %s', 'tste'), $pf_cat_title_singular ),
			'update_item'       => sprintf( esc_attr__('Update %s', 'tste'), $pf_cat_title_singular ),
			'add_new_item'      => sprintf( esc_attr__('Add New %s', 'tste'), $pf_cat_title_singular ),
			'new_item_name'     => sprintf( esc_attr__('New %s Name', 'tste'), $pf_cat_title_singular ),
			'menu_name'         => sprintf( esc_attr__('%s', 'tste'), $pf_cat_title_singular ),
		);
	}
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $pf_cat_slug ),
	);
	
	register_taxonomy( 'themestek-portfolio-category', 'themestek-portfolio', $args  );
	
	
}

add_action( 'init', 'tste_liviza_cpt_themestek_portfolio', 8 );







// Show Featured image in the admin section
add_filter( 'manage_themestek-portfolio_posts_columns', 'tste_themestek_portfolio_set_featured_image_column' );
add_action( 'manage_themestek-portfolio_posts_custom_column' , 'tste_themestek_portfolio_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'tste_themestek_portfolio_set_featured_image_column' ) ) {
function tste_themestek_portfolio_set_featured_image_column($columns) {
	$new_columns = array();
	foreach( $columns as $key=>$val ){
		$new_columns[$key] = $val;
		if( $key=='title' ){
			$new_columns['themestek_featured_image'] = esc_attr__( 'Featured Image', 'liviza' );
		}
	}
	return $new_columns;
}
}
if ( ! function_exists( 'tste_themestek_portfolio_set_featured_image_column_content' ) ) {
function tste_themestek_portfolio_set_featured_image_column_content( $column, $post_id ) {
	if( $column == 'themestek_featured_image' ){
		echo '<a href="'. get_permalink($post_id) .'">';
		if ( has_post_thumbnail($post_id) ) {
			the_post_thumbnail('thumbnail');
		} else {
			echo '<img src="' . THEMESTEK_LIVIZA_URI . '/images/admin-no-image.png" />';
		}
		echo '</a>';
	}
	
}
}








/**
 *  Meta Boxes: Portfolio
 */
if ( ! function_exists( 'tste_liviza_themestek_portfolio_metabox_options' ) ) {
function tste_liviza_themestek_portfolio_metabox_options( $options ) {
	
	// Praparing List options array
	$liviza_theme_options = get_option('liviza_theme_options');
	
	$pf_type_title_singular = ( !empty($liviza_theme_options['pf_type_title_singular']) ) ? $liviza_theme_options['pf_type_title_singular'] : 'Portfolio' ;
	
	
	$post_id = !empty($_GET['post']) ? $_GET['post'] : get_the_ID() ;
	
	
	$list_array    = array();
	$options_array = array();
	if( isset($liviza_theme_options['pf_details_line']) && is_array($liviza_theme_options['pf_details_line']) && count( $liviza_theme_options['pf_details_line'] ) > 0 ){
		foreach( $liviza_theme_options['pf_details_line'] as $key=>$val ){
			
			// Icon classs
			$icon_class = $val['pf_details_line_icon']['library_' . $val['pf_details_line_icon']['library'] ];
			
			$option_array = array(
				'id'         => 'pf_details_line_'.$key,
				'type'       => 'text',
				'title'      => '<span class="themestek-admin-pf-list-icon"> <i class="'. $icon_class .'"></i></span> &nbsp; '. esc_attr__($val['pf_details_line_title'], 'liviza'),
			);
			
			switch( $val['data'] ){
				
				case 'custom' :
				default :
					$option_array['type']         = 'text';
					break;
				
				case 'multiline' :
					$option_array['type']       = 'textarea';
					break;
				
				case 'date' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['value']      = get_the_date( '', $post_id );
					break;
				
				case 'category' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'themestek-input-style-text';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'themestek-portfolio-category', '', ', ', '' ) );
					break;
				
				
				case 'category_link' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'themestek-input-style-link';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'themestek-portfolio-category', '', ', ', '' ) );
					break;
					
				case 'tag' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'themestek-input-style-text';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'themestek-portfolio-category', '', ', ', '' ) );
					break;
					
				case 'tag_link' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'themestek-input-style-link';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'themestek-portfolio-category', '', ', ', '' ) );
					break;
					
			}
			
			// merging with main array
			$options_array[] = $option_array;
			
		}
	}
	
	
	
	if( count($options_array)==0 ){
		// No options created in Portfolio Settings section.
		$list_array[] = array(
			'type'    => 'notice',
			'class'   => 'success',
			'content' => esc_attr__('There is no option to show. Please create some options from "Theme Options > Portfolio Settings" section.', 'tste'),
		);
	} else {
		
		// Options created in Portfolio Settings section.
		$list_array = $options_array;
		
	}
	
	
	
	
	
	
	
	// Portfolio Short Description
	$options[]    = array(
		'id'        => 'themestek_portfolio_shortdesc',
		'title'     => sprintf( esc_attr__('Liviza: %s Short Description Text', 'tste'), $pf_type_title_singular ),
		'post_type' => 'themestek-portfolio', // only here is important
		'context'   => 'normal',
		'priority'  => 'high',
		'sections'  => array(
			array(
				'name'   => 'themestek_pf_shortdesc',
				'fields' => array(
					array(
						'id'        => 'themestek_pf_shortdesc',
						'type'      => 'wysiwyg',
						'title'     => esc_attr__('Short Description Text','tste'),
						'after'   		=> '<br><div class="cs-text-muted">' . sprintf( esc_attr__('You can manage (change icon or title of the line) from "Theme Opitons > %s Settings" section.', 'tste'), $pf_type_title_singular ).'</div>',
					),
					
				),
			),
		),
	);


	// Portfolio Short Description
	$options[]    = array(
		'id'        => 'themestek_portfolio_flag',
		'title'     => sprintf( esc_attr__('Liviza: %s Flag', 'tste'), $pf_type_title_singular ),
		'post_type' => 'themestek-portfolio', // only here is important
		'context'   => 'normal',
		'priority'  => 'high',
		'sections'  => array(
			array(
				'name'   => 'themestek_pf_flag',
				'fields' => array(
					array(
						'id'        => 'themestek_pf_flag',
						'type'      => 'select',
						'title'     => sprintf( esc_attr__('Select Flag for this %1$s','tste'), $pf_type_title_singular ),
						'after'   	=> '<br><div class="cs-text-muted">' . sprintf( esc_attr__('Select Flag icon for this %1$s" section.', 'tste'), $pf_type_title_singular ).'</div>',
						'options'  	=> array(
							'af'		=> esc_html__('Afghanistan', 'liviza'),
							'ax'		=> esc_html__('Aland Islands', 'liviza'),
							'al'		=> esc_html__('Albania', 'liviza'),
							'dz'		=> esc_html__('Algeria', 'liviza'),
							'as'		=> esc_html__('American Samoa', 'liviza'),
							'ad'		=> esc_html__('Andorra', 'liviza'),
							'ao'		=> esc_html__('Angola', 'liviza'),
							'ai'		=> esc_html__('Anguilla', 'liviza'),
							'ag'		=> esc_html__('Antigua and Barbuda', 'liviza'),
							'ar'		=> esc_html__('Argentina', 'liviza'),
							'am'		=> esc_html__('Armenia', 'liviza'),
							'aw'		=> esc_html__('Aruba', 'liviza'),
							'au'		=> esc_html__('Australia', 'liviza'),
							'at'		=> esc_html__('Austria', 'liviza'),
							'az'		=> esc_html__('Azerbaijan', 'liviza'),
							'bs'		=> esc_html__('Bahamas', 'liviza'),
							'bh'		=> esc_html__('Bahrain', 'liviza'),
							'bd'		=> esc_html__('Bangladesh', 'liviza'),
							'bb'		=> esc_html__('Barbados', 'liviza'),
							'by'		=> esc_html__('Belarus', 'liviza'),
							'be'		=> esc_html__('Belgium', 'liviza'),
							'bz'		=> esc_html__('Belize', 'liviza'),
							'bj'		=> esc_html__('Benin', 'liviza'),
							'bm'		=> esc_html__('Bermuda', 'liviza'),
							'bt'		=> esc_html__('Bhutan', 'liviza'),
							'bo'		=> esc_html__('Bolivia (Plurinational State of)', 'liviza'),
							'bq'		=> esc_html__('Bonaire, Sint Eustatius and Saba', 'liviza'),
							'ba'		=> esc_html__('Bosnia and Herzegovina', 'liviza'),
							'bw'		=> esc_html__('Botswana', 'liviza'),
							'br'		=> esc_html__('Brazil', 'liviza'),
							'io'		=> esc_html__('British Indian Ocean Territory', 'liviza'),
							'bn'		=> esc_html__('Brunei Darussalam', 'liviza'),
							'bg'		=> esc_html__('Bulgaria', 'liviza'),
							'bf'		=> esc_html__('Burkina Faso', 'liviza'),
							'bi'		=> esc_html__('Burundi', 'liviza'),
							'cv'		=> esc_html__('Cabo Verde', 'liviza'),
							'kh'		=> esc_html__('Cambodia', 'liviza'),
							'cm'		=> esc_html__('Cameroon', 'liviza'),
							'ca'		=> esc_html__('Canada', 'liviza'),
							'ky'		=> esc_html__('Cayman Islands', 'liviza'),
							'cf'		=> esc_html__('Central African Republic', 'liviza'),
							'td'		=> esc_html__('Chad', 'liviza'),
							'cl'		=> esc_html__('Chile', 'liviza'),
							'cn'		=> esc_html__('China', 'liviza'),
							'cx'		=> esc_html__('Christmas Island', 'liviza'),
							'cc'		=> esc_html__('Cocos (Keeling) Islands', 'liviza'),
							'co'		=> esc_html__('Colombia', 'liviza'),
							'km'		=> esc_html__('Comoros', 'liviza'),
							'ck'		=> esc_html__('Cook Islands', 'liviza'),
							'cr'		=> esc_html__('Costa Rica', 'liviza'),
							'hr'		=> esc_html__('Croatia', 'liviza'),
							'cu'		=> esc_html__('Cuba', 'liviza'),
							'cw'		=> esc_html__('Curaçao', 'liviza'),
							'cy'		=> esc_html__('Cyprus', 'liviza'),
							'cz'		=> esc_html__('Czech Republic', 'liviza'),
							'ci'		=> esc_html__('Côte d\'Ivoire', 'liviza'),
							'cd'		=> esc_html__('Democratic Republic of the Congo', 'liviza'),
							'dk'		=> esc_html__('Denmark', 'liviza'),
							'dj'		=> esc_html__('Djibouti', 'liviza'),
							'dm'		=> esc_html__('Dominica', 'liviza'),
							'do'		=> esc_html__('Dominican Republic', 'liviza'),
							'ec'		=> esc_html__('Ecuador', 'liviza'),
							'eg'		=> esc_html__('Egypt', 'liviza'),
							'sv'		=> esc_html__('El Salvador', 'liviza'),
							'gb-eng'	=> esc_html__('England', 'liviza'),
							'gq'		=> esc_html__('Equatorial Guinea', 'liviza'),
							'er'		=> esc_html__('Eritrea', 'liviza'),
							'eu'		=> esc_html__('Europe ', 'liviza'),
							'ee'		=> esc_html__('Estonia', 'liviza'),
							'et'		=> esc_html__('Ethiopia', 'liviza'),
							'fk'		=> esc_html__('Falkland Islands', 'liviza'),
							'fo'		=> esc_html__('Faroe Islands', 'liviza'),
							'fm'		=> esc_html__('Federated States of Micronesia', 'liviza'),
							'fj'		=> esc_html__('Fiji', 'liviza'),
							'fi'		=> esc_html__('Finland', 'liviza'),
							'fr'		=> esc_html__('France', 'liviza'),
							'gf'		=> esc_html__('French Guiana', 'liviza'),
							'pf'		=> esc_html__('French Polynesia', 'liviza'),
							'tf'		=> esc_html__('French Southern Territories', 'liviza'),
							'ga'		=> esc_html__('Gabon', 'liviza'),
							'gm'		=> esc_html__('Gambia', 'liviza'),
							'ge'		=> esc_html__('Georgia', 'liviza'),
							'de'		=> esc_html__('Germany', 'liviza'),
							'gh'		=> esc_html__('Ghana', 'liviza'),
							'gi'		=> esc_html__('Gibraltar', 'liviza'),
							'gr'		=> esc_html__('Greece', 'liviza'),
							'gl'		=> esc_html__('Greenland', 'liviza'),
							'gd'		=> esc_html__('Grenada', 'liviza'),
							'gp'		=> esc_html__('Guadeloupe', 'liviza'),
							'gu'		=> esc_html__('Guam', 'liviza'),
							'gt'		=> esc_html__('Guatemala', 'liviza'),
							'gg'		=> esc_html__('Guernsey', 'liviza'),
							'gn'		=> esc_html__('Guinea', 'liviza'),
							'gw'		=> esc_html__('Guinea-Bissau', 'liviza'),
							'gy'		=> esc_html__('Guyana', 'liviza'),
							'ht'		=> esc_html__('Haiti', 'liviza'),
							'va'		=> esc_html__('Holy See', 'liviza'),
							'hn'		=> esc_html__('Honduras', 'liviza'),
							'hk'		=> esc_html__('Hong Kong', 'liviza'),
							'hu'		=> esc_html__('Hungary', 'liviza'),
							'is'		=> esc_html__('Iceland', 'liviza'),
							'in'		=> esc_html__('India', 'liviza'),
							'id'		=> esc_html__('Indonesia', 'liviza'),
							'ir'		=> esc_html__('Iran (Islamic Republic of)', 'liviza'),
							'iq'		=> esc_html__('Iraq', 'liviza'),
							'ie'		=> esc_html__('Ireland', 'liviza'),
							'im'		=> esc_html__('Isle of Man', 'liviza'),
							'il'		=> esc_html__('Israel', 'liviza'),
							'it'		=> esc_html__('Italy', 'liviza'),
							'jm'		=> esc_html__('Jamaica', 'liviza'),
							'jp'		=> esc_html__('Japan', 'liviza'),
							'je'		=> esc_html__('Jersey', 'liviza'),
							'jo'		=> esc_html__('Jordan', 'liviza'),
							'kz'		=> esc_html__('Kazakhstan', 'liviza'),
							'ke'		=> esc_html__('Kenya', 'liviza'),
							'ki'		=> esc_html__('Kiribati', 'liviza'),
							'xk'		=> esc_html__('Kosovo', 'liviza'),
							'kw'		=> esc_html__('Kuwait', 'liviza'),
							'kg'		=> esc_html__('Kyrgyzstan', 'liviza'),
							'la'		=> esc_html__('Laos', 'liviza'),
							'lv'		=> esc_html__('Latvia', 'liviza'),
							'lb'		=> esc_html__('Lebanon', 'liviza'),
							'ls'		=> esc_html__('Lesotho', 'liviza'),
							'lr'		=> esc_html__('Liberia', 'liviza'),
							'ly'		=> esc_html__('Libya', 'liviza'),
							'li'		=> esc_html__('Liechtenstein', 'liviza'),
							'lt'		=> esc_html__('Lithuania', 'liviza'),
							'lu'		=> esc_html__('Luxembourg', 'liviza'),
							'mo'		=> esc_html__('Macau', 'liviza'),
							'mg'		=> esc_html__('Madagascar', 'liviza'),
							'mw'		=> esc_html__('Malawi', 'liviza'),
							'my'		=> esc_html__('Malaysia', 'liviza'),
							'mv'		=> esc_html__('Maldives', 'liviza'),
							'ml'		=> esc_html__('Mali', 'liviza'),
							'mt'		=> esc_html__('Malta', 'liviza'),
							'mh'		=> esc_html__('Marshall Islands', 'liviza'),
							'mq'		=> esc_html__('Martinique', 'liviza'),
							'mr'		=> esc_html__('Mauritania', 'liviza'),
							'mu'		=> esc_html__('Mauritius', 'liviza'),
							'yt'		=> esc_html__('Mayotte', 'liviza'),
							'mx'		=> esc_html__('Mexico', 'liviza'),
							'md'		=> esc_html__('Moldova', 'liviza'),
							'mc'		=> esc_html__('Monaco', 'liviza'),
							'mn'		=> esc_html__('Mongolia', 'liviza'),
							'me'		=> esc_html__('Montenegro', 'liviza'),
							'ms'		=> esc_html__('Montserrat', 'liviza'),
							'ma'		=> esc_html__('Morocco', 'liviza'),
							'mz'		=> esc_html__('Mozambique', 'liviza'),
							'mm'		=> esc_html__('Myanmar', 'liviza'),
							'na'		=> esc_html__('Namibia', 'liviza'),
							'nr'		=> esc_html__('Nauru', 'liviza'),
							'np'		=> esc_html__('Nepal', 'liviza'),
							'nl'		=> esc_html__('Netherlands', 'liviza'),
							'nc'		=> esc_html__('New Caledonia', 'liviza'),
							'nz'		=> esc_html__('New Zealand', 'liviza'),
							'ni'		=> esc_html__('Nicaragua', 'liviza'),
							'ne'		=> esc_html__('Niger', 'liviza'),
							'ng'		=> esc_html__('Nigeria', 'liviza'),
							'nu'		=> esc_html__('Niue', 'liviza'),
							'nf'		=> esc_html__('Norfolk Island', 'liviza'),
							'kp'		=> esc_html__('North Korea', 'liviza'),
							'mk'		=> esc_html__('North Macedonia', 'liviza'),
							'gb-nir'	=> esc_html__('Northern Ireland', 'liviza'),
							'mp'		=> esc_html__('Northern Mariana Islands', 'liviza'),
							'no'		=> esc_html__('Norway', 'liviza'),
							'om'		=> esc_html__('Oman', 'liviza'),
							'pk'		=> esc_html__('Pakistan', 'liviza'),
							'pw'		=> esc_html__('Palau', 'liviza'),
							'pa'		=> esc_html__('Panama', 'liviza'),
							'pg'		=> esc_html__('Papua New Guinea', 'liviza'),
							'py'		=> esc_html__('Paraguay', 'liviza'),
							'pe'		=> esc_html__('Peru', 'liviza'),
							'ph'		=> esc_html__('Philippines', 'liviza'),
							'pn'		=> esc_html__('Pitcairn', 'liviza'),
							'pl'		=> esc_html__('Poland', 'liviza'),
							'pt'		=> esc_html__('Portugal', 'liviza'),
							'pr'		=> esc_html__('Puerto Rico', 'liviza'),
							'qa'		=> esc_html__('Qatar', 'liviza'),
							'cg'		=> esc_html__('Republic of the Congo', 'liviza'),
							'ro'		=> esc_html__('Romania', 'liviza'),
							'ru'		=> esc_html__('Russia', 'liviza'),
							'rw'		=> esc_html__('Rwanda', 'liviza'),
							're'		=> esc_html__('Réunion', 'liviza'),
							'bl'		=> esc_html__('Saint Barthélemy', 'liviza'),
							'sh'		=> esc_html__('Saint Helena, Ascension and Tristan da Cunha', 'liviza'),
							'kn'		=> esc_html__('Saint Kitts and Nevis', 'liviza'),
							'lc'		=> esc_html__('Saint Lucia', 'liviza'),
							'mf'		=> esc_html__('Saint Martin', 'liviza'),
							'pm'		=> esc_html__('Saint Pierre and Miquelon', 'liviza'),
							'vc'		=> esc_html__('Saint Vincent and the Grenadines', 'liviza'),
							'ws'		=> esc_html__('Samoa', 'liviza'),
							'sm'		=> esc_html__('San Marino', 'liviza'),
							'st'		=> esc_html__('Sao Tome and Principe', 'liviza'),
							'sa'		=> esc_html__('Saudi Arabia', 'liviza'),
							'gb-sct'	=> esc_html__('Scotland', 'liviza'),
							'sn'		=> esc_html__('Senegal', 'liviza'),
							'rs'		=> esc_html__('Serbia', 'liviza'),
							'sc'		=> esc_html__('Seychelles', 'liviza'),
							'sl'		=> esc_html__('Sierra Leone', 'liviza'),
							'sg'		=> esc_html__('Singapore', 'liviza'),
							'sx'		=> esc_html__('Sint Maarten', 'liviza'),
							'sk'		=> esc_html__('Slovakia', 'liviza'),
							'si'		=> esc_html__('Slovenia', 'liviza'),
							'sb'		=> esc_html__('Solomon Islands', 'liviza'),
							'so'		=> esc_html__('Somalia', 'liviza'),
							'za'		=> esc_html__('South Africa', 'liviza'),
							'gs'		=> esc_html__('South Georgia and the South Sandwich Islands', 'liviza'),
							'kr'		=> esc_html__('South Korea', 'liviza'),
							'ss'		=> esc_html__('South Sudan', 'liviza'),
							'es'		=> esc_html__('Spain', 'liviza'),
							'lk'		=> esc_html__('Sri Lanka', 'liviza'),
							'ps'		=> esc_html__('State of Palestine', 'liviza'),
							'sd'		=> esc_html__('Sudan', 'liviza'),
							'sr'		=> esc_html__('Suriname', 'liviza'),
							'sj'		=> esc_html__('Svalbard and Jan Mayen', 'liviza'),
							'sz'		=> esc_html__('Swaziland', 'liviza'),
							'se'		=> esc_html__('Sweden', 'liviza'),
							'ch'		=> esc_html__('Switzerland', 'liviza'),
							'sy'		=> esc_html__('Syrian Arab Republic', 'liviza'),
							'tw'		=> esc_html__('Taiwan', 'liviza'),
							'tj'		=> esc_html__('Tajikistan', 'liviza'),
							'tz'		=> esc_html__('Tanzania', 'liviza'),
							'th'		=> esc_html__('Thailand', 'liviza'),
							'tl'		=> esc_html__('Timor-Leste', 'liviza'),
							'tg'		=> esc_html__('Togo', 'liviza'),
							'tk'		=> esc_html__('Tokelau', 'liviza'),
							'to'		=> esc_html__('Tonga', 'liviza'),
							'tt'		=> esc_html__('Trinidad and Tobago', 'liviza'),
							'tn'		=> esc_html__('Tunisia', 'liviza'),
							'tr'		=> esc_html__('Turkey', 'liviza'),
							'tm'		=> esc_html__('Turkmenistan', 'liviza'),
							'tc'		=> esc_html__('Turks and Caicos Islands', 'liviza'),
							'tv'		=> esc_html__('Tuvalu', 'liviza'),
							'ug'		=> esc_html__('Uganda', 'liviza'),
							'ua'		=> esc_html__('Ukraine', 'liviza'),
							'ae'		=> esc_html__('United Arab Emirates', 'liviza'),
							'gb'		=> esc_html__('United Kingdom', 'liviza'),
							'um'		=> esc_html__('United States Minor Outlying Islands', 'liviza'),
							'us'		=> esc_html__('United States of America', 'liviza'),
							'uy'		=> esc_html__('Uruguay', 'liviza'),
							'uz'		=> esc_html__('Uzbekistan', 'liviza'),
							'vu'		=> esc_html__('Vanuatu', 'liviza'),
							've'		=> esc_html__('Venezuela (Bolivarian Republic of)', 'liviza'),
							'vn'		=> esc_html__('Vietnam', 'liviza'),
							'vg'		=> esc_html__('Virgin Islands (British)', 'liviza'),
							'vi'		=> esc_html__('Virgin Islands (U.S.)', 'liviza'),
							'gb-wls'	=> esc_html__('Wales', 'liviza'),
							'wf'		=> esc_html__('Wallis and Futuna', 'liviza'),
							'eh'		=> esc_html__('Western Sahara', 'liviza'),
							'ye'		=> esc_html__('Yemen', 'liviza'),
							'zm'		=> esc_html__('Zambia', 'liviza'),
							'zw'		=> esc_html__('Zimbabwe', 'liviza'),
						),
					),
					
				),
			),
		),
	);
	

	
	// Portfolio List options
	$options[]    = array(
		'id'        => 'themestek_portfolio_list_data',
		'title'     => sprintf( esc_attr__('Liviza: %s List Options', 'tste'), $pf_type_title_singular ),
		'post_type' => 'themestek-portfolio', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_pf_list_data',
				'fields' => array(
		
					array(
						'id'        => 'themestek_pf_list_data',
						'type'      => 'fieldset',
						'title'     => esc_attr__('List Values','tste'),
						'fields'    => $list_array,
						//'debug'     => true
						'after'   		=> '<br><div class="cs-text-muted">'.__('You can add values of this each line and the line will appear on front side. The empty value line will be hidden.', 'tste'). '<br>' . sprintf( esc_attr__('You can manage (change icon or title of the line) from "Theme Opitons > %s Settings" section.', 'tste'), $pf_type_title_singular ).'</div>',
					),
					
				),
			),
		),
	);
	
	
	
	// Portfolio Featured Image / Video / Slider Metabox
	$options[]    = array(
		'id'        => 'themestek_portfolio_featured',
		'title'     => esc_attr__('Liviza: Featured Image / Video / Slider', 'tste'),
		'post_type' => 'themestek-portfolio', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_pf_featured',
				'fields' => array(
		
					array(
						'id'       		=> 'featuredtype',
						'type'     		=> 'radio',
						'title'    		=>  esc_attr__('Featured Image / Video / Slider', 'tste'),
						'options'       => array(
											'image'       => esc_attr__('Featured Image', 'tste'),
											'video'       => esc_attr__('Video (YouTube or Vimeo)', 'tste'),
											'audioembed'  => esc_attr__('Audio (SoundCloud embed code)', 'tste'),
											'slider'	  => esc_attr__('Image Slider', 'tste'),
										),
						'default'		=> 'image',
						'after'   		=> '<div class="cs-text-muted">'.__('Select what you want to show as featured. Image or Video', 'tste').'</div>',
					),
					/* Video (YouTube or Vimeo) */
					array(
						'id'     		=> 'video_code',
						'type'    		=> 'textarea',
						'title'   		=> '',
						'dependency' => array( 'featuredtype_video', '==', 'true' ),
						'after'  		=> '<div class="cs-text-muted"><br>'.__('Paste video url (oembed) or embed code.', 'tste').'</div>',
					),
					/* Audio (SoundCloud embed code) */
					array(
						'id'     		=> 'audio_code',
						'type'    		=> 'wysiwyg',
						'title'   		=> esc_attr__('SoundCloud (or any other service) Embed Code or MP3 file path.', 'tste'),
						'dependency' => array( 'featuredtype_audioembed', '==', 'true' ),
						'after'  		=> '<div class="cs-text-muted"><br>'.__('Paste SoundCloud or any other service embed code here', 'tste').'</div>',
						'settings'      => array(
							'textarea_rows' => 5,
							'tinymce'       => false,
							'media_buttons' => false,
							'quicktags'     => false,
						)
					),
					/* Image Slider */
					array(
						'id'          => 'slide_images',
						//'debug'       => true,
						'type'        => 'gallery',
						'title'       => esc_attr__('Slider Images', 'tste'),
						'add_title'   => 'Add Images',
						'edit_title'  => 'Edit Images',
						'clear_title' => 'Remove Images',
						'dependency'  => array( 'featuredtype_slider', '==', 'true' ),
						'after'       => '<br><div class="cs-text-muted">'.__('Select images for Slider gallery.', 'tste').'</div>',
					),
					
					
				),
			),
			
		),
	);
	
	
	// Portfolio View Style Meta Box
	if( function_exists('themestek_global_template_list') ){
		
		// Adding Global option
		$viewstyle_array = themestek_global_template_list( 'portfolio-single', true );
		$viewstyle_array = array_merge( array( '' => get_template_directory_uri() . '/includes/images/portfolio-single-global.jpg' ), $viewstyle_array );
		
		
		
		$options[]    = array(
			'id'        => 'themestek_portfolio_view',
			'title'     => sprintf( esc_attr__('Liviza: %s View Style', 'tste'), $pf_type_title_singular ),
			'post_type' => 'themestek-portfolio', // only here is important
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => array(
				array(
					'name'   => 'themestek_pf_view',
					'fields' => array(
						
						array(
							'id'		=> 'viewstyle',
							'type'		=> 'image_select',
							'title'		=> sprintf( esc_attr__('Single View Style for %s (for current only)', 'tste'), $pf_type_title_singular ),
							'options'	=> $viewstyle_array,
							'default'	=> '',
							'after'   		=> '<div class="cs-text-muted">' . sprintf( esc_attr__('Select view for single %s. For this post only.', 'tste'), $pf_type_title_singular ) . '</div>',
							'radio'		=> true,
						),
						
					),
				),
			),
		);
		
	}
	
	
	
	// Portfolio Reset Likes metabox
	/*
	$options[]    = array(
		'id'        => 'themestek_portfolio_like',
		'title'     => esc_attr__('Liviza: Portfolio Like Option','tste'),
		'post_type' => 'themestek-portfolio', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_portfolio_resetlike',
				'fields' => array(
		
					array(
						'id'       		=> 'pflikereset',
						'type'     		=> 'checkbox',
						'title'    		=> esc_attr__('Portfolio Reset Likes', 'tste'),
						'options'  		=> array(
											'header'  => esc_attr__('YES, Reset Likes', 'tste'),	
										),
						'after'   		=> '<div class="cs-text-muted">'.__('This will make the LIKE count to zero. For this portfolio only. If you like to reset LIKE for all portfolio than please go to "Theme Options > Advanced Settings" section', 'tste').'<br><br>'.'To reset, just check this checkbox and save this page.'.'</div>',
					),
				),
			),
		),
	);
	*/
	
	return $options;
}
}
add_filter( 'cs_metabox_options', 'tste_liviza_themestek_portfolio_metabox_options' );
