<?php if( themestek_topbar_show() ) : ?>
<div class="themestek-pre-header-wrapper <?php echo themestek_sanitize_html_classes(themestek_topbar_classes()); ?>">
	<div class="themestek-pre-header-inner">
		<div class="<?php echo themestek_sanitize_html_classes(themestek_topbar_container_class()); ?>">
			<?php echo themestek_wp_kses( themestek_topbar_content(), 'topbar' ); ?>  
		</div>
	</div>
</div>
<?php endif;  // themestek_topbar_show() ?>
