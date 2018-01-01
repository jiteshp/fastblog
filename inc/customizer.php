<?php
/**
 * Customizer
 *
 * Contains the functions & hooks used for customizer functionality.
 *
 * @package FastBlog
 * @author Jitesh Patil <jitesh.patil@gmail.com>
 * @since 1.0.0
 */

/**
 * Hero
 *
 * Adds customizer options for the hero section.
 *
 * @since 1.0.0
 */
function fastblog_customizer_options( $wp_customize ) {
	/**
	 * Add hero page option.
	 */
	$wp_customize->add_setting( 'fastblog_hero_page', array(
		'default'			=> 0,
		'sanitize_callback'	=> 'absint',
	) );
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, 'fastblog_hero_page', array(
			'label'	  => esc_html__( 'Header Content', 'fastblog' ),
			'section' => 'header_image',
			'type'	  => 'dropdown-pages',
		)
	) );

	/**
	 * Add accent color option.
	 */
	$wp_customize->add_setting( 'fastblog_accent_color', array(
		'default' 			=> '#0077C0',
		'sanitize_callback'	=> 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'fastblog_accent_color', array(
			'label'	  	  => esc_html__( 'Accent Color', 'fastblog' ),
			'section' 	  => 'colors',
		)
	) );
}

add_action( 'customize_register', 'fastblog_customizer_options' );

/**
 * Custom styles
 *
 * Output custom styles set by the customizer.
 *
 * @since 1.0.0
 */
function fastblog_styles() {
	$header_text_color = get_header_textcolor();
	$accent_color = get_theme_mod( 'fastblog_accent_color', '#0077C0' );

	$custom_css = "
		a {
			color: {$accent_color};
		}

		button, input[type=submit], input[type=button] {
			background-color: {$accent_color};
			border-color: {$accent_color};
		}

		.site-header,
		.site-header a {
			color: #{$header_text_color};
		}

		.button {
			background-color: {$accent_color};
		}";

	if ( is_front_page() && get_header_image() ) {
		$header_image_url = esc_url( get_header_image() );
		$custom_css .= "
			.site-header {
				background-image: url( '{$header_image_url}' );
			}";
	}

	wp_add_inline_style( 'fastblog-style', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'fastblog_styles' );
