<?php
// [themestek-clients]
if( !function_exists('themestek_sc_clients') ){
function themestek_sc_clients($atts, $content=NULL ) {

	$return = '';
	
	if( function_exists('vc_map') ){

		global $liviza_theme_options;
		global $themestek_sc_params_clients;
		$list_of_clients 	= array();
		$finalkeys			= array();
		
		$options_list = themestek_create_options_list($themestek_sc_params_clients);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		
		// This global variable will be used in template file for design
		global $themestek_global_client_element_values;
		$themestek_global_client_element_values = array();
		
		if( !empty($show_hover) ){
			$themestek_global_client_element_values['show_hover'] = $show_hover;
		}
		
		// Starting wrapper of the whole arear
		$return .= themestek_box_wrapper( 'start', 'client', get_defined_vars() );
		
		// Heading element
		$return .= themestek_vc_element_heading( get_defined_vars() );
		
		// Getting $args for WP_Query
		$args = themestek_get_query_args( 'client', get_defined_vars() );
		
		// Wp query to fetch posts
		$posts = new WP_Query( $args );
		
		if ( $posts->have_posts() ) {
			$return .= themestek_get_boxes( 'client', get_defined_vars() );
		}

		// Ending wrapper of the whole arear
		$return .= themestek_box_wrapper( 'end', 'client', get_defined_vars() );
		
		/* Restore original Post Data */
		wp_reset_postdata();
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
		
	return $return;
}
}
add_shortcode( 'themestek-clientsbox', 'themestek_sc_clients' );