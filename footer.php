<?php
/**
 * Footer template
 *
 * Display the copyright, credits & outputs the theme scripts.
 *
 * @package FastBlog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.0.0
 */

/**
 * Adds an action to hook into before the site footer.
 */
do_action( 'fastblog_before_footer' ); ?>

<footer class="site-footer" role="contentinfo">
	<div class="container">
		<span class="copyright">
			<?php printf( esc_html__( 'Copyright &copy; %1$s', 'fastblog' ), esc_html( date( 'Y' ) ) ); ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</span>

		<span class="credits">
			<?php esc_html_e( 'Powered by', 'fastblog' ); ?>
			<a href="https://wordpress.org/" rel="generator"><?php esc_html_e( 'WordPress', 'fastblog' ); ?></a>
			<?php esc_html_e( '& ', 'fastblog' ); ?>
			<a href="https://wordpress.org/themes/fastblog/" rel="designer"><?php esc_html_e( 'FastBlog', 'fastblog' ); ?></a>
		</span>
	</div>
</footer><!-- /site-footer -->

<?php wp_footer(); ?>
</body>
</html>
