<header id="masthead" class="<?php echo themestek_header_style_class(); ?>">
	<div class="themestek-header-block <?php echo themestek_headerclass(); ?>">
		<?php get_template_part('theme-parts/header/header','search-form'); ?>
		<div id="themestek-stickable-header-w-main" class="themestek-stickable-header-w-main">
			<?php get_template_part('theme-parts/header/header','topbar'); ?>
			<?php get_template_part('theme-parts/header/header','main-overlay'); ?>
		</div>
		<?php get_template_part('theme-parts/header/header','titlebar'); ?>
		<?php get_template_part('theme-parts/header/header','slider'); ?>
	</div>
</header><!-- .site-header -->