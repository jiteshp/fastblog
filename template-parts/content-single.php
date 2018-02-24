<?php
/**
 * Content single
 *
 * Displays a single post.
 *
 * @package fastblog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.0.0
 */
?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
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
	</header>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before'			=> '<div class="page-links pagination">' . esc_html__( 'Pages: ', 'fastblog' ),
			'after'				=> '</div>',
			'link_before'		=> '<span class="page-numbers">',
			'link_after'		=> '</span>',
			'separator'			=> '',
			'nextpagelink'		=> esc_html__( '&raquo;', 'fastblog' ),
			'previouspagelink'	=> esc_html__( '&laquo;', 'fastblog' ),
		) );
		?>
	</div>

	<footer class="entry-footer entry-meta">
		<span class="entry-category">
			<?php
			esc_html_e( 'Posted in: ', 'fastblog' );
			the_category( ', ' );
			?>
		</span>

		<?php the_tags( '<span class="entry-tags">' . esc_html__( 'Tagged with: ', 'fastblog' ), ', ', '</span>' ); ?>
	</footer>

	<?php get_template_part( 'template-parts/biography' ); ?>
</article>
