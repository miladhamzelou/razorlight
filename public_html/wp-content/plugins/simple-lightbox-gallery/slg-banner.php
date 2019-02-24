<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
wp_enqueue_style( 'slg-banner', WEBLIZAR_SLGF_PLUGIN_URL . 'css/slg-banner.css' );
$slg_imgpath = WEBLIZAR_SLGF_PLUGIN_URL . "images/slg_pro.png";
?>
<div class="wb_plugin_feature notice  is-dismissible">
    <div class="wb_plugin_feature_banner default_pattern pattern_ ">
        <div class="wb-col-md-6 wb-col-sm-12 box">
            <div class="ribbon"><span>Go Pro</span></div>
            <img class="wp-img-responsive" src="<?php echo $slg_imgpath; ?>" alt="img">
        </div>
        <div class="wb-col-md-6 wb-col-sm-12 wb_banner_featurs-list">
            <span class="gp_banner_head"><h2><?php _e( 'Lightbox Slider Pro Features', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?> </h2></span>
            <ul>
                <li><?php _e( 'Gallery Layout', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></li>
                <li><?php _e( 'Unlimited Hover Color', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></li>
                <li><?php _e( '500 plus Font Style', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></li>
                <li><?php _e( 'Isotope or Masonary Effects', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></li>
                <li><?php _e( '10 Types Hover Color Opacity', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></li>
                <li><?php _e( '8 Type of Hover Animations', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></li>
                <li><?php _e( 'Multiple Image uploader', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></li>
                <li><?php _e( '8 Types of Lightbox Integrated', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></li>
                <li><?php _e( 'Drag and Drop image Position', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></li>
                <li><?php _e( 'Shortcode Button on post or page', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></li>
                <li><?php _e( 'Font Icon Customization & Many More', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></li>
				<li><?php _e( 'Hide or Show Gallery Title and Label', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></li>
            </ul>
            <div class="wp_btn-grup">
                <a class="wb_button-primary" href="http://demo.weblizar.com/lightbox-slider-pro-demo/"
                   target="_blank"><?php _e( 'View Demo', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></a>
                <a class="wb_button-primary" href="https://weblizar.com/plugins/lightbox-slider-pro/"
                   target="_blank"><?php _e( 'Buy Now', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?> $12</a>
            </div>

        </div>
    </div>
</div>