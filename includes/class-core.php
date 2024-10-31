<?php
/**
 * Pretty_Grid_Core Class
 *
 * Plugin Core Class
 *
 * @since  1.0.0
 * @package Pretty Grid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Core' ) ) :

    class Pretty_Grid_Core {

        /**
         * Plugin instance
         *
         * @var null
         */
        private static $instance = null;

        /**
         * Return the plugin core instance
         *
         * @since 1.0.0
         * @return Pretty_Grid_Core
         */
        public static function get_instance() {
            if ( is_null( self::$instance ) ) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        /**
         * Pretty_Grid_Core constructor.
         *
         * @since 1.0
         */
        public function __construct() {

            // Include all necessary files
            $this->includes();

            if ( is_admin() ) {
                // Initialize admin core
                $this->admin = new Pretty_Grid_Admin();
            }

            // Enabled modules
            $modules = new Pretty_Grid_Modules();
            $this->modules = $modules->get_modules();

            // Enqueue scripts
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

            // Front ajax class
            $front_ajax    = new Pretty_Grid_Front_AJAX();

            // Enabled preview
            $preview = new Pretty_Grid_Preview();

            // Add shortcode
           add_shortcode ('pretty_grid_gallery', array( $this, 'display_pretty_grid_gallery' ), 10, 2);
        }

        /**
        * Display Woopsg Shortcode
        *
        * @since 1.0.0
        *
        * @param $atts
        */
       public function display_pretty_grid_gallery($atts) {

            $defaults = array(
                'id'  => '',
            );

            $atts = shortcode_atts( $defaults, $atts, 'pretty_grid_gallery' );

            extract($atts);

            if(!empty($id)){

                $model = Pretty_Grid_Field_Model::model()->load( $id );
                if(is_object($model)){
                    $settings = $model->settings;
                }

                // Register and Enqueue front script
                wp_register_script(
                    'pretty-grid-front',
                    PRETTY_GRID_URL . '/assets/js/front.js',
                    array(
                        'jquery'
                    ),
                    PRETTY_GRID_VERSION,
                    true
                );

                wp_enqueue_script( 'pretty-grid-front' );

                $data = array(
                    'ajaxurl' => pretty_grid_ajax_url(),
                );

                // Set js localize data
                wp_localize_script( 'pretty-grid-front', 'Pretty_Grid_Ajax_Data', $data );
                wp_localize_script( 'pretty-grid-front', 'Pretty_Grid_Settings_Data', $settings );

                wp_enqueue_script( 'lightgallery', PRETTY_GRID_URL . 'assets/js/library/lightgallery/lightgallery.umd.js', array(), PRETTY_GRID_VERSION, false );
                wp_enqueue_script( 'lg-thumbnail', PRETTY_GRID_URL . 'assets/js/library/lightgallery/lg-thumbnail.umd.js', array(), PRETTY_GRID_VERSION, false );
                wp_enqueue_script( 'lg-zoom', PRETTY_GRID_URL . 'assets/js/library/lightgallery/lg-zoom.umd.js', array(), PRETTY_GRID_VERSION, false );

            }

            $html = '<div class="pretty-grid-gallery-wrapper pretty-grid-container-' . $id . '" data-id="' . $id . '"></div>';
            return $html;
        }

        /**
         * Includes
         *
         * @since 1.0.0
         */
        private function includes() {
            if ( is_admin() ) {
                require_once PRETTY_GRID_DIR . 'admin/abstracts/class-admin-page.php';
                require_once PRETTY_GRID_DIR . 'admin/abstracts/class-admin-module.php';
                require_once PRETTY_GRID_DIR . 'admin/classes/class-admin.php';
            }

           // Helpers
           require_once PRETTY_GRID_DIR . 'includes/helpers/helper-core.php';

           // Modules
           require_once PRETTY_GRID_DIR . 'includes/class-modules.php';

           // Model
           require_once PRETTY_GRID_DIR . '/includes/model/class-base-model.php';
           require_once PRETTY_GRID_DIR . '/includes/model/class-field-model.php';

           // Preview classes
           require_once PRETTY_GRID_DIR . '/includes/class-preview.php';

           // Shortcode classes
           require_once PRETTY_GRID_DIR . '/includes/class-shortcode.php';

           // Front AJAX
		   require_once PRETTY_GRID_DIR . '/admin/classes/class-front-ajax.php';

           // Jobs
           require_once PRETTY_GRID_DIR . 'includes/jobs/class-youtube-job.php';
           require_once PRETTY_GRID_DIR . 'includes/jobs/class-vimeo-job.php';
           require_once PRETTY_GRID_DIR . 'includes/jobs/class-twitter-job.php';
        }

        /**
        * Add enqueue scripts hooks
        *
        * @since 1.0.0
        *
        * @param $hook
        */
        public function enqueue_scripts( $hook ) {
            // Enqueue front styles
            pretty_grid_front_enqueue_styles( PRETTY_GRID_VERSION );
            // Enqueue front scripts
            pretty_grid_front_enqueue_scripts( PRETTY_GRID_VERSION );
        }

    }

endif;
