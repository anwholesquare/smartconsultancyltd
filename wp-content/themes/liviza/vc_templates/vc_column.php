<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_id
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$el_class = $el_id = $width = $parallax_speed_bg = $parallax_speed_video = $parallax = $parallax_image = $video_bg = $video_bg_url = $video_bg_parallax = $css = $offset = $css_animation = '';
/**** ThemeStek custom changes START ****/
$themestek_textcolor = $themestek_bgcolor = $themestek_col_bg_expand = '';
/**** ThemeStek custom changes END ****/
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
wp_enqueue_script( 'wpb_composer_front_js' );
$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );
$css_classes = array(
	'themestek-column',
	esc_attr($this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation )),
	'wpb_column',
	'vc_column_container',
	$width,
);
if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_col-has-fill';
}
/**** ThemeStek custom changes START ****/
$themestek_classes		= array();
$themestek_classes[]	= themestek_responsive_padding_margin_class( $themestek_responsive_css );  // Added by ThemeStek
if( !empty($themestek_responsive_css) ){
	$themestek_responsive_css_array = explode('|',$themestek_responsive_css);
	if( !empty($themestek_responsive_css_array[1]) && $themestek_responsive_css_array[1]=='colbreak_yes' ){ // 1200
		$themestek_classes[] = 'themestek-break-col-1200';
	}
	if( !empty($themestek_responsive_css_array[10]) && $themestek_responsive_css_array[10]=='colbreak_yes' ){  // 991
		$themestek_classes[] = 'themestek-break-col-991';
	}
	if( !empty($themestek_responsive_css_array[19]) && $themestek_responsive_css_array[19]=='colbreak_yes' ){  // 767
		$themestek_classes[] = 'themestek-break-col-767';
	}
	if( !empty($themestek_responsive_css_array[29]) && $themestek_responsive_css_array[29]=='colbreak_yes' ){  // custom
		$themestek_classes[] = 'themestek-break-col-custom';
	}
}
/**** ThemeStek custom changes END ******/
/**** ThemeStek custom changes START ****/
$themestek_bg_pos_class = '';
$themestek_customdiv 	 = '';
$themestek_class_list 	 = '';
if( !empty($zindex) ){
	if( $zindex=='zero' ){ $zindex='0'; }
	$css_classes[] = 'themestek-zindex-'.$zindex;
}
if( !empty($themestek_textcolor) ){
	$themestek_classes[] = 'themestek-textcolor-'.$themestek_textcolor;
}
if( !empty($themestek_bgimage_position) ){
	$themestek_bg_pos_class = 'themestek-bgimage-position-'.$themestek_bgimage_position;
}
if( !empty($themestek_bgcolor) || themestek_check_if_bgcolor_in_css($css) ){
	$themestek_classes[] = 'themestek-col-bgcolor-'.$themestek_bgcolor;
	$themestek_classes[] = 'themestek-col-bgcolor-yes';
	$themestek_customdiv = '<div class="themestek-col-wrapper-bg-layer themestek-bg-layer '.$themestek_bg_pos_class.'"><div class="themestek-bg-layer-inner"></div></div>';
}
if( strpos($css, 'url(') !== false || !empty($parallax_image) ) {
	$themestek_classes[] = 'themestek-col-bgimage-yes';
	$themestek_customdiv = '<div class="themestek-col-wrapper-bg-layer themestek-bg-layer '.$themestek_bg_pos_class.'"><div class="themestek-bg-layer-inner"></div></div>';
}
if( !empty($themestek_col_bg_expand) && in_array( $themestek_col_bg_expand, array('left','right') ) ){  // Left expand or Right expand
	$css_classes[] = 'themestek-span themestek-' . esc_attr($themestek_col_bg_expand) . '-span';
}
if( !empty($themestek_shadow) ){ // Shadow
	$css_classes[] = 'themestek-shadow-row';
}
$themestek_class_list = implode( ' ', $themestek_classes );
/**** ThemeStek custom changes End ****/
/**** ThemeStek custom changes START ****/
if( !empty($reduce_extra_padding) ){
	$css_classes[] = 'margin-15px-' . esc_html($reduce_extra_padding) . '-colum';
}
/**** ThemeStek custom changes END ****/
$wrapper_attributes = array();
$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );
$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}
if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . esc_attr($parallax);
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}
if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
?>
<div <?php echo implode( ' ', $wrapper_attributes ); ?>>
	<div class="vc_column-inner <?php echo sanitize_html_class( trim( vc_shortcode_custom_css_class( $css ) ) ) . ' ' . themestek_sanitize_html_classes( $themestek_class_list ); ?>">
		<?php echo trim($themestek_customdiv);  // Added by ThemeStek ?>
		<div class="wpb_wrapper">
			<?php echo wpb_js_remove_wpautop( $content ); ?>
		</div>
	</div>
</div>
<?php
/* Added by ThemeStek - code start */
$customStyle = '';
if(trim($css)!= ''){
	/***********************************/
	// Inline css
	global $themestek_inline_css;
	if( empty($themestek_inline_css) ){
		$themestek_inline_css = '';
	}
	// background image layer
	$new_bgimage_element = vc_shortcode_custom_css_class( $css, '' ). ' > .themestek-col-wrapper-bg-layer';
	$newCSS   			 = str_replace( vc_shortcode_custom_css_class( $css, '' ),$new_bgimage_element,$css );
	$themestek_inline_css   .= themestek_vc_get_bg_css_only( $newCSS );
	// background color layer
	$new_bgimage_element2 = vc_shortcode_custom_css_class( $css, '' ). ' > .themestek-col-wrapper-bg-layer > .themestek-bg-layer-inner';
	$newCSS2   			  = str_replace( vc_shortcode_custom_css_class( $css, '' ),$new_bgimage_element2,$css );
	$themestek_inline_css    .= themestek_vc_get_bg_css_only( $newCSS2, 'nobg' );
	/************************************/
}
// Responsive padding margin option values
if( !empty($themestek_responsive_css) ){
	global $themestek_inline_css;
	if( empty($themestek_inline_css) ){
		$themestek_inline_css = '';
	}
	$themestek_inline_css .= themestek_responsive_padding_margin( $themestek_responsive_css, '.themestek-column>' );
}
/* Added by ThemeStek - code end */
