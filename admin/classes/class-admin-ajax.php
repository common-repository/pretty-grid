<?php
/**
 * Pretty_Grid_Admin_AJAX Class
 *
 * @since  1.0.0
 * @package Pretty Grid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Admin_AJAX' ) ) :

class Pretty_Grid_Admin_AJAX {

    /**
     * Pretty_Grid_Admin_AJAX constructor.
     *
     * @since 1.0
     */
    public function __construct() {
        // WP Ajax Actions.
        add_action( 'wp_ajax_pretty_grid_save_campaign', array( $this, 'save_campaign' ) );
    }

    /**
     * Save Campaign
     *
     * @since 1.0.0
     */
    public function save_campaign() {

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( ! wp_verify_nonce($_POST['_ajax_nonce'], Pretty_Grid::DOMAIN) ) {
            wp_send_json_error( __( 'You are not allowed to perform this action', Pretty_Grid::DOMAIN ) );
        }

        if ( isset( $_POST['fields_data'] ) ) {

            $fields  = $_POST['fields_data'];
            $id      = isset( $fields['campaign_id'] ) ? $fields['campaign_id'] : null;
            $id      = intval( $id );
            $title   = sanitize_text_field( $fields['pretty_grid_campaign_name'] );
            $status  = isset( $fields['campaign_status'] ) ? sanitize_text_field( $fields['campaign_status'] ) : '';
            $type    = sanitize_text_field( $fields['pretty_grid_selected_type'] );

            if ( is_null( $id ) || $id <= 0 ) {
                $form_model = new Pretty_Grid_Field_Model();
                $action     = 'create';

                if ( empty( $status ) ) {
                    $status = Pretty_Grid_Field_Model::STATUS_DRAFT;
                }
            } else {
                $form_model = Pretty_Grid_Field_Model::model()->load( $id );
                $action     = 'update';

                if ( ! is_object( $form_model ) ) {
                    wp_send_json_error( __( "Form model doesn't exist", Pretty_Grid::DOMAIN ) );
                }

                if ( empty( $status ) ) {
                    $status = $form_model->status;
                }
            }

            // Sanitize settings
            $settings = $fields;

            // Set Settings to model
            $form_model->settings = $settings;

            // status
            $form_model->status = $status;

            // Save data
            $id = $form_model->save();

            // Check if social feed cache data exists
            $pretty_grid_cache_key = 'pretty_grid_cache_'.$id;
            $pretty_grid_cache_value = get_option( $pretty_grid_cache_key, false );

            if ( ! $pretty_grid_cache_value || empty($pretty_grid_cache_value) ) {
                // prepare social feed cache data
                switch ( $type ) {
                    case 'youtube':
                        // Initial job class and run this job
                        $sub_type_youtube = sanitize_text_field( $fields['sub_type_youtube'] );
                        $source = '';
                        if($sub_type_youtube == 'playlist'){
                            $source = sanitize_text_field( $fields['pretty_grid_youtube_playlist_id'] );
                        }else if($sub_type_youtube == 'channel'){
                            $source = sanitize_text_field( $fields['pretty_grid_youtube_channel_id'] );
                        }
                        $job = new Pretty_Grid_Youtube_Job();
                        $feed_data = $job->feed_data($sub_type_youtube, $source);
                        break;
                    case 'vimeo':
                        // Get Random Keyword
                        $keyword = '';
                        if(isset($settings['pretty_grid_vimeo_keywords'])){
                            $keywords = $settings['pretty_grid_vimeo_keywords'];
                            $keyword = pretty_grid_get_random($keywords);
                        }
                        // Initial job class and run this job
                        $job = new Pretty_Grid_Vimeo_Job($keyword);
                        $feed_data = $job->feed_data();
                        break;
                    case 'twitter':
                        $twitter_username = isset($settings['pretty_grid_twitter_username']) ? $settings['pretty_grid_twitter_username'] : '';
                        // Initial job class and run this job
                        $job = new Pretty_Grid_Twitter_Job();
                        $feed_data = $job->feed_data($twitter_username);
                        break;
                    default:
                        break;
                }
                // Update instagram feed cache data cache
                update_option( $pretty_grid_cache_key, json_encode($feed_data) );
            }

            if (!$id) {
                wp_send_json_error( $id );
            }else{
                wp_send_json_success( $id );
            }

        } else {
            wp_send_json_error( __( 'User submit data are empty!', Pretty_Grid::DOMAIN ) );
        }

    }

}

endif;
