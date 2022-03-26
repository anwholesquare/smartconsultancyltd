<?php
/*
 *
 *  Single Coaching
 *
 */
?>
<div class="themestek-ch-single-content-wrapper themestek-ch-single-style-1">
	<div class="themestek-common-box-shadow themestek-ch-single-content-wrapper-innerbox">
		<div class="row">
			<div class="themestek-ch-single-featured-area col-md-12">
				<?php echo themestek_get_featured_media(); ?>	
			</div><!-- .themestek-ch-single-featured-area -->

		</div><br/>

		<div class="themestek-ch-single-content-area">
			<?php echo themestek_coaching_description(); ?>
		</div>

	<div class="themestek-ch-single-np-nav"><?php echo themestek_portfolio_next_prev_btn(); /* Next/Prev button */ ?></div>
</div>
<?php edit_post_link( esc_html__( 'Edit', 'liviza' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
