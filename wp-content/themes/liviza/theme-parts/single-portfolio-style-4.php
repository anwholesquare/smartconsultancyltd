<?php
/*
 *
 *  Single Portfolio - Top image
 *
 */
?>
<div class="themestek-pf-single-content-wrapper themestek-pf-view-top-image themestek-pf-single-style-4">
	<?php echo themestek_get_featured_media(); ?>
	<div class="row themestek-pf-single-content-area">	
		<div class="col-sm-12 col-md-8 col-lg-8">				
			<?php echo themestek_portfolio_description(); ?>
		</div>
		<div class="col-sm-12 col-md-4 col-lg-4">
			<div class="themestek-pf-single-details-area">
				<div class="project-details-top">
					<?php $project_details = themestek_get_option('coaching_projech_details');  ?> 
					<?php if( !empty($project_details) ){ ?>
						<h3><?php echo esc_attr($project_details); ?></h3>
					<?php } ?>
				</div>
				<?php echo themestek_portfolio_detailsbox(); ?>
			</div><!-- .themestek-pf-single-content-area -->
		</div>
	</div><!-- .themestek-pf-single-content-area -->
	<div class="themestek-pf-single-content-bottom container">
		<?php
		// Portfolio Category
		$row_value = get_the_term_list( get_the_ID(), 'themestek-portfolio-category', '', ' ', '' );
		if( !empty($row_value) ){ ?>
			<div class="themestek-pf-single-category-w">
				<?php echo themestek_wp_kses($row_value); ?>
			</div>
		<?php } ?>
		<?php echo themestek_social_share_box('portfolio');  // Social share ?>
	</div>
	<div class="themestek-pf-single-np-nav"><?php echo themestek_portfolio_next_prev_btn(); /* Next/Prev button */ ?></div>
</div>
<?php edit_post_link( esc_html__( 'Edit', 'liviza' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>