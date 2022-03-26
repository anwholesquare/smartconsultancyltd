<div class="themestek-box themestek-box-testimonial themestek-testimonialbox-style-1">
	<div class="themestek-post-item">	
		<div class="themestek-box-content">	
			<div class="themestek-box-author">	
				<div class="themestek-box-img"><?php echo themestek_testimonial_featured_image('thumbnail') ?></div>
				<div class="themestek-box-author-top">
					<div class="themestek-box-title"><?php the_title(); ?></div>
					<?php echo themestek_testimonial_designation(); ?>
				</div>				
			</div>		
			<div class="themestek-box-desc">

				<blockquote class="themestek-testimonial-text">

					<div class="themestek-testimonial-textbox"><?php echo themestek_wp_kses( strip_tags( get_the_content('') ) ); ?></div>
					<div class="themestek-box-star"><?php echo themestek_testimonial_star_ratings(); ?></div>
				</blockquote>

			</div>

		</div>
	</div>
</div>