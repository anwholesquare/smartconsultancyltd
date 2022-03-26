<?php


if( !function_exists('themestek_sc_bmi_calculator') ){
function themestek_sc_bmi_calculator( $atts, $content=NULL ) {
	
	
	$return = '';
	
	
	if( function_exists('vc_map') ){
		
		global $themestek_vc_bmi_calculator;
		$default_atts = themestek_create_options_list($themestek_vc_bmi_calculator);
		
		// getting all attributes
		$atts = shortcode_atts( $default_atts, $atts );
		
		// Extract array
		extract($atts);
		
		// Random generator
		$random = rand(10,99) . rand(10,99);
		
		
		
		$class   = array();
		// CSS Animation
		if( !empty($css_animation) && !is_array($css_animation) && $css_animation!='Array' ){
			$class[] = ' wpb_animate_when_almost_visible wpb_'.$css_animation.' '.$css_animation.' ';
		}
		// Extra Class
		if( !empty($el_class) ){
			$class[] = $el_class;
		}
		// VC custom class
		if ( ! empty( $css ) ) {
			$class[] = vc_shortcode_custom_css_class( $css );
		}
		
		// Element ID
		$elelemt_id = ( ! empty( $el_id ) ) ? 'id="'.$el_id.'"' : '' ;
		
		
		if( file_exists( locate_template( '/theme-parts/bmi-calculator/bmi-calculator-'.$style.'.php', false, false ) ) ){
		
			$return .= '<div '.$elelemt_id.' class="themestek-ele themestek-ele-bmi-calc themestek-ele-bmi-calc-'.$style.' ' . implode( ' ', $class ) . '">';
			ob_start();
			//include( get_template_directory() . '/theme-parts/bmi-calculator/bmi-calculator-'.$style.'.php' );
			include( locate_template( '/theme-parts/bmi-calculator/bmi-calculator-'.$style.'.php', false, false ) );
			$return .= ob_get_contents();
			ob_end_clean();
			$return .= '</div>';
			
		}
		
	}
	
	
	
	
	
	
	return $return;

}
}
add_shortcode( 'themestek-bmi-calculator', 'themestek_sc_bmi_calculator' );
