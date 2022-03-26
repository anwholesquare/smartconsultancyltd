<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css
 * @var $el_id
 * @var $equal_height
 * @var $content_placement
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row_Inner
 */
$el_class = $equal_height = $content_placement = $css = $el_id = '';
$disable_element = '';
$output = $after_output = '';
/**** ThemeStek custom changes START ****/
$themestek_textcolor = $themestek_bgcolor = $css_animation = '';
/**** ThemeStek custom changes END ****/
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_classes = array(
	'themestek-row-inner',
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_inner',
	'vc_row-fluid',
	esc_attr($el_class),
	vc_shortcode_custom_css_class( $css ),
	themestek_responsive_padding_margin_class( $themestek_responsive_css ),  // Added by ThemeStek
);
if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}
if ( vc_shortcode_custom_css_has_property( $css, array(
	'border',
	'background',
) ) ) {
	$css_classes[] = 'vc_row-has-fill';
}
if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . esc_attr($atts['gap']);
}
if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}
if ( ! empty( $atts['rtl_reverse'] ) ) {
	$css_classes[] = 'vc_rtl-columns-reverse';
}
if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . esc_attr($content_placement);
}
if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}
/**** ThemeStek custom changes START ****/
if( !empty($themestek_responsive_css) ){
	$themestek_responsive_css_array = explode('|',$themestek_responsive_css);
	if( !empty($themestek_responsive_css_array[1]) && $themestek_responsive_css_array[1]=='colbreak_yes' ){ // 1200
		$css_classes[] = 'themestek-break-col-1200';
	}
	if( !empty($themestek_responsive_css_array[10]) && $themestek_responsive_css_array[10]=='colbreak_yes' ){  // 991
		$css_classes[] = 'themestek-break-col-991';
	}
	if( !empty($themestek_responsive_css_array[19]) && $themestek_responsive_css_array[19]=='colbreak_yes' ){  // 767
		$css_classes[] = 'themestek-break-col-767';
	}
	if( !empty($themestek_responsive_css_array[29]) && $themestek_responsive_css_array[29]=='colbreak_yes' ){  // custom
		$css_classes[] = 'themestek-break-col-custom';
	}
}
/**** ThemeStek custom changes END ******/
/**** ThemeStek custom changes START ****/
if( !empty($themestek_textcolor) ){
	$css_classes[] = 'themestek-textcolor-'.$themestek_textcolor;
}
if( !empty($themestek_bgcolor) ){
	$css_classes[] = 'themestek-bgcolor-'.$themestek_bgcolor;
}
if( !empty($break_in_responsive) ){
	$css_classes[] = 'break-' . esc_html($break_in_responsive) . '-colum';
}
if( !empty($themestek_shadow) ){ // Shadow
	$css_classes[] = 'themestek-shadow-row';
}
if( !empty($zindex) ){
	if( $zindex=='zero' ){ $zindex='0'; }
	$css_classes[] = 'themestek-zindex-'.$zindex;
}
/**** ThemeStek custom changes END ******/
$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
/***** Modified by ThemeStek - START *****/
// Responsive padding margin option values
if( !empty($themestek_responsive_css) ){
	global $themestek_inline_css;
	if( empty($themestek_inline_css) ){
		$themestek_inline_css = '';
	}
	$themestek_inline_css .= themestek_responsive_padding_margin( $themestek_responsive_css , '.themestek-row-inner' );
}
?>
<div <?php echo implode( ' ', $wrapper_attributes ); ?>>
	<?php echo wpb_js_remove_wpautop( $content ); ?>
</div>
<?php echo esc_html($after_output); ?>
<?php
/***** Modified by ThemeStek - END *****/
