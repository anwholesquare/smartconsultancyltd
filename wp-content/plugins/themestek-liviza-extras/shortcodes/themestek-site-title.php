<?php
// [themestek-site-title]
if( !function_exists('themestek_sc_site_title') ){
function themestek_sc_site_title( $atts, $content=NULL ){
	return get_bloginfo('name');
}
}
add_shortcode( 'themestek-site-title', 'themestek_sc_site_title' );