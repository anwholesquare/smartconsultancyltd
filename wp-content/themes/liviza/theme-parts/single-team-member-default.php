<?php
/*
 *
 *  Single Team member - Default
 *
 */
?>
<div class="themestek-team-member-single-content-wrapper themestek-team-member-view-default">
	<div class="row">
		<div class="col-md-4 themestek-box-img-left">
			<?php // You can use like this too - themestek_featured_media(); ?>
			<div class="themestek-featured-outer-wrapper themestek-post-featured-outer-wrapper">
				<?php echo themestek_wp_kses(themestek_featured_image('full')); ?>
			</div>
			<div class="themestek-team-des">
				<h3><?php the_title(); ?></h3>
				<?php $position = themestek_team_member_single_meta( 'position' );
				if( !empty($position) ){
					?>
					<div class="themestek-box-team-position">
						<?php echo themestek_wp_kses($position, 'liviza'); ?>
					</div>
				<?php } ?>
				<hr>
				<?php if ( has_excerpt() ){ the_excerpt(); } ?>
				<?php echo themestek_wp_kses( themestek_team_member_meta_details() ); ?>
				<?php echo themestek_wp_kses( themestek_team_member_extra_details() ); ?>
				<?php echo themestek_wp_kses( themestek_box_team_social_links() ); ?>
			</div>
		</div>
	<div class="col-md-8 themestek-box-content">
		<div class="themestek-team-member-single-content row">
				<div class="themestek-team-member-single-content-innner">
					<?php echo themestek_team_member_content(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php edit_post_link( esc_attr__( 'Edit', 'liviza' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
