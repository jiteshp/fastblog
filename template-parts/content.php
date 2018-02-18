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
?><div class="col-xs-12 col-sm-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		if ( has_post_thumbnail() ) : ?>
			<div class="entry-content">
				<p class="entry-image"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a></p>
			</div>
		<?php endif; ?>

		<header class="entry-header">
			<?php
			the_title(
				sprintf( '<h2 class="entry-title h3"><a href="%s">', esc_url( get_permalink() ) ),
				'</a></h2>'
			);
			?>

			<div class="entry-meta">
				<span class="entry-category">
					<?php the_category( ', ' ); ?>
				</span>
			</div>
		</header>
	</article>
</div>
