<?php

/*
Plugin Name: ACF for WooCommerce Product
Plugin URI: https://github.com/pmbaldha
Description: Displays  WooCommerce Product ACF fileds value in front end.
Version: 1.5.1
Author:      Prashant Baldha
Requires at least: 3.8
Tested up to: 5.1
Author URI:  https://profiles.wordpress.org/pmbaldha#content-plugins
WC requires at least: 3.4.5
WC tested up to: 3.5.5
ACF for WooCommerce Product is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Email Tracker is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Email Tracker. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
define( 'AFWP_PATH', plugin_dir_path( __FILE__ ) );
// Exit if accessed directly
if ( !function_exists( 'afwp' ) ) {
    return;
}
// Create a helper function for easy SDK access.
function afwp()
{
    global  $afwp ;
    
    if ( !isset( $afwp ) ) {
        // Include Freemius SDK.
        require_once dirname( __FILE__ ) . '/freemius/start.php';
        $afwp = fs_dynamic_init( array(
            'id'             => '1814',
            'slug'           => 'acf-for-woocommerce-product',
            'type'           => 'plugin',
            'public_key'     => 'pk_51521a906f2dc207465f1c37cf0a0',
            'is_premium'     => false,
            'has_addons'     => false,
            'has_paid_plans' => true,
            'trial'          => array(
            'days'               => 7,
            'is_require_payment' => true,
        ),
            'menu'           => array(
            'slug'       => 'afwp',
            'first-path' => 'admin.php?page=afwp',
        ),
            'is_live'        => true,
        ) );
    }
    
    return $afwp;
}

// Init Freemius.
afwp();
// Signal that SDK was initiated.
do_action( 'afwp_loaded' );
add_action( 'init', 'afwp_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function afwp_load_textdomain()
{
    load_plugin_textdomain( 'afwp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

if ( is_admin() ) {
    require_once AFWP_PATH . 'admin-functions.php';
}
add_action( 'woocommerce_product_meta_end', 'afwp_product_meta' );
function afwp_product_meta()
{
    
    if ( class_exists( 'Acf' ) ) {
        $fields = get_field_objects();
        //var_dump( $fields );
        if ( $fields ) {
            foreach ( $fields as $field_name => $field ) {
                if ( $field_name == '' ) {
                    continue;
                }
                ?>
				<span class="posted_in">
					<?php 
                echo  $field['label'] . ': ' ;
                ?>
                    &nbsp;
                    <?php 
                afwp_woo_render_acf_field( $field );
                ?>
				</span>
                <?php 
            }
        }
    }

}

if ( !function_exists( 'afwp_woo_render_acf_field' ) ) {
    function afwp_woo_render_acf_field( $field )
    {
        if ( !defined( 'AFWP_PREMIUM' ) ) {
            switch ( $field['type'] ) {
                default:
                    //select multiple
                    
                    if ( is_array( $field['value'] ) ) {
                        $field_val = $field['value'];
                        array_filter( $field_val );
                        $field_val = array_map( 'trim', $field_val );
                        $field_val = array_map( 'esc_html', $field_val );
                        echo  implode( ', ', $field_val ) ;
                    } else {
                        echo  esc_html( $field['value'] ) ;
                    }
            
            }
        }
    }

}