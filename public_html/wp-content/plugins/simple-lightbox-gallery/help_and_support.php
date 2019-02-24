<div>
    <center><h2 class="head_title"><?php _e( 'Simple Lightbox Gallery', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></h2></center>
    <center>
        <h3 class="head_desc"><?php _e( 'plugin is allow users to view larger versions of images', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?>,<?php _e( 'simple slide shows and Gallery view with grid layout', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?>
            .</h3></center>
</div>

<p class="well"><?php _e( 'Rate Us', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></p>
<h4 class="para"><?php _e( 'If you are enjoying using our', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?> <b>Simple Lightbox Gallery
    </b> <?php _e( 'plugin and find it useful', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?>
    , <?php _e( 'then please consider writing a positive feedback', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?>
    . <?php _e( 'Your feedback will help us to encourage and support the plugin continued development and better user support', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?>
    .</h4>
<div style="background:#EF4238;display:inline-block;margin-left: 30px;padding: 5px;">
    <a class="acl-rate-us" style="text-align:center; text-decoration: none;font:normal 30px; "
       href="https://wordpress.org/plugins/simple-lightbox-gallery/#reviews" target="_blank">
        <span class="dashicons dashicons-star-filled"></span>
        <span class="dashicons dashicons-star-filled"></span>
        <span class="dashicons dashicons-star-filled"></span>
        <span class="dashicons dashicons-star-filled"></span>
        <span class="dashicons dashicons-star-filled"></span>
    </a>
</div>
<p class="well"><?php _e( 'Share Us Your Suggestion', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></p>
<h4 class="para"><?php _e( 'If you have any suggestion or features in your mind then please share us', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?>
    . <?php _e( 'We will try our best to add them in this plugin', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?>.</h4>

<p class="well"><?php _e( 'Language Contribution', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></p>
<h4 class="para"><?php _e( 'Translate this plugin into your language', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></h4>
<h4 class="para"><span class="list_point"><?php _e( 'Question', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></span>
    : <?php _e( 'How to convert Plguin into My Language ', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?>?</h4>
<h4 class="para"><span class="list_point"><?php _e( 'Answer', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></span>
    : <?php _e( 'Contact as to', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?>
    lizarweb@gmail.com <?php _e( 'for translate this plugin into your language', WEBLIZAR_SLGF_TEXT_DOMAIN ); ?>.</h4>

<div style="margin-top:30px;margin-left:30px;">
    <h2 style="font-weight: bold;font-size: 28px;padding-top:10px;"><?php _e( "Change Old Server Image URL", WEBLIZAR_SLGF_TEXT_DOMAIN ); ?></h2>
    <form action="" method="post">
        <input type="submit" value="Change image URL" name="slgfchangeurl"
               style="margin-top:10px; margin-right:10px;background:#31B0D5; text-decoration:none;padding: 8px;color: white;"
               class="btn btn-primary btn-lg">

        <h6 style="font-size: 22px;padding-top: 10px;padding-bottom: 10px;line-height:40px">
            <b><?php _e( "Note", WEBLIZAR_SLGF_TEXT_DOMAIN ); ?>
                :</b> <?php _e( "Use this option after import", WEBLIZAR_SLGF_TEXT_DOMAIN ); ?> <b>Simple Lightbox
                Gallery</b> <?php _e( "to change old server image url to new server image url", WEBLIZAR_SLGF_TEXT_DOMAIN ); ?>
            .</h6>
    </form>
</div>

<?php
if ( isset( $_REQUEST['slgfchangeurl'] ) ) {
    $all_posts = wp_count_posts( 'slgf_slider' )->publish;
    $args      = array( 'post_type' => 'slgf_slider', 'posts_per_page' => $all_posts );
    global $rpg_galleries;
    $rpg_galleries = new WP_Query( $args );

    while ( $rpg_galleries->have_posts() ) : $rpg_galleries->the_post();

        $SLGF_Id               = get_the_ID();
        $SLGF_AllPhotosDetails = unserialize( get_post_meta( $SLGF_Id, 'slgf_all_photos_details', true ) );
        $TotalImages           = get_post_meta( $SLGF_Id, 'slgf_total_images_count', true );
        if ( $TotalImages ) {
            foreach ( $SLGF_AllPhotosDetails as $SLGF_SinglePhotoDetails ) {
                $name = $SLGF_SinglePhotoDetails['slgf_image_label'];
                $url  = $SLGF_SinglePhotoDetails['slgf_image_url'];
                $url1 = $SLGF_SinglePhotoDetails['slgf_12_thumb'];
                $url2 = $SLGF_SinglePhotoDetails['slgf_346_thumb'];
                $url3 = $SLGF_SinglePhotoDetails['slgf_12_same_size_thumb'];
                $url4 = $SLGF_SinglePhotoDetails['slgf_346_same_size_thumb'];
				$img_desc = $SLGF_SinglePhotoDetails['img_desc'];
                //die($url.$url2.$url3.$url4.$url5.$url6.$circle);
                $upload_dir = wp_upload_dir();
                $data       = $url;
                if ( strpos( $data, 'uploads' ) !== false ) {
                    list( $oteher_path, $image_path ) = explode( "uploads", $data );
                    $url = $upload_dir['baseurl'] . $image_path;
                }

                $data = $url1;
                if ( strpos( $data, 'uploads' ) !== false ) {
                    list( $oteher_path, $image_path ) = explode( "uploads", $data );
                    $url1 = $upload_dir['baseurl'] . $image_path;
                }

                $data = $url2;
                if ( strpos( $data, 'uploads' ) !== false ) {
                    list( $oteher_path, $image_path ) = explode( "uploads", $data );
                    $url2 = $upload_dir['baseurl'] . $image_path;
                }

                $data = $url3;
                if ( strpos( $data, 'uploads' ) !== false ) {
                    list( $oteher_path, $image_path ) = explode( "uploads", $data );
                    $url3 = $upload_dir['baseurl'] . $image_path;
                }

                $data = $url4;
                if ( strpos( $data, 'uploads' ) !== false ) {
                    list( $oteher_path, $image_path ) = explode( "uploads", $data );
                    $url4 = $upload_dir['baseurl'] . $image_path;
                }

                $ImagesArray[] = array(
                    'slgf_image_label'         => $name,
                    'slgf_image_url'           => $url,
                    'slgf_12_thumb'            => $url1,
                    'slgf_346_thumb'           => $url2,
                    'slgf_12_same_size_thumb'  => $url3,
                    'slgf_346_same_size_thumb' => $url4,
					'img_desc'           	   => $img_desc
                );
            }
            update_post_meta( $SLGF_Id, 'slgf_all_photos_details', serialize( $ImagesArray ) );
            $ImagesArray = "";
        }
    endwhile;
}
?>

<style>
    body {
        /* This has to be same as the text-shadows below */
        background: #fafafa;
    }

    .acl-rate-us span.dashicons {
        width: 30px;
        height: 30px;
    }

    .acl-rate-us span.dashicons-star-filled:before {
        content: "\f155";
        font-size: 30px;
    }

    .acl-rate-us {
        color: #FBD229 !important;
        padding-top: 5px !important;
    }

    .acl-rate-us span {
        display: inline-block;
    }

    h1 {
        font-family: Helvetica, Arial, sans-serif;
        font-weight: bold;
        font-size: 6em;
        line-height: 1em;
    }

    .inset-text {
        /* Shadows are visible under slightly transparent text color */
        color: rgba(10, 60, 150, 0.8);
        text-shadow: 1px 4px 6px #def, 0 0 0 #000, 1px 4px 6px #def;
    }

    /* Don't show shadows when selecting text */
    ::-moz-selection {
        background: #5af;
        color: #fff;
        text-shadow: none;
    }

    ::selection {
        background: #5af;
        color: #fff;
        text-shadow: none;
    }

    .well {
        min-height: 20px;
        padding: 19px;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
    }

    .head_title {
        color: red;
        font-size: 30px;
    }

    .head_meta_title {
        color: #000;
        font-size: 26px;
    }

    .para {
        padding-left: 25px;
        font-size: 15px;
        font-weight: 600;
    }

    .list_point {
        color: #006799;
        font-weight: 700;
    }

    .plug_list_point {
        color: red;
        font-weight: 700;
    }

    .chng_btn {
        margin-top: 0px;
        margin-right: 10px;
        font-size: 18px;
        font-weight: 700;
        margin-left: 30px;
        color: #fff;
        background: #dc3232;
        text-decoration: none;
    }

    h3.head_desc {
        padding-top: 16px;
        padding-bottom: 20px;
    }

    .detail_btn {
        text-decoration: none;
        color: #000;
        background-color: #7bbaca;
        padding: 4px;
        border-radius: 4px;
        border-right: #ff003b solid 3px;
    }

    .detail_btn:hover {
        color: #000;
    }
</style>