<?php

// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Enqueue your own stylesheet
 */
function wp_enqueue_woocommerce_style(){
	wp_register_style( 'parentstyle', get_template_directory_uri() . '/style.css' );
	
	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_style( 'parentstyle' );
	}
}

add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );

/**
 * Add Google Fonts
 */
add_action( 'wp_enqueue_scripts', 'add_google_fonts' );
function add_google_fonts() {
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=EB+Garamond|Spinnaker', array(), 'twentyninteen-child' );

}

/**
 * Advanced Custopm Fields Template Usage
 */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}