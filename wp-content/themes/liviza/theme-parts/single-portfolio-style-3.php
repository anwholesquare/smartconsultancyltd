<?php
/*
 *
 *  Single Portfolio - Full image
 *
 */
?>
<div class="themestek-pf-single-content-wrapper themestek-pf-single-style-3">
	<div class="themestek-common-box-shadow themestek-pf-single-content-wrapper-innerbox">
		<div class="themestek-pf-single-content-area">
			<?php echo themestek_portfolio_description(); ?>
		</div><!-- .themestek-pf-single-content-area -->
	</div>
	<div class="themestek-pf-single-content-bottom container">
			<?php
			// Portfolio Category
			$row_value = get_the_term_list( get_the_ID(), 'themestek-portfolio-category', '', ' ', '' );
			if( !empty($row_value) ){ ?>
				<div class="themestek-pf-single-category-w">
					<?php echo themestek_wp_kses($row_value); ?>
				</div>
			<?php } ?>
			<?php echo themestek_social_share_box('portfolio'); /* Social share */ ?>
		</div>
	</div>
	<div class="themestek-pf-single-np-nav"><?php echo themestek_portfolio_next_prev_btn(); /* Next/Prev button */ ?></div>
</div>
<?php edit_post_link( esc_html__( 'Edit', 'liviza' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
