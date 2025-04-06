<?php
/**
 * Manga Starter: Theme Customizer
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function mangastarter_customize_register( $wp_customize ) {
	
	/**
     * Add the Theme Options settings.
     */
	$wp_customize->add_setting( 'owl-carousel', array(
		'default'           => 'hide',
		'transport'         => 'refresh',
		'sanitize_callback' => 'mangastarter_sanitize_radio',
	) );
	
	$wp_customize->add_setting( 'scrollup', array(
		'default'           => 'hide',
		'transport'         => 'refresh',
		'sanitize_callback' => 'mangastarter_sanitize_radio',
	) );
	
	$wp_customize->add_setting( 'proud-of-wordpress', array(
		'default'           => 'hide',
		'transport'         => 'refresh',
		'sanitize_callback' => 'mangastarter_sanitize_radio',
	) );
	
	/**
     * Add the Theme Options controls.
     */
	
	$wp_customize->add_control( 'owl-carousel', array(
		'type'    => 'radio',
		'label'    => __( 'Latest Mangas', 'mangastarter' ),
		'choices'  => array(
			'show'  => __( 'Show', 'mangastarter' ),
			'hide'   => __( 'Hide', 'mangastarter' ),
		),
		'section'  => 'front-carousel',
		'priority' => 5,
	) );
	
	$wp_customize->add_control( 'scrollup', array(
		'type'    => 'radio',
		'label'    => __( 'Scroll Up Button', 'mangastarter' ),
		'choices'  => array(
			'show'  => __( 'Show', 'mangastarter' ),
			'hide'   => __( 'Hide', 'mangastarter' ),
		),
		'section'  => 'footer-settings',
		'priority' => 5,
	) );
	
	$wp_customize->add_control( 'proud-of-wordpress', array(
		'type'    => 'radio',
		'label'    => __( 'Proudly Powered by WordPress', 'mangastarter' ),
		'choices'  => array(
			'show'  => __( 'Show', 'mangastarter' ),
			'hide'   => __( 'Hide', 'mangastarter' ),
		),
		'section'  => 'footer-settings',
		'priority' => 5,
	) );
    
    /**
     * Add the Theme Options panel and sections.
     */
    $wp_customize->add_panel( 'options_panel', array(
        'title'       => __( 'Theme Options', 'mangastarter' ),
        'description' => __( 'Configure your theme settings', 'mangastarter' ),
    ) );
	
	$wp_customize->add_section( 'front-carousel', array(
		'title'           => __( 'Front Carousel', 'mangastarter' ),
		'panel'           => 'options_panel',
	) );
	
	$wp_customize->add_section( 'footer-settings', array(
		'title'           => __( 'Footer', 'mangastarter' ),
		'panel'           => 'options_panel',
	) );
	
	/**
	 * Sanitize the Show/Hide radio buttons.
	 */
	function mangastarter_sanitize_radio( $input ) {
		$valid = array( 'show', 'hide' );
		if ( in_array( $input, $valid ) ) {
			return $input;
		}
		return 'hide';
	}
}
add_action( 'customize_register', 'mangastarter_customize_register' );