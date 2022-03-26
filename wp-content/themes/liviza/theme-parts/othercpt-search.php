<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Liviza
 * @since Liviza 1.0
 */
?>
<div class="themestek-other-cpt-boxstyle themestek-cpt-<?php echo get_post_type(); ?>">
	<?php echo themestek_get_featured_media( '', 'thumb' ); // Featured content ?>
	<div class="themestek-cpt-title">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php the_title(); ?>
		</a>
	</div>
	<div class="clear clr clearfix"></div>
</div><!-- #post-## -->
