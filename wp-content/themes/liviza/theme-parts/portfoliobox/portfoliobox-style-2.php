<article class="themestek-box themestek-box-portfolio themestek-portfoliobox-style-2">
	<div class="themestek-post-item">
		<?php echo themestek_wp_kses( themestek_get_featured_media( '', 'themestek-img-800x533' ) ); ?>
		<div class="themestek-box-content">
			<div class="themestek-box-content-inner">
				<div class="ts-ihbox-icon">
					<?php echo themestek_pf_flag_icon(); ?>
					<?php //echo themestek_featured_image('themestek-img-800x533'); ?>
					</div>
					<div class="themestek-des">
						<div class="themestek-pf-box-title"> 
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>						
						<?php if( has_excerpt() ) : ?>
						<div class="themestek-portfolio-content"><?php the_excerpt(); ?></div>
						<?php endif; ?>
				  </div> 
            </div>
		</div>
	</div>
</article>
