<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}

// Body start code from our theme.. HTML Only
echo themestek_wp_kses( themestek_body_start_code() );

// correction for The Events Calendar
themestek_events_calendar_correction();
?>
<div id="themestek-home"></div>
<div class="main-holder">
	<div id="page" class="hfeed site">
		<?php get_template_part( 'theme-parts/header/headerstyle', esc_html(themestek_get_headerstyle()) ); ?>
		<div id="content-wrapper" class="site-content-wrapper">
			<?php if( is_404() ): ?>
			<div class="themestek-bg-layer"></div>
			<?php endif; ?>
			<div id="content" class="site-content <?php echo themestek_sanitize_html_classes(themestek_sidebar_class('container')); ?>">
				<div id="content-inner" class="site-content-inner <?php echo themestek_sanitize_html_classes(themestek_sidebar_class('row')); ?>">
			