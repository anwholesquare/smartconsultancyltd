<?php
// [themestek-iconheadingbox]
if( !function_exists('themestek_sc_iconheadingbox') ){
function themestek_sc_iconheadingbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $themestek_sc_params_iconheadingbox;
		$options_list = themestek_create_options_list($themestek_sc_params_iconheadingbox);
		
		// This global variable will be used in template file for design
		global $themestek_global_sbox_element_values;
		$themestek_global_sbox_element_values = array();
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		
		// $arr = get_defined_vars();
		
		/** ICON **/
		$icon_type_class = '';
		if( !empty($icon_type) && $icon_type=='text' ){
			$icon_html = '<div class="themestek-ihbox-icon-wrapper themestek-ihbox-icon-type-text">'.$small_text.'</div>';
			$icon_type_class = 'text';
		} else if( !empty($icon_type) && $icon_type=='none' ){
			$icon_html = '';
			$icon_type_class = 'none';
		} else {
			// We are calling this to add CSS file of the selected icon.
			
			$icon_sc = '[themestek-icon  type="'.$i_type.'"';
			
			foreach( get_defined_vars() as $key=>$val ){
				if( substr($key,0,7) == 'i_icon_' ){
					$icon_sc .= ' ' . substr($key,2) . '="' . $val . '"';
				}
			}
			
			$icon_sc .= ' color="skincolor" align="left"]';
			do_shortcode( $icon_sc );
			
			// This is real icon code
			$icon_class   = ( !empty( ${'i_icon_'.$i_type} ) ) ? ${'i_icon_'.$i_type} : '' ;
			$icon_html = '<div class="themestek-ihbox-icon-wrapper"><i class="' . $icon_class . '"></i></div>';
			$icon_type_class = 'icon';
		}
		
		
		
		
		/** HEADING AND SUBHEADING ***/
		$ctaShortcode = '[themestek-cta';
		foreach( $options_list as $key=>$val ){
			if( trim( ${$key} )!=''  ){
				$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
			}
		}
		$ctaShortcode .= ' add_button="no" i_css_animation="" css="" css_animation=""] [/themestek-cta]';
		$heading_html = do_shortcode($ctaShortcode);

		/** CONTENT **/
		$content_html = ( !empty($content) ) ? '<div class="themestek-cta3-content-wrapper">'.$content.'</div>' : '' ;
		
		/** BUTTON **/
		$button_html = '';
		if( $show_btn=='yes' ){
			$btnShortcode = '[themestek-btn';
			foreach( $options_list as $key=>$val ){
				if( trim( ${$key} )!='' && substr( $key, 0, 4 ) == 'btn_' && $key!='btn_style' ){
					$btnShortcode .= ' '.substr( $key, 4 ).'="'.${$key}.'"';
				}
			}
			$btnShortcode .= ' style="text"]';
			$button_html = do_shortcode($btnShortcode);
		}
		
		
		// BigNumber
		$bignumber_html = '';
		if( !empty($big_number_text) ){
			$bignumber_html = '<div class="themestek-ihbox-big-number-text">' . $big_number_text . '</div>';
		}
		
		// storing in global varibales to be used in template file
		$themestek_global_sbox_element_values['boxstyle']		= $boxstyle;
		$themestek_global_sbox_element_values['icon_html']		= $icon_html;
		$themestek_global_sbox_element_values['heading_html']	= $heading_html;
		$themestek_global_sbox_element_values['content_html']	= $content_html;
		$themestek_global_sbox_element_values['button_html']	= $button_html;
		$themestek_global_sbox_element_values['bignumber_html']	= $bignumber_html;
		$themestek_global_sbox_element_values['main-class']	= 'themestek-ihbox-itype-'.$icon_type_class; // Extra field
		
		// Extra Class
		if( !empty($el_class) ){
			$themestek_global_sbox_element_values['main-class'] .= ' '.esc_attr($el_class);
		}
		
		// Custom Class
		if( function_exists('vc_shortcode_custom_css_class') && !empty($css) ){
			$themestek_global_sbox_element_values['main-class'] .= ' ' . vc_shortcode_custom_css_class( $css );
		}
		
		// ThemeStek Reponsive padding/margin option
		if( function_exists('themestek_responsive_padding_margin_class') ){
			$themestek_global_sbox_element_values['main-class'] .= ' ' . themestek_responsive_padding_margin_class( $themestek_responsive_css );
		}
		
		// ThemeStek Reponsive padding/margin option - custom css code
		if( !empty($themestek_responsive_css) ){
			global $themestek_inline_css;
			if( empty($themestek_inline_css) ){
				$themestek_inline_css = '';
			}
			$themestek_inline_css .= themestek_responsive_padding_margin( $themestek_responsive_css, '.themestek-ihbox' );
		}
		
		
		
		
		/******************************************/
		if( function_exists('vc_shortcode_custom_css_class') && !empty($css) ){
			
			// Inline css
			global $themestek_inline_css;
			if( empty($themestek_inline_css) ){
				$themestek_inline_css = '';
			}
			// Remove BG image from main DIV
			//$themestek_inline_css .= '.' . vc_shortcode_custom_css_class( $css, '' ) . '{background-image:none !important;}';
			// BG color layer
			$themestek_inline_css .= '.' . vc_shortcode_custom_css_class( $css, '' ) . ' .themestek-bg-layer{' . themestek_bg_only_from_css($css) . 'background-image: none !important;}';
			// BG image DIV for bg-hover effect
			$themestek_inline_css .= '.' . vc_shortcode_custom_css_class( $css, '' ) . ' .themestek-bgimage-layer{' . themestek_bg_only_from_css($css) . '}';
			// Removing padding and margin from themestek-sbox div
			//$themestek_inline_css .= '.wpb_wrapper > .' . vc_shortcode_custom_css_class( $css, '' ) . '{padding:0 !important; margin:0 !important; border:none !important;}';

			
			
			// Applying custom CSS to inner layer too
			$new_bgimage_element2 = vc_shortcode_custom_css_class( $css, '' ). ' > .themestek-vc_cta3-container';
			$newCSS2   			  = str_replace( vc_shortcode_custom_css_class( $css, '' ), $new_bgimage_element2, $css );
			$themestek_inline_css    .= str_replace( '}', 'background-image:none !important;}', $newCSS2 );
			
		}
		
		/******************************************/
		
		
		
		
		// calling template depending on the selected VIEW option
		ob_start();
		get_template_part('theme-parts/iconheadingbox/iconheadingbox', $boxstyle);
		$return = ob_get_contents();
		ob_end_clean();
	
		
		
		
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	
	return $return;
}
}
add_shortcode( 'themestek-iconheadingbox', 'themestek_sc_iconheadingbox' );



if( !function_exists('themestek_bg_only_from_css') ){
function themestek_bg_only_from_css( $css ){
	$bgonly_css = '';
	// Check if '{' charactor exists
	if( strpos($css,'{' )!=false ){
		$css = substr($css, strpos($css,'{' )+1 ); // returns "d"
		$css = str_replace('}','', $css );
		$new_css_array = explode(';',$css);
		$bgonly_css = '';
		foreach( $new_css_array as $css_line ){
			if( substr($css_line,0,10)=='background' ){
				$bgonly_css .= $css_line.';';
			}
		}
	}
	return $bgonly_css;
}
}



if( !function_exists('themestek_check_if_bg_color_in_css') ){
function themestek_check_if_bg_color_in_css( $css ){
	$return = false;
	
	// Check if '{' charactor exists
	if( strpos($css,'{' )!=false ){
		$css = substr($css, strpos($css,'{' )+1 ); // returns "d"
		$css = str_replace('}','', $css );
		$new_css_array = explode(';',$css);
		foreach( $new_css_array as $css_line ){
			if( substr($css_line,0,11)=='background:' ){
				$css_line = explode(' ',$css_line);
				foreach($css_line as $line){
					if( substr($line,0,5)=='rgba(' || substr($line,0,5)=='#' ){
						$return = true;
					}
				}
			}
		}
	}
	
	return $return;
}
}