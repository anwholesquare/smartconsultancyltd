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
	<div class="themestek-featured-outer-wrapper themestek-post-featured-outer-wrapper">
		<?php echo themestek_get_featured_media(); // Featured content ?>
	</div>
	<div class="themestek-blog-classic-box-content">
		<?php
		 if( 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
			<!-- Blog classic meta Start -->
			<div class="themestek-featured-meta-wrapper themestek-featured-overlay">
				<?php
				// Category list
				$categories_list = get_the_category_list( ', ' );
				if ( !empty($categories_list) ) { ?>
					<span class="themestek-meta-line cat-links"><i class="themestek-liviza-icon-category"></i> <span class="screen-reader-text themestek-hide"><?php echo esc_html_x( 'Categories', 'Used before category names.', 'liviza' ); ?> </span><?php echo themestek_wp_kses($categories_list); ?></span>
				<?php } ?>
				<?php
				// Date
				$date_format =  get_option('date_format'); ?>
				<span class="themestek-meta-line posted-on">
					<i class="themestek-liviza-icon-clock"></i> 
					<span class="screen-reader-text themestek-hide"><?php echo esc_html_x( 'Posted on', 'Used before publish date.', 'liviza' ); ?> </span>
					<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
						<time class="entry-date published" datetime="<?php echo esc_html( get_the_date( 'c' ) ); ?>"><?php echo get_the_date($date_format); ?></time>
						<time class="updated themestek-hide" datetime="<?php echo esc_html( get_the_modified_date( 'c' ) ); ?>"><?php echo get_the_modified_date($date_format); ?></time>
					</a>
				</span>
				<?php
				// Author
				$author	= '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">'.get_the_author().'</a>';
				?>
				<span class="themestek-meta-line byline">
					<i class="themestek-liviza-icon-user"></i>
					<span class="author vcard">
						<span class="screen-reader-text themestek-hide"><?php echo esc_html_x( 'Author', 'Used before post author name.', 'liviza' ); ?> </span>
						<?php echo themestek_wp_kses($author); ?>
					</span>
				</span>
				<?php
				// Tag
				$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'liviza' ) );
				if ( !empty($tags_list) ) {
					?>
					<span class="themestek-meta-line tags-links">
						<i class="themestek-liviza-icon-tag"></i>
						<span class="screen-reader-text themestek-hide">
							<?php echo esc_html_x( 'Tags', 'Used before tag names.', 'liviza' ); ?>
						</span>
						<?php echo themestek_wp_kses($tags_list); ?>
					</span>
				<?php } ?>
			</div>
			<!-- Blog classic meta End -->
		<?php endif; ?>
		<header class="entry-header">
			<?php if( !is_single() ) : ?>
				<?php if( 'aside' != get_post_format() && 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php endif; ?>
			<?php endif; ?>
		</header><!-- .entry-header -->
		<?php if( 'quote' != get_post_format() ) : ?>
			<div class="entry-content">
				<?php if( !is_single() ) : ?>
					<div class="themestek-box-desc-text"><?php echo themestek_blogbox_description(); ?></div>
				<?php endif; ?>
				<?php
				the_content( sprintf(
					esc_html__( 'Read More %s', 'liviza' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );
				?>
					<div class="themestek-blogbox-footer-readmore">
						<?php echo themestek_blogbox_readmore(); ?>
					</div>	
		<?php
				// pagination if any
				wp_link_pages( array(
					'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'liviza' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				) );
				?>
			</div><!-- .entry-content -->
		<?php endif; ?>
		<?php
		if( is_single() ){
			echo themestek_social_share_box('post');
		}
		?>
		<?php
		// Tags & Categories
		if( !empty($tags) || !empty($category) ){
			echo themestek_wp_kses('<div class="themestek-post-tag-cat">');
		}
		if( !empty($tags) ){
			echo sprintf( themestek_wp_kses('<div class="themestek-post-tag">%s</div>'), esc_html__('Tags:', 'liviza') . ' ' . themestek_wp_kses($tags) );
		}
		if( !empty($category) ){
			echo sprintf( themestek_wp_kses('<div class="themestek-post-cat">%s</div>'), esc_html__('Categories:', 'liviza') . ' ' . themestek_wp_kses($category) );
		}
		if( !empty($tags) || !empty($category) ){
			echo themestek_wp_kses('</div><!-- .themestek-post-tag-cat -->');
		}
		?>
		<?php
		// Next Prev buttons
		$prev_post = get_previous_post();  // Prev post
		$next_post = get_next_post();  // Next post
		if( ( !empty($prev_post) || !empty($next_post) ) && shortcode_exists('themestek-btn') ){
			?>
			<div class="themestek-post-prev-next-buttons">
				<?php
				if( !empty( $prev_post ) && shortcode_exists('themestek-btn') ){
					echo do_shortcode('[themestek-btn title="' . esc_attr__('PREVIOUS', 'liviza') . '" style="flat" shape="square" font_weight="yes" color="skincolor" size="md" i_align="left" i_icon_themify="themifyicon ti-arrow-left" add_icon="true" link="url:' . urlencode(esc_url( get_permalink( $prev_post->ID ) )) . '|title:' . rawurlencode($prev_post->post_title) . '||" el_class="themestek-left-align-btn"]');
				};
				// Next post
				if ( !empty($next_post) && shortcode_exists('themestek-btn') ){
					echo do_shortcode('[themestek-btn title="' . esc_attr__('NEXT', 'liviza') . '" style="flat shape="square" font_weight="yes" color="skincolor" size="md" i_align="right" i_icon_themify="themifyicon ti-arrow-right" add_icon="true" link="url:' . urlencode(esc_url( get_permalink( $next_post->ID ) )) . '|title:' . rawurlencode($next_post->post_title) . '||" el_class="themestek-right-align-btn"]');
				};
				?>
			</div>
			<?php
		}
		?>
		<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'theme-parts/author-bio', 'customized' );
		endif;
		?>
	</div><!-- .themestek-blog-classic-box-content -->
</article><!-- #post-## -->
