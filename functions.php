<?php
/**
 * Functions
 *
 * Contains the functions, actions & filters used in the theme.
 *
 * @package FastBlog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.0.0
 */

/**
 * Content width
 *
 * Sets the content width based on the theme's design.
 *
 * @since 1.0.0
 */
function fastblog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fastblog_content_width', 630 );
}

add_action( 'after_setup_theme', 'fastblog_content_width' );

/**
 * Theme setup
 *
 * Adds support for various theme features. Override in child theme by creating your own 'fastblog_setup' function.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'fastblog_setup' ) ) {
	function fastblog_setup() {
		load_theme_textdomain( 'fastblog' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'html5', array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
		) );

		add_theme_support( 'custom-logo', array(
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
			'height'	  => 96,
			'width'	  	  => 300,
		) );

		add_theme_support( 'custom-background' );

		add_theme_support( 'custom-header', array(
			'default-text-color' => 'FFFFFF',
			'flex-height' 		 => true,
			'flex-width'  		 => true,
			'height'  	  		 => 1200,
			'width'  	  		 => 1600,
		) );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 628, true );

		register_nav_menu( 'primary-menu', esc_html__( 'Primary Menu', 'fastblog' ) );

		add_editor_style( array(
			get_template_directory_uri() . '/style-editor.css',
			'https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i|Inconsolata',
		) );
	}
} // End if().

add_action( 'after_setup_theme', 'fastblog_setup' );

/**
 * Sidebar
 *
 * Registers the theme sidebar.
 *
 * @since 1.0.0
 */
function fastblog_sidebar() {
	register_sidebar( array(
		'id'			=> 'sidebar',
		'name'			=> esc_html__( 'Sidebar', 'fastblog' ),
		'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
}

add_action( 'widgets_init', 'fastblog_sidebar' );

/**
 * Assets
 *
 * Enqueues theme styles & scripts.
 *
 * @since 1.0.0
 */
function fastblog_assets() {
	wp_enqueue_style( 'fastblog-style', get_stylesheet_uri() );
	wp_enqueue_style( 'fastblog-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i|Inconsolata' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'fastblog-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), null, true );
}

add_action( 'wp_enqueue_scripts', 'fastblog_assets' );

/**
 * Excerpt length
 *
 * Returns a custom excerpt length.
 *
 * @param int $length The default excerpt length
 * @return int the custom excerpt length
 * @since 1.0.0
 */
function fastblog_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}

	return 30;
}

add_filter( 'excerpt_length', 'fastblog_excerpt_length' );

/**
 * Excerpt more
 *
 * Returns a custom excerpt more markup.
 *
 * @param string $more The default excerpt more markup
 * @return string the custom excerpt more markup
 * @since 1.0.0
 */
function fastblog_excerpt_more( $more ) {
	global $post;

	return sprintf( '&hellip;<p><a href="%1$s" class="more-link">%2$s</a></p>', esc_url( get_permalink( $post->ID ) ), esc_html__( 'Read More', 'fastblog' ) );
}

add_filter( 'excerpt_more', 'fastblog_excerpt_more' );

/**
 * Body classes
 *
 * Returns custom body css classes.
 *
 * @param array $classes The default body classes
 * @return array the custom body classes
 * @since 1.0.0
 */
function fastblog_body_class( $classes ) {
	if ( ! is_active_sidebar( 'sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}

add_filter( 'body_class', 'fastblog_body_class' );

/**
 * Include required files
 */
include_once get_template_directory() . '/inc/customizer.php';
