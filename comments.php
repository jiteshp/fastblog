<?php
/**
 * Comments template
 *
 * Displays page/post comments.
 *
 * @package FastBlog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.0.0
 */

if ( post_password_required() ) {
	return;
}
?>

<!-- comments-area -->
<div id="comments" class="comments-area">
	<?php
	if ( have_comments() ) : ?>
		<h2 class="comments-title"><?php comments_number(); ?></h2>

		<ol class="comments-list">
			<?php
			wp_list_comments( array(
				'avatar_size' => 50,
				'style'		  => 'ol',
				'type'		  => 'comment',
			) );
			?>
		</ol>
		<?php

		the_comments_pagination( array(
			'prev_text' => esc_html__( '&laquo;', 'fastblog' ),
			'next_text' => esc_html__( '&raquo;', 'fastblog' ),
		) );
	endif;

	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="comments-closed"><?php esc_html_e( 'Comments are closed.', 'fastblog' ); ?></p>
	<?php
	endif;

	comment_form();
	?>
</div><!-- /comments-area -->
