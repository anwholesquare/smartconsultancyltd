<?php
// [themestek-site-url]
if( !function_exists('themestek_sc_site_url') ){
function themestek_sc_site_url( $atts, $content=NULL ){
	return site_url();
}
}
add_shortcode( 'themestek-site-url', 'themestek_sc_site_url' );