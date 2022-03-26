<?php
// [themestek-logo]
if( !function_exists('themestek_sc_logo') ){
function themestek_sc_logo( $atts, $content=NULL ){
	
	$return = '';
	
	$liviza_theme_options = get_option('liviza_theme_options');
	
	if( !empty($liviza_theme_options['logotype']) ){
	
		$return = '<span class="themestek-sc-logo themestek-sc-logo-type-'.$liviza_theme_options['logotype'].'">';
		
		if( $liviza_theme_options['logotype']=='image' ){
			if( isset($liviza_theme_options['logoimg']) && is_array($liviza_theme_options['logoimg']) ){
				
				// standard logo
				if( isset($liviza_theme_options['logoimg']['full-url']) && trim($liviza_theme_options['logoimg']['full-url'])!='' ){
					$image = $liviza_theme_options['logoimg']['full-url'];
					$return .= '<img class="themestek-logo-img standardlogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$liviza_theme_options['logoimg']['full-url'].'">';
				
				} else if( isset($liviza_theme_options['logoimg']['thumb-url']) && trim($liviza_theme_options['logoimg']['thumb-url'])!='' ){
					$image = $liviza_theme_options['logoimg']['thumb-url'];
					$return .= '<img class="themestek-logo-img standardlogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$liviza_theme_options['logoimg']['thumb-url'].'">';

				} else if( isset($liviza_theme_options['logoimg']['id']) && trim($liviza_theme_options['logoimg']['id'])!='' ){
					$image   = wp_get_attachment_image_src( $liviza_theme_options['logoimg']['id'], 'full' );
					$return .= '<img class="themestek-logo-img standardlogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'">';
					
					
				}
				
				
				// stikcy logo
				if( isset($liviza_theme_options['logoimg_sticky']) && is_array($liviza_theme_options['logoimg_sticky']) ){
					
					if( isset($liviza_theme_options['logoimg_sticky']['full-url']) && trim($liviza_theme_options['logoimg_sticky']['full-url'])!='' ){
						$sticky_image   = $liviza_theme_options['logoimg_sticky']['full-url'];
						$return .= '<img class="themestek-logo-img stickylogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$liviza_theme_options['logoimg_sticky']['full-url'].'">';
					
					} else if( isset($liviza_theme_options['logoimg_sticky']['thumb-url']) && trim($liviza_theme_options['logoimg_sticky']['thumb-url'])!='' ){
						$sticky_image   = $liviza_theme_options['logoimg_sticky']['thumb-url'];
						$return .= '<img class="themestek-logo-img stickylogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$liviza_theme_options['logoimg_sticky']['thumb-url'].'">';
					
					} else if( isset($liviza_theme_options['logoimg_sticky']['id']) && trim($liviza_theme_options['logoimg_sticky']['id'])!='' ){
						$sticky_image   = wp_get_attachment_image_src( $liviza_theme_options['logoimg_sticky']['id'], 'full' );
						$return .= '<img class="themestek-logo-img stickylogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$sticky_image[0].'" width="'.$sticky_image[1].'" height="'.$image[2].'">';
						
					}
					
				}
				
				
			}
		} else {
			if( !empty($liviza_theme_options['logotext']) ){
				$return = $liviza_theme_options['logotext'];
			}
		}
		
		$return .= '</span>';
		
	}
	
	return $return;
}
}
add_shortcode( 'themestek-logo', 'themestek_sc_logo' );