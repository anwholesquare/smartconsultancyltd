<?php


/*
 * Shortcode list and their calls - Depends on Visual Composer
 */
$shortcodeList = array(
	'themestek-blogbox',
	'themestek-btn',
	'themestek-cta',
	'themestek-clientsbox',
	'themestek-contactbox',
	'themestek-staticbox',
	'themestek-custom-heading',
	'themestek-heading',
	'themestek-facts-in-digits',
	'themestek-heading',
	'themestek-icon',
	'themestek-icontext',
	'themestek-wpml-language-switcher',
	'themestek-icon-separator',
	'themestek-portfoliobox',
	'themestek-coachingbox',
	'themestek-servicebox',
	'themestek-eventsbox',
	'themestek-iconheadingbox',
	'themestek-list',
	'themestek-teambox',
	'themestek-reviewsbox',
	'themestek-twitterbox',
	'themestek-socialbox',
	'themestek-progress-bar',
	'themestek-pricing-table',
	'themestek-single-image',
	
	'themestek-current-year',
	'themestek-social-links',
	'themestek-site-tagline',
	'themestek-site-title',
	'themestek-site-url',
	'themestek-footermenu',
	'themestek-topbar-left-menu',
	'themestek-topbar-right-menu',
	'themestek-logo',
	'themestek-dropcap',
	'themestek-skincolor',
	'themestek-bmi-details',
	'themestek-timeline',
	'themestek-search-icon',
	'themestek-bmi-calculator'
);
//if( function_exists('vc_map') && class_exists('WPBMap') ){
	foreach( $shortcodeList as $shortcode ){
		if( file_exists(get_template_directory() . '/includes/shortcodes/'.$shortcode.'.php') ){
			include_once( get_template_directory() . '/includes/shortcodes/'.$shortcode.'.php');
		} else {
			require_once THEMESTEK_LIVIZA_DIR . 'shortcodes/'.$shortcode.'.php';
		}
	}
//}

/*
 * Shortcode list and their calls - Not depended on Visual Composer
 */
/*
$shortcodeList = array(
	'themestek-current-year',
	'themestek-social-links',
	'themestek-site-tagline',
	'themestek-site-title',
	'themestek-site-url',
	'themestek-footermenu',
	'themestek-logo',
	'themestek-dropcap',
	'themestek-skincolor',
);
foreach( $shortcodeList as $shortcode ){
	include_once( get_template_directory() . '/includes/shortcodes/'.$shortcode.'.php');
}
*/
