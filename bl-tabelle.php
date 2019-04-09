<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.sven-hennig.de
 * @since             1.0.0
 * @package           Bl_Tabelle
 *
 * @wordpress-plugin
 * Plugin Name:       Bundesliga Tabelle
 * Plugin URI:        www.sven-hennig.de/bl-tabelle
 * Description:       Bundesliga Tabelle von Mediatainment zeigt die aktuelle Tabelle der 1. Bundesliga.
 * Version:           1.0.0
 * Author:            Sven Hennig
 * Author URI:        www.sven-hennig.de
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bl-tabelle
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BL_TABELLE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bl-tabelle-activator.php
 */
function activate_bl_tabelle() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bl-tabelle-activator.php';
	Bl_Tabelle_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bl-tabelle-deactivator.php
 */
function deactivate_bl_tabelle() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bl-tabelle-deactivator.php';
	Bl_Tabelle_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bl_tabelle' );
register_deactivation_hook( __FILE__, 'deactivate_bl_tabelle' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bl-tabelle.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

function run_bl_tabelle() {

	function my_widgets_init() {
	    register_widget('BL_Tabelle_Widget');
	}

	add_action( 'widgets_init', 'my_widgets_init' );
	$plugin = new Bl_Tabelle();
	$plugin->run();

}
run_bl_tabelle();
