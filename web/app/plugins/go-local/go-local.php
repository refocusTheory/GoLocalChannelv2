<?php
namespace GoLocal;
/**
 * The plugin bootstrap file
 *
 *
 * @link              https://refocustheory.com
 * @since             1.0.0
 * @package           Go_Local
 *
 * @wordpress-plugin
 * Plugin Name:       GoLocal
 * Plugin URI:        https://refocustheory.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.5
 * Author:            refocus Theory
 * Author URI:        https://refocustheory.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       go-local
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
define( 'GO_LOCAL_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-go-local-activator.php
 */
function activate_go_local() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-go-local-activator.php';
	Go_Local_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-go-local-deactivator.php
 */
function deactivate_go_local() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-go-local-deactivator.php';
	Go_Local_Deactivator::deactivate();
}

register_activation_hook( __FILE__, __NAMESPACE__ . '\activate_go_local' );
register_deactivation_hook( __FILE__, __NAMESPACE__ .'\deactivate_go_local' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-go-local.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_go_local() {

	$plugin = new Go_Local();
	$plugin->run();

}
run_go_local();

