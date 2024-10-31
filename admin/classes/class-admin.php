<?php
/**
 * Pretty_Grid_Admin Class
 *
 * @since  1.0.0
 * @package Pretty Grid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Admin' ) ) :

    class Pretty_Grid_Admin {

        /**
         * @var array
         */
        public $pages = array();

        /**
         * Pretty_Grid_Admin constructor.
         */
        public function __construct() {
            $this->includes();

            // Init admin pages
            add_action( 'admin_menu', array( $this, 'add_dashboard_page' ) );

            // Init Admin AJAX class
            new Pretty_Grid_Admin_AJAX();

            /**
             * Triggered when Admin is loaded
             */
            do_action( 'pretty_grid_admin_loaded' );
        }

        /**
         * Include required files
         *
         * @since 1.0.0
         */
        private function includes() {
            // Admin Pages
            require_once PRETTY_GRID_DIR . '/admin/pages/dashboard-page.php';

            // Admin Data
            require_once PRETTY_GRID_DIR . '/admin/classes/class-admin-data.php';

            // Admin AJAX
		    require_once PRETTY_GRID_DIR . '/admin/classes/class-admin-ajax.php';


        }


        /**
         * Initialize Dashboard page
         *
         * @since 1.0.0
         */
        public function add_dashboard_page() {
            $title = esc_html__( 'Pretty Grid', Pretty_Grid::DOMAIN );

            $this->pages['prettygrid']           = new Pretty_Grid_Dashboard_Page( 'prettygrid', 'dashboard', $title, $title, false, false );
            $this->pages['pretty-grid-dashboard'] = new Pretty_Grid_Dashboard_Page( 'prettygrid', 'dashboard', esc_html__( 'Pretty Grid Dashboard', Pretty_Grid::DOMAIN ), esc_html__( 'Dashboard', Pretty_Grid::DOMAIN ), 'prettygrid' );
        }

    }

endif;
