<?php
/**
 * Pretty_Grid_Preview Class
 *
 * Plugin Preview Class
 *
 * @since  1.0.0
 * @package Pretty Grid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Preview' ) ) :

/**
 * Class Pretty_Grid_Preview
 */
Class Pretty_Grid_Preview
{
    protected $form_id = '';

    public function __construct()
    {
        if ( ! isset( $_GET['pretty_grid_preview'] ) ) return;

        $this->_form_id = sanitize_text_field($_GET['pretty_grid_preview']);

        add_action( 'pre_get_posts', array( $this, 'pre_get_posts' ) );

        add_filter('the_title', array( $this, 'the_title' ) );
        remove_filter( 'the_content', 'wpautop' );
        remove_filter( 'the_excerpt', 'wpautop' );
        add_filter('the_content', array( $this, 'the_content' ), 9001 );
        add_filter('get_the_excerpt', array( $this, 'the_content' ) );
        /**
         * Since wp_is_block_theme was only added in Wordpress 5.9,
         * we need to verify it exists before calling it.
         */
        if( ! function_exists('wp_is_block_theme') || ! wp_is_block_theme() ){
            add_filter('template_include', array( $this, 'template_include' ) );
        }
        add_filter('post_thumbnail_html', array( $this, 'post_thumbnail_html' ) );
    }

    public function pre_get_posts( $query )
    {
		$query->set( 'posts_per_page', 1 );
    }

    /**
     * @return string
     */
    function the_title( $title )
    {
        if( ! in_the_loop() ) return $title;

        $form_title = 'Product Slider and Grid for Woocommerce';

        return esc_html( $form_title ) . " " . esc_html__( 'Preview', Pretty_Grid::DOMAIN );
    }

    /**
     * @return string
     */
    function the_content()
    {
        if ( ! is_user_logged_in() ) return esc_html__( 'You must be logged in to preview a form.', Pretty_Grid::DOMAIN );

        // takes into account if we are trying to preview a non-published form
        $tmp_id_test = explode( '-', $this->_form_id );

        // if only 1 element, then is it numeric
	    if( 1 === count( $tmp_id_test) && ! is_numeric( $tmp_id_test[ 0 ] ) ) {
		    return esc_html__( 'Please save your gallery setting first.', Pretty_Grid::DOMAIN );
	    }
	    // if 2 array elements, is the first equal to 'tmp' and the second numeric
	    elseif ( ( 2 === count( $tmp_id_test )
	                 && ('tmp' != $tmp_id_test[ 0 ]
                     || ! is_numeric( $tmp_id_test[ 1 ] ) ) ) ) {
		    return esc_html__( 'You must provide a valid form ID.', Pretty_Grid::DOMAIN );
	    }

        return do_shortcode( "[pretty_grid_gallery id='{$this->_form_id}']" );
    }

    /**
     * @return string
     */
    function template_include()
    {
        return locate_template( array( 'page.php', 'single.php', 'index.php' ) );
    }

    function post_thumbnail_html() {
    	return '';
    }

} // END CLASS Pretty_Grid_Preview

endif;