<article class="themestek-box themestek-box-team themestek-teambox-style-1">
	<div class="themestek-post-item">
		<div class="themestek-team-image-box">
			<?php echo themestek_wp_kses(themestek_featured_image('themestek-img-800x800')); ?>			
		</div>
		<div class="themestek-box-content">	 
			<div class="themestek-icons">
				<div class="themestek-team-share">
					<span class="fa fa-share-alt"></span>
				</div>
				<div class="themestek-teambox-social-links">
						<?php echo themestek_box_team_social_links(true); ?>
				</div>
			</div>
					<?php echo themestek_box_title(); ?>
					<?php echo themestek_get_meta( 'themestek_team_member_details', 'themestek_team_info' , 'team_details_line_position' ); ?> 
		</div>

	</div>
</article>