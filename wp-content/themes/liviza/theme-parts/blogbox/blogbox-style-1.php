<article class="themestek-box themestek-box-blog themestek-blogbox-style-1 themestek-blogbox-format-<?php echo get_post_format() ?> <?php echo themestek_sanitize_html_classes(themestek_post_class()); ?>">
	<div class="post-item">
		<div class="themestek-blog-image-with-meta">
			<?php echo themestek_wp_kses( themestek_get_featured_media( '', 'themestek-img-800x533' ) ); // Featured content ?>
		</div>
		<div class="themestek-box-content">
			<?php echo themestek_entry_meta( array( 'author', 'date', 'cat' ) );  // blog post meta details ?>
			<?php echo themestek_box_title(); ?>
			<div class="themestek-box-desc-text">
				   	<P><?php echo themestek_blogbox_description(); ?></P>
			</div>
			<div class="ts-blogbox-readmore themestek-vc_btn3">
					<?php echo themestek_blogbox_readmore(); ?>
			</div>
		</div>
	</div>
</article>
