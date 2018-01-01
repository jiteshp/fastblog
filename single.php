<?php
/**
 * Single template
 *
 * Displays a single post & it's comments.
 *
 * @package FastBlog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.0.0
 */

get_header(); ?>

<!-- site-content -->
<div class="site-content">
	<div class="container">
		<div class="row">
			<main class="main col-xs-12 col-md-8" role="main">
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content', 'single' );

					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>
			</main>

			<?php get_sidebar(); ?>
		</div>
	</div>
</div><!-- /site-content -->

<?php
get_footer();
