<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

/**
 * Return needed cap for admin pages
 *
 * @since 1.0.0
 * @return string
 */
function pretty_grid_get_admin_cap() {
    $cap = 'manage_options';

    if ( is_multisite() && is_network_admin() ) {
        $cap = 'manage_network';
    }

    return apply_filters( 'pretty_grid_admin_cap', $cap );
}

/**
 * Enqueue admin styles
 *
 * @since 1.0.0
 * @since 1.1 Remove pretty-grid-admin css after migrate to shared-ui
 *
 * @param $version
 */
function pretty_grid_admin_enqueue_styles( $version ) {
    wp_enqueue_style( 'pretty-grid-main-style', PRETTY_GRID_URL . 'assets/css/main.css', array(), $version, false );
    wp_enqueue_style( 'wp-color-picker' );
}

/**
 * Enqueue admin dashboard scripts
 *
 * @since 1.0.0
 *
 * @param       $version
 * @param array $data
 * @param array $l10n
 */
function pretty_grid_admin_enqueue_scripts_dashboard( $version, $data = array(), $l10n = array() ) {
	wp_enqueue_script( 'ionicons', 'https://unpkg.com/ionicons@5.5.2/dist/ionicons.js', array(), $version, false );
    wp_register_script(
        'pretty-grid-dashboard',
        PRETTY_GRID_URL . 'assets/js/admin/dashboard.js',
        array(
            'jquery'
        ),
        $version,
        true
    );

    wp_enqueue_script( 'pretty-grid-dashboard' );

    wp_localize_script( 'pretty-grid-dashboard', 'Pretty_Grid_Data', $data );
}

/**
 * Enqueue admin field list scripts
 *
 * @since 1.0.0
 *
 * @param       $version
 * @param array $data
 * @param array $l10n
 */
function pretty_grid_admin_enqueue_scripts_field_list( $version, $data = array(), $l10n = array() ) {
	wp_enqueue_script( 'ionicons', 'https://unpkg.com/ionicons@5.5.2/dist/ionicons.js', array(), $version, false );

    wp_register_script(
        'pretty-grid-field-list',
        PRETTY_GRID_URL . 'assets/js/admin/field-list.js',
        array(
            'jquery'
        ),
        $version,
        true
    );

    wp_enqueue_script( 'pretty-grid-field-list' );

    wp_localize_script( 'pretty-grid-field-list', 'Pretty_Grid_Data', $data );
}

/**
 * Enqueue admin form editor scripts
 *
 * @since 1.0.0
 *
 * @param       $version
 * @param array $data
 * @param array $l10n
 */
function pretty_grid_admin_enqueue_scripts_field_edit( $version, $data = array(), $l10n = array() ) {
	wp_enqueue_script( 'ionicons', 'https://unpkg.com/ionicons@5.5.2/dist/ionicons.js', array(), $version, false );

    wp_enqueue_script( 'wp-color-picker' );

    wp_register_script(
        'pretty-grid-field-editor',
        PRETTY_GRID_URL . 'assets/js/admin/field-editor.js',
        array(
            'jquery'
        ),
        $version,
        true
    );

    wp_enqueue_script( 'pretty-grid-field-editor' );

    wp_localize_script( 'pretty-grid-field-editor', 'Pretty_Grid_Data', $data );

	wp_enqueue_media();
}

/**
 * Return AJAX url
 *
 * @since 1.0.0
 * @return mixed
 */
function pretty_grid_ajax_url() {
    return admin_url( 'admin-ajax.php', is_ssl() ? 'https' : 'http' );
}

/**
 * Enqueue front styles
 *
 * @since 1.0.0
 *
 * @param $version
 */
function pretty_grid_front_enqueue_styles( $version ) {
	wp_enqueue_style( 'magnific-popup', PRETTY_GRID_URL . 'assets/css/magnific-popup.css', array(), $version, false );
	wp_enqueue_style( 'pretty-grid-front-style', PRETTY_GRID_URL . 'assets/css/front.css', array(), $version, false );
    wp_enqueue_style( 'pretty-grid-slick-style', PRETTY_GRID_URL . 'assets/css/slick.css', array(), $version, false );
    wp_enqueue_style( 'pretty-grid-slick-theme-style', PRETTY_GRID_URL . 'assets/css/slick-theme.css', array(), $version, false );
	wp_enqueue_style( 'lightgallery-bundle-style', PRETTY_GRID_URL . 'assets/css/lightgallery-bundle.min.css', array(), $version, false );
    wp_enqueue_style( 'pretty-grid-justifiedGallery-style', PRETTY_GRID_URL . 'assets/css/justifiedGallery.min.css', array(), $version, false );

}

/**
 * Enqueue front scripts
 *
 * @since 1.0.0
 *
 * @param       $version
 */
function pretty_grid_front_enqueue_scripts( $version ) {
    wp_enqueue_script( 'jquery-slick', PRETTY_GRID_URL . '/assets/js/library/slick.js', array( 'jquery' ), $version, false );
    wp_enqueue_script( 'jquery-magnific-popup', PRETTY_GRID_URL . '/assets/js/library/jquery.magnific-popup.min.js', array( 'jquery' ), $version, false );
	wp_enqueue_script( 'jquery-justified-gallery', PRETTY_GRID_URL . '/assets/js/library/jquery.justifiedGallery.min.js', array( 'jquery' ), $version, false );
    wp_enqueue_script( 'jquery-masonry', PRETTY_GRID_URL . '/assets/js/library/masonry.pkgd.min.js', array( 'jquery' ), $version, false );
    wp_enqueue_script( 'jquery-imagesloaded', PRETTY_GRID_URL . '/assets/js/library/imagesloaded.pkgd.min.js', array( 'jquery' ), $version, false );
}

/**
 * Return Settings Components
 *
 * @since 1.0.0
 * @return array
 */
function pretty_grid_field_settings_components($type) {

    $components_dir = "field/wizard/settings/";

	// switch ( $type ) {
	//     case 'slider':
	//         $components = ['slider'];
	//         break;
	//     case 'grid':
	//         $components = ['grid'];
	//         break;
	// 	case 'images':
	// 		$components = ['images'];
	// 		break;
	// }

	$components = ['slider'];

    foreach($components as $key => $value){
        $components[$key] = $components_dir.$value;
    }

    return $components;
}

/**
 * Return General Components
 *
 * @since 1.0.0
 * @return array
 */
function pretty_grid_field_general_components($type) {

    $components_dir = "field/wizard/general/";

	switch ( $type ) {
	    case 'youtube':
	        $components = ['youtube'];
	        break;
	    case 'vimeo':
	        $components = ['vimeo'];
	        break;
		case 'images':
			$components = ['images'];
			break;
		case 'post':
			$components = ['post'];
			break;
		case 'twitter':
			$components = ['twitter'];
			break;
		case 'woocommerce':
			$components = ['woocommerce'];
			break;
	}

    foreach($components as $key => $value){
        $components[$key] = $components_dir.$value;
    }

    return $components;
}


/**
 * Handle all pagination
 *
 * @since 1.0
 *
 * @param int $total - the total records
 * @param string $type - The type of page (listings or entries)
 *
 * @return string
 */
function pretty_grid_list_pagination( $total, $type = 'listings' ) {
	$pagenum     = isset( $_REQUEST['paged'] ) ? absint( $_REQUEST['paged'] ) : 0; // phpcs:ignore
	$page_number = max( 1, $pagenum );
    $global_settings = get_option('pretty_grid_global_settings');
    $per_page = isset($global_settings['pretty-grid-campaign-per-page']) ? $global_settings['pretty-grid-campaign-per-page'] : 10;
    if ( $total > $per_page ) {
		$removable_query_args = wp_removable_query_args();

		$current_url   = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
		$current_url   = remove_query_arg( $removable_query_args, $current_url );
		$current       = $page_number + 1;
		$total_pages   = ceil( $total / $per_page );
		$total_pages   = absint( $total_pages );
		$disable_first = false;
		$disable_last  = false;
		$disable_prev  = false;
		$disable_next  = false;
		$mid_size      = 2;
		$end_size      = 1;
		$show_skip     = false;

		if ( $total_pages > 10 ) {
			$show_skip = true;
		}

		if ( $total_pages >= 4 ) {
			$disable_prev = true;
			$disable_next = true;
		}

		if ( 1 === $page_number ) {
			$disable_first = true;
		}

		if ( $page_number === $total_pages ) {
			$disable_last = true;

		}

		?>
		<ul class="pretty-grid-pagination">

			<?php if ( ! $disable_first ) : ?>
				<?php
				$prev_url  = esc_url( add_query_arg( 'paged', min( $total_pages, $page_number - 1 ), $current_url ) );
				$first_url = esc_url( add_query_arg( 'paged', min( 1, $total_pages ), $current_url ) );
				?>
				<?php if ( $show_skip ) : ?>
					<li class="pretty-grid-pagination--prev">
						<a href="<?php echo esc_attr( $first_url ); ?>"><i class="pretty-grid-icon-arrow-skip-start" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>
				<?php if ( $disable_prev ) : ?>
					<li class="pretty-grid-pagination--prev">
						<a href="<?php echo esc_attr( $prev_url ); ?>"><i class="pretty-grid-icon-chevron-left" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>
			<?php endif; ?>
			<?php
			$dots = false;
			for ( $i = 1; $i <= $total_pages; $i ++ ) :
				$class = ( $page_number === $i ) ? 'pretty-grid-active' : '';
				$url   = esc_url( add_query_arg( 'paged', ( $i ), $current_url ) );
				if ( ( $i <= $end_size || ( $current && $i >= $current - $mid_size && $i <= $current + $mid_size ) || $i > $total_pages - $end_size ) ) {
					?>
					<li class="<?php echo esc_attr( $class ); ?>"><a href="<?php echo esc_attr( $url ); ?>" class="<?php echo esc_attr( $class ); ?>"><?php echo esc_html( $i ); ?></a></li>
					<?php
					$dots = true;
				} elseif ( $dots ) {
					?>
					<li class="pretty-grid-pagination-dots"><span><?php esc_html_e( '&hellip;' ); ?></span></li>
					<?php
					$dots = false;
				}

				?>

			<?php endfor; ?>

			<?php if ( ! $disable_last ) : ?>
				<?php
				$next_url = esc_url( add_query_arg( 'paged', min( $total_pages, $page_number + 1 ), $current_url ) );
				$last_url = esc_url( add_query_arg( 'paged', max( $total_pages, $page_number - 1 ), $current_url ) );
				?>
				<?php if ( $disable_next ) : ?>
					<li class="pretty-grid-pagination--next">
						<a href="<?php echo esc_attr( $next_url ); ?>"><i class="pretty-grid-icon-chevron-right" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>
				<?php if ( $show_skip ) : ?>
					<li class="pretty-grid-pagination--next">
						<a href="<?php echo esc_attr( $last_url ); ?>"><i class="pretty-grid-icon-arrow-skip-end" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>
			<?php endif; ?>
		</ul>
		<?php
	}
}

if ( ! function_exists( 'pretty_grid_get_current_url' ) ) {
	/**
	 * Retrieves current url
	 *
	 * @return string Current url
	 * @since 3.0.0
	 */
	function pretty_grid_get_current_url() {
		global $wp;

		/**
		 * Returns empty string by default, to avoid problems with unexpected redirects
		 * Added filter to change default behaviour, passing what we think is current page url
		 *
		 * @since 3.0.12
		 */

		/**
		 * APPLY_FILTERS: pretty_grid_current_url
		 *
		 * Filter the current URL.
		 *
		 * @param string $current_url Current URL
		 * @param string $url         URL
		 *
		 * @return string
		 */
		return apply_filters( 'pretty_grid_current_url', '', add_query_arg( $wp->query_vars, home_url( $wp->request ) ) );
	}
}

/**
 * Central per page for form view
 *
 * @since 1.0.0
 * @return int
 */
function pretty_grid_form_view_per_page( $type = 'listings' ) {

    $global_settings = get_option('pretty_grid_global_settings');
    $per_page = isset($global_settings['pretty-grid-campaign-per-page']) ? $global_settings['pretty-grid-campaign-per-page'] : 10;

	// force at least 1 data per page
	if ( $per_page < 1 ) {
		$per_page = 1;
	}
	return apply_filters( 'pretty_grid_form_per_page', $per_page, $type );
}

/**
 * Central per page for form view
 *
 * @since 1.0.0
 * @return string
 */
function pretty_grid_get_campaign_name($id){

	$model = Pretty_Grid_Field_Model::model()->load( $id );

	$settings = $model->settings;

    // Return Campaign Name
	if ( ! empty( $settings['pretty_grid_campaign_name'] ) ) {
		return $settings['pretty_grid_campaign_name'];
	}
}

/**
 * Get layout single item class
 */
function pretty_grid_single_item_class($settings){
    $single_class = '';
    // get custom single class
    switch ( $settings['pretty_grid_feed_layout'] ) {
        case 'masonry':
            $single_class = 'grid-item';
            break;
        default:
            $single_class = 'single-feed';
            break;
    }
    return $single_class;
}

/**
 * Get random keyword
 * @param string
 * @since 1.0.0
 * @return array
 */
function pretty_grid_get_random($keywords) {
    $keywords_array = explode(', ', $keywords);
    $rand = array_rand($keywords_array);

    return $keywords_array[$rand];
}

function pretty_grid_parse_query( $data_array ) {
	$value = is_array( $data_array ) ? $data_array : array();
	extract( $value );
	// $paged                          =  wcpcsu_get_paged_num();
	$paged                          = ! empty( $paged ) ? $paged : '';
	$common_args = array(
		'post_type'      => 'product',
		'posts_per_page' => ! empty( $data_array['pretty_grid_items_limit'] ) ? intval( $data_array['pretty_grid_items_limit'] ) : 12,
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

function pretty_grid_show_discount_percentage() {

	global $product;

	if ( $product->is_on_sale() ) {

		if ( ! $product->is_type( 'variable' ) ) {
			if( 0 < $product->get_regular_price() && 0 < $product->get_sale_price()) {
				$max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
			}
		} else {

			$max_percentage = 0;
			$percentage = '';

			foreach ( $product->get_children() as $child_id ) {
				$variation = wc_get_product( $child_id );
				$price = $variation->get_regular_price();
				$sale = $variation->get_sale_price();
				if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
				if ( $percentage > $max_percentage ) {
					$max_percentage = $percentage;
				}
			}

		}

		return ! empty( $max_percentage ) ? round( $max_percentage ) . "%" : '';

	}

}

if ( ! function_exists( 'pretty_grid_ribbon_badge' ) ) :
	function pretty_grid_ribbon_badge( $ribbon_args, $discount ) {
		global $product;
		$value = is_array( $ribbon_args ) ? $ribbon_args : array();

		extract( $value );


		if ( ( 'on' == $pretty_grid_sale_badge && 'top-left' == $pretty_grid_sale_badge_position && $product->is_on_sale() ) || ( 'on' == $pretty_grid_featured_badge && 'top-left' == $pretty_grid_featured_badge_position && $product->is_featured() ) || ( 'on' == $pretty_grid_sold_out_badge && 'top-left' == $pretty_grid_soldout_badge_position && ! $product->is_in_stock() ) || ( 'on' == $pretty_grid_discount_badge && 'top-left' == $pretty_grid_discount_badge_position && $product->get_sale_price() ) ) { ?>
			<div class="pretty-grid-product__cover-content pretty-grid-product__cover-content--top-left">
				<?php if ( 'on' == $pretty_grid_sale_badge && 'top-left' == $pretty_grid_sale_badge_position && $product->is_on_sale() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $pretty_grid_sale_badge_text ) ? esc_html( $pretty_grid_sale_badge_text ) : ''; ?></span>
				<?php } ?>

				<?php if ( 'on' == $pretty_grid_featured_badge && 'top-left' == $pretty_grid_featured_badge_position && $product->is_featured() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $feature_ribbon_text ) ? esc_html( $feature_ribbon_text ) : ''; ?></span>
				<?php } ?>

				<?php if ( 'on' == $pretty_grid_sold_out_badge && 'top-left' == $pretty_grid_soldout_badge_position && ! $product->is_in_stock() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $sold_out_ribbon_text ) ? esc_html( $sold_out_ribbon_text ) : ''; ?></span>
				<?php } ?>

				<?php if ( 'on' == $pretty_grid_discount_badge && 'top-left' == $pretty_grid_discount_badge_position && $product->get_sale_price() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $discount ) ? '-' . esc_html( $discount ) : ''; ?></span>
				<?php } ?>
			</div>
		<?php } ?>

		<?php if ( ( 'on' == $pretty_grid_sale_badge && 'top-right' == $pretty_grid_sale_badge_position && $product->is_on_sale() ) || ( 'on' == $pretty_grid_featured_badge && 'top-right' == $pretty_grid_featured_badge_position && $product->is_featured() ) || ( 'on' == $pretty_grid_sold_out_badge && 'top-right' == $pretty_grid_soldout_badge_position && ! $product->is_in_stock() ) || ( 'on' == $pretty_grid_discount_badge && 'top-right' == $pretty_grid_discount_badge_position ) && $product->get_sale_price() ) { ?>
			<div class="pretty-grid-product__cover-content pretty-grid-product__cover-content--top-right">
				<?php if ( 'on' == $pretty_grid_sale_badge && 'top-right' == $pretty_grid_sale_badge_position && $product->is_on_sale() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $pretty_grid_sale_badge_text ) ? esc_html( $pretty_grid_sale_badge_text ) : ''; ?></span>
				<?php } ?>

				<?php if ( 'on' == $pretty_grid_featured_badge && 'top-right' == $pretty_grid_featured_badge_position && $product->is_featured() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $feature_ribbon_text ) ? esc_html( $feature_ribbon_text ) : ''; ?></span>
				<?php } ?>

				<?php if ( 'on' == $pretty_grid_sold_out_badge && 'top-right' == $pretty_grid_soldout_badge_position && ! $product->is_in_stock() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $sold_out_ribbon_text ) ? esc_html( $sold_out_ribbon_text ) : ''; ?></span>
				<?php } ?>

				<?php if ( 'on' == $pretty_grid_discount_badge && 'top-right' == $pretty_grid_discount_badge_position && $product->get_sale_price() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $discount ) ? '-' . esc_html( $discount ) : ''; ?></span>
				<?php } ?>
			</div>
		<?php } ?>

		<?php if ( ( 'on' == $pretty_grid_sale_badge && 'bottom-left' == $pretty_grid_sale_badge_position && $product->is_on_sale() ) || ( 'on' == $pretty_grid_featured_badge && 'bottom-left' == $pretty_grid_featured_badge_position && $product->is_featured() ) || ( 'on' == $pretty_grid_sold_out_badge && 'bottom-left' == $pretty_grid_soldout_badge_position && ! $product->is_in_stock() ) || ( 'on' == $pretty_grid_discount_badge && 'bottom-left' == $pretty_grid_discount_badge_position ) && $product->get_sale_price() ) { ?>
			<div class="pretty-grid-product__cover-content pretty-grid-product__cover-content--bottom-left">
				<?php if ( 'on' == $pretty_grid_sale_badge && 'bottom-left' == $pretty_grid_sale_badge_position && $product->is_on_sale() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $pretty_grid_sale_badge_text ) ? esc_html( $pretty_grid_sale_badge_text ) : ''; ?></span>
				<?php } ?>

				<?php if ( 'on' == $pretty_grid_featured_badge && 'bottom-left' == $pretty_grid_featured_badge_position && $product->is_featured() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $feature_ribbon_text ) ? esc_html( $feature_ribbon_text ) : ''; ?></span>
				<?php } ?>

				<?php if ( 'on' == $pretty_grid_sold_out_badge && 'bottom-left' == $pretty_grid_soldout_badge_position && ! $product->is_in_stock() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $sold_out_ribbon_text ) ? esc_html( $sold_out_ribbon_text ) : ''; ?></span>
				<?php } ?>

				<?php if ( 'on' == $pretty_grid_discount_badge && 'bottom-left' == $pretty_grid_discount_badge_position && $product->get_sale_price() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $discount ) ? '-' . esc_html( $discount ) : ''; ?></span>
				<?php } ?>
			</div>
		<?php } ?>

		<?php if ( ( 'on' == $pretty_grid_sale_badge && 'bottom-right' == $pretty_grid_sale_badge_position && $product->is_on_sale() ) || ( 'on' == $pretty_grid_featured_badge && 'bottom-right' == $pretty_grid_featured_badge_position && $product->is_featured() ) || ( 'on' == $pretty_grid_sold_out_badge && 'bottom-right' == $pretty_grid_soldout_badge_position && ! $product->is_in_stock() ) || ( 'on' == $pretty_grid_discount_badge && 'bottom-right' == $pretty_grid_discount_badge_position ) && $product->get_sale_price()) { ?>
			<div class="pretty-grid-product__cover-content pretty-grid-product__cover-content--bottom-right">
				<?php if ( 'on' == $pretty_grid_sale_badge && 'bottom-right' == $pretty_grid_sale_badge_position && $product->is_on_sale() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $pretty_grid_sale_badge_text ) ? esc_html( $pretty_grid_sale_badge_text ) : ''; ?></span>
				<?php } ?>

				<?php if ( 'on' == $pretty_grid_featured_badge && 'bottom-right' == $pretty_grid_featured_badge_position && $product->is_featured() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $feature_ribbon_text ) ? esc_html( $feature_ribbon_text ) : ''; ?></span>
				<?php } ?>

				<?php if ( 'on' == $pretty_grid_sold_out_badge && 'bottom-right' == $pretty_grid_soldout_badge_position && ! $product->is_in_stock() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $sold_out_ribbon_text ) ? esc_html( $sold_out_ribbon_text ) : ''; ?></span>
				<?php } ?>

				<?php if ( 'on' == $pretty_grid_discount_badge && 'bottom-right' == $pretty_grid_discount_badge_position && $product->get_sale_price() ) { ?>
					<span class="pretty-grid-badge pretty-grid-badge--primary pretty-grid-badge--text-lg pretty-grid-badge--rounded-circle"><?php echo ! empty( $discount ) ? '-' . esc_html( $discount ) : ''; ?></span>
				<?php } ?>
			</div>
		<?php }
	}
endif;

if ( ! function_exists( 'pretty_grid_render_attachment_item' ) ) :
	function pretty_grid_render_attachment_item( $id ) {
?>
<li draggable="true" class="pretty-grid-attachment attachment details" data-attachment-id="<?php echo esc_attr($id); ?>" id="pretty-grid-attachment-<?php echo esc_attr($id); ?>">
	<div class="attachment-preview type-image subtype-png">
		<div class="thumbnail">
			<div class="centered">
				<img width="150" height="150" src="<?php echo esc_url( wp_get_attachment_image_url($id) ); ?>">
			</div>
		</div>
		<a class="remove" href="#" data-attachment-id="<?php echo esc_attr($id); ?>" title="Remove from gallery">
			<span class="dashicons dashicons-dismiss"></span>
		</a>
	</div>
</li>

<?php
	}
endif;