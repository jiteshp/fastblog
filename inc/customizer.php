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
	 * Add color options.
	 */
	$fastblog_colors = array(
		'fastblog_accent_color' => array(
			'active_callback'	=> '',
			'default'			=> '#0077C0',
			'label'				=> esc_html__( 'Accent Color', 'fastblog' ),
		),
		'fastblog_header_bg_color' => array(
			'active_callback'	=> '',
			'default'			=> '#000000',
			'label'				=> esc_html__( 'Header Background Color', 'fastblog' ),
		),
		'fastblog_header_overlay_color' => array(
			'active_callback'	=> 'fastblog_show_header_overlay_options',
			'default'			=> '#000000',
			'label'				=> esc_html__( 'Header Overlay Color', 'fastblog' ),
		),
	);

	foreach ( $fastblog_colors as $color => $atts ) {
		$wp_customize->add_setting( $color, array(
			'default'			=> $atts['default'],
			'sanitize_callback'	=> 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color, array(
			'active_callback'	=> $atts['active_callback'],
			'label'				=> $atts['label'],
			'section'			=> 'colors',
		) ) );
	}

	/**
	 * Add header overlay opacity option.
	 */
	$wp_customize->add_setting( 'fastblog_header_overlay_opacity', array(
		'default'			=> '0.7',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fastblog_header_overlay_opacity', array(
		'active_callback'	=> 'fastblog_show_header_overlay_options',
		'label'				=> esc_html__( 'Header Overlay Opacity', 'fastblog' ),
		'section'			=> 'colors',
		'type'				=> 'range',
		'input_attrs'		=> array(
			'min'			=> '0',
			'max'			=> '1',
			'step'			=> '0.1',
		),
	) ) );

	/**
	 * Add fonts section.
	 */
	$wp_customize->add_section( 'fastblog_fonts', array(
		'priority'	=> 40,
		'title'		=> esc_html__( 'Fonts', 'fastblog' ),
	) );

	/**
	 * Add fonts selector control.
	 */
	$wp_customize->add_setting( 'fastblog_font', array(
		'default'			=> 0,
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fastblog_font', array(
		'label'		=> esc_html__( 'Select Font', 'fastblog' ),
		'section'	=> 'fastblog_fonts',
		'type'		=> 'select',
		'choices'	=> fastblog_get_font_choices(),
	) ) );
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
	$accent_color 			= get_theme_mod( 'fastblog_accent_color', '#0077C0' );
	$header_bg_color 		= get_theme_mod( 'fastblog_header_bg_color', '#000000' );
	$header_overlay_color 	= get_theme_mod( 'fastblog_header_overlay_color', '#000000' );
	$header_overlay_opacity = get_theme_mod( 'fastblog_header_overlay_opacity', '0.7' );
	$header_text_color 		= get_header_textcolor();
	$font					= fastblog_get_font();

	$custom_css = "
		body, input, select, textarea {
			font-family: '{$font}', 'sans serif';
		}

		a {
			border-bottom-color: {$accent_color};
			color: {$accent_color};
		}

		.button, .button-min, button, input[type=submit], input[type=button] {
			background-color: {$accent_color};
			border-color: {$accent_color} !important;
		}

		.button-min {
			color: {$accent_color} !important;
		}

		.site-header {
			background-color: {$header_bg_color};
		}

		.site-header,
		.site-header a,
		.site-header .h1, .site-header h1,
		.site-header .h2, .site-header h2,
		.site-header .h3, .site-header h3,
		.site-header .h4, .site-header h4,
		.site-header .h5, .site-header h5,
		.site-header .h6, .site-header h6 {
			color: #{$header_text_color};
		}

		.primary-menu a {
			background-color: {$accent_color};
		}

		@media( min-width: 992px ) {
			.primary-menu a {
				background-color: transparent;
			}

			.primary-menu .sub-menu a {
				background-color: {$accent_color};
			}
		}";

	if ( is_front_page() && get_header_image() ) {
		$header_image_url = esc_url( get_header_image() );
		$custom_css .= "
			.home .site-header {
				background-image: url( '{$header_image_url}' );
			}
			.home .site-header:before {
				background-color: {$header_overlay_color};
				bottom: 0;
				content: '';
				left: 0;
				opacity: {$header_overlay_opacity};
				position: absolute;
				right: 0;
				top: 0;
			}";
	}

	if ( ! display_header_text() ) {
		$custom_css .= '
			.site-title, .site-description {
				clip: rect( 1px, 1px, 1px, 1px );
				position: absolute;
			}';
	}

	wp_add_inline_style( 'fastblog-style', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'fastblog_styles' );

/**
 * Checks if the overlay options should be shown/updated in customizer.
 *
 * @return boolean true if front page and has header image, otherwise false.
 * @since 1.1.0
 */
function fastblog_show_header_overlay_options() {
	return is_front_page() && get_header_image();
}

/**
 * Returns an array of theme fonts.
 *
 * @return array of theme fonts & their Google font URLs.
 * @since 1.4.0
 */
function fastblog_get_font_choices() {
	return array(
		esc_html__( 'Lato', 'fastblog' ),
		esc_html__( 'Assistant', 'fastblog' ),
		esc_html__( 'Barlow', 'fastblog' ),
		esc_html__( 'Catamaran', 'fastblog' ),
		esc_html__( 'Hind Guntur', 'fastblog' ),
		esc_html__( 'Mada', 'fastblog' ),
		esc_html__( 'Mukta Mahee', 'fastblog' ),
		esc_html__( 'Nunito Sans', 'fastblog' ),
		esc_html__( 'Padauk', 'fastblog' ),
		esc_html__( 'Roboto', 'fastblog' ),
		esc_html__( 'Source Sans Pro', 'fastblog' ),
	);
}

/**
 * Returns the selected font.
 *
 * @return string the name of the selected font.
 * @since 1.4.0
 */
function fastblog_get_font() {
	$font_index = get_theme_mod( 'fastblog_font', 0 );
	$font_choices = fastblog_get_font_choices();

	return $font_choices[ $font_index ];
}

/**
 * Returns theme font URL.
 *
 * @return string the theme font URL
 * @since 1.4.0
 */
function fastblog_get_font_url() {
	return sprintf(
		'https://fonts.googleapis.com/css?family=%s:400,400i,700,700i|Inconsolata',
		fastblog_get_font()
	);
}
