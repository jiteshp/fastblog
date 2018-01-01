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
	<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header>' ); ?>

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
</article>
