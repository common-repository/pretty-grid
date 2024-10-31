<?php
/**
 * Pretty_Grid_Admin_Data Class
 *
 * @since  1.0.0
 * @package Auto Mail
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Admin_Data' ) ) :

    class Pretty_Grid_Admin_Data {

        public $core = null;

        /**
         * Current Nonce
         *
         * @since 1.0.0
         * @var string
         */
        private $_nonce = '';

        /**
         * Pretty_Grid_Admin_Data constructor.
         *
         * @since 1.0.0
         */
        public function __construct() {
            $this->generate_nonce();
        }

        /**
         * Generate nonce
         *
         * @since 1.0.0
         */
        public function generate_nonce() {
            $this->_nonce = wp_create_nonce( 'prettygrid' );
        }

        /**
         * Get current generated nonce
         *
         * @since 1.0.0
         * @return string
         */
        public function get_nonce() {
            return $this->_nonce;
        }

        /**
         * Combine Data and pass to JS
         *
         * @since 1.0.0
         * @return array
         */
        public function get_options_data() {
            $data           = $this->admin_js_defaults();
            $data           = apply_filters( 'pretty_grid_data', $data );

            return $data;
        }

        /**
         * Default Admin properties
         *
         * @since 1.0.0
         * @return array
         */
        public function admin_js_defaults() {
            return array(
                'ajaxurl'                        => pretty_grid_ajax_url(),
                'fields_url'                     => admin_url( 'admin.php?page=pretty-grid-fields' ),
                'wizard_url'                     => admin_url( 'admin.php?page=pretty-grid-field-wizard' ),
                'preview_url'                    => home_url() . '/?pretty_grid_preview=',
                '_ajax_nonce'                    => $this->get_nonce(),
            );
        }

    }

endif;
