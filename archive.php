<?php
/**
 * Archive template
 *
 * Displays the posts in an author, date or taxonomy index.
 *
 * @package FastBlog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.0.0
 */

get_header(); ?>

<!-- site-content -->
<div class="site-content">
	<div class="container">
		<main class="main" role="main">
			<header class="page-header">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			</header>

			<?php
			if ( have_posts() ) : ?>
				<div class="row">
					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/content' );
					}
					?>
				</div>

				<?php
				the_posts_pagination( array(
					'prev_text' => esc_html__( '&laquo;', 'fastblog' ),
					'next_text' => esc_html__( '&raquo;', 'fastblog' ),
				) );
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</main>
	</div>
</div><!-- /site-content -->

<?php
get_footer();
