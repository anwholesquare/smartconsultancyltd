<article class="themestek-box themestek-box-blog themestek-blogbox-style-2 themestek-blogbox-format-<?php echo get_post_format() ?> <?php echo themestek_sanitize_html_classes(themestek_post_class()); ?>">
	<div class="post-item">
		<div class="themestek-blog-image-with-meta">
			<?php echo themestek_wp_kses( themestek_get_featured_media( '', 'themestek-img-800x533' ) ); // Featured content ?>
			<div class="themestek-meta-date">
			<span class="themestek-meta-line themestek-date">
					<?php echo get_the_date( 'M' ); ?> <span><?php echo get_the_date( 'd' ); ?></span>
				</span>
				</div>
		</div>
		<div class="themestek-box-content">
			<?php echo themestek_entry_meta( array( 'author', 'cat', 'comment' ) );  // blog post meta details ?>			
			<?php echo themestek_box_title(); ?>
			<div class="ts-blogbox-readmore themestek-vc_btn3">
					<?php echo themestek_blogbox_readmore(); ?>
			</div>
		</div>
	</div>
</article>
