<?php
/**
 * Register widget areas.
 *
 * @since Liviza 1.0
 *
 * @return void
 */
if( !function_exists('tste_liviza_widgets_init') ){
function tste_liviza_widgets_init() {
	if( !function_exists('tste_liviza_cs_framework_init') ){
		register_sidebar( array(
			'name'			=> esc_html__( 'Right Sidebar for Blog', 'liviza' ),
			'id'			=> 'sidebar-right-blog',
			'description'	=> esc_html__( 'This is right sidebar for blog section', 'liviza' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>',
		) );
		register_sidebar( array(
			'name'			=> esc_html__( 'Right Sidebar for Pages', 'liviza' ),
			'id'			=> 'sidebar-right-page',
			'description'	=> esc_html__( 'This is right sidebar for pages', 'liviza' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>',
		) );

		// First Footer widgets
		register_sidebar( array(
			'name'			=> esc_attr__( 'First Footer - 1st Widget Area', 'liviza' ),
			'id'			=> 'first-footer-1-widget-area',
			'description'	=> esc_attr__( 'This is first footer widget area for first row of footer.', 'liviza' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>',
		) );
		register_sidebar( array(
			'name'			=> esc_attr__( 'First Footer - 2nd Widget Area', 'liviza' ),
			'id'			=> 'first-footer-2-widget-area',
			'description'	=> esc_attr__( 'This is second footer widget area for first row of footer.', 'liviza' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>',
		) );
		register_sidebar( array(
			'name'			=> esc_attr__( 'First Footer - 3rd Widget Area', 'liviza' ),
			'id'			=> 'first-footer-3-widget-area',
			'description'	=> esc_attr__( 'This is third footer widget area for first row of footer.', 'liviza' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>',
		) );
		register_sidebar( array(
			'name'			=> esc_attr__( 'First Footer - 4th Widget Area', 'liviza' ),
			'id'			=> 'first-footer-4-widget-area',
			'description'	=> esc_attr__( 'This is fourth footer widget area for first row of footer.', 'liviza' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>',
		) );

		// Second Footer widgets
		register_sidebar( array(
			'name'			=> esc_attr__( 'Second Footer - 1st Widget Area', 'liviza' ),
			'id'			=> 'second-footer-1-widget-area',
			'description'	=> esc_attr__( 'This is first footer widget area for second row of footer.', 'liviza' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>',
		) );
		register_sidebar( array(
			'name'			=> esc_attr__( 'Second Footer - 2nd Widget Area', 'liviza' ),
			'id'			=> 'second-footer-2-widget-area',
			'description'	=> esc_attr__( 'This is second footer widget area for second row of footer.', 'liviza' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>',
		) );
		register_sidebar( array(
			'name'			=> esc_attr__( 'Second Footer - 3rd Widget Area', 'liviza' ),
			'id'			=> 'second-footer-3-widget-area',
			'description'	=> esc_attr__( 'This is third footer widget area for second row of footer.', 'liviza' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>',
		) );
		register_sidebar( array(
			'name'			=> esc_attr__( 'Second Footer - 4th Widget Area', 'liviza' ),
			'id'			=> 'second-footer-4-widget-area',
			'description'	=> esc_attr__( 'This is fourth footer widget area for second row of footer.', 'liviza' ),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>',
		) );
	}
}
}
add_action( 'widgets_init', 'tste_liviza_widgets_init' );
/*
 *  Adding Image sizes
 */
if( !function_exists('themestek_image_sizes') ){
function themestek_image_sizes(){
	/* Fixed image sizes */
	add_image_size( 'themestek-img-800x800', '800', '800', true );
	add_image_size( 'themestek-img-800x533', '800', '533', true );
	add_image_size( 'themestek-img-800x715', '800', '715', true );
	add_image_size( 'themestek-img-800x740', '800', '740', true );
	add_image_size( 'themestek-img-800x650', '800', '650', true );
	add_image_size( 'themestek-img-600x780', '600', '780', true );
	add_image_size( 'themestek-img-400x400', '400', '400', true );
	add_image_size( 'themestek-img-1170x575', '1170', '575', true );
}
}
add_action( 'init', 'themestek_image_sizes' );
/**
 *  Wrap "Read More" link with some div so we can design it
 */
if( !function_exists('themestek_wrap_more_link') ){
function themestek_wrap_more_link($more) {
	return '<span class="more-link-wrapper">'.$more.'</span>';
}
}
add_filter('the_content_more_link','themestek_wrap_more_link');
/**
 *  Slider Revoluiton Theme integration
 */
add_action( 'init', 'themestek_set_rs_as_theme' );
if( !function_exists('themestek_set_rs_as_theme') ){
function themestek_set_rs_as_theme() {
	// Setting options to hide Revoluiton Slider message
	if(get_option('revSliderAsTheme') != 'true'){
		update_option('revSliderAsTheme', 'true');
	}
	if(get_option('revslider-valid-notice') != 'false'){
		update_option('revslider-valid-notice', 'false');
	}
	if( function_exists('set_revslider_as_theme') ){
		set_revslider_as_theme();
	}
}
}
/**
 *  Page or Post: This will override the default "skin color" set in the page directly.
 */
if( !function_exists('themestek_single_skin_color') ){
function themestek_single_skin_color(){
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') ) {
		if( is_woocommerce() || is_cart() || is_checkout() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	if( $post_id ){
		//global $post;
		global $liviza_theme_options;
		$page_meta = get_post_meta( $post_id, '_themestek_metabox_group', true );
		if( !empty($page_meta['skincolor']) ){
			$liviza_theme_options['skincolor'] = esc_html($page_meta['skincolor']);
		}
	}
}
}
add_action('wp','themestek_single_skin_color');
/**
 *  Override Theme Options value from single page/post/cpt. This is useful for demo purpose and for other users too.
 */
if( !function_exists('themestek_toptions_override') ){
function themestek_toptions_override(){
	if( is_singular() ){
		$page_meta = get_post_meta( get_the_ID() ); // fetching all post meta
		if( !empty($page_meta) && is_array($page_meta) && count($page_meta)>0 ){
			foreach( $page_meta as $meta=>$value ){
				// Define prefix here
				$prefix = 'themestek_themeoptions_';
				if( substr($meta, 0, strlen($prefix) ) == $prefix ){
					// now process to get all theme options ID
					if( !isset($all_options) ){
						// getting list of theme options
						if( !isset($themestek_framework_options) ){
							include( get_template_directory() . '/cs-framework-override/config/framework-options.php' );
						}
						$all_options = array();
						foreach( $themestek_framework_options as $key=>$val ){
							if( !empty($val['fields']) ){
								foreach( $val['fields'] as $field ){
									if( !empty($field['id']) ){
										$all_options[] = $field['id'];
									}
								}
							}
						}
					}
					// End now
					// Now checking if any value is available and overriding it
					global $liviza_theme_options;
					$meta_name = substr( $meta, strlen($prefix) );
					if( in_array($meta_name, $all_options) ){
						if( themestek_is_json($value[0]) && !is_numeric($value[0]) ){
							// array
							$final_val    = json_decode($value[0]);
							$final_val    = (array) $final_val;
							$original_val = ( isset($liviza_theme_options[$meta_name]) ) ? $liviza_theme_options[$meta_name] : array() ;
							$final_val    = array_merge( $original_val, $final_val );
						} else {
							// string
							$final_val = $value[0];
						}
						$liviza_theme_options[$meta_name] = $final_val;
					}
				}
			}  // foreach
		}  // if
	}
}
}
add_action('wp','themestek_toptions_override');
/**
 *  Checking if Json code in the string
 */
if( !function_exists('themestek_is_json') ){
function themestek_is_json($string='') {
	json_decode($string);
	return (json_last_error() == JSON_ERROR_NONE);
}
}

/**
 *  Single: Body Background
 */
if( !function_exists('themestek_single_body_background') ){
function themestek_single_body_background(){
	$css = '';
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') && is_woocommerce() ) {
		$post_id = get_option( 'woocommerce_shop_page_id' );
	}
	if( $post_id ){
		$single_meta = get_post_meta( $post_id, '_themestek_metabox_group' , true );
		if( isset($single_meta['custom_background_switcher']) && $single_meta['custom_background_switcher']==true && !empty($single_meta['custom_background']) ){
			$css = themestek_get_background_css( 'html body', $single_meta['custom_background'], array('output_bglayer') );
			// Add CSS code in page
			wp_add_inline_style( 'liviza-responsive-style', $css );
		}
	}
}
}
add_action( 'wp_enqueue_scripts', 'themestek_single_body_background', 18 );
/**
 *  Custom Google Analytics code in footer
 */
add_action( 'wp_head', 'themestek_inline_css_header_code' );
if( !function_exists('themestek_inline_css_header_code') ){
function themestek_inline_css_header_code(){
	global $themestek_inline_css;
	// For Widget BG color and image
	global $wp_registered_sidebars;
	ob_start();
	foreach( $wp_registered_sidebars as $sidebar_id=>$sidebar_details ){
		dynamic_sidebar($sidebar_id);
	}
	ob_get_clean();
	global $post;
	if( !empty($post->post_content) ){
		do_shortcode( $post->post_content );
	}
	echo '<!-- Inline CSS Start -->';
	if( !empty($themestek_inline_css) ){
		echo '<style type="text/css">';
		echo trim($themestek_inline_css);
		echo '</style>';
	}
	echo '<!-- Inline CSS End -->';
}
}
/**
 *  Custom code in HEAD tag
 */
add_action( 'wp_head', 'themestek_head_code' );
if( !function_exists('themestek_head_code') ){
function themestek_head_code(){
	// Google Analytics code
	$customhtml_head = themestek_get_option('customhtml_head');
	// Output
	if( !empty($customhtml_head) ){
		echo trim($customhtml_head);
	}
}
}
/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Liviza 1.1
 */
if( !function_exists('themestek_javascript_detection') ){
function themestek_javascript_detection() {
	$yith_js_code = '';
	$yith_wishlist_page_id = get_option('yith_wcwl_wishlist_page_id');
	if( !empty($yith_wishlist_page_id) ){
		$url = get_permalink($yith_wishlist_page_id);
		$yith_js_code .= 'var IMAGEURL = "' . get_template_directory_uri() . '/images";';
		$yith_js_code .= 'var MGK_ADD_TO_WISHLIST_SUCCESS_TEXT = \'' . esc_html__('Product successfully added to wishlist.', 'liviza') . ' <a href="' . esc_url($url) . '">' . esc_html__('Browse Wishlist', 'liviza') . '</a>\';';
		$yith_js_code .= 'var MGK_ADD_TO_WISHLIST_EXISTS_TEXT = \'' . esc_html__('The product is already in the wishlist!', 'liviza') . ' <a href="' . esc_url($url) . '">' . esc_html__('Browse Wishlist', 'liviza') . '</a>\';';
		$yith_js_code .= 'var MGK_PRODUCT_PAGE = false;';
	}
	echo "<script> 'use strict'; (function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);" . $yith_js_code . "</script>\n";
}
}
add_action( 'wp_head', 'themestek_javascript_detection', 0 );
/**
 * Flush out the transients used in {@see themestek_category_transient_flusher()}.
 *
 * @since Liviza 1.0
 */
if( !function_exists('themestek_category_transient_flusher') ){
function themestek_category_transient_flusher() {
	delete_transient( 'liviza_categories' );
}
}
add_action( 'edit_category', 'themestek_category_transient_flusher' );
add_action( 'save_post',     'themestek_category_transient_flusher' );
/**
 *  Add inline Dynamic Style code
 */
if( !function_exists('themestek_add_inline_dynamic_css') ){
function themestek_add_inline_dynamic_css(){
	$liviza_theme_options = get_option('liviza_theme_options');
	$css = '';
	// Singuler of shop page
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') ) {
		if( is_woocommerce() || is_cart() || is_checkout() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	// Topbar custom css stylesheet
	$css .= themestek_topbar_inline_style();
	// Titlebar custom css stylesheet
	if( $post_id || is_tax() ){
		$css .= themestek_titlebar_inline_style();
	}
	// Minify CSS style
	if( isset( $liviza_theme_options['minify'] ) && esc_html($liviza_theme_options['minify'])==true ){
		$css = themestek_minify_css( $css );
	}
	// liviza main style
	wp_add_inline_style( 'liviza-responsive-style', $css );
}
}
add_action( 'wp_enqueue_scripts', 'themestek_add_inline_dynamic_css', 20 );
/**
 *  Breakpoint variable in head and ajaxurl
 */
if( !function_exists('themestek_breakpoint_js_vars') ){
function themestek_breakpoint_js_vars() {
	$breakpoint        = themestek_get_option('menu_breakpoint');
	$breakpoint_custom = themestek_get_option('menu_breakpoint-custom');
	$breakpoint        = ( $breakpoint=='custom' ) ? $breakpoint_custom : $breakpoint ;

	wp_localize_script( 'liviza-script', 'ts_liviza_js_vars',
		array(
			'themestek_breakpoint' => esc_attr($breakpoint),
			'ajaxurl'       => admin_url( 'admin-ajax.php' ),
		)
	);
}
}
add_action( 'wp_enqueue_scripts', 'themestek_breakpoint_js_vars', 20 );

add_filter('wp_list_categories', 'themestek_cat_count_span');
if( !function_exists('themestek_cat_count_span') ){
function themestek_cat_count_span($links) {
	$return = '';
	foreach(preg_split("/((\r?\n)|(\r\n?))/", $links) as $line){
		if (strpos($line, '</a> (') !== false) {
			$num = explode('</a>', $line);
			$num = $num[1];
			$num = str_replace('(','', $num );
			$num = str_replace(')','', $num );
			$num = trim($num);
			$line = str_replace('</a> ('.$num.')'  , ' <span>'.$num.'</span> </a>', $line);
		}
		$return .= $line."\n";
	}
	return $return;
}
}
/**
 *  Register Google Fonts for footer
*/
if( !function_exists('themestek_footer_google_fonts_url') ){
function themestek_footer_google_fonts_url() {
	global $themestek_global_footer_gfonts;
	$fontline = '';
    $font_url = '';
	if( !empty($themestek_global_footer_gfonts) ){
		$fontline = array();
		if( is_array($themestek_global_footer_gfonts) && count($themestek_global_footer_gfonts)>0 ){
			foreach($themestek_global_footer_gfonts as $gfonts=>$weight){
				$weight     = implode( ',', $weight );
				if( $weight == 'regular' || $weight == '400' ){
					$weight = '';
				}
				if( !empty($weight) ){
					$fontline[] =  $gfonts.':'.$weight;
				} else {
					$fontline[] =  $gfonts;
				}
			}
		}
		$fontline = implode( '|', $fontline );
	}
	/***/
	if( !empty($fontline) ){
		$font_url = add_query_arg( 'family', $fontline, "//fonts.googleapis.com/css" );
	}
    return $font_url;
}
}
if( !function_exists('themestek_enqueue_footer_google_fonts') ){
function themestek_enqueue_footer_google_fonts() {
    wp_enqueue_style( 'themestek-footer-gfonts', themestek_footer_google_fonts_url(), array(), '1.0.0' );
}
}
// This need to be at footer as the content will add more google fonts.
add_action( 'wp_footer', 'themestek_enqueue_footer_google_fonts' );
if ( ! function_exists( 'themestek_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 *
 * @since Liviza 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function themestek_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( esc_html__( 'Continue reading %s', 'liviza' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'themestek_excerpt_more' );
endif;
/*
 * Add some special classes on <body> tag.
 */
if( !function_exists('themestek_body_classes') ){
function themestek_body_classes($bodyClass){
	global $liviza_theme_options;
	$hClass = '';
	// All ROW to 20px
	if( is_singular() ){
		$singular_meta = get_post_meta( get_the_ID(), 'themestek_page_row_settings', true );
		if( isset($singular_meta['row_lower_padding']) && $singular_meta['row_lower_padding']==true ){
			$bodyClass[] = 'themestek-all-row-20px';
		}
	}
	// Breadcrumb position in Titlebar
	if( isset($liviza_theme_options['titlebar_view']) &&
		($liviza_theme_options['titlebar_view'] == 'default' || $liviza_theme_options['titlebar_view'] == 'allleft' || $liviza_theme_options['titlebar_view'] == 'allright' ) &&
		isset($liviza_theme_options['breadcrumb_on_bottom']) &&
		$liviza_theme_options['breadcrumb_on_bottom'] == true
	){
		$bodyClass[] = 'themestek-titlebar-bcrumb-bottom';
	}
	// check if dark background set for container.
	if( !empty($liviza_theme_options['headerstyle']) ){
		$bodyClass[] = 'themestek-headerstyle-'.esc_html($liviza_theme_options['headerstyle']);
	}
	// Check if slider exists for header style classic
	if( !empty($liviza_theme_options['headerstyle']) && $liviza_theme_options['headerstyle']=='classic' && ( is_single() || is_page() ) ){
		$singular_meta = get_post_meta( get_the_ID(), '_themestek_metabox_group', true );
		if( !empty($singular_meta['slidertype']) && $singular_meta['slidertype']=='revslider' && !empty($singular_meta['revslider']) ){
			$bodyClass[] = 'themestek-slider-yes';
		}
	}
	// check if dark background set for container.
	if( isset($liviza_theme_options['inner_background']['background-color']) && trim($liviza_theme_options['inner_background']['background-color'])!='' && themestek_check_dark_color(esc_html($liviza_theme_options['inner_background']['background-color'])) ){
		$bodyClass[] = 'themestek-dark-layout';
	}
	// Sticky Fotoer ON/OFF
	if( isset($liviza_theme_options['stickyfooter']) && $liviza_theme_options['stickyfooter']==true ){
		$bodyClass[] = 'themestek-sticky-footer';
	}
	// Single Portfolio
	if( is_singular('portfolio') ){
		$portfolioView        = esc_html($liviza_theme_options['portfolio_viewstyle']); // Global view
		$portfolioView_single = esc_html(get_post_meta( get_the_ID(), '_themestek_portfolio_view_viewstyle', true)); // Single portfolio view
		if( is_array($portfolioView_single) ){ $portfolioView_single = $portfolioView_single[0]; }
		if( trim($portfolioView_single)!='' && trim($portfolioView_single)!='global' ){
			$portfolioView = $portfolioView_single;
		}
		$bodyClass[] = sanitize_html_class('themestek-portfolio-view-'.$portfolioView);
	}
	// Boxed / Wide
	if( isset($liviza_theme_options['layout']) && trim($liviza_theme_options['layout'])!='' ){
		if( $liviza_theme_options['layout']=='boxed' || $liviza_theme_options['layout']=='framed' || $liviza_theme_options['layout']=='rounded' ){
			$bodyClass[] = 'themestek-boxed';
		}
		if( $liviza_theme_options['layout']=='framed' || $liviza_theme_options['layout']=='rounded' ){
			$bodyClass[] = 'themestek-boxed-'.sanitize_html_class($liviza_theme_options['layout']);
		}
		$bodyClass[] = sanitize_html_class( 'themestek-'.trim($liviza_theme_options['layout']));
		if( $liviza_theme_options['layout']=='fullwide' ){
			if( isset($liviza_theme_options['full_wide_elements']['content']) && $liviza_theme_options['full_wide_elements']['content']=='1' ){
				$bodyClass[] = 'themestek-layout-container-full';
			}
		}
	} else {
		$bodyClass[] = 'themestek-wide';
	}
	$themestek_retina_logo = 'off';
	if( isset($liviza_theme_options['logoimg_retina']['url']) && $liviza_theme_options['logoimg_retina']['url']!=''){
		$themestek_retina_logo = 'on';
	}
	// Header Style
	$headerstyle        = '';
	$headerstyle_global = '';
	$headerstyle_page   = '';
	if( isset($liviza_theme_options['headerstyle']) && trim($liviza_theme_options['headerstyle'])!='' ){
		$headerstyle_global = sanitize_html_class($liviza_theme_options['headerstyle']);
	}
	if( is_page() ){
		$headerstyle_page = trim(get_post_meta(get_the_ID(), 'headerstyle', true));
	}
	if( $headerstyle_page!='' ){
		$headerstyle = $headerstyle_page;
	} else {
		$headerstyle = $headerstyle_global;
	}
	if($headerstyle == 'classic-vertical' ){
		$bodyClass[] = 'header-' . esc_attr($headerstyle);
	}
	switch( $headerstyle ){
		case '1':
		case '2':
		case '3':
		case '9':
			if( $headerstyle=='9' ){ $headerstyle='1 themestek-header-invert'; }
			$hClass = 'themestek-header-style-'.trim($headerstyle);
			break;
		case '4':
		case '10':
			$overlayClass = ' themestek-header-overlay';
			if( $headerstyle=='10' ){ $overlayClass.=' themestek-header-invert'; }
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_themestek_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_themestek_page_options_hidetitlebar', true );
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlayClass = '';
				}
			}
			$hClass = 'themestek-header-style-1' . esc_attr($overlayClass);
			break;
		case '5':
			$overlayClass = ' themestek-header-overlay';
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_themestek_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_themestek_page_options_hidetitlebar', true );
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlayClass = '';
				}
			}
			$hClass = 'themestek-header-style-2' . esc_attr($overlayClass);
			break;
		case '6':
			$overlayClass = ' themestek-header-overlay';
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_themestek_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_themestek_page_options_hidetitlebar', true );
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlayClass = '';
				}
			}
			$hClass = 'themestek-header-style-3' . esc_attr($overlayClass);
			break;
		case '7':
		case '8':
			$overlayClass = ' themestek-header-overlay';
			if( $headerstyle=='8' ){ $overlayClass.=' themestek-header-invert'; }
			if( is_page() ){
				global $post;
				$slidertype   = get_post_meta( $post->ID, '_themestek_page_options_slidertype', true );
				if( is_array($slidertype) ){ $slidertype = $slidertype[0];}
				$hidetitlebar = get_post_meta( $post->ID, '_themestek_page_options_hidetitlebar', true );
				if( trim($slidertype)=='' && $hidetitlebar=='on' ){
					$overlayClass = '';
				}
			}
			$hClass = 'themestek-header-style-4' . esc_attr($overlayClass);
			break;
	}
	if( !empty($hClass) ){
		$bodyClass[] = $hClass;
	}
	// Sidebar classes
	$sidebar = themestek_get_sidebar_info();
	if( $sidebar=='' || $sidebar=='no' ){
		// The page is full width
		$bodyClass[] = 'themestek-page-full-width';
	} else {
		// Sidebar class for border
		$bodyClass[] = sanitize_html_class( 'themestek-sidebar-true' );
		$bodyClass[] = sanitize_html_class( 'themestek-sidebar-'.$sidebar );
	}
	// Check if empty sidebar.. so we can add class in body to make the content area center and cover the sidebar area.
	$themestek_check_empty_sidebar = themestek_get_sidebar_info( 'count_widgets' );
	if( empty($themestek_check_empty_sidebar) ){
		$bodyClass[] = 'themestek-empty-sidebar';
	}
	// single portfolio view class
	if( is_singular('themestek-portfolio') ){
		$view_single = get_post_meta( get_the_ID(), 'themestek_portfolio_view', true );
		$view_single = ( !empty( $view_single['viewstyle'] ) ) ? $view_single['viewstyle'] : '' ;
		$view        = $liviza_theme_options['portfolio_viewstyle'];
		$view        =  ( !empty($view_single) ) ? $view_single : $view ;
		$bodyClass[] = 'themestek-pf-view-'.$view;
	}
	// Check if "Max Mega Menu" plugin is active
	if ( class_exists( 'Mega_Menu' ) ) {
		// plugin is activated
		$bodyClass[] = 'themestek-maxmegamenu-active';
	}
	// One Page website
	if( isset($liviza_theme_options['one_page_site']) && $liviza_theme_options['one_page_site']==true ){
		$bodyClass[] = 'themestek-one-page-site';
	}
	return $bodyClass;
}
}
add_filter('body_class', 'themestek_body_classes');
/*
 *  This is under construction message code
 */
if( !function_exists('themestek_uconstruction') ){
function themestek_uconstruction(){
	$uconstruction = themestek_get_option('uconstruction');
	if (!is_user_logged_in() && !is_admin() && isset($uconstruction) && esc_html($uconstruction) == true ){
		// We are not sanitizing this as we are expecting any (html, CSS, JS) code here
		$uconstruction_html     = do_shortcode( themestek_get_option('uconstruction_html') );
		$uconstruction_title    = do_shortcode( themestek_get_option('uconstruction_title') );
		$uconstruction_css_code = themestek_get_option('uconstruction_css_code');
		$uconstruction_head     = '';
		if( !empty($uconstruction_title) ){
			$title_tag = 'title';
			$uconstruction_head .= '<' . esc_attr($title_tag) . '>' . themestek_wp_kses($uconstruction_title) . '</' . esc_attr($title_tag) . '>' . "\r\n";
		}
		// Background CSS
		$value = themestek_get_option('uconstruction_background'); // not escaping as value is array
		$css   = '';
		if ( ! empty( $value ) && is_array( $value ) ) {
			foreach ( $value as $key => $value ) {
				if ( ! empty( $value ) && $key != "media" ) {
					if ( $key == "image" ) {
						$css .= "background-image:url('" . esc_url($value) . "');";
					} else if ( $key == "color" ) {
						$css .= "background-color:" . esc_html($value) . ";";
					} else if ( $key == "size" ) {
						$css .= "background-size:" . esc_html($value) . ";";
					} else {
						if( $key!='imageid' ){
							$css .= 'background-' . esc_html($key) . ":" . esc_html($value) . ";";
						}
					}
				}
			}
		}
		if( $css!='' ){
			$css .= 'text-align:center;';
			$uconstruction_head .= '<style> ' . $uconstruction_css_code . ' body{'.$css.'} .stickylogo{display:none;} </style>';
		}
		$html_tag = 'html';
		$head_tag = 'head';
		$body_tag = 'body';
		// Final output
		$uconstruction_html_output = '
		<' . esc_attr($html_tag) . '>
			<' . esc_attr($head_tag) . '>
				' . $uconstruction_head . '
			</' . esc_attr($head_tag) . '>
			<' . esc_attr($body_tag) . '>
				' . themestek_wp_kses($uconstruction_html) . '
			</' . esc_attr($body_tag) . '>
		</' . esc_attr($html_tag) . '>
		';
		echo trim( $uconstruction_html_output );
		die();
	}
}
}
add_action('template_redirect', 'themestek_uconstruction');
/**
 * Setting limit to show number of Portfolios on Portfolio Category page
 */
if( !function_exists('themestek_number_of_posts_on_pcat') ){
function themestek_number_of_posts_on_pcat( $query ){
	$pfcat_show = themestek_get_option('pfcat_show');
	$pfcat_show = ( !empty($pfcat_show) ) ? esc_html( $pfcat_show ) : '9' ;
	if( is_tax( 'themestek-portfolio-category' ) && $query->is_main_query() ){
		$query->set('posts_per_page', $pfcat_show);
	}
	return $query;
}
}
add_filter('pre_get_posts', 'themestek_number_of_posts_on_pcat');
/**
 * Setting limit to show number of Portfolios on Portfolio Category page
 */
if( !function_exists('themestek_number_of_posts_on_teamgroup') ){
function themestek_number_of_posts_on_teamgroup( $query ){
	$teamcat_show = themestek_get_option('teamcat_show');
	$teamcat_show = ( !empty($teamcat_show) ) ? esc_html( $teamcat_show ) : '9' ;
	if( is_tax( 'themestek-team-group' ) && $query->is_main_query() ){
		$query->set('posts_per_page', $teamcat_show);
	}
	return $query;
}
}
add_filter('pre_get_posts', 'themestek_number_of_posts_on_teamgroup');
/**
 *  Search results page setup
 */
if( !function_exists('themestek_search_filter') ){
function themestek_search_filter( $query ) {
	if ( is_search() && !is_admin() && $query->is_main_query() && $query->is_search ){
		// by default we will show 10 posts
		$query->set( 'posts_per_page', get_option('posts_per_page') );
		$post_type = get_query_var('post_type');
		if ( empty($_GET['post_type']) ) {
			$query->set( 'post_type', 'post' );
			$post_type = 'post';
		} else if ( isset($_GET['post_type']) && $_GET['post_type']=='page' ) {
			$query->set( 'post_type', 'page' );
			$post_type = 'page';
		}
		if( !empty( $post_type ) ){
			switch( $post_type ){
				case 'themestek-portfolio':
				case 'themestek-team':
				case 'product':
				case 'tribe_events':
					$query->set( 'posts_per_page', 9 );
					break;
				case 'page':
					$query->set( 'posts_per_page', 20 );
					break;
			}
		}
	}
}
}
add_filter('pre_get_posts','themestek_search_filter');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
if( !function_exists('liviza_pingback_header') ){
function liviza_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
}
add_action( 'wp_head', 'liviza_pingback_header' );