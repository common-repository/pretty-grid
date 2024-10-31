<?php
/**
 * Plugin Name: Pretty Grid
 * Plugin URI: https://wphobby.com/ultimate-instagram/
 * Description: WordPress Images Gallery, Slider, and Carousel Plugin
 * Version: 1.3.9
 * Author: wphobby
 * Author URI: https://wphobby.com/ultimate-instagram/
 *
 * @package Pretty Grid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

/**
 * Set constants
 */
if ( ! defined( 'PRETTY_GRID_DIR' ) ) {
    define( 'PRETTY_GRID_DIR', plugin_dir_path(__FILE__) );
}

if ( ! defined( 'PRETTY_GRID_URL' ) ) {
    define( 'PRETTY_GRID_URL', plugin_dir_url(__FILE__) );
}

if ( ! defined( 'PRETTY_GRID_VERSION' ) ) {
    define( 'PRETTY_GRID_VERSION', '1.3.9' );
}

// Register activation hook
register_activation_hook( __FILE__, array( 'Pretty_Grid', 'activation_hook' ) );

/**
 * Class Pretty_Grid
 *
 * Main class. Initialize plugin
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'Pretty_Grid' ) ) {
    /**
     * Pretty_Grid
     */
    class Pretty_Grid {

        const DOMAIN = 'prettygrid';

        /**
         * Instance of Pretty_Grid
         *
         * @since  1.0.0
         * @var (Object) Pretty_Grid
         */
        private static $_instance = null;

        /**
         * Get instance of Pretty_Grid
         *
         * @since  1.0.0
         *
         * @return object Class object
         */
        public static function get_instance() {
            if ( ! isset( self::$_instance ) ) {
                self::$_instance = new self;
            }
            return self::$_instance;
        }

        /**
         * Constructor
         *
         * @since  1.0.0
         */
        private function __construct() {
            add_action( 'admin_init', array( $this, 'initialize_admin' ) );

            $this->includes();
            $this->init();
        }

        /**
		 * Called on plugin activation
		 *
		 * @since 1.0.0
		 */
		public static function activation_hook() {
			add_option( 'pretty_grid_activation_hook', 'activated' );
		}

        /**
		 * Called on admin_init
		 *
		 * Flush rewrite rules are not called directly on activation hook, because CPT are not initialized yet
		 *
		 * @since 1.0.0
		 */
		public function initialize_admin() {
			if ( is_admin() && 'activated' === get_option( 'pretty_grid_activation_hook' ) ) {
				delete_option( 'pretty_grid_activation_hook' );
			}
		}

        /**
         * Load plugin files
         *
         * @since 1.0
         */
        private function includes() {
            // Core files.
            require_once PRETTY_GRID_DIR . '/includes/class-core.php';
        }


        /**
         * Init the plugin
         *
         * @since 1.0.0
         */
        private function init() {
            // Initialize plugin core
            $this->pretty_grid_core = Pretty_Grid_Core::get_instance();

            // Enqueue scripts
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

            /**
             * Triggered when plugin is loaded
             */
            do_action( 'pretty_grid_loaded' );

            add_filter('script_loader_tag', array( $this, 'add_type_attribute') , 10, 3);

        }

        public function add_type_attribute($tag, $handle, $src) {
            // if not your script, do nothing and return original $tag
            if ( 'ionicons' !== $handle ) {
                return $tag;
            }
            // change the script tag by adding type="module" and return it.
            $tag = '<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>';
            return $tag;
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
            $this->pretty_grid_front_enqueue_styles();

            // Enqueue front scripts
            $this->pretty_grid_front_enqueue_scripts();
        }

        /**
        * Enqueue front styles
        *
        * @since 1.0.0
        *
        * @param $version
        */
        function pretty_grid_front_enqueue_styles() {
            wp_enqueue_style( 'pretty-grid-admin-style', PRETTY_GRID_URL . 'assets/css/admin-style.css', array(), PRETTY_GRID_VERSION, false );
        }

        public function pretty_grid_front_enqueue_scripts(){
            wp_register_script(
                'pretty-grid-admin-script',
                PRETTY_GRID_URL . '/assets/js/admin-script.js',
                array(
                    'jquery'
                ),
                PRETTY_GRID_VERSION,
                true
            );

            wp_enqueue_script( 'pretty-grid-admin-script' );
        }

    }
}

if ( ! function_exists( 'prettygrid' ) ) {
    function prettygrid() {
        return Pretty_Grid::get_instance();
    }

    /**
     * Init the plugin and load the plugin instance
     *
     * @since 1.0.0
     */
    add_action( 'plugins_loaded', 'prettygrid' );
}

if ( ! function_exists( 'pretty_grid_freemius' ) ) {
    // Create a helper function for easy SDK access.
    function pretty_grid_freemius() {
        global $pretty_grid_freemius;

        if ( ! isset( $pretty_grid_freemius ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $pretty_grid_freemius = fs_dynamic_init( array(
                'id'                  => '9152',
                'slug'                => 'prettygrid',
                'premium_slug'        => 'pretty-grid-premium',
                'type'                => 'plugin',
                'public_key'          => 'pk_97a61c5dfee7e90ca6411d6505298',
                'is_premium'          => false,
                // If your plugin is a serviceware, set this option to false.
                'has_premium_version' => true,
                'has_addons'          => false,
                'has_paid_plans'      => true,
                'menu'                => array(
                    'slug'           => 'prettygrid',
                    'first-path'     => 'admin.php?page=prettygrid',
                    'support'        => false,
                ),
            ) );
        }

        return $pretty_grid_freemius;
    }

    // Init Freemius.
    pretty_grid_freemius();
    // Signal that SDK was initiated.
    do_action( 'pretty_grid_freemius_loaded' );
}