<?php
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
				printf( __( 'One comment', 'sceleton' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_n(
						'%1$s comment',
						'%1$s comments',
						$comments_number,
						'sceleton'
					),
					number_format_i18n( $comments_number )
				);
			}
			?>
		</h2>

		<ol class="commentlist">
			<?php
			wp_list_comments( array(
				'avatar_size' => 100,
				'style'       => 'ol',
				'short_ping'  => true,
				'reply_text'  => __( 'Reply', 'sceleton' ),
			) );
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'Previous', 'twentyseventeen' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'twentyseventeen' ) . '</span>',
		) ); ?>

	<?php endif; ?>


	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyseventeen' ); ?></p>
	<?php endif; ?>

	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	comment_form( array(
		'comment_field' => '<div><label for="comment"><?php _e("Your comment", "sceleton"); ?></label><textarea name="comment" id="comment" cols="58" rows="10" tabindex="3"></textarea></div>',
		'must_log_in' => '<p><?php echo __("You must be", "sceleton") . "<a href="" . wp_login_url( get_permalink() ) . "">" . __("logged in", "sceleton") . "</a> " . __("to post a comment", "sceleton") . "</p>"; ?>',
		'class_submit' => 'button',
		'title_reply' => __( 'Leave a Reply', 'sceleton' ),
		'title_reply_to' => __( 'Leave a Reply to %s', 'sceleton' ),
		'label_submit' => __( 'Submit Comment', 'sceleton' ),
	) );
	?>

</div>
