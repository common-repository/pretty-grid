<?php
/**
 * Pretty_Grid_Campaign_Model Class
 *
 * @since  1.0.0
 * @package Auto Mail
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Field_Model' ) ) :

    class Pretty_Grid_Field_Model extends Pretty_Grid_Form_Base_Model {

        protected $post_type = 'pretty_grid_fields';

        /**
         * @param int|string $class_name
         *
         * @since 1.0
         * @return Pretty_Grid_Field_Model
         */
        public static function model( $class_name = __CLASS__ ) { // phpcs:ignore
            return parent::model( $class_name );
        }
    }

endif;
