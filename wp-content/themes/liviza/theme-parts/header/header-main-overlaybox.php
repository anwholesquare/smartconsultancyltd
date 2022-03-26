<div id="themestek-stickable-header-w" class="themestek-stickable-header-w" style="height:<?php echo themestek_get_option('header_height'); ?>px">
	<div id="site-header" class="site-header <?php echo themestek_sanitize_html_classes(themestek_header_class()); ?>  <?php echo themestek_sanitize_html_classes(themestek_sticky_header_class()); ?>">

		<div class="container">
			<div class="site-header-main themestek-table">

				<div class="themestek-bgcolor-<?php echo themestek_get_option('header_bg_color'); ?> ">
					<div class="site-branding themestek-table-cell">
						<?php echo themestek_wp_kses( themestek_site_logo() ); ?>
					</div><!-- .site-branding -->

					<div id="site-header-menu" class="site-header-menu themestek-table-cell">
						<?php echo themestek_wp_kses( themestek_header_links(), 'header_links' ); ?>
						<nav id="site-navigation" class="main-navigation" aria-label="Primary Menu" data-sticky-height="<?php echo esc_html(themestek_get_option('header_height_sticky')); ?>">
							<?php get_template_part('theme-parts/header/header','menu'); ?>
						</nav><!-- .main-navigation -->						
					</div><!-- .site-header-menu -->
				</div>

				<div class="themestek-header-right">
					<?php echo themestek_wp_kses( themestek_header_button() ); ?>											
				</div>

			</div><!-- .site-header-main -->

		</div>

	</div>
</div>

