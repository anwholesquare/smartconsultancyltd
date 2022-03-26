<div id="themestek-stickable-header-w" class="themestek-stickable-header-w themestek-bgcolor-<?php echo themestek_get_option('header_bg_color'); ?>" style="height:<?php echo themestek_get_option('header_height'); ?>px">
	<div id="site-header" class="site-header <?php echo themestek_sanitize_html_classes(themestek_header_class()); ?> <?php echo themestek_sanitize_html_classes(themestek_sticky_header_class()); ?>">
		<div class="site-header-main themestek-table <?php echo themestek_sanitize_html_classes(themestek_header_container_class()); ?>">
			<div class="site-branding themestek-table-cell">
				<?php echo themestek_wp_kses( themestek_site_logo() ); ?>
			</div><!-- .site-branding -->
			<div id="site-header-menu" class="site-header-menu themestek-table-cell">
				<nav id="site-navigation" class="main-navigation" aria-label="Primary Menu" data-sticky-height="<?php echo esc_html(themestek_get_option('header_height_sticky')); ?>">
					<div class="themestek-header-right">
						<?php echo themestek_wp_kses( themestek_header_button() ); ?>
						<?php echo themestek_wp_kses( themestek_header_links(), 'header_links' ); ?>	
					</div>				
					<?php get_template_part('theme-parts/header/header','menu'); ?>
				</nav><!-- .main-navigation -->
			</div><!-- .site-header-menu -->
		</div><!-- .site-header-main -->
	</div>
</div>
