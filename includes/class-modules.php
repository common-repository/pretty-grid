<?php
/**
 * Pretty_Grid_Modules Class
 *
 * @since  1.0.0
 * @package Auto Mail
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Modules' ) ) :

class Pretty_Grid_Modules {

	/**
	 * Store modules objects
	 *
	 * @var array
	 */
	public $modules = array();

	/**
	 * Pretty_Grid_Modules constructor.
	 *
	 * @since 1.0
	 */
	public function __construct() {
		$this->includes();
		$this->load_modules();
	}

	/**
	 * Includes
	 *
	 * @since 1.0
	 */
	private function includes() {

		require_once PRETTY_GRID_DIR . '/includes/abstracts/abstract-class-module.php';
	}

	/**
	 * Load modules
	 *
	 * @since 1.0
	 */
	private function load_modules() {
		/**
		 * Filters modules list
		 */
		$modules = apply_filters( 'pretty_grid_modules', array(
			'field' => array(
				'class'	  => 'Field',
				'slug'  => 'field',
				'label'	  => esc_html__( 'field', Pretty_Grid::DOMAIN )
			),
		) );

		array_walk( $modules, array( $this, 'load_module' ) );
	}

	/**
	 * Load module
	 *
	 * @since 1.0
	 * @param $data
	 * @param $id
	 */
	public function load_module( $data, $id ) {
		$module_class = 'Pretty_Grid_' . $data[ 'class' ];
		$module_slug = $data[ 'slug' ];
		$module_label = $data[ 'label' ];

		// Include module
		$path = PRETTY_GRID_DIR . '/includes/modules/' . $module_slug . '/loader.php';
        if ( file_exists( $path ) ) {
			include_once $path;
		}

		if ( class_exists( $module_class ) ) {
			$module_object = new $module_class( $id, $module_label );

			$this->modules[ $id ] = $module_object;
		}
	}

	/**
	 * Retrieve modules objects
	 *
	 * @since 1.0
	 * @return array
	 */
	public function get_modules() {
		return $this->modules;
	}
}

endif;
