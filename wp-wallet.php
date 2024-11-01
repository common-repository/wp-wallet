<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wpwallet.com/
 * @since             1.0.0
 * @package           Wp_Wallet
 *
 * @wordpress-plugin
 * Plugin Name:       WP Wallet
 * Plugin URI:        https://wpwallet.com/
 * Description:       Easily connect your WordPress site to WP Wallet.
 * Version:           0.0.2
 * Author:            WP Wallet
 * Author URI:        https://wpwallet.com/about/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-wallet
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
define( 'WP_WALLET_VERSION', '0.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-wallet-activator.php
 */
function activate_wp_wallet() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-wallet-activator.php';
	Wp_Wallet_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-wallet-deactivator.php
 */
function deactivate_wp_wallet() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-wallet-deactivator.php';
	Wp_Wallet_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_wallet' );
register_deactivation_hook( __FILE__, 'deactivate_wp_wallet' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-wallet.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_wallet() {

	$plugin = new Wp_Wallet();
	$plugin->run();

}
run_wp_wallet();
