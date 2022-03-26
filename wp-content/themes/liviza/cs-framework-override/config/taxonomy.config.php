<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
if( !isset($themestek_taxonomy_options) ){
	include( get_template_directory() .'/cs-framework-override/config/taxonomy-options.php' );
}
CSFramework_Taxonomy::instance( $themestek_taxonomy_options );
