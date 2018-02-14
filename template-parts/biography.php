<?php
/**
 * Author biiography
 *
 * Displays a post's author avatar, name and description.
 *
 * @package fastblog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.0.0
 */

/**
 * Return if author bio is empty.
 */
if ( ! get_the_author_meta( 'description' ) ) {
	return;
}

?><div class="entry-author-bio">
	<div class="row">
		<div class="col-xs-12 col-sm-2">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), 90 ); ?>
		</div>

		<div class="col-xs-12 col-md-10">
			<h4 class="author-title"><?php esc_html_e( 'About ', 'fastblog' ); echo get_the_author(); ?></h4>

			<div class="author-description"><?php the_author_meta( 'description' ); ?></div>
		</div>
	</div>
</div>
