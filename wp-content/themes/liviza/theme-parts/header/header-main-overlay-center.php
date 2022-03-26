<div id="site-header" class="site-header <?php echo themestek_sanitize_html_classes(themestek_header_class()); ?>">

		<div class="site-header-main themestek-table <?php echo themestek_sanitize_html_classes(themestek_header_container_class()); ?>">
			<div class="themestek-header-top-wrapper <?php echo themestek_sanitize_html_classes(themestek_header_container_class()); ?>">
				<div class="themestek-header-top-wrapper-inner">

					<?php $header_show_social = themestek_get_option('header_show_social');
					if( $header_show_social==true ) : ?>
					<div class="themestek-header-left">						
						<?php echo themestek_wp_kses( do_shortcode('[themestek-social-links]') ); ?>
					</div>
					<?php endif; ?>

					<div class="site-branding">
						<?php echo themestek_site_logo(); ?>
					</div><!-- .site-branding -->

					<div class="themestek-header-right">

						<?php echo themestek_wp_kses( themestek_header_button() ); ?>
					</div>

				</div>
			</div><!-- .themestek-header-top-wrapper -->
		</div><!-- .site-header-main -->

		<div id="themestek-stickable-header-w" class="themestek-stickable-header-w <?php echo sanitize_html_class(themestek_sticky_header_class()); ?> <?php echo themestek_sanitize_html_classes(themestek_header_menu_class()); ?>" style="height:<?php echo themestek_header_menuarea_height(); ?>px">

			<div id="site-header-menu" class="site-header-menu container">
				<nav id="site-navigation" class="main-navigation" aria-label="Primary Menu" data-sticky-height="<?php echo esc_html(themestek_get_option('header_height_sticky')); ?>">
					<?php get_template_part('theme-parts/header/header','menu'); ?>
				</nav><!-- .main-navigation -->

				<?php echo themestek_wp_kses( themestek_header_links(), 'header_links' ); ?>								

			</div><!-- .site-header-menu -->

		</div>

</div>
