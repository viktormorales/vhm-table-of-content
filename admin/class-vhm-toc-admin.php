<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://viktormorales.com
 * @since      1.0.0
 *
 * @package    Vhm_Toc
 * @subpackage Vhm_Toc/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Vhm_Toc
 * @subpackage Vhm_Toc/admin
 * @author     Viktor H. Morales <viktor.morales@hotmail.com>
 */
class Vhm_Toc_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Vhm_Toc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vhm_Toc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vhm-toc-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Vhm_Toc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Vhm_Toc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/vhm-toc-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function add_options_page() {
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'VHM Table of Content Settings', $this->plugin_name ),
			__( 'VHM Table of Content', $this->plugin_name ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);
	}
	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
		include_once 'partials/vhm-toc-admin-display.php';
	}
	/**
	 * Register all related settings of this plugin
	 *
	 * @since  1.0.0
	 */
	public function register_setting() {
		register_setting( $this->plugin_name, $this->plugin_name . '_title' );		
		register_setting( $this->plugin_name, $this->plugin_name . '_element' );
		register_setting( $this->plugin_name, $this->plugin_name . '_list_class' );
		register_setting( $this->plugin_name, $this->plugin_name . '_first_item_class' );
		register_setting( $this->plugin_name, $this->plugin_name . '_each_item_class' );
	}
}
