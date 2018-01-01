<?php
/**
 * Content
 *
 * Displays a post in an archive, blog or search index.
 *
 * @package fastblog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.0.0
 */
?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);

		if ( ! is_search() ) {
			get_template_part( 'template-parts/meta' );
		}
		?>
	</header>

	<div class="entry-content">
		<?php
		if ( has_post_thumbnail() ) : ?>
			<p class="entry-image"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a></p>
		<?php
		endif;

		the_excerpt();
		?>
	</div>
</article>
