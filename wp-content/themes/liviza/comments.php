<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Liviza
 * @since Liviza 1.0
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( esc_html_x( 'One Reply to &ldquo;%s&rdquo;', 'single comment title', 'liviza' ), get_the_title() );
			} else {
				printf( esc_html_x( '%1$s Replies to &ldquo;%2$s&rdquo;', 'multiple comments title', 'liviza' ), number_format_i18n( $comments_number ), get_the_title() );
			}
			?>
		</h2>
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 100,
					'callback'    => 'themestek_comment_row_template',
				) );
			?>
		</ol><!-- .comment-list -->
		<?php the_comments_pagination( array(
			'mid_size'	=> 5,
			'prev_text'	=> themestek_wp_kses('<i class="themestek-liviza-icon-arrow-left"></i>'),
			'next_text'	=> themestek_wp_kses('<i class="themestek-liviza-icon-arrow-right"></i>'),
		) ); ?>
	<?php endif; ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'liviza' ); ?></p>
	<?php endif; ?>
	<?php
	// To use the variables present in the above code in a custom callback function, you must first set these variables within your callback using:
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	if( !isset($required_text) ){ $required_text = ''; }
	// Comment form args
	$args = array();
	$args['comment_field'] = '<p class="comment-form-comment"><label class="themestek-hide" for="comment">' . esc_html_x( 'Comment', 'noun', 'liviza' ) .
    '</label><textarea id="comment" placeholder="' . esc_attr_x('Comment', 'noun', 'liviza') . '" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></p>';
	$args['comment_notes_before'] = '<p class="comment-notes">' .
    esc_html__( 'Your email address will not be published.' , 'liviza' ) . ' ' . ( $req ? $required_text : '' ) .
    '</p>';
	$args['comment_notes_after'] = '<p class="form-allowed-tags themestek-hide">' .
    sprintf(
		esc_html__( 'You may use these <abbr title="HyperText Markup Language">html</abbr> tags and attributes: %s', 'liviza' ),
		' <code>' . allowed_tags() . '</code>'
    ) . '</p>';
	// Submit button class
	$args['class_submit'] = 'submit themestek-vc_general themestek-vc_btn3 themestek-vc_btn3-size-md themestek-vc_btn3-weight-no themestek-vc_btn3-shape-rounded themestek-vc_btn3-style-flat themestek-vc_btn3-color-skincolor';
	$args['fields'] = array(
	  'author' =>
		'<p class="comment-form-author"><label class="themestek-hide" for="author">' . esc_html__( 'Name', 'liviza' ) . '</label> ' .
		( $req ? '<span class="required themestek-hide">*</span>' : '' ) .
		'<input id="author" placeholder="' . esc_attr__('Name','liviza') . ( $req ? ' (required)' : '' ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30"' . $aria_req . ' /></p>',
	  'email' =>
		'<p class="comment-form-email"><label class="themestek-hide" for="email">' . esc_html__( 'Email', 'liviza' ) . '</label> ' .
		( $req ? '<span class="required themestek-hide">*</span>' : '' ) .
		'<input id="email" placeholder="' . esc_attr__('Email','liviza') . ( $req ? ' (required)' : '' ) . '" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		'" size="30"' . $aria_req . ' /></p>',
	  'url' =>
		'<p class="comment-form-url"><label class="themestek-hide" for="url">' . esc_html__( 'Website', 'liviza' ) . '</label>' .
		'<input id="url" placeholder="' . esc_attr__('Website','liviza') . '" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" /></p>',
	);
	comment_form($args); ?>
</div><!-- .comments-area -->
