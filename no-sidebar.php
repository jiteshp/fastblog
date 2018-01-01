<?php
/**
 * Template name: No Sidebar Template
 *
 * Displays a page with no sidebar.
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
			<main class="main col-xs-8" role="main">
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content', 'page' );
				}
				?>
			</main>
		</div>
	</div>
</div><!-- /site-content -->

<?php
get_footer();
