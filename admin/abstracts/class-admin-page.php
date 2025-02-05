<?php
/**
 * Pretty_Grid_Admin_Page Class
 *
 * @since  1.0.0
 * @package Pretty Grid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Admin_Page' ) ) :

    abstract class Pretty_Grid_Admin_Page {

        /**
        * Current page ID
        *
        * @var number
        */
        public $page_id = null;

        /**
        * Current page slug
        *
        * @var string
        */
        protected $page_slug = '';

        /**
        * Path to view folder
        *
        * @var string
        */
        protected $folder = '';

        /**
        * All registered content boxes
        *
        * @var array
        */
        protected $content_boxes = array();

        /**
        * @since 1.0.0
        *
        * @param string $page_slug  Page slug.
        * @param string $folder
        * @param string $page_title Page title.
        * @param string $menu_title Menu title.
        * @param bool   $parent     Parent or not.
        * @param bool   $render     Render the page.
        */
        public function __construct(
            $page_slug,
            $folder = '',
            $page_title,
            $menu_title,
            $parent = false,
            $render = true
        ) {
            $this->page_slug = $page_slug;
            $this->folder    = $folder;

            if ( ! $parent ) {
                $this->page_id = add_menu_page(
                    $page_title,
                    $menu_title,
                    pretty_grid_get_admin_cap(),
                    $page_slug,
                    $render ? array( $this, 'render' ) : null,
                    'dashicons-screenoptions'
                );
            } else {
                $this->page_id = add_submenu_page(
                    $parent,
                    $page_title,
                    $menu_title,
                    pretty_grid_get_admin_cap(),
                    $page_slug,
                    $render ? array( $this, 'render' ) : null
                );

            }

            if ( $render ) {
                $this->render_page_hooks();
            }
            $this->init();


        }

        /**
         * Use that method instead of __construct
         *
         * @since 1.0.0
         */
        public function init() {

        }

     /**
	 * Hooks before content render
	 *
	 * @since 1.0
	 */
	public function render_page_hooks() {
        add_filter( 'load-' . $this->page_id, array( $this, 'add_page_scripts' ) );
	}

        /**
         * Render page container
         *
         * @since 1.0.0
         */
        public function render() {
        ?>
            <main class="pretty-grid-wrap <?php echo esc_attr( 'pretty-grid--' . $this->page_slug ); ?>">

                <?php
                // Campaign custom header
                if($this->folder == 'field/wizard'){
                    $this->render_header();
                }else{
                    $this->render_menu();
                }
                ?>

                <div class="pretty-grid-content-wrap <?php echo esc_attr( 'content-wrap-' . $this->page_slug ); ?>">

                <?php
                if($this->folder !== 'field/wizard'){
                    $this->render_header();
                }

                $this->render_page_content();

                $this->render_footer();
                ?>

                </div>

            </main>

            <?php
                // Add popup template after form list page footer
                if($this->folder == 'form/list'){
                    $this->template( $this->folder . '/popup' );
                }

                // Add field selector page
                if($this->folder == 'field/list'){
                    $this->template( $this->folder . '/builder' );
                }
        }


        /**
         * Render page menu
         *
         * @since 1.0.0
         */
        protected function render_menu() {
            if ( $this->template_exists( 'menu/header' ) ) {
               $this->template( 'menu/header' );
            }
        }

        /**
         * Render page header
         *
         * @since 1.0.0
         */
        protected function render_header() {
            ?>

            <header class="pretty-grid-header">
                <?php
                if ( $this->template_exists( $this->folder . '/header' ) ) {
                    $this->template( $this->folder . '/header' );
                } else {
                    ?>
                    <h1 class="pretty-grid-header-title"><?php echo esc_html( get_admin_page_title() ); ?></h1>
                <?php } ?>

            </header>

            <?php
        }

        /**
         * Render page footer
         *
         * @since 1.0
         */
        protected function render_footer() {

            $footer_text = sprintf(/* translators: ... */
                esc_html__( 'Made with %s by WPHobby', Pretty_Grid::DOMAIN ),
                ' <ion-icon class="pretty-grid-icon-heart" name="heart"></ion-icon>'
            );

            if ( $this->template_exists( $this->folder . '/footer' ) ) {
                $this->template( $this->folder . '/footer' );
            }
            ?>
            <div class="pretty-grid-footer"><?php echo $footer_text; ?></div>

            <?php
        }

        /**
         * Render actual page template
         *
         * @since 1.0.0
         */
        protected function render_page_content() {
            $this->template( $this->folder . '/content' );
        }

        /**
         * Load an admin template
         *
         * @since 1.0
         *
         * @param       $path
         * @param array $args
         * @param bool  $echo
         *
         * @return string
         */
        public function template( $path, $args = array(), $echo = true ) {
            $file    = PRETTY_GRID_DIR . "/admin/views/$path.php";
            $content = '';

            if ( is_file( $file ) ) {
                ob_start();

                $settings = $args;

                include $file;

                $content = ob_get_clean();
            }

            if ( $echo ) {
                echo $content;// phpcs:ignore
            }

            return $content;
        }

        /**
         * Check if template exist
         *
         * @since 1.0.0
         *
         * @param $path
         *
         * @return bool
         */
        protected function template_exists( $path ) {
            $file = PRETTY_GRID_DIR . "admin/views/$path.php";

            return is_file( $file );
        }

        /**
         * Add page screen hooks
         *
         * @since 1.0.0
         */
        public function add_page_scripts() {
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
            add_action( 'init', array( $this, 'init_scripts' ) );
        }

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
        }

        /**
         * Init Admin scripts
         *
         * @since 1.0.0
         *
         * @param $hook
         */
        public function init_scripts( $hook ) {
            // Init jquery ui
            pretty_grid_admin_jquery_ui_init();
        }


        /**
         * Redirect to referer if available
         *
         * @since 1.0.0
         *
         * @param string $fallback_redirect url if referer not found
         */
        protected function maybe_redirect_to_referer( $fallback_redirect = '' ) {
            $referer = wp_get_referer();
            $referer = ! empty( $referer ) ? $referer : wp_get_raw_referer();
            if ( $referer ) {
                wp_safe_redirect( $referer );
            } elseif ( $fallback_redirect ) {
                wp_safe_redirect( $fallback_redirect );
            } else {
                $admin_url = admin_url( 'admin.php' );
                $admin_url = add_query_arg(
                    array(
                        'page' => $this->get_admin_page(),
                    ),
                    $admin_url
                );
                wp_safe_redirect( $admin_url );
            }

            exit();
        }

        /**
         * Get admin page param
         *
         * @since 1.0.0
         * @return string
         */
        protected function get_admin_page() {
            return ( isset( $_GET['page'] ) ? sanitize_text_field( $_GET['page'] ) : '' );
        }


    }

endif;
