<article class="themestek-box themestek-box-coaching themestek-coachingbox-style-1">
	<div class="themestek-post-item">
		<div class="themestek-image-box" <?php if( has_post_thumbnail() ) : ?>style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');"<?php endif; ?>>

		</div>		
		<div class="themestek-box-content">
            <div class="themestek-box-content-inner">		
            	<div class="ts-ihbox-icon">
					<?php themestek_coaching_icon(); ?>
				</div> 
				<div class="themestek-des">
					<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php if( has_excerpt() ) : ?>
						<div class="themestek-coaching-content"><?php the_excerpt(); ?></div>
					<?php endif; ?>
				  </div>
			</div>		
		</div>
	</div>
</article>