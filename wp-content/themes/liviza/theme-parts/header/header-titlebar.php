<?php
$titlebar_content = themestek_titlebar_content();
if( themestek_titlebar_show() ) : ?>
	<?php if( !empty($titlebar_content) ){ ?>
		<div class="themestek-titlebar-wrapper themestek-bg <?php echo themestek_sanitize_html_classes(themestek_titlebar_classes()); ?>">
			<div class="themestek-titlebar-wrapper-bg-layer themestek-bg-layer"></div>
			<div class="themestek-titlebar entry-header">
				<div class="themestek-titlebar-inner-wrapper">
					<div class="themestek-titlebar-main">
						<div class="container">
							<div class="themestek-titlebar-main-inner">
								<?php echo themestek_wp_kses( $titlebar_content, 'titlebar' ); ?>
							</div>
						</div>
					</div><!-- .themestek-titlebar-main -->
				</div><!-- .themestek-titlebar-inner-wrapper -->
			</div><!-- .themestek-titlebar -->
		</div><!-- .themestek-titlebar-wrapper -->
	<?php } else { ?>
		<?php if( !is_404() ) : ?>
			<hr class="themestek-titlebar-border" />
		<?php endif; ?>
	<?php } ?>
<?php endif;  // themestek_titlebar_show() ?>
