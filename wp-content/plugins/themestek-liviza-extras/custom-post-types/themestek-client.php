<?php 

function tste_liviza_cpt_themestek_client(){
	
	// Register Post Type
	$labels = array(
		'name'               => _x( 'Clients', 'post type general name', 'tste' ),
		'singular_name'      => _x( 'Client', 'post type singular name', 'tste' ),
		'menu_name'          => _x( 'Client Logos', 'admin menu', 'tste' ),
		'name_admin_bar'     => _x( 'Client', 'add new on admin bar', 'tste' ),
		'add_new'            => _x( 'Add New', 'client', 'tste' ),
		'add_new_item'       => esc_attr__( 'Add New Client', 'tste' ),
		'new_item'           => esc_attr__( 'New Client', 'tste' ),
		'edit_item'          => esc_attr__( 'Edit Client', 'tste' ),
		'view_item'          => esc_attr__( 'View Client', 'tste' ),
		'all_items'          => esc_attr__( 'All Clients', 'tste' ),
		'search_items'       => esc_attr__( 'Search Client', 'tste' ),
		'parent_item_colon'  => esc_attr__( 'Parent Client:', 'tste' ),
		'not_found'          => esc_attr__( 'No client found.', 'tste' ),
		'not_found_in_trash' => esc_attr__( 'No client found in Trash.', 'tste' )
	);
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-businessman',
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'with_front' => false, 'slug' => 'client' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail' ),
		'exclude_from_search' => true,
	);

	register_post_type( 'themestek-client', $args );
	




	/* Category */
	
	$labels = array(
		'name'              => _x( 'Client Group', 'taxonomy general name', 'tste' ),
		'singular_name'     => _x( 'Client Group', 'taxonomy singular name', 'tste' ),
		'search_items'      => esc_attr__( 'Search Client Group', 'tste' ),
		'all_items'         => esc_attr__( 'All Client Groups', 'tste' ),
		'parent_item'       => esc_attr__( 'Parent Group', 'tste' ),
		'parent_item_colon' => esc_attr__( 'Parent Group:', 'tste' ),
		'edit_item'         => esc_attr__( 'Edit Group', 'tste' ),
		'update_item'       => esc_attr__( 'Update Group', 'tste' ),
		'add_new_item'      => esc_attr__( 'Add New Client Group', 'tste' ),
		'new_item_name'     => esc_attr__( 'New Client Group Name', 'tste' ),
		'menu_name'         => esc_attr__( 'Client Group', 'tste' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		//'rewrite'           => array( 'slug' => $themestek_pf_category_slug ),
	);
	
	register_taxonomy( 'themestek-client-group', 'themestek-client', $args  );


	/* Change "Enter Title Here" */
	function tste_liviza_themestek_client_enter_title_here( $title ){
		$screen = get_current_screen();
		if ( 'themestek-client' == $screen->post_type ) {
			$title = esc_attr__('Client Name', 'tste');
		}
		return $title;
	}
	add_filter( 'enter_title_here', 'tste_liviza_themestek_client_enter_title_here' );




	// Move Featured Image box from left to center only on CLIENTS custom_post_type
	add_action('do_meta_boxes', 'tste_liviza_themestek_client_featured_image_box');
	function tste_liviza_themestek_client_featured_image_box() {
		remove_meta_box( 'postimagediv', 'themestek-client', 'normal' );
		add_meta_box('postimagediv', esc_attr__('Select/Upload Image of the Client','tste'), 'post_thumbnail_meta_box', 'themestek-client', 'normal', 'high');
	}



	
}
add_action( 'init', 'tste_liviza_cpt_themestek_client', 8 );





// Show Featured image in the admin section
add_filter( 'manage_themestek-client_posts_columns', 'tste_themestek_client_set_featured_image_column' );
add_action( 'manage_themestek-client_posts_custom_column' , 'tste_themestek_client_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'tste_themestek_client_set_featured_image_column' ) ) {
function tste_themestek_client_set_featured_image_column($columns) {
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
if ( ! function_exists( 'tste_themestek_client_set_featured_image_column_content' ) ) {
function tste_themestek_client_set_featured_image_column_content( $column, $post_id ) {
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
 *  Meta Box: Clients
 */
if ( ! function_exists( 'tste_liviza_themestek_client_metabox_options' ) ) {
function tste_liviza_themestek_client_metabox_options( $options ) {
	

	// Client Details Meta Box
	$options[]    = array(
		'id'        => 'themestek_clients_hover_image',
		'title'     => esc_attr__('Horse: Client Hover image', 'tste'),
		'post_type' => 'themestek-client', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_hover_image',
				'fields' => array(
					array(
						'id'       		 => 'hoverimg',
						'type'     		 => 'themestek_image',
						'title'    		 => esc_html__('Upload hover logo of the client', 'liviza'),
						'after'  		 => '<div class="cs-text-muted"><br>'.esc_html__('This is optional. Select or upload hover logo of the client. This is requred for some Client Logo Box styles.', 'liviza').'</div>',
						'add_title'		 => esc_html__('Upload Hover Logo','liviza'),
					),
				),
			),
		),
	);
	
	
	// Client Details Meta Box
	$options[]    = array(
		'id'        => 'themestek_clients_details',
		'title'     => esc_attr__('Liviza: Client Details', 'tste'),
		'post_type' => 'themestek-client', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'themestek_clients',
				'fields' => array(
		
					array(
						'id'     		=> 'clienturl',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Website Link', 'tste'),
						'after'  		=> '<div class="cs-text-muted"><br>'.__("(Optional) Please fill person or company's website link", 'tste').'</div>',
					),
				),
			),
		),
	);
	return $options;
}
}
add_filter( 'cs_metabox_options', 'tste_liviza_themestek_client_metabox_options' );


