<?php
/*
 *
 *  Single Service - Top image
 *
 */
?>
<div class="themestek-service-single-content-wrapper">
	<div class="themestek-common-box-shadow themestek-service-single-content-wrapper-innerbox">
		<div class="themestek-service-single-content-area">
			<?php echo themestek_get_featured_media(); ?>
			<?php echo themestek_service_description(); ?>
		</div><!-- .themestek-service-single-content-area -->
	</div>
</div>
<?php edit_post_link( esc_html__( 'Edit', 'liviza' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
