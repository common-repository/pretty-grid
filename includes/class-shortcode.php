<?php
/**
 * Pretty_Grid_Shortcode Class
 *
 * Plugin Shortcode Class
 *
 * @since  1.0.0
 * @package Pretty Grid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Shortcode' ) ) :

/**
 * Class Pretty_Grid_Shortcode
 */
Class Pretty_Grid_Shortcode
{
    const SHORTCODE_TAG = 'pretty_grid_gallery';

	/**
	 * Store id objects
	 *
	 * @var int
	 */
	public $id = '';

	public function __construct ($id) {
		add_shortcode( self::SHORTCODE_TAG, array( $this,'register' ) );
	}

    public function register( $id ) {

        if(!empty($id)){
            $model = Pretty_Grid_Field_Model::model()->load( $id );
            if(is_object($model)){
                $settings = $model->settings;
                $theme = 'theme-'.$settings['pretty_grid_theme'];
                $type = $settings['pretty_grid_selected_type'];
            }

            // Prepare woo product loop data
            $loop = $this->parse_query($settings);

            ob_start();
			echo "<div class='pretty_grid_gallery_container'>";
			while( $loop->have_posts() ) : $loop->the_post();

				global $post, $product;

				$thumb = get_post_thumbnail_id();

				// crop the image if the cropping is enabled.

				$aazz_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
				$wpcsu_img = $aazz_thumb['0'];

				$wpcsu_img  = ! empty( $wpcsu_img ) ? $wpcsu_img : wc_placeholder_img_src();
				$sale_price = $product->get_sale_price();
				$ratings    = ( ( $product->get_average_rating() / 5 ) * 100 );
                include PRETTY_GRID_DIR . 'admin/views/shortcode/'.$type.'/'.$theme.'.php';

			endwhile;

			wp_reset_postdata();

			echo "</div>";

            $gallery_content = ob_get_contents();
            ob_end_clean();
            return $gallery_content;
        }
	}

	public function parse_query( $data_array ) {
		$value = is_array( $data_array ) ? $data_array : array();
		extract( $value );
		// $paged                          =  wcpcsu_get_paged_num();
		$paged                          = ! empty( $paged ) ? $paged : '';
		$common_args = array(
			'post_type'      => 'product',
			'posts_per_page' => ! empty( $pretty_grid_products_per_page) ? intval( $pretty_grid_products_per_page ) : 12,
			'post_status'    => 'publish',
		);

		if( $pretty_grid_product_type == "latest" ) {
			$args = $common_args;
		}
		elseif( $pretty_grid_product_type == "older" ) {
			$older_args = array(
				'orderby'     => 'date',
				'order'       => 'ASC'
			);
			$args = array_merge( $common_args, $older_args );
		}
		elseif( $pretty_grid_product_type == "featured" ) {
			$meta_query  = WC()->query->get_meta_query();
			$tax_query   = WC()->query->get_tax_query();

			$tax_query[] = array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => 'featured',
				'operator' => 'IN',
			);
			$featured_args = array(
				'meta_query' => $meta_query,
				'tax_query' => $tax_query,
			);
			$args = array_merge( $common_args, $featured_args );
		}

		else {
			$args = $common_args;
		}

		$loop = new WP_Query( $args );

		return $loop;
	}

} // END CLASS Pretty_Grid_Shortcode

endif;