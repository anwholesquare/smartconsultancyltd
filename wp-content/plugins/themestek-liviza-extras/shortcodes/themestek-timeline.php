<?php
// [themestek-timeline]
if( !function_exists('themestek_sc_timeline') ){
function themestek_sc_timeline( $atts, $content=NULL ){
	
	global $themestek_vc_custom_element_timeline;
	$options_list = themestek_create_options_list($themestek_vc_custom_element_timeline);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
	
	$ctaShortcode = '[themestek-heading ';
	foreach( $options_list as $key=>$val ){
		if( trim( ${$key} )!='' ){
			$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
		}
	}
	$ctaShortcode .= 'el_width="100%" css_animation=""][/themestek-heading]';
	
	
	
	$return = do_shortcode($ctaShortcode);
	

	// timeline lists
	$timeline = json_decode(urldecode($timeline));
	
	
	$return .= '<div class="themestek-timeline-block-wrapper">';
	$return .= '<ul class="themestek-swiper-wrapper themestek-timeline">';
		foreach( $timeline as $data ){

			// Year
			$year = ( isset($data->year) && !empty($data->year) ) ? themestek_wp_kses( '<div class="themestek-timeline-year-w"><h4 class="themestek-timeline-year">' . esc_html($data->year) . '</h4></div>' )  : '';

			// Title
			$title = ( isset($data->title) && !empty($data->title) ) ? themestek_wp_kses( '<h3 class="themestek-timeline-title">' . esc_html($data->title) . '</h3>' ) : '';

			// Short Desc
			$short_desc = ( isset($data->short_desc) && !empty($data->short_desc) ) ? themestek_wp_kses( '<div class="themestek-timeline-short-desc">' . esc_html($data->short_desc) . '</div>' ) : '';
			
			
			//$service_name 	= '';
			//$timing = '';
			
			/*
			//service_name 
			if( !empty($data->service_name) ){
				$servicename = ( isset($data->service_name) ) ? $data->service_name : '';
			}
			
			//price
			if( !empty($data->price) ){
				$price = ( isset($data->price) ) ? $data->price : '';
				$prices= '<span class="service-price">'.$price.'</span>';
			}
			*/
			
			$return .= '<li class="themestek-swiper-slide">' . $year . '<div class="themestek-timeline-bottom">' . $title . $short_desc . '</div></li>';
			
		}
	$return .= '</ul> <!-- .themestek-timeline-block -->';
	$return .= '</div><!-- .themestek-timeline-block-wrapper -->  ';
	

	$wrapperStart = '<div class="themestek-timeline-wrapper '.$el_class.'">';
	$wrapperEnd   = '</div>';
	return $wrapperStart.$return.$wrapperEnd;
	
	
}
}
add_shortcode( 'themestek-timeline', 'themestek_sc_timeline' );