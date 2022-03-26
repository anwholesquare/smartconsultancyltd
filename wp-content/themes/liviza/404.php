<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Liviza
 * @since Liviza 1.0
 */
get_header(); ?>
	<div id="primary" class="content-area <?php echo themestek_sanitize_html_classes(themestek_sidebar_class('content-area')); ?>">
		<main id="main" class="site-main">
			<section class="error-404 not-found">
				<?php echo themestek_wp_kses( themestek_404_icon() ); ?>
				<?php echo themestek_wp_kses( themestek_404_above_heading_text() ); ?>
				<?php echo themestek_wp_kses( themestek_404_heading() ); ?>
				<?php echo themestek_wp_kses( themestek_404_big_image() ); ?>
				<?php echo themestek_wp_kses( themestek_404_description() ); ?>
				<?php if( themestek_get_option('error404_search')==true ): ?>
				<div class="themestek-404-search-form">
					<?php get_search_form(); ?>
				</div><!-- .themestek-404-search-form -->
				<?php endif; ?>
			</section><!-- .error-404 -->
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>
