<?php
// [themestek-portfoliobox]
if( !function_exists('themestek_sc_portfoliobox') ){
function themestek_sc_portfoliobox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $themestek_sc_params_portfoliobox;
		
		$options_list = themestek_create_options_list($themestek_sc_params_portfoliobox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		// Starting wrapper of the whole arear
		$return .= themestek_box_wrapper( 'start', 'portfolio', get_defined_vars() );
		
			// Heading element
			$return .= themestek_vc_element_heading( get_defined_vars() );
			
			
			
			// Getting $args for WP_Query
			$args = themestek_get_query_args( 'portfolio', get_defined_vars() );
			
			// Wp query to fetch posts
			$posts = new WP_Query( $args );
			
			if ( $posts->have_posts() ) {
				$return .= themestek_get_boxes( 'portfolio', get_defined_vars() );
			}
			
		
		// Ending wrapper of the whole arear
		$return .= themestek_box_wrapper( 'end', 'portfolio', get_defined_vars() );
		
		/* Restore original Post Data */
		wp_reset_postdata();
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'themestek-portfoliobox', 'themestek_sc_portfoliobox' );









