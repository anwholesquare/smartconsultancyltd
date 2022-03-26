<?php

function tste_liviza_cpt_themestek_coaching(){

	$liviza_theme_options = get_option('liviza_theme_options');
	
	$ch_type_title          = ( !empty($liviza_theme_options['ch_type_title']) ) ? $liviza_theme_options['ch_type_title'] : 'Coaching' ;
	$ch_type_title_singular = ( !empty($liviza_theme_options['ch_type_title_singular']) ) ? $liviza_theme_options['ch_type_title_singular'] : 'Coaching' ;
	$ch_type_slug           = ( !empty($liviza_theme_options['ch_type_slug']) ) ? $liviza_theme_options['ch_type_slug'] : 'coaching' ;
	
	$ch_cat_title          = ( !empty($liviza_theme_options['ch_cat_title']) ) ? $liviza_theme_options['ch_cat_title'] : 'Coaching Categories' ;
	$ch_cat_title_singular = ( !empty($liviza_theme_options['ch_cat_title_singular']) ) ? $liviza_theme_options['ch_cat_title_singular'] : 'Coaching Category' ;
	$ch_cat_slug           = ( !empty($liviza_theme_options['ch_cat_slug']) ) ? $liviza_theme_options['ch_cat_slug'] : 'coaching-category' ;
	
	
	/*
	 *  Custom Post Type
	 */
	$labels = array(
		'name'               => _x( 'Coaching', 'post type general name', 'tste' ),
		'singular_name'      => _x( 'Coaching', 'post type singular name', 'tste' ),
		'menu_name'          => _x( 'Coaching', 'admin menu', 'tste' ),
		'name_admin_bar'     => _x( 'Coaching', 'add new on admin bar', 'tste' ),
		'add_new'            => _x( 'Add New', 'coaching', 'tste' ),
		'add_new_item'       => esc_attr__( 'Add New Coaching', 'tste' ),
		'new_item'           => esc_attr__( 'New Coaching', 'tste' ),
		'edit_item'          => esc_attr__( 'Edit Coaching', 'tste' ),
		'view_item'          => esc_attr__( 'View Coaching', 'tste' ),
		'all_items'          => esc_attr__( 'All Coaching', 'tste' ),
		'search_items'       => esc_attr__( 'Search Coaching', 'tste' ),
		'parent_item_colon'  => esc_attr__( 'Parent Coaching:', 'tste' ),
		'not_found'          => esc_attr__( 'No coaching found.', 'tste' ),
		'not_found_in_trash' => esc_attr__( 'No coaching found in Trash.', 'tste' )
	);
	
	
	
	
	if( trim($ch_type_title)!='Coaching' || trim($ch_type_title_singular)!='Coaching' ){
		// Getting Team Member Title
		
		$labels = array(
			'name'               => esc_attr_x( $ch_type_title, 'post type general name', 'tste' ),
			'singular_name'      => esc_attr_x( $ch_type_title_singular, 'post type singular name', 'tste' ),
			'menu_name'          => esc_attr_x( $ch_type_title_singular, 'admin menu', 'tste' ),
			'name_admin_bar'     => esc_attr_x( $ch_type_title_singular, 'add new on admin bar', 'tste' ),
			'add_new'            => esc_attr_x( 'Add New', 'coaching', 'tste' ),
			'add_new_item'       => esc_attr__( 'Add New '.$ch_type_title_singular, 'tste' ),
			'new_item'           => esc_attr__( 'New '.$ch_type_title_singular, 'tste' ),
			'edit_item'          => esc_attr__( 'Edit '.$ch_type_title_singular, 'tste' ),
			'view_item'          => esc_attr__( 'View '.$ch_type_title_singular, 'tste' ),
			'all_items'          => esc_attr__( 'All '.$ch_type_title, 'tste' ),
			'search_items'       => esc_attr__( 'Search '.$ch_type_title_singular, 'tste' ),
			'parent_item_colon'  => esc_attr__( 'Parent '.$ch_type_title_singular.':', 'tste' ),
			'not_found'          => esc_attr__( 'No '.strtolower($ch_type_title_singular).' found.', 'tste' ),
			'not_found_in_trash' => esc_attr__( 'No '.strtolower($ch_type_title_singular).' found in Trash.', 'tste' )
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
		'rewrite'            => array( 'with_front' => false, 'slug' => $ch_type_slug ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' /*, 'custom-fields'*/ )
	);

	register_post_type( 'themestek-coaching', $args );
	
	


	
	//Registaring Taxonomy for Post Type Coaching
	
	$labels = 	array(
		'name'              => esc_attr__('Coaching Category', 'tste'),
		'singular_name'     => esc_attr__('Coaching Category', 'tste'),
		'search_items'      => esc_attr__('Search Coaching Category', 'tste'),
		'all_items'         => esc_attr__('All Coaching Category', 'tste'), 
		'parent_item'       => esc_attr__('Parent Coaching Category', 'tste'),
		'parent_item_colon' => esc_attr__('Parent Coaching Category:', 'tste'), 
		'edit_item'         => esc_attr__('Edit Coaching Category', 'tste'),
		'update_item'       => esc_attr__('Update Coaching Category', 'tste'),
		'add_new_item'      => esc_attr__('Add New Coaching Category', 'tste'),
		'new_item_name'     => esc_attr__('New Coaching Category Name', 'tste'),
		'menu_name'         => esc_attr__('Coaching Category', 'tste'),
	);
	
	

	if($ch_cat_title != '' && $ch_cat_title != esc_attr__('Coaching Category', 'tste')){
		
		$labels = array(
			'name'              => sprintf( esc_attr__('%s', 'tste'), $ch_cat_title ),
			'singular_name'     => sprintf( esc_attr__('%s', 'tste'), $ch_cat_title_singular ),
			'search_items'      => sprintf( esc_attr__('Search %s', 'tste'), $ch_cat_title ),
			'all_items'         => sprintf( esc_attr__('All %s', 'tste'), $ch_cat_title ),
			'parent_item'       => sprintf( esc_attr__('Parent %s', 'tste'), $ch_cat_title_singular ),
			'parent_item_colon' => sprintf( esc_attr__('Parent %s:', 'tste'), $ch_cat_title_singular ),
			'edit_item'         => sprintf( esc_attr__('Edit %s', 'tste'), $ch_cat_title_singular ),
			'update_item'       => sprintf( esc_attr__('Update %s', 'tste'), $ch_cat_title_singular ),
			'add_new_item'      => sprintf( esc_attr__('Add New %s', 'tste'), $ch_cat_title_singular ),
			'new_item_name'     => sprintf( esc_attr__('New %s Name', 'tste'), $ch_cat_title_singular ),
			'menu_name'         => sprintf( esc_attr__('%s', 'tste'), $ch_cat_title_singular ),
		);
	}
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $ch_cat_slug ),
	);
	
	register_taxonomy( 'themestek-coaching-category', 'themestek-coaching', $args  );
	
	
}

add_action( 'init', 'tste_liviza_cpt_themestek_coaching', 8 );







// Show Featured image in the admin section
add_filter( 'manage_themestek-coaching_posts_columns', 'tste_themestek_coaching_set_featured_image_column' );
add_action( 'manage_themestek-coaching_posts_custom_column' , 'tste_themestek_coaching_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'tste_themestek_coaching_set_featured_image_column' ) ) {
function tste_themestek_coaching_set_featured_image_column($columns) {
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
if ( ! function_exists( 'tste_themestek_coaching_set_featured_image_column_content' ) ) {
function tste_themestek_coaching_set_featured_image_column_content( $column, $post_id ) {
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
 *  Meta Boxes: Coaching
 */
if ( ! function_exists( 'tste_liviza_themestek_coaching_metabox_options' ) ) {
function tste_liviza_themestek_coaching_metabox_options( $options ) {
	
	// Praparing List options array
	$liviza_theme_options = get_option('liviza_theme_options');
	
	$ch_type_title_singular = ( !empty($liviza_theme_options['ch_type_title_singular']) ) ? $liviza_theme_options['ch_type_title_singular'] : 'Coaching' ;
	
	
	$post_id = !empty($_GET['post']) ? $_GET['post'] : get_the_ID() ;
	
	
	$list_array    = array();
	$options_array = array();
	if( isset($liviza_theme_options['ch_details_line']) && is_array($liviza_theme_options['ch_details_line']) && count( $liviza_theme_options['ch_details_line'] ) > 0 ){
		foreach( $liviza_theme_options['ch_details_line'] as $key=>$val ){
			
			// Icon classs
			$icon_class = $val['ch_details_line_icon']['library_' . $val['ch_details_line_icon']['library'] ];
			
			$option_array = array(
				'id'         => 'ch_details_line_'.$key,
				'type'       => 'text',
				'title'      => '<span class="themestek-admin-pf-list-icon"> <i class="'. $icon_class .'"></i></span> &nbsp; '. esc_attr__($val['ch_details_line_title'], 'liviza'),
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
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'themestek-coaching-category', '', ', ', '' ) );
					break;
				
				
				case 'category_link' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'themestek-input-style-link';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'themestek-coaching-category', '', ', ', '' ) );
					break;
					
				case 'tag' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'themestek-input-style-text';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'themestek-coaching-category', '', ', ', '' ) );
					break;
					
				case 'tag_link' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'themestek-input-style-link';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'themestek-coaching-category', '', ', ', '' ) );
					break;
					
			}
			
			// merging with main array
			$options_array[] = $option_array;
			
		}
	}
	
	
	
	if( count($options_array)==0 ){
		// No options created in Coaching Settings section.
		$list_array[] = array(
			'type'    => 'notice',
			'class'   => 'success',
			'content' => esc_attr__('There is no option to show. Please create some options from "Theme Options > Coaching Settings" section.', 'tste'),
		);
	} else {
		
		// Options created in Coaching Settings section.
		$list_array = $options_array;
		
	}
	

	
	// Coaching List options
	$options[]    = array(
		'id'        => 'themestek_coaching_list_data',
		'title'     => sprintf( esc_attr__('Liviza: %s List Options', 'tste'), $ch_type_title_singular ),
		'post_type' => 'themestek-coaching', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_ch_list_data',
				'fields' => array(
		
					array(
						'id'        => 'themestek_ch_list_data',
						'type'      => 'fieldset',
						'title'     => esc_attr__('List Values','tste'),
						'fields'    => $list_array,
						//'debug'     => true
						'after'   		=> '<br><div class="cs-text-muted">'.__('You can add values of this each line and the line will appear on front side. The empty value line will be hidden.', 'tste'). '<br>' . sprintf( esc_attr__('You can manage (change icon or title of the line) from "Theme Opitons > %s Settings" section.', 'tste'), $ch_type_title_singular ).'</div>',
					),
					
				),
			),
		),
	);
	
	
	
	// Coaching Featured Image / Video / Slider Metabox
	$options[]    = array(
		'id'        => 'themestek_coaching_featured',
		'title'     => esc_attr__('Liviza: Featured Image / Video / Slider', 'tste'),
		'post_type' => 'themestek-coaching', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_ch_featured',
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
	
	
	// Coaching View Style Meta Box
	if( function_exists('themestek_global_template_list') ){
		
		// Adding Global option
		$viewstyle_array = themestek_global_template_list( 'coaching-single', true );
		$viewstyle_array = array_merge( array( '' => get_template_directory_uri() . '/includes/images/coaching-single-global.jpg' ), $viewstyle_array );
		
		
		
		$options[]    = array(
			'id'        => 'themestek_coaching_view',
			'title'     => sprintf( esc_attr__('Liviza: %s View Style', 'tste'), $ch_type_title_singular ),
			'post_type' => 'themestek-coaching', // only here is important
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => array(
				array(
					'name'   => 'themestek_ch_view',
					'fields' => array(
						
						array(
							'id'		=> 'viewstyle',
							'type'		=> 'image_select',
							'title'		=> sprintf( esc_attr__('Single View Style for %s (for current only)', 'tste'), $ch_type_title_singular ),
							'options'	=> $viewstyle_array,
							'default'	=> '',
							'after'   		=> '<div class="cs-text-muted">' . sprintf( esc_attr__('Select view for single %s. For this post only.', 'tste'), $ch_type_title_singular ) . '</div>',
							'radio'		=> true,
						),
						
					),
				),
			),
		);
		
	}

	return $options;
}
}
add_filter( 'cs_metabox_options', 'tste_liviza_themestek_coaching_metabox_options' );
