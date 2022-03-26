<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
if( !isset($themestek_framework_settings) || !isset($themestek_framework_options) ){
	include( get_template_directory() .'/cs-framework-override/config/framework-options.php' );
}
CSFramework::instance( $themestek_framework_settings, $themestek_framework_options );
