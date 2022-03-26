<?php
// [themestek-search-icon]
if( !function_exists('themestek_search_icon') ){
function themestek_search_icon(){
	
	$return = '';
	$header_search  = themestek_get_option('header_search');

	// Search icon
	$return .= '<div class="themestek-header-icons><span class="themestek-header-icon themestek-header-search-link"><a href="#"><i class="themestek-liviza-icon-search-2"></i></a></span> </div>';
	
	return $return;

}
}
add_shortcode( 'themestek-search-icon', 'themestek_search_icon' );

