<?php
// Display Shortcode

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

// Shortcode Settings
$settings = array();

if(isset($id) && !empty($id)){
    $model = Pretty_Grid_Field_Model::model()->load( $id );
    if(is_object($model)){
        $settings = $model->settings;
    }
    switch ( $settings['pretty_grid_selected_type'] ) {
        case 'post':
	        echo "<div class='pretty_grid_gallery_container_".$id."'>";
                // Prepare post loop data
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => $settings['pretty_grid_items_limit'],
                    'nopaging'  => false,
                    'order'     => 'DESC',
                    'orderby'   => 'ID',
                );
                $post_query = new WP_Query($args);
                while( $post_query->have_posts() ) {
                    $post_query->the_post();
                    global $post;
                    $aazz_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
                    $wpcsu_img = $aazz_thumb['0'];
                    include PRETTY_GRID_DIR . 'admin/views/shortcode/'.$settings['pretty_grid_selected_type'].'.php';
                }
                wp_reset_postdata();
	        echo "</div>";
	        break;
	    case 'youtube':
	        echo "<div class='pretty_grid_gallery_container_".$id."'>";
            if(isset($id) && !empty($id)){
                // Fetch original data from cache
                $pretty_grid_cache_key = 'pretty_grid_cache_'.$id;
                $pretty_grid_cache_value = get_option( $pretty_grid_cache_key, false );
                $feed_data = json_decode($pretty_grid_cache_value, true);
                $i == 0;
                foreach ( $feed_data as $key => $video ) {
                    if(++$i > $settings['pretty_grid_items_limit']) break;
			        include PRETTY_GRID_DIR . 'admin/views/shortcode/'.$settings['pretty_grid_selected_type'].'.php';
                }
            }
	        echo "</div>";
	        break;
        case 'vimeo':
            echo "<div class='pretty_grid_gallery_container_".$id."'>";
                if(isset($id) && !empty($id)){
                   // Fetch original data from cache
                   $pretty_grid_cache_key = 'pretty_grid_cache_'.$id;
                   $pretty_grid_cache_value = get_option( $pretty_grid_cache_key, false );
                   $feed_data = json_decode($pretty_grid_cache_value, true);
                   $i == 0;
                   foreach ( $feed_data as $key => $video ) {
                    if(++$i > $settings['pretty_grid_items_limit']) break;
                       include PRETTY_GRID_DIR . 'admin/views/shortcode/'.$settings['pretty_grid_selected_type'].'.php';
                   }
                }
            echo "</div>";
            break;
        case 'twitter':
            echo "<div class='pretty_grid_gallery_container_".$id."'>";
                if(isset($id) && !empty($id)){
                    // Fetch original data from cache
                    $pretty_grid_cache_key = 'pretty_grid_cache_'.$id;
                    $pretty_grid_cache_value = get_option( $pretty_grid_cache_key, false );
                    $source_data = json_decode($pretty_grid_cache_value, true);
                    $user = $source_data['user'];
                    $i == 0;
                    foreach ( $source_data['feeds'] as $key => $tweet ) {
                        if( isset($tweet['image_url']) && !empty($tweet['image_url']) ) {
                            if(++$i > $settings['pretty_grid_items_limit']) break;
                            include PRETTY_GRID_DIR . 'admin/views/shortcode/'.$settings['pretty_grid_selected_type'].'.php';
                        }
                    }
                }
            echo "</div>";
            break;
        case 'woocommerce':
            echo "<div class='pretty-grid-woocommerce pretty_grid_gallery_container_".$id."' id='pretty-grid-light-gallery'>";
                // Prepare woo product loop data
                $loop = pretty_grid_parse_query($settings);
                while( $loop->have_posts() ) {
                    $loop->the_post();

                    global $post, $product;

                    $thumb = get_post_thumbnail_id();

                    // crop the image if the cropping is enabled.

                    $aazz_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                    $wpcsu_img = $aazz_thumb['0'];

                    $wpcsu_img  = ! empty( $wpcsu_img ) ? $wpcsu_img : wc_placeholder_img_src();
                    $sale_price = $product->get_sale_price();
                    $ratings    = ( ( $product->get_average_rating() / 5 ) * 100 );
                    include PRETTY_GRID_DIR . 'admin/views/shortcode/'.$settings['pretty_grid_selected_type'].'.php';
                }
                wp_reset_postdata();
            echo "</div>";
            break;
		case 'images':
			echo "<div class='pretty_grid_gallery_container_".$id."' id='pretty-grid-light-gallery'>";
                $i = 0;
		        foreach ( $settings['attachments'] as $key => $attachment ) {
                    if(++$i > $settings['pretty_grid_items_limit']) break;
			        include PRETTY_GRID_DIR . 'admin/views/shortcode/'.$settings['pretty_grid_selected_type'].'.php';
                }
	        echo "</div>";
			break;
	}



}
?>


