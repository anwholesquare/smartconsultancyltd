<?php
/**
 * Enqueue scripts and styles for the ADMIN section.
 *
 * @since Liviza 1.0
 *
 * @return void
 */
if( !function_exists('themestek_wp_admin_scripts_styles') ){
function themestek_wp_admin_scripts_styles() {
	/* Core files of the theme */
	wp_enqueue_style( 'liviza-admin', get_template_directory_uri() . '/includes/admin.css', false, '1.0.0' );
	wp_enqueue_script( 'liviza-admin', get_template_directory_uri() . '/includes/admin.js', array( 'jquery' ) );
	// Sticky Kit library
	wp_enqueue_script( 'sticky-kit', get_template_directory_uri() . '/includes/libraries/sticky-kit/jquery.sticky-kit.min.js', array( 'jquery' ) );
}
}
add_action( 'admin_enqueue_scripts', 'themestek_wp_admin_scripts_styles' );
