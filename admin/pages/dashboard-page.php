<?php
/**
 * Pretty_Grid_Dashboard_Page Class
 *
 * @since  1.0.0
 * @package Pretty Grid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Dashboard_Page' ) ) :

    class Pretty_Grid_Dashboard_Page extends Pretty_Grid_Admin_Page {
        /**
         * Add page screen hooks
         *
         * @since 1.0.0
         *
         * @param $hook
         */
        public function enqueue_scripts( $hook ) {
            // Load admin styles
            pretty_grid_admin_enqueue_styles( PRETTY_GRID_VERSION );

            $pretty_grid_data = new Pretty_Grid_Admin_Data();

            // Load admin dashboard scripts
            pretty_grid_admin_enqueue_scripts_dashboard(
                PRETTY_GRID_VERSION,
                $pretty_grid_data->get_options_data()
            );
        }
    }

endif;
