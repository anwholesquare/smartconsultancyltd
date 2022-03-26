<?php
// [themestek-current-year]
if( !function_exists('themestek_sc_current_year') ){
function themestek_sc_current_year( $atts, $content=NULL ){
	return date("Y");
}
}
add_shortcode( 'themestek-current-year', 'themestek_sc_current_year' );