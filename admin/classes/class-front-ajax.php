<?php
/**
 * Pretty_Grid_Front_AJAX Class
 *
 * @since  1.0.0
 * @package Pretty Grid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Front_AJAX' ) ) :

    class Pretty_Grid_Front_AJAX {

        /**
         * Pretty_Grid_Front_AJAX constructor.
         *
         * @since 1.0.0
         */
        public function __construct() {
            // WP Ajax Actions.
            add_action( 'wp_ajax_woo_psg_refresh_feed', array( $this, 'refresh_feed' ));
            add_action( 'wp_ajax_nopriv_woo_psg_refresh_feed', array( $this, 'refresh_feed' ));
        }

        /**
         * Refresh feed data
         *
         * @since 1.0.0
         */
        public function refresh_feed() {
            if ( isset( $_POST['fields_data'] ) ) {
                $fields  = $_POST['fields_data'];
                $id      = isset( $fields['id'] ) ? $fields['id'] : null;
                // Grab php file output from server
                include PRETTY_GRID_DIR . '/admin/views/shortcode/display-shortcode.php';
                wp_die();

            } else {
                wp_send_json_error( __( 'User campaign data are empty!', Pretty_Grid::DOMAIN ) );
            }
        }
    }

endif;
