<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage Liviza
 * @since Liviza 1.0
 */
get_header(); ?>
	<div id="primary" class="content-area <?php echo themestek_sanitize_html_classes(themestek_sidebar_class('content-area')); ?> container">
		<main id="main" class="site-main">
			<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( !is_single() ) : ?>
							<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php endif; // !is_single() ?>
						<div class="entry-meta">
							<?php
								$post_title = get_the_title( $post->post_parent );
								if ( empty( $post_title ) || 0 == $post->post_parent ){
									$published_text = '<span class="attachment-meta"><time class="entry-date" datetime="%1$s">%2$s</time></span><div class="clearfix clear clr"></div>';
								} else {
									$meta_html = '<span class="attachment-meta">';
									$meta_html .= sprintf(
										esc_html__('Published on %1$s in %2$s', 'liviza'),
										'<time class="entry-date" datetime="' . get_the_date( 'c' ) . '">' . get_the_date() . '</time>',
										'<a href="' . get_permalink( $post->post_parent ) . '" title="' . sprintf( esc_attr__('Return to %1$s', 'liviza') , strip_tags( $post_title ) ) . '" rel="gallery">' . esc_html($post_title) . '</a>'
									);
									$meta_html .= '</span> ';
									$meta_html .= '<div class="clearfix clear clr"></div> ';
									// Output
									echo wp_kses(
										$meta_html,
										array(
											'span' => array(
												'class' => array(),
											),
											'time' => array(
												'class' => array(),
												'datetime' => array(),
											),
											'a' => array(
												'href'  => array(),
												'title' => array(),
												'rel'   => array(),
											),
										)
									);
								}
								$metadata = wp_get_attachment_metadata();
								printf(
									themestek_wp_kses( '<span class="attachment-meta full-size-link"><a href="%1$s" title="%2$s">%3$s (%4$s &times; %5$s)</a></span><div class="clearfix clear clr"></div>' ),
									esc_url( wp_get_attachment_url() ),
									esc_html__( 'Link to full-size image', 'liviza' ),
									esc_html__( 'Full resolution', 'liviza' ),
									$metadata['width'],
									$metadata['height']
								);
							?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->
					<nav id="image-navigation" class="navigation image-navigation">
						<div class="nav-links">
							<div class="nav-previous"><?php previous_image_link( false, esc_html__( 'Previous Image', 'liviza' ) ); ?></div>
							<div class="nav-next"><?php next_image_link( false, esc_html__( 'Next Image', 'liviza' ) ); ?></div>
						</div><!-- .nav-links -->
					</nav><!-- .image-navigation -->
					<div class="entry-content">
						<div class="entry-attachment">
							<?php
								/**
								 * Filter the default Liviza image attachment size.
								 *
								 * @since Liviza 1.0
								 *
								 * @param string $image_size Image size. Default 'large'.
								 */
								$image_size = apply_filters( 'liviza_attachment_size', 'large' );
								echo wp_get_attachment_image( get_the_ID(), $image_size );
							?>
							<?php if ( has_excerpt() ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div><!-- .entry-caption -->
							<?php endif; ?>
						</div><!-- .entry-attachment -->
						<?php
							the_content();
							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'liviza' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'liviza' ) . ' </span>',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );
						?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
				<?php
					// Edit link
					edit_post_link( esc_html__( 'Edit', 'liviza' ), '<span class="edit-link">', '</span>' );
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				// End the loop.
				endwhile;
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
