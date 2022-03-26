<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Liviza
 * @since Liviza 1.0
 */
// Nothing found message
$themestek_nothing_found_message = '';
// Redirect if nothing found in selected CPT
themestek_search_redirect();
get_header(); ?>
	<div id="primary" class="content-area <?php echo themestek_sanitize_html_classes(themestek_sidebar_class('content-area')); ?>">
		<main id="main" class="site-main">
			<?php echo themestek_search_form(); ?>
			<?php
			if ( have_posts() ) :
				// getting global options
				$liviza_theme_options = get_option('liviza_theme_options');
				echo '<div class="themestek-search-results-contents">';
				// ROW wrapper - start
				if( get_post_type() == 'page' ){
					echo '<div class="themestek-search-results-pages-w"><ul class="themestek-list themestek-list-style-icon themestek-list-icon-color-skincolor themestek- themestek-icon-skincolor themestek-list-textsize- themestek-list-icon-library-fontawesome">';
				} else if( get_post_type()=='product' && function_exists('woocommerce_product_loop_start') ){
					echo '<div class="woocommerce">';
					woocommerce_product_loop_start('col-sm-4');
				} else {
					echo '<div class="row multi-columns-row">';
				}
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					switch( get_post_type() ){
						case 'post':  // post
							echo '<div class="col-sm-12">';
							get_template_part('theme-parts/post','classic-view');
							echo '</div>';
							break;
						case 'page':  // page
							echo '<li><i class="themestek-liviza-icon-angle-right"></i> &nbsp; <span class="themestek-list-li-content"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></span></li>';
							break;
						case 'themestek-portfolio':  // Portfolio
							$view = ( !empty($liviza_theme_options['pfcat_view']) ) ? $liviza_theme_options['pfcat_view'] : 'style-1' ;
							echo '<div class="col-sm-4">';
							get_template_part( 'theme-parts/portfoliobox/portfoliobox', $view );
							echo '</div>';
							break;
						case 'themestek-team':  // Portfolio
							$view = ( !empty($liviza_theme_options['teamcat_view']) ) ? $liviza_theme_options['teamcat_view'] : 'style-1' ;
							echo '<div class="col-sm-4">';
							get_template_part( 'theme-parts/teambox/teambox', 'style-1' );
							echo '</div>';
							break;
						default:
							if( function_exists('wc_get_template_part') && get_post_type() == 'product' ){
								// WooCommerce special view
								wc_get_template_part( 'content', 'product' );
							} else {
								echo '<div class="col-sm-4">';
								get_template_part( 'theme-parts/othercpt', 'search' );
								echo '</div>';
							}
							break;
					}
				endwhile; // End of the loop.
				// ROW wrapper - end
				if( get_post_type() == 'page' ){
					echo '</ul></div>';
				} else if( get_post_type()=='product' && function_exists('woocommerce_product_loop_end') ){
					woocommerce_product_loop_end();
					echo '</div>';
				} else {
					echo '</div>';
				}
				echo '</div><!-- .themestek-search-results-contents -->';
				echo themestek_pagination();
			else : ?>
				<div class="themestek-search-results-no-content">
					<?php themestek_nothing_found_message(); ?>
				</div>
				<?php
			endif;
			?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
	<?php
	// Left Sidebar
	themestek_get_left_sidebar();
	// Right Sidebar
	themestek_get_right_sidebar();
	?>
<?php get_footer(); ?>
