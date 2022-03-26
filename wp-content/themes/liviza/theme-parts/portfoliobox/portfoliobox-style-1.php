<article class="themestek-box themestek-box-portfolio themestek-portfoliobox-style-1">
	<div class="themestek-post-item">
		<?php echo themestek_wp_kses( themestek_get_featured_media( '', 'themestek-img-800x650' ) ); ?>
		<div class="themestek-box-content">
            <div class="themestek-box-content-inner">			  
				<div class="themestek-pf-box-title">
					<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
				</div>
				<div class="themestek-des">
						<?php if( has_excerpt() ) : ?>
						<div class="themestek-portfolio-content"><?php the_excerpt(); ?></div>
						<?php endif; ?>
						<div class="themestek-box-link themestek-vc_btn3">
							<a href="<?php echo get_permalink(); ?>"><?php esc_attr_e('Read More', 'liviza'); ?></a>
						</div>
				  </div>
			</div>		
		</div>
	</div>
</article>

