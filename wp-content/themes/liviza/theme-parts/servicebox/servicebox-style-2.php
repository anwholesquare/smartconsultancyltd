<article class="themestek-box themestek-box-service themestek-servicebox-style-2">
	<div class="themestek-post-item">
		<?php echo themestek_featured_image('themestek-img-800x533'); ?>
		<div class="themestek-box-content">
            <div class="themestek-box-content-inner">
					<div class="ts-ihbox-icon">
						<?php themestek_service_icon(); ?>
					</div>
				 <div class="themestek-des">
					<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php if( has_excerpt() ) : ?>
					<div class="themestek-service-content"><?php the_excerpt(); ?></div>
					<?php endif; ?>	
					<div class="themestek-box-link themestek-vc_btn3">
						<a class="themestek-vc_general themestek-vc_btn3 themestek-vc_btn3-size-md themestek-vc_btn3-shape-rounded themestek-vc_btn3-style-outline themestek-vc_btn3-weight-no themestek-vc_btn3-color-black" href="<?php echo get_permalink(); ?>"><span><?php esc_attr_e('Read More', 'liviza'); ?></span></a>
					</div>
				</div>
			</div>		
		</div>
	</div>
</article>