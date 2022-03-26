<?php
// [themestek-bmi-details]
if( !function_exists('themestek_sc_bmi_details') ){
function themestek_sc_bmi_details( $atts, $content=NULL ){
	
	global $themestek_vc_custom_element_bmi_details;
	$options_list = themestek_create_options_list($themestek_vc_custom_element_bmi_details);
	
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
	

	// bmi-details lists
	$bmilist = json_decode(urldecode($bmilist));
	
	
	$return .= '<div class="themestek-bmi-table">';
	$return .= '<div class="themestek-bmi-table-row">';
	$return .= '<div class="themestek-bmi-heading themestek-bmi-table-col">';
	$return .= esc_html__( 'BMI', 'liviza' );
	$return .= '</div>';
	$return .= '<div class="themestek-bmi-heading themestek-bmi-table-col">';
	$return .= esc_html__( 'WEIGHT STATUS', 'liviza' );
	$return .= '</div>';
	$return .= '</div>';
		
		foreach( $bmilist as $data ){
			
			$service_name 	= '';
			$timing = '';
			
			//service_name 
			if( !empty($data->service_name) ){
				$servicename = ( isset($data->service_name) ) ? $data->service_name : '';
			}
			
			//Details
			if( !empty($data->price) ){
				$price = ( isset($data->price) ) ? $data->price : '';
				$prices= '<span class="bmi-details">'.$price.'</span>';
			}
			
			$return .= '<div class="themestek-bmi-table-row"><div class="themestek-bmi-table-col">'.$servicename.'</div>'.'<div class="themestek-bmi-table-col">'.$prices.'</div></div>';
			
		}

	$return .= '</div><!-- .themestek-bmi-details-block-wrapper -->  ';
	

	$wrapperStart = '<div class="themestek-bmi-details-wrapper '.$el_class.'">';
	$wrapperEnd   = '</div>';
	return $wrapperStart.$return.$wrapperEnd;
	
	
}
}
add_shortcode( 'themestek-bmi-details', 'themestek_sc_bmi_details' );