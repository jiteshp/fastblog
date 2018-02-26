<?php
/**
 * Sidebar hero template
 *
 * Displays the sidebar hero widgets.
 *
 * @package FastBlog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.0.0
 */

if ( is_active_sidebar( 'sidebar-hero' ) ) : ?>
	<div class="site-hero">
		<div class="container">
			<aside class="sidebar-hero" role="complementary">
				<?php dynamic_sidebar( 'sidebar-hero' ); ?>
			</aside>
		</div>
	</div>
<?php
endif;
