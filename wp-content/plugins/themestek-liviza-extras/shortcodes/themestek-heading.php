<?php
// [themestek-heading tag="h1" text="This is heading text"]
if( !function_exists('themestek_sc_heading') ){
function themestek_sc_heading( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $themestek_sc_params_heading;
		$options_list = themestek_create_options_list($themestek_sc_params_heading);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		// Getting a unique class name applied by the Custom CSS box (via "css_editor") and also custom class name via "el_class".
		$css_class = '';
		if( !empty($css) ){
			$css_class = vc_shortcode_custom_css_class( $css, ' ' );
		}
		
		
		// CSS Animation
		if( ! empty( $css_animation ) ) {
			$css_class .= ' ' . themestek_getCSSAnimation( $css_animation );
		}
		
		
		// Custom Class
		if( ! empty( $el_class ) ) {
			$css_class .= ' ' . esc_attr($el_class);
		}
		
		
		
		$ctaShortcode = '[themestek-cta';
		foreach( $options_list as $key=>$val ){
			if( trim( ${$key} )!=''  ){
				$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
			}
		}
		$ctaShortcode .= ' add_button="no" i_css_animation="" css="" css_animation=""]'.$content.'[/themestek-cta]';

		
		if( !empty($h2)!='' ) {
			
			$cta = do_shortcode($ctaShortcode);
		
			$return .= '<div class="themestek-element-heading-wrapper themestek-heading-inner themestek-element-align-'.$txt_align.' themestek-seperator-'.$seperator.' '.$css_class.'">';
			$return .= $cta;
			$return .= '</div> <!-- .themestek-element-heading-wrapper container --> ';
			
			
			
			/******************************************/
			// Inline css
			global $themestek_inline_css;
			if( empty($themestek_inline_css) ){
				$themestek_inline_css = '';
			}
			if( !empty($css) ){
				$themestek_inline_css .= $css; // Custom CSS style like padding, margin etc.
			}
			
			/******************************************/
			
		}
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
		
	
	return $return;
}
}
add_shortcode( 'themestek-heading', 'themestek_sc_heading' );