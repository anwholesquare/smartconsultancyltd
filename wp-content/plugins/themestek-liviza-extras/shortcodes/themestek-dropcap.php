<?php
// [themestek-dropcap]D[/themestek-dropcap]
// [themestek-dropcap style="square"]A[/themestek-dropcap]
// [themestek-dropcap style="rounded"]B[/themestek-dropcap]
// [themestek-dropcap style="round"]C[/themestek-dropcap]
// [themestek-dropcap color="skincolor"]A[/themestek-dropcap]
// [themestek-dropcap color="grey"]B[/themestek-dropcap]
// [themestek-dropcap color="dark"]B[/themestek-dropcap]
// [themestek-dropcap bgcolor="skincolor"]A[/themestek-dropcap]
// [themestek-dropcap bgcolor="grey"]B[/themestek-dropcap]
// [themestek-dropcap bgcolor="dark"]B[/themestek-dropcap]
if( !function_exists('themestek_sc_dropcap') ){
function themestek_sc_dropcap( $atts, $content=NULL ){
	extract( shortcode_atts( array(
		'style'   => '',
		'color'   => 'skincolor',
		'bgcolor' => '',
	), $atts ) );
	
	if( empty($color) ){
		$color = 'skincolor';
	}
	
	$class = array();
	$class[] = 'themestek-dropcap';
	$class[] = 'themestek-dcap-style-' . $style;
	$class[] = 'themestek-dcap-txt-color-' . $color;
	$class[] = 'themestek-' . $color;
	$class[] = 'themestek-bgcolor-' . $bgcolor;
	
	$class = implode( ' ', $class );
	
	return '<span class="' . themestek_sanitize_html_classes($class) . '">' . esc_attr($content) . '</span>';
}
}
add_shortcode( 'themestek-dropcap', 'themestek_sc_dropcap' );