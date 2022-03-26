<?php if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('themestek-main-menu') ) : ?>
	<!-- Max Mega Menu is enabled so we are not showing our toggle menu -->
<?php else: ?>
<button id="menu-toggle" class="menu-toggle">
	<span class="themestek-hide"><?php esc_html_e( 'Toggle menu', 'liviza' ); ?></span><i class="themestek-liviza-icon-bars"></i>
</button>
<?php endif; ?>
<?php wp_nav_menu( array( 'theme_location' => 'themestek-main-menu', 'menu_class' => 'nav-menu', 'container_class' => 'nav-menu' ) ); ?>
