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
?><div class="entry-author-bio">
	<?php echo get_avatar( get_the_author_meta( 'user_email' ), 64 ); ?>
	<h4 class="author-title"><?php esc_html_e( 'About ', 'fastblog' ); echo get_the_author(); ?></h4>
	<div class="author-description"><?php the_author_meta( 'description' ); ?></div>
</div>
