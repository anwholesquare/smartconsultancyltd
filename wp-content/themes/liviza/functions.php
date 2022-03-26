<?php	
/**
 * Liviza functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Liviza
 * @since Liviza 1.0
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Liviza 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 847;
}
if ( ! function_exists( 'liviza_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Liviza 1.0
 */
function liviza_theme_setup() {

	global $liviza_theme_options;

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on liviza, use a find and replace
	 * to change 'liviza' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'liviza', get_template_directory() . '/languages' );

	/*
	 * WooCommerce Support
	 */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid html5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'gallery', 'audio', 'video', 'quote', 'link', 'status', 'chat'
	) );

	/*
	 * This theme uses wp_nav_menu() in four locations.
	 */
	register_nav_menus( array(
		'themestek-main-menu'			=> esc_html__( 'Main Menu', 'liviza' ),
		'themestek-footer-menu'			=> esc_html__( 'Footer Menu', 'liviza' ),
		'themestek-topbar-left-menu'	=> esc_html__( 'Topbar Left Menu', 'liviza' ),
		'themestek-topbar-right-menu'	=> esc_html__( 'Topbar Right Menu', 'liviza' ),
	) );
}
endif; // liviza_theme_setup()
add_action( 'after_setup_theme', 'liviza_theme_setup' );

/************************* Custom Files ************************/
// Load theme functions
require get_template_directory() . '/includes/core.php';
// filters and actions
require get_template_directory() . '/includes/actions.php';
// WooCommerce
require get_template_directory() . '/includes/wc-settings.php';
// Load framework
require get_template_directory() . '/includes/framework.php';
// Add our shortcodes as addons for Visual Composer
if( function_exists('vc_map') ){
	require get_template_directory() . '/includes/visual-composer.php';
}
// Enqueue styles and scripts
require get_template_directory() . '/includes/enqueue.php';
// Enqueue styles and scripts for admin section
require get_template_directory() . '/includes/admin-enqueue.php';
// Extra plugins
require get_template_directory() . '/includes/class-tgm-plugin-activation.php';
require get_template_directory() . '/includes/extra-plugins.php';