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
		<?php
		$hero_pages = new WP_Query( array(
			'page_id' => $hero_page_id,
		) );

		while ( $hero_pages->have_posts() ) :
			$hero_pages->the_post();

			the_title( '<div class="entry-header"><p class="entry-title h1">', '</p></div>' ); ?>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		<?php endwhile;

		wp_reset_postdata();
		?>
	</div>
</div>
