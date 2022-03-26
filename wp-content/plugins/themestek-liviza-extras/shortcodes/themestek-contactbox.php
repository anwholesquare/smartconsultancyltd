<?php
// [themestek-contactbox]
if( !function_exists('themestek_sc_contactbox') ){
function themestek_sc_contactbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $themestek_sc_params_contactbox;
		$options_list = themestek_create_options_list($themestek_sc_params_contactbox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		$class = array( 'liviza_contact_widget_wrapper', 'themestek_vc_contact_wrapper' );
		
		
		// CSS Animation
		if ( !empty( $css_animation ) ) {
			$class[] = themestek_getCSSAnimation( $css_animation );
		}
		
		// Extra Class
		if( !empty($el_class) ){
			$class[] = $el_class;
		}
		
		// VC custom class
		if ( ! empty( $css ) ) {
			$class[] = themestek_vc_shortcode_custom_css_class( $css );
		}
		
		
		$class = implode(' ', $class );
		
		$return = '<ul class="' . $class . '">';
		if( trim($phone)!='' ) {
			$return .= '<li class="themestek-contact-phonenumber themestek-liviza-icon-mobile">'.esc_attr($phone).'</li>';
		}
		if( trim($email)!='' ) {
			$return .= '<li class="themestek-contact-email themestek-liviza-icon-comment-1"><a href="mailto:'.trim($email).'">'.trim($email).'</a></li>';
		}
		if( trim($website)!='' ) {
			$return .= '<li class="themestek-contact-website themestek-liviza-icon-world"><a href="'.esc_url(themestek_addhttp($website)).'">'.esc_url($website).'</a></li>';
		}
		if( trim($address)!='' ) {
			$return .= '<li class="themestek-contact-address  themestek-liviza-icon-location-pin">' . themestek_wp_kses($address) . '</li>';
		}
		if( trim($time)!='' ) {
			$return .= '<li class="themestek-contact-time themestek-liviza-icon-clock">' . themestek_wp_kses($time) . '</li>';
		}
		$return .= '</ul>';
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'themestek-contactbox', 'themestek_sc_contactbox' );