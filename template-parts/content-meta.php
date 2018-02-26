<?php
/**
 * Content meta
 *
 * Displays a post's header meta including author, date publish/modified and comments.
 *
 * @package fastblog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.6.0
 */
?><div class="entry-meta">
	<?php if ( ! is_single() && is_sticky() ) : ?>
		<span class="entry-sticky">
			<?php esc_html_e( 'Featured', 'fastblog' ); ?>
		</span>
	<?php endif; ?>

	<span class="entry-author">
		<em><?php esc_html_e( 'by', 'fastblog' ); ?></em>
		<?php the_author_link(); ?>
	</span>

	<span class="entry-time">
		<?php if ( get_the_time( 'U' ) != get_the_modified_time( 'U' ) ) : ?>
			<em><?php esc_html_e( 'updated on', 'fastblog' ); ?></em>
			<time datetime="<?php the_modified_time( 'DATE_W3C' ); ?>"><?php the_modified_time( 'F j, Y' ); ?></time>
		<?php else : ?>
			<em><?php esc_html_e( 'on', 'fastblog' ); ?></em>
			<time datetime="<?php the_time( 'DATE_W3C' ); ?>"><?php the_time( 'F j, Y' ); ?></time>
		<?php endif; ?>
	</span>

	<span class="entry-comments">
		<a href="<?php the_permalink(); ?>#comments"><?php comments_number( esc_html__( 'Comments', 'fastblog' ) ); ?></a>
	</span>
</div>
