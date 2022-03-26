<div id="site-header" class="site-header <?php echo themestek_sanitize_html_classes(themestek_header_class()); ?>">
	<div class="site-header-main themestek-table">
		<div class="themestek-header-top-wrapper <?php echo themestek_sanitize_html_classes(themestek_header_container_class()); ?>">

			<div class="themestek-header-top-wrapper-inner">

				<div class="site-branding">
					<?php echo themestek_site_logo(); ?>
				</div><!-- .site-branding -->
				<div class="themestek-infostack-right-content">
					<div class="info-widget">
						<div class="info-widget-inner">
							<?php echo themestek_wp_kses( do_shortcode( themestek_get_option('infostack_first_box') ) ); ?>
						</div>
					</div>
					<div class="info-widget">
						<div class="info-widget-inner">
							<?php echo themestek_wp_kses( do_shortcode( themestek_get_option('infostack_second_box') ) ); ?>
						</div>
					</div>
					<div class="info-widget">
						<div class="info-widget-inner">
							<?php echo themestek_wp_kses( do_shortcode( themestek_get_option('infostack_third_box') ) ); ?>
						</div>
					</div>

				</div>

			</div>

		</div><!-- .themestek-header-top-wrapper -->
		<div id="themestek-stickable-header-w" class="themestek-stickable-header-w themestek-bgcolor-<?php echo themestek_get_option('header_bg_color'); ?>" style="height:<?php echo themestek_header_menuarea_height(); ?>px">
			<div id="site-header-menu" class="site-header-menu container">
				<div class="site-header-menu-inner  <?php echo sanitize_html_class(themestek_sticky_header_class()); ?> <?php echo themestek_sanitize_html_classes(themestek_header_menu_class()); ?>">
					<div class="site-header-menu-middle <?php echo themestek_sanitize_html_classes(themestek_header_menu_class()); ?>">
						<div class="<?php echo themestek_sanitize_html_classes(themestek_header_container_class()); ?> ">
								<nav id="site-navigation" class="main-navigation" aria-label="Primary Menu" data-sticky-height="<?php echo esc_html(themestek_get_option('header_height_sticky')); ?>">
									<?php get_template_part('theme-parts/header/header','menu'); ?>
								</nav><!-- .main-navigation -->
							<div class="themestek-header-right">
								<?php echo themestek_wp_kses( themestek_header_links(), 'header_links' ); ?>
								<?php echo themestek_wp_kses( themestek_header_button() ); ?>
							</div>
						</div>
					</div>
				</div>
				<?php // You can use like this too - themestek_fbar_btn(); ?>
			</div><!-- .site-header-menu -->
		</div>
	</div><!-- .site-header-main -->
</div>
