<?php
/**
 * Template name: Wide Canvas (For Elementor)
 *
 * Displays a full width page with no header or footer.
 *
 * @package FastBlog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.0.0
 */

get_header(); ?>

<!-- site-content -->
<div class="site-content">
	<main class="main" role="main">
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', 'page' );
		}
		?>
	</main>
</div><!-- /site-content -->

<?php
get_footer();
