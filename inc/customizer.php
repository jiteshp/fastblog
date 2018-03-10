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
			'description'		=> esc_html__( 'Set color for links & buttons.', 'fastblog' ),
		),
		'fastblog_header_bg_color' => array(
			'active_callback'	=> '',
			'default'			=> '#000000',
			'label'				=> esc_html__( 'Header Background Color', 'fastblog' ),
			'description'		=> esc_html__( 'Set the site header background color.', 'fastblog' ),
		),
		'fastblog_header_text_color' => array(
			'active_callback'	=> '',
			'default'			=> '#FFFFFF',
			'label'				=> esc_html__( 'Header Text Color', 'fastblog' ),
			'description'		=> esc_html__( 'Set the site header text color. Used for menu & hero widgets.', 'fastblog' ),
		),
		'fastblog_header_overlay_color' => array(
			'active_callback'	=> 'fastblog_is_hero_area_visible',
			'default'			=> '#000000',
			'label'				=> esc_html__( 'Header Overlay Color', 'fastblog' ),
			'description'		=> esc_html__( 'Set the site header overlay color.', 'fastblog' ),
		),
	);

	foreach ( $fastblog_colors as $color => $atts ) {
		$wp_customize->add_setting( $color, array(
			'default'			=> $atts['default'],
			'sanitize_callback'	=> 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color, array(
			'active_callback'	=> $atts['active_callback'],
			'description'		=> $atts['description'],
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
		'active_callback'	=> 'fastblog_is_hero_area_visible',
		'description'		=> esc_html__( 'Set the header overlay opacity (0 to 1).', 'fastblog' ),
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
	 * Add theme options panel.
	 */
	$wp_customize->add_panel( 'fastblog_theme_options', array(
		'priority'	=> 40,
		'title'		=> esc_html__( 'Theme Options', 'fastblog' ),
	) );

	/**
	 * Add fonts section.
	 */
	$wp_customize->add_section( 'fastblog_fonts', array(
		'panel'		=> 'fastblog_theme_options',
		'title'		=> esc_html__( 'Fonts', 'fastblog' ),
	) );

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

	/**
	 * Add hero section.
	 */
	$wp_customize->add_section( 'fastblog_hero_area', array(
		'panel'		=> 'fastblog_theme_options',
		'title'		=> esc_html__( 'Hero Area', 'fastblog' ),
	) );

	$wp_customize->add_setting( 'fastblog_hero_bg_image', array(
		'default'			=> false,
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fastblog_hero_bg_image', array(
		'label'			=> esc_html__( 'Background Image', 'fastblog' ),
		'section'		=> 'fastblog_hero_area',
	) ) );

	/**
	 * Add miscellaneous section.
	 */
	$wp_customize->add_section( 'fastblog_misc', array(
		'panel'		=> 'fastblog_theme_options',
		'title'		=> esc_html__( 'Miscellaneous', 'fastblog' ),
	) );

	$wp_customize->add_setting( 'fastblog_show_post_date', array(
		'default'			=> true,
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fastblog_show_post_date', array(
		'label'			=> esc_html__( 'Show post date?', 'fastblog' ),
		'description' 	=> esc_html__( 'Uncheck to hide published & modified dates on blog posts.', 'fastblog' ),
		'section'		=> 'fastblog_misc',
		'type'			=> 'checkbox',
	) ) );

	/**
	 * Adds descriptions to default colors. Changes header_textcolor label.
	 */
	$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title & Tagline Color', 'fastblog' );
	$wp_customize->get_control( 'header_textcolor' )->description = esc_html__( 'Set the site title & tagline text color.', 'fastblog' );
	$wp_customize->get_control( 'background_color' )->description = esc_html__( 'Set the page background color.', 'fastblog' );
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
	$header_text_color 		= get_theme_mod( 'fastblog_header_text_color', '#FFFFFF' );
	$header_overlay_color 	= get_theme_mod( 'fastblog_header_overlay_color', '#000000' );
	$header_overlay_opacity = get_theme_mod( 'fastblog_header_overlay_opacity', '0.7' );
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
			color: white !important;
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
			color: {$header_text_color};
		}

		.site-title,
		.site-title a,
		.site-description {
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

	if ( fastblog_is_hero_area_visible() ) {
		$hero_bg_image = get_theme_mod( 'fastblog_hero_bg_image', false );

		$custom_css .= "
			.site-header {
				background-image: url( '{$hero_bg_image}' );
			}
			.site-header:before {
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

	if ( ! get_theme_mod( 'header_text', true ) ) {
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

/**
 * Is hero area visible?
 *
 * @return boolean
 * @since 1.6.0
 */
function fastblog_is_hero_area_visible() {
	$current_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$show_on_front = get_option( 'show_on_front' );

	return (
		is_active_sidebar( 'sidebar-hero' ) &&
		(
			( is_home() && 1 == $current_page ) ||
			( is_front_page() && 'page' == $show_on_front )
		)
	);
}
