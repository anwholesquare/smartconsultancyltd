<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/* Getting skin color */
$skincolor = themestek_get_option('skincolor');
/*
/* Second skin color */
$secondskincolor = themestek_get_option('secondskincolor');
/*
 *  Set skin color set for this page only.
 */
if( isset($_GET['color']) && trim($_GET['color'])!='' ){
	$skincolor = '#'.trim($_GET['color']);
}
/*
 *  Setting variables for different Theme Options
 */
$header_height        = themestek_get_option('header_height');
$first_menu_margin    = themestek_get_option('first_menu_margin');
$titlebar_height      = themestek_get_option('titlebar_height');
$header_height_sticky = themestek_get_option('header_height_sticky');
$center_logo_width    = themestek_get_option('center_logo_width');
$header_bg_color                   = themestek_get_option('header_bg_color');
$responsive_header_bg_custom_color = themestek_get_option('responsive_header_bg_custom_color');
$header_bg_custom_color            = themestek_get_option('header_bg_custom_color');
$sticky_header_bg_color            = themestek_get_option('sticky_header_bg_color');
$sticky_header_bg_custom_color     = themestek_get_option('sticky_header_bg_custom_color');
$sticky_header_bg_color            = ( empty($sticky_header_bg_color) ) ? $header_bg_color : $sticky_header_bg_color ;
$sticky_header_bg_custom_color     = ( empty($sticky_header_bg_custom_color) ) ? $header_bg_custom_color : $sticky_header_bg_custom_color ;
$sticky_header_menu_bg_color        = themestek_get_option('sticky_header_menu_bg_color');
$sticky_header_menu_bg_custom_color = themestek_get_option('sticky_header_menu_bg_custom_color');
$general_font = themestek_get_option('general_font');
$titlebar_bg_color          = themestek_get_option('titlebar_bg_color');
$titlebar_bg_custom_color   = themestek_get_option('titlebar_bg_custom_color');
$titlebar_text_color        = themestek_get_option('titlebar_text_color');
$titlebar_text_custom_color = themestek_get_option('titlebar_heading_font', 'color');
$titlebar_subheading_text_custom_color = themestek_get_option('titlebar_subheading_font', 'color');
$titlebar_breadcrumb_text_custom_color = themestek_get_option('titlebar_breadcrumb_font', 'color');
$topbar_text_color        = themestek_get_option('topbar_text_color');
$topbar_text_custom_color = themestek_get_option('topbar_text_custom_color');
$topbar_bg_color          = themestek_get_option('topbar_bg_color');
$topbar_bg_custom_color   = themestek_get_option('topbar_bg_custom_color');
$topbar_breakpoint        = themestek_get_option('topbar-breakpoint');
$topbar_breakpoint_custom = themestek_get_option('topbar-breakpoint-custom');
$mainmenufont            = themestek_get_option('mainmenufont');
$mainMenuFontColor       = $mainmenufont['color'];
$stickymainmenufontcolor = themestek_get_option('stickymainmenufontcolor');
$stickymainmenufontcolor = ( empty($stickymainmenufontcolor) ) ? $mainmenufont['color'] : $stickymainmenufontcolor ;
$dropdownmenufont = themestek_get_option('dropdownmenufont');
$mainmenu_active_link_color        = themestek_get_option('mainmenu_active_link_color');
$mainmenu_active_link_custom_color = themestek_get_option('mainmenu_active_link_custom_color');
$dropmenu_active_link_color        = themestek_get_option('dropmenu_active_link_color');
$dropmenu_active_link_custom_color = themestek_get_option('dropmenu_active_link_custom_color');
$dropmenu_background = themestek_get_option('dropmenu_background');
$logoMaxHeight       = themestek_get_option('logo_max_height');
$logoMaxHeightSticky = themestek_get_option('logo_max_height_sticky');
$inner_background = themestek_get_option('inner_background');
$headerbg_color       = themestek_get_option('header_bg_color');
$headerbg_customcolor = themestek_get_option('header_bg_custom_color');
$header_menu_bg_color        = themestek_get_option('header_menu_bg_color');
$header_menu_bg_custom_color = themestek_get_option('header_menu_bg_custom_color');
$menu_breakpoint        = themestek_get_option('menu_breakpoint');
$menu_breakpoint_custom = themestek_get_option('menu_breakpoint-custom');
$breakpoint = $menu_breakpoint;
$breakpoint = ( $menu_breakpoint=='custom' && !empty($menu_breakpoint_custom) ) ? $menu_breakpoint_custom : $breakpoint ;
$logo_font = themestek_get_option('logo_font');
$loaderimg          = themestek_get_option('loaderimg');
$loaderimage_custom = themestek_get_option('loaderimage_custom');
$fbar_breakpoint        = themestek_get_option('floatingbar-breakpoint');
$fbar_breakpoint_custom = themestek_get_option('floatingbar-breakpoint-custom');
/* Link Color */
$default_dark_color = '#222d35'; // default dark color (for normal link only)
$link_color = themestek_get_option('link-color');
$normal_color = ( $link_color=='darkhover' ) ? $skincolor : $default_dark_color ;
$hover_color  = ( $link_color=='darkhover' ) ? $default_dark_color : $skincolor ;
if( $link_color=='custom' ){
	$normal_color = themestek_get_option('link-color-regular');
	$hover_color  = themestek_get_option('link-color-hover');
}
/* Output start
------------------------------------------------------------------------------*/ ?>
<?php
/* Custom CSS Code at top */
$custom_css_code_top = themestek_get_option('custom_css_code_top');
if( !empty($custom_css_code_top) ){
	// We are not escaping / sanitizing as we are expecting css code. 
	echo trim($custom_css_code_top);
}
?>
/*------------------------------------------------------------------
* theme-style.php index *
[Table of contents]
1.  Background color
2.  Topbar Background color
3.  Element Border color
4.  Textcolor
5.  Boxshadow
6.  Header / Footer background color
7.  Footer background color
8.  Logo Color
9.  Genral Elements
10. "Center Logo Between Menu" options
11. Floating Bar
-------------------------------------------------------------------*/
/**
 * 0. Background properties
 * ----------------------------------------------------------------------------
 */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(themestek_get_all_background_css());
?>
/**
 * 0. Font properties
 * ----------------------------------------------------------------------------
 */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(themestek_get_all_font_css());
?>
/**
 * 0. Text link and hover color properties
 * ----------------------------------------------------------------------------
 */
a{color:<?php echo esc_attr($normal_color); ?>;}
a:hover{color:<?php echo esc_attr($hover_color); ?>;}
/**
 * 0. Header bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $header_bg_color=='custom' && !empty($header_bg_custom_color) ){
	?>
	.site-header.themestek-bgcolor-custom:not(.is_stuck),
	.themestek-header-style-classic-box.themestek-header-overlay .site-header.themestek-bgcolor-custom:not(.is_stuck) .themestek-container-for-header{
		background-color:<?php echo esc_html($header_bg_custom_color); ?> !important;
	}
	<?php
}
?>
/**
 * 0. Sticky header bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $sticky_header_bg_color=='custom' && !empty($sticky_header_bg_custom_color) ){
	?>
	.is_stuck.site-header.themestek-sticky-bgcolor-custom{
		background-color:<?php echo esc_html($sticky_header_bg_custom_color); ?> !important;
	}
	<?php
}
?>
/**
 * 0. header menu bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $header_menu_bg_color=='custom' && !empty($header_menu_bg_custom_color) ){
	?>
	.themestek-header-menu-bg-color-custom{
		background-color:<?php echo esc_html($header_menu_bg_custom_color); ?>;
		<!-- center logo transparent header ma issue kare che important -->
	}
	<?php
}
?>
/**
 * 0. Sticky menu bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $sticky_header_menu_bg_color=='custom' && !empty($sticky_header_menu_bg_custom_color) ){
	?>
	.is_stuck.themestek-sticky-bgcolor-custom,
	.is_stuck .themestek-sticky-bgcolor-custom{
		background-color:<?php echo esc_html($sticky_header_menu_bg_custom_color); ?> !important;
	}
	<?php
}
?>
/**
 * 0. List style special style
 * ----------------------------------------------------------------------------
 */
.wpb_row .vc_tta.vc_general.vc_tta-color-white:not(.vc_tta-o-no-fill) .vc_tta-panel-body .wpb_text_column{
	color:<?php echo esc_html($general_font['color']); ?>;
}
/**
 * 0. Page loader css
 * ----------------------------------------------------------------------------
 */
<?php if( function_exists('themestek_get_page_loader_css') ) { echo themestek_get_page_loader_css(); } ?>
/**
 * 0. Floating bar
 * ----------------------------------------------------------------------------
 */
<?php echo themestek_floatingbar_inline_css(); ?>
/* This is Titlebar Background color */
<?php if( $titlebar_bg_color=='custom' && !empty($titlebar_bg_custom_color['rgba']) ) : ?>
.themestek-titlebar-wrapper .themestek-titlebar-inner-wrapper{
	background-color: <?php echo esc_html( $titlebar_bg_custom_color['rgba'] ); ?>;
}
.themestek-titlebar-wrapper{
	background-color:  <?php echo esc_html( $titlebar_bg_custom_color['rgba'] ); ?>;
}
<?php endif; ?>
.themestek-header-overlay .themestek-titlebar-wrapper .themestek-titlebar-inner-wrapper{	
	padding-top: <?php echo esc_html($header_height); ?>px;
}
/* This is Titlebar Text color */
<?php if( $titlebar_text_color=='custom' && !empty($titlebar_text_custom_color) ): ?>
.themestek-titlebar-wrapper .themestek-titlebar-main h1.entry-title{
	color: <?php echo esc_html($titlebar_text_custom_color); ?> !important;
}
.themestek-titlebar-wrapper .themestek-titlebar-main h3.entry-subtitle{
	color: <?php echo esc_html($titlebar_subheading_text_custom_color); ?> !important;
}
.themestek-titlebar-main .breadcrumb-wrapper, .themestek-titlebar-main .breadcrumb-wrapper a:hover{ /* Breadcrumb */
	color: rgba( <?php echo themestek_hex2rgb($titlebar_breadcrumb_text_custom_color); ?> , 1) !important;
}
.themestek-titlebar-main .breadcrumb-wrapper a{ /* Breadcrumb */
	color: rgba( <?php echo themestek_hex2rgb($titlebar_breadcrumb_text_custom_color); ?> , 0.7) !important;
}
<?php endif; ?>
.themestek-titlebar-wrapper .themestek-titlebar-inner-wrapper{
	height: <?php echo esc_html($titlebar_height); ?>px;	
}
.themestek-header-overlay .themestek-titlebar-wrapper .themestek-titlebar-inner-wrapper{	
	padding-top: <?php echo esc_html(($header_height+30)); ?>px;
}
.themestek-header-style-3.themestek-header-overlay .themestek-titlebar-wrapper .themestek-titlebar-inner-wrapper{
	padding-top: <?php echo esc_html(($header_height+55)) ?>px;
}
/* Logo Max-Height */
.headerlogo img{
    max-height: <?php echo esc_html($logoMaxHeight); ?>px;
}
.is_stuck .headerlogo img{
    max-height: <?php echo esc_html($logoMaxHeightSticky); ?>px;
}
span.themestek-sc-logo.themestek-sc-logo-type-image {
    position: relative;
	display: block;
	z-index: 1;
}
/**
 * Topbar Background color
 * ----------------------------------------------------------------------------
 */
<?php if( $topbar_text_color=='custom' && !empty($topbar_text_custom_color) ): ?>
	.site-header .themestek-topbar{
		color: rgba( <?php echo themestek_hex2rgb($topbar_text_custom_color); ?> , 0.7);
	}
	.themestek-topbar-textcolor-custom .social-icons li a{
		  border: 1px solid rgba( <?php echo themestek_hex2rgb($topbar_text_custom_color); ?> , 0.7);
	}
	.site-header .themestek-topbar a{
		color: rgba( <?php echo themestek_hex2rgb($topbar_text_custom_color); ?> , 1);
	}
<?php endif; ?>
<?php if( $topbar_bg_color=='custom' && !empty($topbar_bg_custom_color) ) : ?>
	.site-header .themestek-topbar{
		background-color: <?php echo esc_html($topbar_bg_custom_color); ?>;
	}
<?php endif; ?>
<?php
if( !empty($topbar_breakpoint) && trim($topbar_breakpoint)!='all' ){
	if( esc_html($topbar_breakpoint)=='custom' ) {
		$topbar_breakpoint = ( !empty($topbar_breakpoint_custom) ) ?  trim($topbar_breakpoint_custom) : '1200' ;
	}
?>
/* Show/hide topbar in some devices */
	@media (max-width: <?php echo esc_html($topbar_breakpoint); ?>px){
		.themestek-pre-header-wrapper{
			display: none !important;
		}
	}
	<?php
}
?>
.widget .search-form .search-field:focus, 
.main-holder .site #content table.cart td.actions .input-text:focus, 
textarea:focus, input[type="text"]:focus, input[type="password"]:focus, 
input[type="datetime"]:focus, input[type="datetime-local"]:focus, 
input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, 
input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, 
input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, 
input[type="color"]:focus, input.input-text:focus, 
select:focus{
	border-color: <?php echo esc_html($skincolor); ?>;
}
/* Dynamic main menu color applying to responsive menu link text */
.header-controls .search_box i.tsicon-fa-search,
.righticon i,
.menu-toggle i,
.header-controls a{
    color: rgba( <?php echo esc_html( themestek_hex2rgb($mainMenuFontColor) ); ?> , 1) ;
}
.menu-toggle i:hover,
.header-controls a:hover {
    color: <?php echo esc_html($skincolor); ?> !important;
}
<?php if( !empty($dropdownmenufont['color']) ) : ?>
	.themestek-mmmenu-override-yes  #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget div{
		color: rgba( <?php echo themestek_hex2rgb($dropdownmenufont['color']); ?> , 0.8);
		font-weight: normal;
	}
<?php endif; ?>
/*Logo Color --------------------------------*/ 
h1.site-title{
	color: <?php echo esc_html($logo_font['color']); ?>;
}
/**
 * Heading Elements
 * ----------------------------------------------------------------------------
 */
.themestek-textcolor-skincolor h1,
.themestek-textcolor-skincolor h2,
.themestek-textcolor-skincolor h3,
.themestek-textcolor-skincolor h4,
.themestek-textcolor-skincolor h5,
.themestek-textcolor-skincolor h6,
.themestek-textcolor-skincolor .themestek-vc_cta3-content-header h2{
	color: <?php echo esc_html($skincolor); ?> !important;
}
.themestek-textcolor-skincolor .themestek-vc_cta3-content-header h4{
	color: rgba( <?php echo themestek_hex2rgb($skincolor); ?> , 0.90) !important;
}
.themestek-textcolor-skincolor .themestek-vc_cta3-content .themestek-cta3-description{
	color: rgba( <?php echo themestek_hex2rgb($skincolor); ?> , 0.60) !important;
}
.themestek-textcolor-skincolor{
	color: rgba( <?php echo themestek_hex2rgb($skincolor); ?> , 0.60);
}
.themestek-textcolor-skincolor a{
	color: rgba( <?php echo themestek_hex2rgb($skincolor); ?> , 0.80);
}
/**
 * Floating Bar
 * ----------------------------------------------------------------------------
 */
<?php
if( !empty($fbar_breakpoint) && trim($fbar_breakpoint)!='all' ){
	if( esc_html($fbar_breakpoint)=='custom' ) {
		$fbar_breakpoint = ( !empty($fbar_breakpoint_custom) ) ?  trim($fbar_breakpoint_custom) : '1200' ;
	}
?>
/* Show/hide topbar in some devices */
@media (max-width: <?php echo esc_html($fbar_breakpoint); ?>px){
	.themestek-fbar-btn,
	    .themestek-fbar-box-w{
			display: none !important;
		}
	}
	<?php
}
?>
/**
 * 1. Textcolor
 * ----------------------------------------------------------------------------
 */
/*** Liviza Special ***/
.sidebar .widget_archive li:hover *,
.sidebar .widget_archive li:hover a,
.sidebar .widget_archive li:hover:before,

.themestek-social-share-links ul li a,
.themestek-news-title:before,

ul.liviza_contact_widget_wrapper li:before,
.themestek-vc_general.themestek-vc_btn3.themestek-vc_btn3-style-flat span, 
.themestek-box-blog-classic .themestek-readmore-link a, 
.themestek-box-blog-classic .entry-content a.more-link,
.themestek-box-blog .ts-blogbox-readmore a, .themestek-box-service .themestek-vc_btn3 a, 
.themestek-ihbox .themestek-vc_general.themestek-vc_btn3:not(.themestek-vc_btn3-icon-right),

.themestek-servicebox-style-1:hover .ts-ihbox-icon i,
.themestek-portfoliobox-style-1 .themestek-box-link a,
.themestek-testimonialbox-style-2 .themestek-box-title,
.themestek-entry-meta-wrapper .themestek-meta-line a:hover,
.themestek-entry-meta-wrapper .themestek-meta-line i,

.themestek-boxes-testimonial-style-2 .slick-dots .themestek-slick-num,
.themestek-testimonialbox-style-2 .themestek-box-title .themestek-box-footer,

.themestek-teambox-style-1 .themestek-box-title .themestek-title a:hover,

.themestek-ihbox-style-3 .themestek-vc_general.themestek-vc_btn3:hover,
.themestek-coachingbox-style-2 .ts-ihbox-icon i:before,
.themestek-ptablebox-style-1 .themestek-ptable-price,
.themestek-ptablebox-style-1 .themestek-ptable-cur-symbol-after,

.themestek-blogbox-style-2 .themestek-box-title .themestek-title a:hover,
.themestek-blogbox-style-1 .themestek-box-title .themestek-title a:hover,
.themestek-blogbox-style-3 .themestek-box-title .themestek-title a:hover,


.single-mp-event .timeslot-link,
.themestek-box-blog-classic .themestek-entry-meta-wrapper .themestek-meta-line a:hover,
.themestek-box-blog-classic .themestek-readmore-link a:hover,
.themestek-box-blog-classic .entry-content a.more-link:hover,
.themestek-box-blog .ts-blogbox-readmore a:hover,
.mptt-shortcode-wrapper .mptt-shortcode-table tbody .mptt-event-container .event-title,
.themestek-teambox-style-2 .themestek-box-team-position,
.themestek-team-member-single-content-wrapper .themestek-box-team-position h5,


.trackback .themestek-comment-owner a:hover,
.pingback .themestek-comment-owner a:hover,
.comment-meta .themestek-comment-owner a:hover,
ul.themestek-recent-post-list > li .post-date,
.themestek-headerstyle-classic .themestek-pre-header-wrapper:not(.themestek-bgcolor-skincolor) .top-contact i,
.themestek-firstlater p:first-letter,

/* Text color skin in row secion*/
.comment-reply-title small a:hover,
.themestek-vc_btn3-style-outline.themestek-vc_btn3-color-skincolor,
.themestek-skincolor,
.themestek-icon-skincolor i,
.themestek-background-image.themestek-row-textcolor-skin h1, 
.themestek-background-image.themestek-row-textcolor-skin h2, 
.themestek-background-image.themestek-row-textcolor-skin h3, 
.themestek-background-image.themestek-row-textcolor-skin h4, 
.themestek-background-image.themestek-row-textcolor-skin h5, 
.themestek-background-image.themestek-row-textcolor-skin h6,
.themestek-background-image.themestek-row-textcolor-skin .themestek-element-heading-wrapper h2,
.themestek-background-image.themestek-row-textcolor-skin .themestek-reviews-title,
.themestek-background-image.themestek-row-textcolor-skin a,
.themestek-background-image.themestek-row-textcolor-skin .item-content a:hover,
.themestek-row-textcolor-skin h1, 
.themestek-row-textcolor-skin h2, 
.themestek-row-textcolor-skin h3, 
.themestek-row-textcolor-skin h4, 
.themestek-row-textcolor-skin h5, 
.themestek-row-textcolor-skin h6,
.themestek-row-textcolor-skin .themestek-element-heading-wrapper h2,
.themestek-row-textcolor-skin .themestek-reviews-title,
.themestek-row-textcolor-skin a,
.themestek-row-textcolor-skin .item-content a:hover,
.themestek-vc_icon_element-color-skincolor{
	color: <?php echo esc_html($skincolor); ?>;
}
.themestek-subheading-skincolor{
	color: <?php echo esc_html($skincolor); ?> !important;
}

/**
 * 2. Second Skin Textcolor
 * ----------------------------------------------------------------------------
 */
.themestek-testimonialbox-style-1 .themestek-box-star i.themestek-active{
	color:  <?php echo esc_attr($secondskincolor); ?>;
}

/**
 * 3. Background
 * ----------------------------------------------------------------------------
 */

/*** Liviza Special ***/
.themestek-pf-single-content-bottom .themestek-pf-single-category-w a:hover,
.single-post .themestek-meta-info-bottom-left a:hover,
.themestek-search-form-tabs-w .themestek-search-form-tab.themestek-search-form-tab-current a span,
.themestek-vc_btn3-color-black.themestek-vc_general.themestek-vc_btn3.themestek-vc_btn3-style-outline:not(.themestek-vc_btn3-icon-right):not(.themestek-vc_btn3-icon-left):hover,
.themestek-ihbox-style-1,
.themestek-coachingbox-style-2 .themestek-box-content:hover,
blockquote,
.themestek-servicebox-style-2 .ts-ihbox-icon,
.themestek-coachingbox-style-1 .ts-ihbox-icon,
.themestek-blogbox-style-2 .themestek-meta-date .themestek-date,
.themestek-teambox-style-1 .themestek-team-share,

.themestek-teambox-style-1 .themestek-team-social-links li a,
.themestek-col-bgcolor-darkgrey .themestek-ihbox-style-3 .themestek-ihbox-inner:after,
.themestek-ihbox-style-2 .themestek-ihbox-icon-wrapper,
.sidebar .themestek-downloadbox.widget,
.themestek-entry-meta-wrapper .themestek-meta-line:before,
.themestek-box-blog-classic .themestek-blog-date,
.themestek-textcolor-white .themestek-boxes-view-carousel .slick-arrow:hover,
.themestek-image-caption .themestek-single-image-caption-text,
.widget_categories ul li a:hover > span,
.themestek-ihbox-style-5 .themestek-ihbox-table:before,
.footer .social-icons li > a:hover,
.themestek-vc_btn3.themestek-vc_btn3-color-black.themestek-vc_btn3-style-flat:hover,
.themestek-timeline-bottom h3:after,
.themestek-bgcolor-white .themestek-ptablebox-featured-col .themestek-ptablebox-style-1,
.themestek-textcolor-white .themestek-ptablebox-featured-col .themestek-ptablebox-style-1,
.themestek-pf-single-style-1 .project-details-top,
.single-service-contact .single-service-contact-inner,
.widget.themestek_widget_list_all_posts ul .themestek-post-active a,
.widget.themestek_widget_list_all_posts ul > li a:hover,
.themestek-bg-effect .vc_single_image-wrapper:after,
.site-footer .sidebar-container.themestek-textcolor-white .tagcloud a:hover,
.themestek-ptablebox-featured-col .themestek-ptablebox-style-1 .themestek-vc_btn3.themestek-vc_btn3-color-inverse.themestek-vc_btn3-style-flat,
.themestek-ptablebox-style-1 .themestek-vc_btn3.themestek-vc_btn3-color-inverse.themestek-vc_btn3-style-flat:hover,
.themestek-pagination .page-numbers.current, 
.themestek-pagination .page-numbers:hover,
.comments-pagination .page-numbers.current, 
.comments-pagination .page-numbers:hover,
.themestek-header-wc-cart-link .number-cart,
.ts-tab-box-skincolor .vc_tta-container,
.themestek-portfoliobox-style-1 .themestek-icon-btn,
.ts-footer-contact .themestek-vc_icon_element,
.themestek-team-member-single-content-wrapper .themestek-team-social-links li a,
.themestek-teambox-style-2 .themestek-team-social-links li a:hover,
.themestek-teambox-style-3 .themestek-team-social-links li a:hover,
.themestek-blogbox-style-1 .themestek-meta-date,
.themestek-ihbox-style-6 .ts-ihbox-icon-wrapper,
.themestek-blogbox-style-3.themestek-box-blog .themestek-meta-date,
body .site-footer .widget .widget-title:after,
.site-footer .mc4wp-form-fields button,

/*** End ***/
.nav-links .nav-next a:hover span:before,
.nav-links .nav-previous a:hover span:before,
.themestek-search-form-wrapper,
.wp-block-button__link,
.post.sticky:after,

.comment-body .reply a:hover,
.themestek-header-overlay .site-header.themestek-sticky-bgcolor-skincolor.is_stuck,
.site-header-menu.themestek-sticky-bgcolor-skincolor.is_stuck,
.themestek-header-style-infostack .site-header .themestek-stickable-header.is_stuck.themestek-sticky-bgcolor-skincolor,
.is_stuck.themestek-sticky-bgcolor-skincolor,

.themestek-bgcolor-skincolor,
.themestek-skincolor-bg,
.themestek-col-bgcolor-skincolor .themestek-bg-layer-inner,
.themestek-bgcolor-skincolor > .themestek-bg-layer,
footer#colophon.themestek-bgcolor-skincolor > .themestek-bg-layer,
.themestek-titlebar-wrapper.themestek-bgcolor-skincolor .themestek-titlebar-wrapper-bg-layer,
.themestek-titlebar-wrapper.themestek-breadcrumb-on-bottom .themestek-titlebar .breadcrumb-wrapper .container,
.sidebar h3.widget-title:before,
.sidebar h3.widget-title:after,

mark, 
ins,
.tagcloud a:hover,
.themestek_prettyphoto .vc_single_image-wrapper:after, 
#totop,
.themestek-commonform input[type="submit"],
.themestek-sortable-list .themestek-sortable-link a:hover,
.themestek-sortable-list .themestek-sortable-link a.selected,

.themestek-box-portfolio.themestek-box-view-overlay .themestek-icon-box:hover,
.themestek-vc_icon_element-background-color-skincolor,
.footer .widget-title:after,
.themestek-vc_general.themestek-vc_btn3.themestek-vc_btn3-color-skincolor.themestek-vc_btn3-style-outline:hover,
.themestek-vc_general.themestek-vc_btn3.themestek-vc_btn3-color-skincolor:not(.themestek-vc_btn3-style-text):not(.themestek-vc_btn3-style-outline),
.vc_progress_bar.vc_progress-bar-color-skincolor .vc_single_bar .vc_bar,
 button, input[type="submit"],
.themestek-col-bgcolor-skincolor {
	background-color: <?php echo esc_html($skincolor); ?>;
}

body table.booked-calendar td.today:hover .date span,
#ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td.ui-datepicker-today a, 
ui-datepicker-div.booked_custom_date_picker table.ui-datepicker-calendar tbody td.ui-datepicker-today a:hover, 
body #booked-profile-page input[type=submit].button-primary, 
body table.booked-calendar input[type=submit].button-primary, 
body .booked-list-view button.button, 
body .booked-list-view input[type=submit].button-primary, body .booked-list-view button.button, 
body .booked-list-view input[type=submit].button-primary, 
body .booked-modal input[type=submit].button-primary, 
body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button, 
body #booked-profile-page .booked-profile-appt-list .appt-block.approved .status-block, 
body #booked-profile-page .appt-block .google-cal-button > a, 
body .booked-modal p.booked-title-bar, 
body table.booked-calendar td:hover .date span, 
body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active, 
body .booked-list-view a.booked_list_date_picker_trigger.booked-dp-active:hover, 
.booked-ms-modal .booked-book-appt,
body table.booked-calendar thead tr:first-child th,
.ts-bt-skincolor{
	background-color: <?php echo esc_attr($skincolor); ?> !important;
}
.themestek-servicebox-style-1:hover .themestek-box-content{
	background-color: rgba( <?php echo themestek_hex2rgb($skincolor); ?> , 0.80);
}
.themestek-element-heading-wrapper h2.themestek-custom-heading:after{
	background: linear-gradient(to right,<?php echo esc_html($skincolor); ?> 0%,<?php echo esc_html($skincolor); ?> 65%,rgba(255,255,255,0) 65%,rgba(255,255,255,0) 71%,rgba(<?php echo themestek_hex2rgb($skincolor); ?> , 0.50) 71%);
}

/*** End ***/
/**
 * 4. Second Screen  Background Color
 * ----------------------------------------------------------------------------
 */
.test1:after{   
    background-color:  <?php echo esc_attr($secondskincolor); ?>;
}
.test1{
	background-color: rgba( <?php echo themestek_hex2rgb($secondskincolor); ?> , 0.40);
}

/*** End ***/

/**
 * 5. Background with opacity
 * ----------------------------------------------------------------------------
 */
/*** Liviza Special ***/
.themestek-teambox-style-4 .themestek-box-content,
.themestek-teambox-style-2 .themestek-item-thumbnail:before{
	background-color: rgba( <?php echo themestek_hex2rgb($skincolor); ?> , 0.80);
}
/*** End ***/
/**
 * 6. Tabs and Accordion
 * ----------------------------------------------------------------------------
 */
/******** Tab style ********/
/* Tab flat style */
.wpb-js-composer .vc_tta-style-flat.vc_tta-color-skincolor .vc_tta-tab>a,
.wpb-js-composer .vc_tta-style-flat.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-heading,
.wpb-js-composer .vc_tta-style-flat.vc_tta-color-skincolor .vc_tta-panel.vc_active .vc_tta-panel-heading,
.wpb-js-composer .vc_tta-style-flat.vc_tta-color-skincolor .vc_tta-tab>a:focus, 
.wpb-js-composer .vc_tta-style-flat.vc_tta-color-skincolor .vc_tta-tab>a:hover,
.wpb-js-composer .vc_tta-style-flat.vc_tta-color-skincolor .vc_tta-tab.vc_active>a,
/* Tab modern style */
.wpb-js-composer .vc_tta-style-modern.vc_tta-color-skincolor .vc_tta-tab>a, 
.wpb-js-composer .vc_tta-style-modern.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-heading,
/* Tab classic style */
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab.vc_active > a, 
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab > a:focus,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab > a:hover,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab.vc_active > a,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-panel.vc_active .vc_tta-panel-title>a{
	background-color: <?php echo esc_html($skincolor); ?>;
}
.wpb-js-composer .vc_tta-style-flat.vc_tta-color-skincolor:not(.vc_tta-o-no-fill) .vc_tta-panel .vc_tta-panel-body{
	background-color: rgba( <?php echo themestek_hex2rgb($skincolor); ?> , 0.80);
}
/*** Tab outline style ***/
.wpb-js-composer .vc_tta-container  .vc_tta-style-outline.vc_tta.vc_general.vc_tta-color-skincolor .vc_tta-tab.vc_active>a {
    border-color: <?php echo esc_html($skincolor); ?>;    
    color: <?php echo esc_html($skincolor); ?>;
}
.wpb-js-composer .vc_tta-style-outline.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-heading,
.wpb-js-composer .vc_tta-style-outline.vc_tta-color-skincolor .vc_tta-tab>a {
    border-color: <?php echo esc_html($skincolor); ?>;    
    color: <?php echo esc_html($skincolor); ?>;
}
.wpb-js-composer .vc_tta-style-outline.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-heading:hover,
.wpb-js-composer .vc_tta-style-outline.vc_tta-color-skincolor .vc_tta-tab>a:focus, 
.wpb-js-composer .vc_tta-style-outline.vc_tta-color-skincolor .vc_active .vc_tta-tab>a:hover{
	background-color: <?php echo esc_html($skincolor); ?>;
}
.themestek-headerstyle-classic.themestek-slider-yes #themestek-home,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab>a:focus, 
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab>a:hover {
    background-color: <?php echo esc_html($skincolor); ?>;
}
.wpb-js-composer .vc_tta-style-outline.vc_tta-color-skincolor .vc_tta-panel.vc_active .vc_tta-panel-title>a{
	color: <?php echo esc_html($skincolor); ?>;
}
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline:not(.vc_tta-o-no-fill) .vc_tta-panel .vc_tta-panel-body,
.wpb-js-composer .vc_tta-accordion.vc_tta-style-outline.vc_tta-color-skincolor .vc_tta-panel.vc_active .vc_tta-panel-heading{
 	border-color: <?php echo esc_html($skincolor); ?>;    
}

/******** Accordion style ********/
/* Tab classic style */
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-classic:not(.vc_tta-o-no-fill) .vc_tta-panel .vc_tta-panel-body {
    background-color: <?php echo esc_html($skincolor); ?>;
}
.wpb-js-composer .vc_tta-accordion.vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-panel.vc_active .vc_tta-panel-heading,
.wpb-js-composer .vc_tta-accordion.vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-heading:focus, 
.wpb-js-composer .vc_tta-accordion.vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-heading:hover {
	background-color: <?php echo esc_html($skincolor); ?>;
}

/**
 * Border color
 * ----------------------------------------------------------------------------
 */
.themestek-box:not(.themestek-servicebox-style-2) .themestek-vc_btn3 a:after,
.themestek-header-style-overlaybox .themestek-vc_btn3 span:after,
.themestek-box-blog-classic .themestek-readmore-link a:after,
.themestek-box-blog-classic .entry-content a.more-link:after,
.themestek-box-blog .ts-blogbox-readmore a:after,
.themestek-box-coaching .themestek-vc_btn3 a:after,
.themestek-ihbox .themestek-vc_general.themestek-vc_btn3:not(.themestek-vc_btn3-icon-right):after,


.themestek-servicebox-style-1:hover .themestek-box-content,
.themestek-vc_btn3-style-outline.themestek-vc_btn3-color-skincolor:not(.themestek-vc_btn3-style-text),
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-modern .vc_tta-tab>a{
	border-color: <?php echo esc_html($skincolor); ?>;
}
.main-form .select2-container--default .select2-selection--single .select2-selection__arrow b {
    border-color: <?php echo esc_html($skincolor); ?> transparent transparent transparent;
}
.main-form  .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
    border-color: transparent transparent <?php echo esc_html($skincolor); ?> transparent;
    border-width: 0 4px 5px 4px;
}

/* Progress Bar Section */
.vc_progress_bar .vc_general.vc_single_bar.vc_progress-bar-color-skincolor span.themestek-vc_label_units.vc_label_units:before,
span.themestek-vc_label_units.vc_label_units:before{ 
	border-color: <?php echo esc_html($skincolor); ?> transparent; 
}

.themestek-seperator-solid .themestek-vc_general.themestek-vc_cta3 .themestek-vc_cta3-content-header:before,
.themestek-box-effect,
.themestek-search-overlay input[type="search"],
.nav-links .nav-next:before, 
.nav-links .nav-previous:before{
	border-bottom-color: <?php echo esc_html($skincolor); ?>; 
}

/*** Liviza Special ***/
.ts-playeffect .themestek-vc_icon_element-inner{
    box-shadow: 0 0 0 0 rgba( <?php echo themestek_hex2rgb($skincolor); ?> , 0.80);
}
.themestek-image-caption .themestek-single-image-caption-text:after{
	border-top-color: <?php echo esc_html($skincolor); ?>;
}
.themestek-timeline-bottom{
	border-top-color: <?php echo esc_html($skincolor); ?>; 
}
.single-service-contact .single-service-contact-inner:after {
	border-right-color: <?php echo esc_html($skincolor); ?>;
}
.post.sticky{
	border-color: <?php echo esc_html($skincolor); ?>;
}

/************************ Mega Main Menu **************************/  
ul.nav-menu li ul li a, 
div.nav-menu > ul li ul li a, 
.themestek-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a{
	opacity: 0.95;
}

#site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_ancestor > a, 
#site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a, 
#site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_parent > a, 
#site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a, 
#site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-parent > a, 
#site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a, 
#site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a,
#site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-ancestor > a{
	opacity: 1;
}
<?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>
	/* Dropdown Menu Active Link Color -------------------------------- */   
	.themestek-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_ancestor > a,
	.themestek-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a,
	.themestek-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-item > a,
	.themestek-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_parent > a, 
	.themestek-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a, 
	.themestek-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-parent > a,       
	.themestek-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,    
	.themestek-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a,    
	.themestek-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-ancestor > a {
	    color: <?php echo esc_html($dropmenu_active_link_custom_color); ?>;
	}
<?php } ?>

/************************ End Mega Main Menu **************************/  

/************************ Woocommece and bbPress **************************/ 
#bbpress-forums li.bbp-header,
#bbpress-forums .bbp-search-form input[type="submit"]:hover,
.ts-header-icons .ts-header-wc-cart-link span.number-cart,
.woocommerce button.button.alt.disabled,
.woocommerce button.button.alt:disabled,
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce .woocommerce-message  .button,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:before,
.woocommerce div.product .woocommerce-tabs ul.tabs li a,
.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt{
	background: <?php echo esc_attr($skincolor); ?>;
}
.woocommerce-info,
.woocommerce-message{
	border-top-color: <?php echo esc_attr($skincolor); ?>; 
}
.woocommerce ul.products li.product a:hover,
.woocommerce ul.product_list_widget li a:hover h2,
.woocommerce .star-rating span,
.woocommerce-info::before,
.woocommerce-message::before{
	color: <?php echo esc_attr($skincolor); ?>;
}
.woocommerce-pagination ul li a:hover,
.woocommerce-pagination ul li span,
.woocommerce nav.woocommerce-pagination ul li a:focus,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current{
   background: <?php echo esc_attr($skincolor); ?>;
   border-color: <?php echo esc_attr($skincolor); ?>; 
}





/* ********************* Responsive Menu Code Start *************************** */
<?php
/*
 *  Generate dynamic style for responsive menu. The code with breakpoint.
 */
require_once( get_template_directory() .'/css/theme-menu-style.php' ); // Functions
?>
/* ********************** Responsive Menu Code END **************************** */
/******************************************************/
/******************* Custom Code **********************/
<?php
// We are not escaping / sanitizing as we are expecting css code. 
$custom_css_code = themestek_get_option('custom_css_code');
if( !empty($custom_css_code) ){
	$custom_css_code = str_replace( '&gt;', '>', $custom_css_code);
	$custom_css_code = str_replace( '&gt;', '>', $custom_css_code);
	$custom_css_code = str_replace( '&gt;', '>', $custom_css_code);
	$custom_css_code = str_replace( '&gt;', '>', $custom_css_code);
	$custom_css_code = str_replace( '&gt;', '>', $custom_css_code);
	echo trim($custom_css_code);
}
?>

.themestek-servicebox-style-1:before {
    border-top: 1px solid <?php echo esc_attr($skincolor); ?>;
	border-bottom: 1px solid <?php echo esc_attr($skincolor); ?>;
}
.themestek-servicebox-style-1:after {
    border-right: 1px solid <?php echo esc_attr($skincolor); ?>;
    border-left: 1px solid <?php echo esc_attr($skincolor); ?>;
}
/******************************************************/
 