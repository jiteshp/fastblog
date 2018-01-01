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
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' );
		get_template_part( 'template-parts/meta' );
		?>
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
</article>
