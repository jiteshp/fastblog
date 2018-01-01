<?php
/**
 * 404 template
 *
 * Displays the 'Page not found' error page when no page/post is found to display.
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
			<main class="main col-xs-12 col-md-8 offset-md-2" role="main">
				<div class="hentry">
					<header class="entry-header">
						<h1 class="entry-title"><?php esc_html_e( 'Page not found', 'fastblog' ); ?></h1>
					</header>

					<div class="entry-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'fastblog' ); ?></p>

						<?php get_search_form(); ?>
					</div>
				</div>
			</main>
		</div>
	</div>
</div><!-- /site-content -->

<?php
get_footer();
