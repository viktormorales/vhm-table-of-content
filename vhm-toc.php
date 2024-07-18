<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://viktormorales.com
 * @since             1.0.0
 * @package           Vhm_Toc
 *
 * @wordpress-plugin
 * Plugin Name:       VHM Table of Content
 * Plugin URI:        https://viktormorales.com
 * Description:       Show a table of content on your posts.
 * Version:           1.1.0
 * Author:            Viktor H. Morales
 * Author URI:        https://viktormorales.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       vhm-toc
 * Domain Path:       /languages
 */
 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-vhm-toc-activator.php
 */
function activate_vhm_toc() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vhm-toc-activator.php';
	Vhm_Toc_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-vhm-toc-deactivator.php
 */
function deactivate_vhm_toc() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vhm-toc-deactivator.php';
	Vhm_Toc_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_vhm_toc' );
register_deactivation_hook( __FILE__, 'deactivate_vhm_toc' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-vhm-toc.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_vhm_toc() {

	$plugin = new Vhm_Toc();
	$plugin->run();

}
run_vhm_toc();
