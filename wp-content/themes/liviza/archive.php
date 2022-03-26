<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Liviza
 * @since Liviza 1.0
 */
get_header(); ?>
	<div id="primary" class="content-area <?php echo themestek_sanitize_html_classes(themestek_sidebar_class('content-area')); ?>">
		<main id="main" class="site-main">
		<?php if ( have_posts() ) : ?>
			<?php
			// Global column view
			$box               = 'blog';
			$global_view       = themestek_get_option('blog_view');  // classic or box
			$global_box_column = themestek_get_option('blogbox_column');  // one, two, three etc
			$global_box_view   = themestek_get_option('blog_view');  // top-image, left-image etc
			if( get_post_type()=='themestek-portfolio' ){
				$box               = 'portfolio';
				$global_view       = 'box';
				$global_box_column = themestek_get_option('pfcat_column');  // one, two, three etc
				$global_box_view   = themestek_get_option('pfcat_view');  // top-image, left-image etc
			} elseif( get_post_type()=='themestek-team' ){
				$box               = 'team';
				$global_view       = 'box';
				$global_box_column = themestek_get_option('teamcat_column');  // one, two, three etc
				$global_box_view   = themestek_get_option('teamcat_view');  // top-image, left-image etc
			}
			?>
			<?php if( $global_view != 'classic' ) : ?>
				<div class="row multi-column-row">
			<?php endif; ?>
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
				if( $global_view != 'classic' ){
					echo themestek_column_div( 'start', esc_attr($global_box_column) );
						echo get_template_part( 'theme-parts/' . esc_attr($box) . 'box/' . esc_attr($box) . 'box', esc_attr($global_box_view) );
					echo themestek_column_div( 'end', esc_attr($global_box_column) );
				} else {
					echo get_template_part('theme-parts/post','classic-view');
				}
			// End the loop.
			endwhile;
			?>
		<?php
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'theme-parts/content', 'none' );
		endif;
		?>
		<?php if( $global_view != 'classic' ) : ?>
			</div><!-- .row -->
		<?php endif; ?>
		<?php
		// Previous/next page navigation.
		echo themestek_pagination();
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
