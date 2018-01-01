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

do_action( 'fastblog_after_content' );

?><footer class="site-footer" role="contentinfo">
	<div class="container">
		<span class="copyright">
			<?php printf( esc_html__( 'Copyright &copy; %1$s ', 'fastblog' ), date( esc_html__( 'Y', 'fastblog' ) ) ); ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</span>

		<span class="credits">
			<?php esc_html_e( 'FastBlog WordPress theme by', 'fastblog' ); ?>
			<a href="https://www.jiteshpatil.com/" rel="designer"><?php esc_html_e( 'Jitesh Patil', 'fastblog' ); ?></a>
		</span>
	</div>
</footer><!-- /site-footer -->

<?php wp_footer(); ?>
</body>
</html>
