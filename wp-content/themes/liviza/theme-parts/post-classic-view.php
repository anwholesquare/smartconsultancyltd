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
<article id="post-<?php the_ID(); ?>" <?php post_class( themestek_sanitize_html_classes(themestek_postlayout_class()) ); ?> >
	<div class="themestek-blog-classic-featured-wrapper">			
		<div class="themestek-blog-classic-featured-image-wrap">
			<?php echo themestek_get_featured_media(); // Featured content ?>
		</div>
	</div>


	<div class="themestek-blog-classic-box-content <?php if( !function_exists('tste_liviza_cs_framework_init') ) { ?>themestek-blog-classic-no-footer-meta<?php }; ?>">
		<div class="themestek-blog-date">
			<span class="themestek-meta-line themestek-date">
				<?php echo get_the_date( 'F j, Y' ); ?>
			</span>
		</div>	
		<div class="themestek-blog-header">

		<?php if( is_single() ) : ?>	
		
			<div class="themestek-meta-list-wrap">
				<div class="themestek-box-title"><h2 class="themestek-title"><?php echo get_the_title(); ?></h2></div>
			    <?php echo themestek_entry_meta( array( 'author', 'cat', 'comment' ) ); ?>
			</div>
		<?php else : ?>
			<div class="themestek-blog-date">
				<span class="themestek-meta-line themestek-date">
					<?php echo get_the_date( 'F j, Y' ); ?>
				</span>
			</div>
			<div class="themestek-meta-list-wrap">
				<?php echo themestek_box_title('classicmain'); // post title ?>
				<?php echo themestek_entry_meta( array( 'author', 'cat', 'comment' ) ); ?>
			</div>
		<?php endif; ?>
		</div>

		<?php if( 'quote' != get_post_format() ) : ?>
			<div class="entry-content">
				<?php if( !is_single() ) : ?>

					<?php
					$read_more_text = '<a href="'.get_permalink().'">'.themestek_get_option('blog_readmore_text').'</a>';
					$read_more_html = '<div class="themestek-readmore-link">'.$read_more_text.'</div>';
					$blog_classic_excerpt_enable = themestek_get_option('blog_classic_excerpt_enable');

					if( has_excerpt() && $blog_classic_excerpt_enable=='yes' ){
						the_excerpt();
						echo themestek_wp_kses($read_more_html);

					} else {
						the_content( themestek_get_option('blog_readmore_text') , false );

					}

					// Pagination if multi-page exists
					wp_link_pages(
						array(
							'before' => themestek_wp_kses('<div class="page-links">') . esc_html__( 'Pages:', 'liviza' ),
							'after'  => themestek_wp_kses('</div>'),
						)
					);

					?>

				<?php else : ?>

					<?php the_content(); ?>

				<?php endif; ?>

				<?php
				if( is_single() ) {
					// pagination if any
					wp_link_pages( array(
						'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'liviza' ),
						'after'       => '</div>',
						'link_before' => '<span class="page-number">',
						'link_after'  => '</span>',
					) );
				}
				?>
			</div><!-- .entry-content -->
			<?php if( is_single() ) : ?>
				<?php
				// Tags
				$tags_list	= get_the_tag_list( '', esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'liviza' ) );
				if( !empty($tags_list) || ( ! post_password_required() && defined('THEMESTEK_LIVIZA_VERSION') ) ) :
				?>
				<div class="themestek-meta-first-row themestek-meta-info-bottom clearfix <?php if( empty($tags_list) || ( function_exists('themestek_social_share_links') && empty(themestek_social_share_links()) ) ) : ?>themestek-meta-one-only<?php endif; ?>">
					<?php if( !empty($tags_list) ) : ?>
					<div class="themestek-meta-info-bottom-left">
						<span class="tags-links">
							<span class="screen-reader-text themestek-hide"><?php esc_html_x( 'Tags', 'Used before tag names.', 'liviza' ); ?> </span>
							<?php echo themestek_wp_kses($tags_list); ?>
						</span>
					</div>
					<?php endif; ?>
					<?php
					// Social share
					if ( ! post_password_required() && defined('THEMESTEK_LIVIZA_VERSION') ) {
						echo themestek_wp_kses(themestek_social_share_box('post'));
					}
					?>
				</div>
				<?php endif; ?>

			<?php endif; ?>
		<?php endif; ?>
		<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'theme-parts/author-bio', 'customized' );
		endif;
		?>
	</div><!-- .themestek-blog-classic-box-content -->
</article><!-- #post-## -->
