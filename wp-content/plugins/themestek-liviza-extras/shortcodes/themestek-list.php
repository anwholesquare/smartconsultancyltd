<?php
// [themestek-list type=""]
if( !function_exists('themestek_sc_list') ){
function themestek_sc_list( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $themestek_sc_params_list;
		$options_list = themestek_create_options_list($themestek_sc_params_list);
		
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		// class
		$class   = array();
		$class[] = 'themestek-list';
		$class[] = 'themestek-list-style-' . $type;
		$class[] = 'themestek-list-icon-color-' . $icon_color;
		$class[] = 'themestek-' . $themestek_textcolor;
		$class[] = 'themestek-icon-' . $icon_color;
		$class[] = 'themestek-list-textsize-' . $textsize;
		
		if( $type=='icon' ){
			$class[] = 'themestek-list-icon-library-' . $icon_type;
		}
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
		
		// creating string from array
		$class = implode( ' ', $class );
		
		
		
		//  Icon list style
		$listStart = '<ul class="' . themestek_sanitize_html_classes($class) . '">';
		$listEnd   = '</ul>';
		
		switch($type){
			case 'disc':
				$listStart = '<ul class="' . themestek_sanitize_html_classes($class) . '" style="list-style-type:disc">';
				$listEnd   = '</ul>';
				break;
			case 'circle':
				$listStart = '<ul class="' . themestek_sanitize_html_classes($class) . '" style="list-style-type:circle">';
				$listEnd   = '</ul>';
				break;
			case 'square':
				$listStart = '<ul class="' . themestek_sanitize_html_classes($class) . '" style="list-style-type:square">';
				$listEnd   = '</ul>';
				break;
			case 'decimal':
				$listStart = '<ol class="' . themestek_sanitize_html_classes($class) . '" type="1">';
				$listEnd   = '</ol>';
				break;
			case 'upper-alpha':
				$listStart = '<ol class="' . themestek_sanitize_html_classes($class) . '" type="A">';
				$listEnd   = '</ol>';
				break;
			case 'roman':
				$listStart = '<ol class="' . themestek_sanitize_html_classes($class) . '" type="I">';
				$listEnd   = '</ol>';
				break;
		}
		
		// Preparing list
		$return .= $listStart;
		
		$iconAlign = 'left';
		if( is_rtl() ){ $iconAlign = 'right'; }
		
		
		$icon = '';
		if($type=='icon'){
			
			
			
			// Creating shortcode for icon
			$icon_sc_options = array(
				'icon_type'             => 'type',
				'icon_icon_fontawesome' => 'icon_fontawesome',
				'icon_icon_linecons'    => 'icon_linecons',
				'icon_icon_themify'     => 'icon_themify',
				'iconAlign'             => 'align',
			);
			$allvars = get_defined_vars();
			
			$icon_shortcode = '[themestek-icon';
			foreach( $icon_sc_options as $var=>$attr ){
				if( isset( $allvars[$var] ) ){
					$icon_shortcode .= ' '.$attr.'="' . $allvars[$var] . '"';
				}
			}
			$icon_shortcode .= ']';
			
			
			
			// calling icon shortcode
			$out = do_shortcode($icon_shortcode);
			
			
			// This is real icon code
			$icon = '<i class="' . themestek_sanitize_html_classes('themestek-' . $icon_color . ' '.${'icon_icon_'.$icon_type} ) .'"></i>  ';
		}
		
		$total = 20;
		for( $x=1; $x <= $total ; $x++ ){
			if( trim(trim(${'line'.$x}))!='' ){
				$line = rawurldecode(base64_decode(trim(${'line'.$x})));
				if( trim($line) != '' ){
					$return .= '<li>' . $icon . '<span class="themestek-list-li-content">' . $line . '</span></li>';
				}
			}
		}
		
		$return .= $listEnd;
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	return $return;
}
}
add_shortcode( 'themestek-list', 'themestek_sc_list' );