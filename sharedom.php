<?php

/*
Plugin Name: Sharedom
Plugin URI: https://wordpress.org/plugins/sharedom/
Description: Responsive sharing buttons for sharing current URL to Facebook, Twitter and Google+
Version: 1.0.6
Author: Kunal Nagar
Author URI: http://kunalnagar.in
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sharedom-activator.php
 */
function activate_sharedom() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sharedom-activator.php';
	Sharedom_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sharedom-deactivator.php
 */
function deactivate_sharedom() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sharedom-deactivator.php';
	Sharedom_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sharedom' );
register_deactivation_hook( __FILE__, 'deactivate_sharedom' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sharedom.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sharedom() {

	$plugin = new Sharedom();
	$plugin->run();

}
run_sharedom();
