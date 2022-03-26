<?php
// [themestek-single-image]
if( !function_exists('themestek_sc_single_image') ){
function themestek_sc_single_image( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $themestek_sc_params_single_image;
		$options_list = themestek_create_options_list($themestek_sc_params_single_image);
		
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		
		// extracting thumb image, full image and image id
		$image_array = explode('|', $image );
		
		$full_img  = ( isset($image_array[0]) ) ? $image_array[0] : '' ;
		$thumb_img = ( isset($image_array[1]) ) ? $image_array[1] : '' ;
		$img_id    = ( isset($image_array[2]) ) ? $image_array[2] : '' ;

		$alignment = (!empty($alignment)) ? $alignment : 'left' ;
		
		if ( ! empty( $css ) ) {
			$el_class .= ' '.themestek_vc_shortcode_custom_css_class( $css );
		}

		
		$return .= '<div class="themestek-single-image-wrapper themestek_align_' . esc_attr($alignment) . ' ' . esc_attr($el_class) . '">';
		if( !empty($title) ){
			$return .= '<h2 class="themestek-single-image-title">'.$title.'</h2>';
		}
		if( !empty($full_img) ){
			$return .= '<div class="themestek-single-image-img-w"><img src="' . $full_img . '" class="themestek-single-image-img" alt="" /></div>';
		}
		if( !empty($caption_text) ){
			$return .= '<div class="themestek-single-image-caption-text">'.rawurldecode( base64_decode( $caption_text ) ).'</div>';
		}
		$return .= '</div>';
		
		
		
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	return $return;
}
}
add_shortcode( 'themestek-single-image', 'themestek_sc_single_image' );