<?php
/* --- VC Shared Library --- */
require_once get_template_directory().'/includes/vc/vc-core.php';
/* --- Element List --- */
// themestek_custom_heading
add_action( 'vc_after_init', 'themestek_vc_custom_element_custom_heading' );
function themestek_vc_custom_element_custom_heading(){ get_template_part('includes/vc/element-themestek','custom-heading'); }
// themestek_icon
add_action( 'vc_after_init', 'themestek_vc_custom_element_icon' );
function themestek_vc_custom_element_icon(){ get_template_part('includes/vc/element-themestek','icon'); }
// themestek_btn
add_action( 'vc_after_init', 'themestek_vc_custom_element_btn' );
function themestek_vc_custom_element_btn(){ get_template_part('includes/vc/element-themestek','btn'); }
// themestek_cta
add_action( 'vc_after_init', 'themestek_vc_custom_element_cta' );
function themestek_vc_custom_element_cta(){ get_template_part('includes/vc/element-themestek','cta'); }
// themestek_heading
add_action( 'vc_after_init', 'themestek_vc_custom_element_heading' );
function themestek_vc_custom_element_heading(){ get_template_part('includes/vc/element-themestek','heading'); }
// themestek_single_image
add_action( 'vc_after_init', 'themestek_vc_custom_element_single_image' );
function themestek_vc_custom_element_single_image(){ get_template_part('includes/vc/element-themestek','single-image'); }
// themestek_iconheadingbox
add_action( 'vc_after_init', 'themestek_vc_custom_element_iconheadingbox' );
function themestek_vc_custom_element_iconheadingbox(){ get_template_part('includes/vc/element-themestek','iconheadingbox'); }
// themestek_staticbox
add_action( 'vc_after_init', 'themestek_vc_custom_element_staticbox' );
function themestek_vc_custom_element_staticbox(){ get_template_part('includes/vc/element-themestek','staticbox'); }
// themestek_progress_bar
add_action( 'vc_after_init', 'themestek_vc_progress_bar' );
function themestek_vc_progress_bar(){ get_template_part('includes/vc/element-themestek','progress-bar'); }
// themestek_pricing_table
add_action( 'vc_after_init', 'themestek_vc_pricing_table' );
function themestek_vc_pricing_table(){ get_template_part('includes/vc/element-themestek','pricing-table'); }
// themestek_blogbox
add_action( 'vc_after_init', 'themestek_vc_custom_element_blogbox' );
function themestek_vc_custom_element_blogbox(){ get_template_part('includes/vc/element-themestek','blogbox'); }
// themestek-portfoliobox
add_action( 'vc_after_init', 'themestek_vc_custom_element_portfoliobox' );
function themestek_vc_custom_element_portfoliobox(){ get_template_part('includes/vc/element-themestek','portfoliobox'); }
// themestek-coachingbox
add_action( 'vc_after_init', 'themestek_vc_custom_element_coachingbox' );
function themestek_vc_custom_element_coachingbox(){ get_template_part('includes/vc/element-themestek','coachingbox'); }
// themestek-servicebox
add_action( 'vc_after_init', 'themestek_vc_custom_element_servicebox' );
function themestek_vc_custom_element_servicebox(){ get_template_part('includes/vc/element-themestek','servicebox'); }
// themestek_teambox
add_action( 'vc_after_init', 'themestek_vc_custom_element_teambox' );
function themestek_vc_custom_element_teambox(){ get_template_part('includes/vc/element-themestek','teambox'); }
// themestek-reviewsbox
add_action( 'vc_after_init', 'themestek_vc_custom_element_reviewsbox' );
function themestek_vc_custom_element_reviewsbox(){ get_template_part('includes/vc/element-themestek','reviewsbox'); }
// themestek_clientsbox
add_action( 'vc_after_init', 'themestek_vc_custom_element_clientsbox' );
function themestek_vc_custom_element_clientsbox(){ get_template_part('includes/vc/element-themestek','clientsbox'); }
// themestek_facts_in_digits
add_action( 'vc_after_init', 'themestek_vc_custom_element_facts_in_digits' );
function themestek_vc_custom_element_facts_in_digits(){ get_template_part('includes/vc/element-themestek','facts-in-digits'); }
// themestek_contactbox
add_action( 'vc_after_init', 'themestek_vc_custom_element_contactbox' );
function themestek_vc_custom_element_contactbox(){ get_template_part('includes/vc/element-themestek','contactbox'); }
// themestek_list
add_action( 'vc_after_init', 'themestek_vc_custom_element_list' );
function themestek_vc_custom_element_list(){ get_template_part('includes/vc/element-themestek','list'); }
// themestek_socialbox
add_action( 'vc_after_init', 'themestek_vc_custom_element_socialbox' );
function themestek_vc_custom_element_socialbox(){ get_template_part('includes/vc/element-themestek','socialbox'); }
// themestek_timeline
add_action( 'vc_after_init', 'themestek_vc_custom_element_timeline' );
function themestek_vc_custom_element_timeline(){ get_template_part('includes/vc/element-themestek','timeline'); }
// themestek-bmi-calculator
add_action( 'vc_after_init', 'themestek_vc_bmi_calculator' );
function themestek_vc_bmi_calculator(){ get_template_part('includes/vc/element-themestek','bmi-calculator'); }
// themestek_bmi_details
add_action( 'vc_after_init', 'themestek_vc_custom_element_bmi_details' );
function themestek_vc_custom_element_bmi_details(){ get_template_part('includes/vc/element-themestek','bmi-details'); }
