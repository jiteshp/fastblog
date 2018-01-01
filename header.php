<?php
/**
 * Header template
 *
 * Outputs the <head> element and displays the site header section.
 *
 * @package FastBlog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- site-header -->
<header class="site-header" role="banner">
	<div class="site-banner">
		<div class="container">
			<div class="row">
				<div class="site-branding col-xs-12 col-md-4">
					<?php
					the_custom_logo();

					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="bookmark"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
					else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="bookmark"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php
					endif;
					?>
				</div>

				<?php if ( has_nav_menu( 'primary-menu' ) ) : ?>
					<a href="#primary-menu" class="primary-menu-toggle">&#9776;</a>

					<nav id="primary-menu" class="primary-menu col-xs-12 col-md-8" role="navigation">
						<?php
						wp_nav_menu( array(
							'container' 	 => false,
							'theme_location' => 'primary-menu',
						) );
						?>
					</nav>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<?php
	if ( is_front_page() ) :
		get_template_part( 'template-parts/content', 'hero' );
	endif;
	?>
</header><!-- /site-header -->

<?php do_action( 'fastblog_before_content' ); ?>
