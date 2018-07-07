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
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	private $option_name = 'vhm_toc';

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
		add_settings_section(
			$this->option_name . '_general',
			__( 'General', $this->plugin_name ),
			array( $this, $this->option_name . '_general_cb' ),
			$this->plugin_name
		);
		add_settings_field(
			$this->option_name . '_element',
			__( 'Element', $this->plugin_name ),
			array( $this, $this->option_name . '_element_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_element' )
		);
		add_settings_field(
			$this->option_name . '_before_items_template',
			__( 'Before items template', $this->plugin_name ),
			array( $this, $this->option_name . '_before_items_template_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_before_items_template' )
		);
		add_settings_field(
			$this->option_name . '_before_each_item_template',
			__( 'Before each item template', $this->plugin_name ),
			array( $this, $this->option_name . '_before_each_item_template_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_before_each_item_template' )
		);
		add_settings_field(
			$this->option_name . '_each_item_class',
			__( 'Each items class', $this->plugin_name ),
			array( $this, $this->option_name . '_each_item_class_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_each_item_class' )
		);
		add_settings_field(
			$this->option_name . '_after_each_item_template',
			__( 'After each item template', $this->plugin_name ),
			array( $this, $this->option_name . '_after_each_item_template_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_after_each_item_template' )
		);
		add_settings_field(
			$this->option_name . '_after_items_template',
			__( 'After items template', $this->plugin_name ),
			array( $this, $this->option_name . '_after_items_template_cb' ),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_after_items_template' )
		);
		
		register_setting( $this->plugin_name, $this->option_name . '_element' );
		register_setting( $this->plugin_name, $this->option_name . '_before_items_template' );
		register_setting( $this->plugin_name, $this->option_name . '_before_each_item_template' );
		register_setting( $this->plugin_name, $this->option_name . '_each_item_class' );
		register_setting( $this->plugin_name, $this->option_name . '_after_each_item_template' );
		register_setting( $this->plugin_name, $this->option_name . '_after_items_template' );
	}
	/**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */
	public function vhm_toc_general_cb() {
		echo '<p>' . __( 'Please change the settings accordingly.', $this->plugin_name ) . '</p>';
	}
	/**
	 * Render the input field for "element" option
	 *
	 * @since  1.0.0
	 */
	public function vhm_toc_element_cb() {
		$element = get_option( $this->option_name . '_element' );
		echo '<input type="text" name="' . $this->option_name . '_element' . '" id="' . $this->option_name . '_element' . '" value="' . $element . '">';
		echo '<p><span class="description">' . __('Specify the HTML element you want to collect from the post content to create the table of content.', $this->plugin_name) . '</span><br></p>';
	}
	/**
	 * Render the textarea field for "before items template" option
	 *
	 * @since  1.0.0
	 */
	public function vhm_toc_before_items_template_cb() {
		$before_items_template = get_option( $this->option_name . '_before_items_template' );
		echo '<fieldset><legend class="screen-reader-text"><span>Coso</span></legend>';
		echo '<p>' . __('In order to see the table of content, two IDs must be specified before listing the links:', $this->plugin_name) . '</p>';
		echo '<ol><li>' . sprintf(__('%s which is the global wrapper of the items.', $this->plugin_name), '<strong>vhm-toc:</strong>') . '</li>';
		echo '<li>' . sprintf(__('%s where the items will be added.', $this->plugin_name), '<strong>vhm-toc-items:</strong>') . '</li>';
		echo '</ol>';
		echo '<p><strong>' . __('Check this example', $this->plugin_name) . ':</strong> <code>&lt;div id="vhm-toc"&gt;&lt;ol id="vhm-toc-items"&gt;</code></p>';
		echo '<p><textarea id="' . $this->option_name . '_before_items_template' . '" class="large-text" name="' . $this->option_name . '_before_items_template" cols="50" rows="5">' . $before_items_template . '</textarea></p>';
		echo '</fieldset>';
	}
	/**
	 * Render the textarea field for "before each item template" option
	 *
	 * @since  1.0.0
	 */
	public function vhm_toc_before_each_item_template_cb() {
		$before_each_item_template = get_option( $this->option_name . '_before_each_item_template' );
		echo '<textarea id="' . $this->option_name . '_before_each_item_template' . '" class="large-text" name="' . $this->option_name . '_before_each_item_template" cols="50" rows="5">' . $before_each_item_template . '</textarea>';
		
	}
	/**
	 * Render the input field for "each item class" option
	 *
	 * @since  1.0.0
	 */
	public function vhm_toc_each_item_class_cb() {
		$items_class = get_option( $this->option_name . '_each_item_class' );
		echo '<input type="text" name="' . $this->option_name . '_each_item_class' . '" id="' . $this->option_name . '_each_item_class' . '" value="' . $items_class . '">';
	}
	/**
	 * Render the textarea field for "after each item template" option
	 *
	 * @since  1.0.0
	 */
	public function vhm_toc_after_each_item_template_cb() {
		$after_each_item_template = get_option( $this->option_name . '_after_each_item_template' );
		echo '<textarea id="' . $this->option_name . '_after_each_item_template' . '" class="large-text" name="' . $this->option_name . '_after_each_item_template" cols="50" rows="5">' . $after_each_item_template . '</textarea>';
		
	}
	/**
	 * Render the textarea field for "after items template" option
	 *
	 * @since  1.0.0
	 */
	public function vhm_toc_after_items_template_cb() {
		$after_items_template = get_option( $this->option_name . '_after_items_template' );
		echo '<textarea id="' . $this->option_name . '_after_items_template' . '" class="large-text" name="' . $this->option_name . '_after_items_template" cols="50" rows="5">' . $after_items_template . '</textarea>';
		
	}
}
