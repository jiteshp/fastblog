<?php
/**
 * Sidebar template
 *
 * Displays the sidebar widgets.
 *
 * @package FastBlog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.0.0
 */

if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<aside class="sidebar col-xs-12 col-md-4" role="complementary">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</aside>
<?php
endif;
