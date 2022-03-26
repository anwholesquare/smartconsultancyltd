<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Liviza
 * @since Liviza 1.0
 */

$left_content  = themestek_get_option('footer_copyright_left');
$right_content = themestek_get_option('footer_copyright_right');

?>

<?php if( has_nav_menu('themestek-footer-menu') || !empty($left_content) || !empty($right_content) ) : ?>

<div id="bottom-footer-text" class="bottom-footer-text themestek-bottom-footer-text site-info <?php echo themestek_sanitize_html_classes(themestek_footer_row_class( 'bottom' )); ?>">
	<div class="bottom-footer-bg-layer themestek-bg-layer"></div>
	<div class="<?php echo themestek_sanitize_html_classes(themestek_footer_container_class()); ?>">
		<div class="bottom-footer-inner">
			<div class="row multi-columns-row">

				<?php if( has_nav_menu('themestek-footer-menu') || !empty($right_content) ) : ?>
				<div class="col-xs-12 col-sm-5 <?php if(!empty($left_content)) { ?>themestek-footer2-left <?php } ?>">
				<?php else : ?>
				<div class="col-xs-12 col-sm-12 <?php if(!empty($left_content)) { ?>themestek-footer2-left <?php } ?>">
				<?php endif; ?>
					<?php if( !empty($left_content) ){ echo do_shortcode( $left_content ); } ?>
				</div><!-- footer left -->

				<?php if( has_nav_menu('themestek-footer-menu') ){ ?>
					<div class="col-xs-12 col-sm-7 themestek-footer2-right">
						<?php wp_nav_menu( array( 'theme_location' => 'themestek-footer-menu', 'menu_class' => 'footer-nav-menu', 'container_class' => 'footer-nav-menu-container' ) ); ?>
					</div>
				<?php } else if( !empty($right_content) ){ ?>
					<div class="col-xs-12 col-sm-7 themestek-footer2-right">
						<?php echo do_shortcode( $right_content ); ?>
					</div><!-- footer right --> 
				<?php } ?>

			</div><!-- .row.multi-columns-row --> 
		</div><!-- .bottom-footer-inner --> 
	</div><!--  --> 
</div><!-- .footer-text -->

<?php endif; ?>