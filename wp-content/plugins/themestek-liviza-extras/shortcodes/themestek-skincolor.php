<?php
// [themestek-skincolor]This text will be in skin color[/themestek-skincolor]
if( !function_exists('themestek_sc_skincolor') ){
function themestek_sc_skincolor( $atts, $content=NULL ) {
	return '<span class="themestek-skincolor themestek-skincolor">'.$content.'</span>';
}
}
add_shortcode( 'themestek-skincolor', 'themestek_sc_skincolor' );