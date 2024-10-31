<?php
/**
 * Pretty_Grid_Field_Page Class
 *
 * @since  1.0.0
 * @package Auto Mail
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Field_Page' ) ) :

class Pretty_Grid_Field_Page extends Pretty_Grid_Admin_Page {

    /**
     * Page number
     *
     * @var int
     */
    protected $page_number = 1;

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

        // Load admin backups scripts
        pretty_grid_admin_enqueue_scripts_field_list(
            PRETTY_GRID_VERSION,
            $pretty_grid_data->get_options_data()
        );
    }

    /**
     * Initialize
     *
     * @since 1.0.0
     */
    public function init() {
        $pagenum           = isset( $_REQUEST['paged'] ) ? absint( $_REQUEST['paged'] ) : 0; // WPCS: CSRF OK
        $this->page_number = max( 1, $pagenum );
        $this->processRequest();
    }

    /**
     * Process request
     *
     * @since 1.0.0
     */
    public function processRequest() {

        if ( ! isset( $_POST['pretty_grid_nonce'] ) ) {
            return;
        }

        $nonce = sanitize_text_field($_POST['pretty_grid_nonce']);
        if ( ! wp_verify_nonce( $nonce, 'pretty-grid-field-request' ) ) {
            return;
        }

        $is_redirect = true;
        $action = "";
        if(isset($_POST['pretty_grid_bulk_action'])){
            $action = sanitize_text_field($_POST['pretty_grid_bulk_action']);
            $ids = isset( $_POST['ids'] ) ? sanitize_text_field( $_POST['ids'] ) : '';
        }else if(isset($_POST['pretty_grid_single_action'])){
            $action = sanitize_text_field($_POST['pretty_grid_single_action']);
            $id = isset( $_POST['id'] ) ? sanitize_text_field( $_POST['id'] ) : '';

        }

        switch ( $action ) {
            case 'delete':
                if ( isset( $id ) && !empty( $id ) ) {
                    $this->delete_module( $id );
                }
                break;

            case 'update-status':
                if ( isset( $id ) && !empty( $id ) ) {
                    $this->update_module_status( $id, sanitize_text_field($_POST['status']) );
                }
                break;


            case 'delete-fields' :
                if ( isset( $ids ) && !empty( $ids ) ) {
                    $field_ids = explode( ',', $ids );
                    if ( is_array( $field_ids ) && count( $field_ids ) > 0 ) {
                        foreach ( $field_ids as $id ) {
                            $this->delete_module( $id );
                        }
                    }
                }
                break;

            case 'publish-fields' :
                if ( isset( $ids ) && !empty( $ids ) ) {
                    $field_ids = explode( ',', $ids );
                    if ( is_array( $field_ids ) && count( $field_ids ) > 0 ) {
                        foreach ( $field_ids as $field_id ) {
                            $this->update_module_status( $field_id, 'publish' );
                        }
                    }
                }
                break;

            case 'draft-fields' :
                if ( isset( $ids ) && !empty( $ids ) ) {
                    $field_ids = explode( ',', $ids );
                    if ( is_array( $field_ids ) && count( $field_ids ) > 0 ) {
                        foreach ( $field_ids as $field_id ) {
                            $this->update_module_status( $field_id, 'draft' );
                        }
                    }
                }
                break;

            default:
                break;
        }

        if ( $is_redirect ) {
            $fallback_redirect = admin_url( 'admin.php' );
            $fallback_redirect = add_query_arg(
                array(
                    'page' => $this->get_admin_page(),
                ),
                $fallback_redirect
            );
            $this->maybe_redirect_to_referer( $fallback_redirect );
        }

        exit;
    }

	/**
	 * Count modules
	 *
	 * @since 1.0.0
	 * @return int
	 */
	public function countModules( $status = '' ) {
		return Pretty_Grid_Field_Model::model()->count_all( $status );
	}

	/**
	 * Return modules
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function getModules() {
		$modules = array();
		$limit   = null;
		if ( defined( 'PRETTY_GRID_FORMS_LIST_LIMIT' ) && PRETTY_GRID_FORMS_LIST_LIMIT ) {
			$limit = PRETTY_GRID_FORMS_LIST_LIMIT;
		}
		$data      = $this->get_models( $limit );

		// Fallback
		if ( ! isset( $data['models'] ) || empty( $data['models'] ) ) {
			return $modules;
		}

		foreach ( $data['models'] as $model ) {
            $settings = $model->get_settings();
            $modules[] = array(
				"id"              => $model->id,
				"date"            => date( get_option( 'date-format' ), strtotime( $model->raw->post_date ) ),
				"status"          => $model->status,
                "type"            => $settings['pretty_grid_selected_type']
            );
		}

		return $modules;
	}

    /**
     * Return models
     *
     * @since 1.0.0
     *
     * @param int $limit
     *
     * @return array
     */
    public function get_models( $limit = null ) {
        $data = Pretty_Grid_Field_Model::model()->get_all_paged( $this->page_number, $limit );

        return $data;
    }

    /**
     * Delete module
     *
     * @since 1.0.0
     *
     * @param $id
     */
    public function delete_module( $id ) {
        //check if this id is valid and the record is exists
        $model = Pretty_Grid_Field_Model::model()->load( $id );
        if ( is_object( $model ) ) {
            wp_delete_post( $id );
        }
    }

    /**
     * Bulk actions
     *
     * @since 1.0
     * @return array
     */
    public function bulk_actions() {
        return apply_filters(
            'pretty_grid_field_bulk_actions',
            array(
                'publish-fields'    => esc_html__( "Publish", Pretty_Grid::DOMAIN ),
                'draft-fields'      => esc_html__( "Unpublish", Pretty_Grid::DOMAIN ),
                'delete-fields'     => esc_html__( "Delete", Pretty_Grid::DOMAIN ),
            ) );
    }

    /**
     * Update Module Status
     *
     * @since 1.0.0
     *
     * @param $id
     * @param $status
     */
    public function update_module_status( $id, $status ) {
        // only publish and draft status avail
        if ( in_array( $status, array( 'publish', 'draft' ), true ) ) {
            $model = Pretty_Grid_Field_Model::model()->load( $id );
            if ( $model instanceof Pretty_Grid_Field_Model ) {
                $model->status = $status;
                $model->save();
            }
        }
    }

    /**
     * Pagination
     *
     * @since 1.0
     */
    public function pagination() {
        $count = $this->countModules();
        pretty_grid_list_pagination( $count, 'fields' );
    }


}

endif;
