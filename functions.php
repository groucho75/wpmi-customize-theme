<?php

/**
 * Load theme styles.
 */
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


//------------------------------------------------------------------------------------------------------------------


/**
 * Register js for Customize live preview.
 */
function theme_customize_preview_js() {
	wp_enqueue_script( 'customize_preview_js', get_stylesheet_directory_uri() .'/js/customize.js', array( 'customize-preview', 'jquery' ) );
}
add_action( 'customize_preview_init', 'theme_customize_preview_js' );


/**
 * Register my settings for customizer.
 *
 * @param $wp_customize
 */
function theme_customize_register( $wp_customize ) {

	/**
	 * Add a Setting to Title section
	 */
	$wp_customize->add_setting( 'author_name', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'default' => '',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( 'author_name', array(
		'type' => 'text',
		'section' => 'title_tagline',
		'label' => __( 'The blog author name' ),
		'description' => __( 'Write here the author name of the blog.' ),
	) );


	/**
	 * A checkbox to show/hide the Author name.
	 */
	$wp_customize->add_setting(	'show_author_name', array(
		'default' => 'true',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control(	'show_author_name',	array(
		'type' => 'checkbox',
		'label' => __('Show author name in header'),
		'section' => 'title_tagline',
	) );


	/**
	 * Add an Author photo.
	 */
	$wp_customize->add_setting( 'photo_upload', array(
		'transport' => 'refresh',
		//'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'photo_upload',
			array(
				'label' => __('Photo upload'),
				'section' => 'title_tagline',
				'settings' => 'photo_upload'
			)
		)
	);

}

add_action('customize_register','theme_customize_register');



