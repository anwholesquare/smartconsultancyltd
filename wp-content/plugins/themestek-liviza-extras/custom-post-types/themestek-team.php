<?php 

function tste_liviza_cpt_themestek_team(){

	// Getting Options
	$liviza_theme_options = get_option('liviza_theme_options');
	
	$team_type_title          = ( !empty($liviza_theme_options['team_type_title']) ) ? $liviza_theme_options['team_type_title'] : 'Team Members' ;
	$team_type_title_singular = ( !empty($liviza_theme_options['team_type_title_singular']) ) ? $liviza_theme_options['team_type_title_singular'] : 'Team Member' ;
	$team_type_slug           = ( !empty($liviza_theme_options['team_type_slug']) ) ? $liviza_theme_options['team_type_slug'] : 'team-member' ;
	
	$team_group_title          = ( !empty($liviza_theme_options['team_group_title']) ) ? $liviza_theme_options['team_group_title'] : 'Team Groups' ;
	$team_group_title_singular = ( !empty($liviza_theme_options['team_group_title_singular']) ) ? $liviza_theme_options['team_group_title_singular'] : 'Team Group' ;
	$team_cat_slug           = ( !empty($liviza_theme_options['team_cat_slug']) ) ? $liviza_theme_options['team_cat_slug'] : 'team-group' ;
	
	
	
	
	/*
	 *  Custom Post Type
	 */
	$labels = array(
		'name'               => esc_attr_x( 'Team Members', 'Team Member CPT general name', 'tste' ),
		'singular_name'      => esc_attr_x( 'Team Member', 'Team Member CPT singular name', 'tste' ),
		'menu_name'          => esc_attr_x( 'Team Member', 'Team Member CPT admin menu', 'tste' ),
		'name_admin_bar'     => esc_attr_x( 'Team Member', 'Team Member CPT add new on admin bar', 'tste' ),
		'add_new'            => esc_attr_x( 'Add New', 'Team Member CPT', 'tste' ),
		'add_new_item'       => esc_attr__( 'Add New Team Member', 'tste' ),
		'new_item'           => esc_attr__( 'New Team Member', 'tste' ),
		'edit_item'          => esc_attr__( 'Edit Team Member', 'tste' ),
		'view_item'          => esc_attr__( 'View Team Member', 'tste' ),
		'all_items'          => esc_attr__( 'All Team Members', 'tste' ),
		'search_items'       => esc_attr__( 'Search Team Member', 'tste' ),
		'parent_item_colon'  => esc_attr__( 'Parent Team Member:', 'tste' ),
		'not_found'          => esc_attr__( 'No team member found.', 'tste' ),
		'not_found_in_trash' => esc_attr__( 'No team member found in Trash.', 'tste' )
	);
	
	
	
	if( $team_type_title!='Team Members' || $team_type_title_singular!='Team Member' ){
		
		$labels = array(
			'name'               => esc_attr_x( $team_type_title, 'post type general name', 'tste' ),
			'singular_name'      => esc_attr_x( $team_type_title_singular, 'post type singular name', 'tste' ),
			'menu_name'          => esc_attr_x( $team_type_title_singular, 'admin menu', 'tste' ),
			'name_admin_bar'     => esc_attr_x( $team_type_title_singular, 'add new on admin bar', 'tste' ),
			'add_new'            => esc_attr_x( 'Add New', 'Team Member CPT', 'tste' ),
			'add_new_item'       => esc_attr__( 'Add New '.$team_type_title_singular, 'tste' ),
			'new_item'           => esc_attr__( 'New '.$team_type_title_singular, 'tste' ),
			'edit_item'          => esc_attr__( 'Edit '.$team_type_title_singular, 'tste' ),
			'view_item'          => esc_attr__( 'View '.$team_type_title_singular, 'tste' ),
			'all_items'          => esc_attr__( 'All '.$team_type_title, 'tste' ),
			'search_items'       => esc_attr__( 'Search '.$team_type_title_singular, 'tste' ),
			'parent_item_colon'  => esc_attr__( 'Parent '.$team_type_title_singular.':', 'tste' ),
			'not_found'          => esc_attr__( 'No '.$team_type_title_singular.' found.', 'tste' ),
			'not_found_in_trash' => esc_attr__( 'No '.$team_type_title_singular.' found in Trash.', 'tste' )
		);
	}
	
	
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-groups',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'with_front' => false, 'slug' => $team_type_slug ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);

	register_post_type( 'themestek-team', $args );
	
	
	
	
	
	//Taxonomy 
	
	$labels = 	array(
		'name'              => esc_attr_x( 'Team Group', 'taxonomy general name', 'tste' ),
		'singular_name'     => esc_attr_x( 'Team Group', 'taxonomy singular name', 'tste' ),
		'search_items'      => esc_attr__( 'Search Group', 'tste' ),
		'all_items'         => esc_attr__( 'All Team Groups', 'tste' ),
		'parent_item'       => esc_attr__( 'Parent Group', 'tste' ),
		'parent_item_colon' => esc_attr__( 'Parent Group:', 'tste' ),
		'edit_item'         => esc_attr__( 'Edit Group', 'tste' ),
		'update_item'       => esc_attr__( 'Update Group', 'tste' ),
		'add_new_item'      => esc_attr__( 'Add New Group', 'tste' ),
		'new_item_name'     => esc_attr__( 'New Group Name', 'tste' ),
		'menu_name'         => esc_attr__( 'Team Group', 'tste' ),
	);
	

	if( $team_group_title != esc_attr__('Team Groups', 'tste') || $team_group_title_singular != esc_attr__('Team Group', 'tste') ){
		
		$labels = array(
			'name'              => sprintf( esc_attr__('%s', 'tste'), $team_group_title ),
			'singular_name'     => sprintf( esc_attr__('%s', 'tste'), $team_group_title_singular ),
			'search_items'      => sprintf( esc_attr__('Search %s', 'tste'), $team_group_title ),
			'all_items'         => sprintf( esc_attr__('All %s', 'tste'), $team_group_title ),
			'parent_item'       => sprintf( esc_attr__('Parent %s', 'tste'), $team_group_title_singular ),
			'parent_item_colon' => sprintf( esc_attr__('Parent %s:', 'tste'), $team_group_title_singular ),
			'edit_item'         => sprintf( esc_attr__('Edit %s', 'tste'), $team_group_title_singular ),
			'update_item'       => sprintf( esc_attr__('Update %s', 'tste'), $team_group_title_singular ),
			'add_new_item'      => sprintf( esc_attr__('Add New %s', 'tste'), $team_group_title_singular ),
			'new_item_name'     => sprintf( esc_attr__('New %s Name', 'tste'), $team_group_title_singular ),
			'menu_name'         => sprintf( esc_attr__('%s', 'tste'), $team_group_title_singular ),
		);
	}
	

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $team_cat_slug ),
	);
	
	register_taxonomy( 'themestek-team-group', 'themestek-team', $args  );

	
	
	// Move Featured Image box from left to center only on CLIENTS custom_post_type
	add_action('do_meta_boxes', 'tste_liviza_themestek_team_featured_image_box');
	function tste_liviza_themestek_team_featured_image_box() {
		
		$liviza_theme_options = get_option('liviza_theme_options');
		$team_type_title_singular = ( !empty($liviza_theme_options['team_type_title_singular']) ) ? $liviza_theme_options['team_type_title_singular'] : 'Team Member' ;
		
		remove_meta_box( 'postimagediv', 'themestek-team', 'normal' );
		add_meta_box('postimagediv', sprintf( esc_attr__("%s's Image",'tste'), $team_type_title_singular ), 'post_thumbnail_meta_box', 'themestek-team', 'normal', 'high');
	}


}
add_action( 'init', 'tste_liviza_cpt_themestek_team', 8 );








// Show Featured image in the admin section
add_filter( 'manage_themestek-team_posts_columns', 'tste_themestek_team_member_set_featured_image_column' );
add_action( 'manage_themestek-team_posts_custom_column' , 'tste_themestek_team_member_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'tste_themestek_team_member_set_featured_image_column' ) ) {
function tste_themestek_team_member_set_featured_image_column($columns) {
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
if ( ! function_exists( 'tste_themestek_team_member_set_featured_image_column_content' ) ) {
function tste_themestek_team_member_set_featured_image_column_content( $column, $post_id ) {
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
 *  Meta Box: Team
 */
if ( ! function_exists( 'tste_liviza_themestek_team_metabox_options' ) ) {
function tste_liviza_themestek_team_metabox_options( $options ) {
	
	
	// Getting Options
	$liviza_theme_options = get_option('liviza_theme_options');
	
	//$team_type_title          = ( !empty($liviza_theme_options['team_type_title']) ) ? $liviza_theme_options['team_type_title'] : 'Team Members' ;
	$team_type_title_singular = ( !empty($liviza_theme_options['team_type_title_singular']) ) ? $liviza_theme_options['team_type_title_singular'] : 'Team Member' ;
	//$team_type_slug           = ( !empty($liviza_theme_options['team_type_slug']) ) ? $liviza_theme_options['team_type_slug'] : 'team-member' ;
	
	//$team_group_title          = ( !empty($liviza_theme_options['team_group_title']) ) ? $liviza_theme_options['team_group_title'] : 'Team Groups' ;
	//$team_group_title_singular = ( !empty($liviza_theme_options['team_group_title_singular']) ) ? $liviza_theme_options['team_group_title_singular'] : 'Team Group' ;
	//$team_cat_slug           = ( !empty($liviza_theme_options['team_cat_slug']) ) ? $liviza_theme_options['team_cat_slug'] : 'team-group' ;
	
	$team_extra_details_lines  = ( !empty($liviza_theme_options['team_extra_details_lines']) ) ? $liviza_theme_options['team_extra_details_lines'] : array() ;
	
	// Default options - Team Member details
	$list_array = array(
		array(
			'type'    => 'subheading',
			'content' => sprintf( esc_attr__('%s\'s General Details','tste'), $team_type_title_singular ),
		),
		 array (
			"id"    => "team_details_line_position",
			"type"  => "text",
			"title" => '<span class="themestek-admin-team-list-icon"> <i class="fa fa-pencil"></i></span> &nbsp; '.__('Position', 'tste'),
		),
		array (
			"id"    => "team_details_line_email",
			"type"  => "text",
			"title" => '<span class="themestek-admin-team-list-icon"> <i class="fa fa-envelope"></i></span> &nbsp; '.__('Email', 'tste'),
		),
		array(
			"id"    => "team_details_line_phone",
			"type"  => "text",
			"title" => '<span class="themestek-admin-team-list-icon"> <i class="fa fa-phone"></i></span> &nbsp; '.__('Phone', 'tste'),
		),
		array(
			"id"    => "team_details_line_website",
			"type"  => "text",
			"title" => '<span class="themestek-admin-team-list-icon"> <i class="fa fa-link"></i></span> &nbsp; '.__('Website', 'tste'),
		),
		array(
			"id"    => "team_details_line_address",
			"type"  => "text",
			"title" => '<span class="themestek-admin-team-list-icon"> <i class="fa fa-map-marker"></i></span> &nbsp; '.__('Address', 'tste'),
		)
	);
	
	
	
	// Team Member Extra Details
	$extra_details_info = sprintf( esc_attr__('You can add extra lines from "Theme Opitons > %s Settings" section.', 'tste'), $team_type_title_singular );
	
	$post_id = !empty($_GET['post']) ? $_GET['post'] : get_the_ID() ;
	
	if( is_array($team_extra_details_lines) && count($team_extra_details_lines) > 0 ){
		
		$extra_details_info = '<br><div class="cs-text-muted">' . sprintf( '<strong>'.esc_attr__('%s\'s Extra Details:', 'liviza') . '</strong> ' . esc_attr__('You can add values of this each line and the line will appear on front side. The empty value line will be hidden.', 'tste'), $team_type_title_singular ) . '<br>' .
		sprintf( esc_attr__('You can manage (change icon or title of the line) from "Theme Opitons > %s Settings" section.', 'tste'), $team_type_title_singular ) . '</div>';
		
		$list_array[] = array(
			'type'    => 'subheading',
			'content' => sprintf( esc_attr__('%s\'s Extra Details','tste'), $team_type_title_singular ),
		);
		
		foreach( $liviza_theme_options['team_extra_details_lines'] as $key=>$val ){
			
			// Icon classs
			//$icon_class = $val['team_extra_details_line_icon']['library_' . $val['team_extra_details_line_icon']['library'] ];
			
			$this_array = array();
			$this_array['id']    = 'team_extra_details_line_'.$key;
			$this_array['type']  = 'text';
			$this_array['title'] = esc_attr__($val['team_extra_details_line_title'], 'liviza');
			$this_array['after'] = '<div class="cs-text-muted">'. sprintf( esc_attr__('This extra field is added from "Theme Options > %s Settings" section. You can manage this field from that section.','tste'), $team_type_title_singular ) .'</div>';
			
			
			if( $val['data']=='date' ){  // Date
				$this_array['attributes'] = array( 'readonly' => 'only-key' );
				$this_array['value']      = get_the_date( '', $post_id );
				
			} else if( $val['data']=='category' ){  // Category
				$this_array['attributes'] = array( 'readonly' => 'only-key' );
				$this_array['value']      = strip_tags( get_the_term_list( $post_id, 'themestek-team-group', '', ', ', '' ) );
				
			}
			
			$list_array[] = $this_array;
		}
	}
	
	
	
	
	// Team Members Details
	$options[]    = array(
		'id'        => 'themestek_team_member_details',
		'title'     => sprintf( esc_attr__("Liviza: %s's Details", 'tste'), $team_type_title_singular ),
		'post_type' => 'themestek-team', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_team_list_data',
				'fields' => array(
					array(
						'id'        => 'themestek_team_info',
						'type'      => 'fieldset',
						//'title'     => esc_attr__('List Values','tste'),
						'fields'    => $list_array,
						'after'   	=> '<br><div class="cs-text-muted"><strong>' . sprintf( esc_attr__('%s\'s General Details:', 'tste'), $team_type_title_singular ) . '</strong> ' . esc_attr__('You can add values of this each line and the line will appear on front side. The empty value line will be hidden.', 'tste'). '<br></div>' . $extra_details_info,
						
					),
				),
			),
		),
	);
	
	
	
	
	// Team Members Details
	$options[]    = array(
		'id'        => 'themestek_team_member_social',
		'title'     => sprintf( esc_attr__("Liviza: %s's Social Links", 'tste'), $team_type_title_singular ),
		'post_type' => 'themestek-team', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			
			//Team Members Social Links
			array(
				'name'   => 'themestek_team_socials',
				//'title'  => esc_attr__("Team Member's Social Links", 'tste'),
				'fields' => array(
					array(
						'id'              => 'social_icons_list',
						'type'            => 'group',
						'title'           => esc_attr__('Social Links', 'liviza'),
						'info'            => esc_attr__('Add your social services here. Also you can reorder the Social Links as per your choice. Just drag and drop items to reorder and save settings', 'liviza'),
						'button_title'    => esc_attr__('Add New Social Links', 'liviza'),
						'accordion_title' => 'social_icons_list_icon',
						'fields'          => array(
							array(
								'id'            => 'social_icons_list_icon',
								'type'          => 'select',
								'title'         =>  esc_attr__('Social Sevice', 'liviza'),
								'options'  		=> array(
													'twitter'    => esc_attr__('Twitter', 'liviza' ),
													'youtube'    => esc_attr__('YouTube', 'liviza' ),
													'flickr'     => esc_attr__('Flickr', 'liviza' ),
													'facebook'   => esc_attr__('Facebook', 'liviza' ),
													'linkedin'   => esc_attr__('LinkedIn', 'liviza' ),
													'gplus'      => esc_attr__('Google+', 'liviza' ),
													'yelp'       => esc_attr__('Yelp', 'liviza' ),
													'dribbble'   => esc_attr__('Dribbble', 'liviza' ),
													'pinterest'  => esc_attr__('Pinterest', 'liviza' ),
													'podcast'    => esc_attr__('Podcast', 'liviza' ),
													'instagram'  => esc_attr__('Instagram', 'liviza' ),
													'xing'       => esc_attr__('Xing', 'liviza' ),
													'vimeo'      => esc_attr__('Vimeo', 'liviza' ),
													'vk'         => esc_attr__('VK', 'liviza' ),
													'houzz'      => esc_attr__('Houzz', 'liviza' ),
													'issuu'      => esc_attr__('Issuu', 'liviza' ),
													'google-drive' => esc_attr__('Google Drive', 'liviza' ),
													'rss'        => esc_attr__('RSS', 'liviza' ),
												),
								'class'         => 'chosen',
								'default'       => 'twitter',
								'after'  		=> '<div class="cs-text-muted"><br>'.__('Select Social service from here', 'liviza').'</div>',
							),
							array(
								'id'     		=> 'social_icons_list_link',
								'type'    		=> 'text',
								'title'   		=> esc_attr__('Link to Social service selected above', 'liviza'),
								'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Paste URL only', 'liviza').'</div>',
								'dependency' 	=> array( 'social_icons_list_icon', '!=', 'rss' ),
							),
						)
					),
				
				),
			),
		),
	);
	
	
	
	
	
	
	
	return $options;
}
}
add_filter( 'cs_metabox_options', 'tste_liviza_themestek_team_metabox_options' );

