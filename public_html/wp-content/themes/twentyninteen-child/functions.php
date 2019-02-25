
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