<?php
// [themestek-facts-in-digits]
if( !function_exists('themestek_sc_facts_in_digits') ){
function themestek_sc_facts_in_digits($atts, $content=NULL ) {
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $themestek_sc_params_facts_in_digits;
		$options_list = themestek_create_options_list($themestek_sc_params_facts_in_digits);
		
		// This global variable will be used in template file for design
		global $themestek_global_fid_element_values;
		$themestek_global_fid_element_values = array();
		
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		// Required JS files
		wp_enqueue_script( 'vc_waypoints' );
		
		if( in_array($boxstyle, array( 'thin-progressbar', 'strong-progressbar' ) ) ){
			wp_enqueue_script( 'jquery-circle-progress', '', array( 'jquery' ) );
		} else {
			wp_enqueue_script( 'numinate', '',  array( 'jquery' ) );
		}
		
		
		/** ICON **/
		// We are calling this to add CSS file of the selected icon.
		
		$icon_sc = '[themestek-icon  type="'.$i_type.'"';
		foreach( get_defined_vars() as $key=>$val ){
			if( substr($key,0,7) == 'i_icon_' ){
				$icon_sc .= ' ' . substr($key,2) . '="' . $val . '"';
			}
		}
		$icon_sc .= ' color="skincolor" align="left"]';

		//do_shortcode('[themestek-icon type="'.$i_type.'" icon_fontawesome="'.$i_icon_fontawesome.'" icon_linecons="'.$i_icon_linecons.'" icon_themify="'.$i_icon_themify.'" color="skincolor" align="left"]');
		do_shortcode( $icon_sc );
		
		
		// This is real icon code
		$icon_class   = ( !empty( ${'i_icon_'.$i_type} ) ) ? ${'i_icon_'.$i_type} : '' ;
		$icon_html = '<div class="themestek-sbox-icon-wrapper"><i class="' . $icon_class . '"></i></div>';
	
		
		
		
		
		//  Before or after text
		
		$before_text = '';
		$after_text  = '';
		if( !empty($before) ){
			if( in_array($beforetextstyle, array( 'sup', 'sub', 'span' ) ) ){
				$before_text = '<'.$beforetextstyle.'>'.$before.'</'.$beforetextstyle.'>';
			}
		}
		if( !empty($after) ){
			if( in_array($aftertextstyle, array( 'sup', 'sub', 'span' ) ) ){
				$after_text = '<'.$aftertextstyle.'>'.$after.'</'.$aftertextstyle.'>';
			}
		}
		
		/*
		if( !empty($desc) ){
			$desc = '<div class="themestek-fid-desc">' . $desc . '</div>';
		}
		*/
		
		
		$class   = array();
		if( !empty($boxstyle) ){
			$class[] = 'themestek-fidbox-'.$boxstyle;
		}
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
		
		
		
		
		// storing in global varibales to be used in template file
		$themestek_global_fid_element_values['title']         = $title;
		$themestek_global_fid_element_values['icon_html']     = $icon_html;
		$themestek_global_fid_element_values['main-class']    = implode(' ', $class);
		$themestek_global_fid_element_values['skincolor']     = themestek_get_option('skincolor');
		
		$themestek_global_fid_element_values['before_text']     = $before_text;
		$themestek_global_fid_element_values['beforetextstyle'] = $beforetextstyle;
		
		$themestek_global_fid_element_values['after_text']      = $after_text;
		$themestek_global_fid_element_values['aftertextstyle']  = $aftertextstyle;
		
		$themestek_global_fid_element_values['digit']			= $digit;
		$themestek_global_fid_element_values['interval']		= $interval;
		$themestek_global_fid_element_values['desc']			= $desc;
		//$themestek_global_fid_element_values['circle']        = ($circle/100);
		
		
		//$themestek_global_fid_element_values['lefticoncode']  = $lefticoncode;
		//$themestek_global_fid_element_values['righticoncode'] = $righticoncode;
		//$themestek_global_fid_element_values['view']          = $view;
		
		//$themestek_global_fid_element_values['before']          = $before;
		//$themestek_global_fid_element_values['beforetextstyle'] = $beforetextstyle;
		//$themestek_global_fid_element_values['after']           = $after;
		//$themestek_global_fid_element_values['aftertextstyle']  = $aftertextstyle;
		
		
		// calling template depending on the selected VIEW option
		ob_start();
		get_template_part('theme-parts/fidbox/fidbox', $boxstyle);
		$return = ob_get_contents();
		ob_end_clean();
	
	
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'themestek-facts-in-digits', 'themestek_sc_facts_in_digits' );