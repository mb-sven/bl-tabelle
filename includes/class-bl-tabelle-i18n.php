<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.sven-hennig.de
 * @since      1.0.0
 *
 * @package    Bl_Tabelle
 * @subpackage Bl_Tabelle/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bl_Tabelle
 * @subpackage Bl_Tabelle/includes
 * @author     Sven Hennig <shennig@mptoday.de>
 */
class Bl_Tabelle_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bl-tabelle',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
