<?php
/**
 * Pretty_Grid_Field_Admin Class
 *
 * @since  1.0.0
 * @package Auto Mail
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Field_Admin' ) ) :

class Pretty_Grid_Field_Admin extends Pretty_Grid_Admin_Module {

	/**
	 * Init module admin
	 *
	 * @since 1.0
	 */
	public function init() {
		$this->module       = Pretty_Grid_Field::get_instance();
		$this->page         = 'pretty-grid-fields';
		$this->page_edit    = 'pretty-grid-field-wizard';
	}

	/**
	 * Include required files
	 *
	 * @since 1.0
	 */
	public function includes() {
		include_once dirname( __FILE__ ) . '/admin-page-new.php';
		include_once dirname( __FILE__ ) . '/admin-page-view.php';
	}

	/**
	 * Add module pages to Admin
	 *
	 * @since 1.0
	 */
	public function add_menu_pages() {
		new Pretty_Grid_Field_Page( $this->page, 'field/list', esc_html__( 'Gallerys', Pretty_Grid::DOMAIN ), esc_html__( 'Gallerys', Pretty_Grid::DOMAIN ), 'prettygrid' );
		new Pretty_Grid_Field_New_Page( $this->page_edit, 'field/wizard', esc_html__( 'Edit Field', Pretty_Grid::DOMAIN ), esc_html__( 'New Field', Pretty_Grid::DOMAIN ), 'prettygrid' );
	}

	/**
	 * Remove necessary pages from menu
	 *
	 * @since 1.0
	 */
	public function hide_menu_pages() {
		remove_submenu_page( 'prettygrid', $this->page_edit );
	}

	/**
	 * Return template
	 *
	 * @since 1.0
	 * @return Pretty_Grid_Template|false
	 */
	private function get_template() {
		if( isset( $_GET['template'] ) )  {
			$id = trim( sanitize_text_field( $_GET['template'] ) );
		} else {
			$id = 'blank';
		}

		foreach ( $this->module->templates as $key => $template ) {
			if ( $template->options['id'] === $id ) {
				return $template;
			}
		}

		return false;
	}
}

endif;
