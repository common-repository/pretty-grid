<?php
/**
 * Pretty_Grid_Field_New_Page Class
 *
 * @since  1.0.0
 * @package Auto Mail
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Field_New_Page' ) ) :

class Pretty_Grid_Field_New_Page extends Pretty_Grid_Admin_Page {


    /**
     * Get wizard title
     *
     * @since 1.0
     * @return mixed
     */
    public function getWizardTitle() {
        if ( isset( $_REQUEST['id'] ) ) { // WPCS: CSRF OK
            return esc_html__( "Edit Field", Pretty_Grid::DOMAIN );
        } else {
            return esc_html__( "New Field", Pretty_Grid::DOMAIN );
        }
    }

    /**
     * Add page screen hooks
     *
     * @since 1.0.0
     * @param $hook
     */
    public function enqueue_scripts( $hook ) {
        // Load admin styles
        pretty_grid_admin_enqueue_styles( PRETTY_GRID_VERSION );

        $pretty_grid_data = new Pretty_Grid_Admin_Data();

        // Load admin field edit scripts
        pretty_grid_admin_enqueue_scripts_field_edit(
            PRETTY_GRID_VERSION,
            $pretty_grid_data->get_options_data()
        );

    }

    /**
     * Render page header
     *
     * @since 1.0
     */
    protected function render_header() { ?>
        <?php
        if ( $this->template_exists( $this->folder . '/header' ) ) {
            $this->template( $this->folder . '/header' );
        } else {
            ?>
            <h1 class="pretty-grid-header-title"><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <?php } ?>
        <?php
    }

    /**
     * Return field model
     *
     * @since 1.0.0
     *
     * @param int $id
     *
     * @return array
     */
    public function get_single_model( $id ) {
        $data = Pretty_Grid_Field_Model::model()->get_single_model( $id );

        return $data;
    }



}

endif;
