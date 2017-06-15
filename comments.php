<?php
/**
 * The template for displaying comments & the comment form
 *
 * @package Gingersnap
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

<?php
if ( have_comments() ) : ?>
	<h2>
		<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'gingersnap' ), get_the_title() );
			} else {
				printf(
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'gingersnap'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
		?>
	</h2>

	<ol>
		<?php
			wp_list_comments( array(
				'avatar_size' => 100,
				'style'       => 'ol',
				'short_ping'  => true,
			) );
		?>
	</ol>

<?php
endif; // Check for have_comments().

// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

	<p class="no-comments"><?php _e( 'Comments are closed.', 'gingersnap' ); ?></p>
<?php
endif;

comment_form();
?>
