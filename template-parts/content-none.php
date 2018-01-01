<?php
/**
 * Content none
 *
 * Displays a 'nothing found' entry when no entry exists for an index.
 *
 * @package fastblog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.0.0
 */
?><div class="hentry nothing-found">
	<header class="entry-header">
		<h2 class="entry-title"><?php esc_html_e( 'Nothing found', 'fastblog' ); ?></h2>
	</header>

	<div class="entry-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'fastblog' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'fastblog' ); ?></p>
			<?php
			get_search_form();
		endif; ?>
	</div>
</div>
