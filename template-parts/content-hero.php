<?php
/**
 * Content hero
 *
 * Displays the hero.
 *
 * @package fastblog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.0.0
 */

$hero_page_id = get_theme_mod( 'fastblog_hero_page', 0 );
if ( ! $hero_page_id ) {
	return;
}
?>

<div class="site-hero">
	<div class="container">
		<div class="row">
			<?php
			$hero_pages = new WP_Query( array(
				'page_id' => $hero_page_id,
			) );

			while ( $hero_pages->have_posts() ) : $hero_pages->the_post(); ?>
				<div class="col-xs-12 col-md-8">
					<?php get_template_part( 'template-parts/content', 'page' ); ?>
				</div>
			<?php
			endwhile;

			wp_reset_postdata();
			?>
		</div>
	</div>
</div>
