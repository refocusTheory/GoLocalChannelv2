<?php

/**
 * Plugin Name: Justified Image Grid
 * Author: Firsh
 * Author URI: https://codecanyon.net/user/Firsh
 * Plugin URI: https://justifiedgrid.com
 * Version: 4.1.1
 * Requires PHP: 5.4
 * Description: Create beautiful photo grids from sources you already use.
 * Text Domain: jig_td
 */
if (version_compare(phpversion(), '5.4') >= 0) {
    require_once('justified-image-grid-core.php');
} else {
    if (!function_exists("jig_old_php_notice")) {
        function jig_old_php_notice()
        {
            if (current_user_can("install_plugins")) {
                echo '<div class="notice notice-error"><p>';
                echo sprintf(
                    __('<strong>Justified Image Grid</strong> could not be initialized because you need minimum PHP version 5.4, but you are running: %s<br /> Please ask your hosting to update the PHP version for you. More info about this at: %s', 'jig_td'),
                    phpversion(),
                    '<a href="https://justifiedgrid.com/support/fix/why-is-my-php-old/" target="_blank">' . __('Why is my PHP old?', 'jig_td') . '</a>'
                );
                echo '</p></div>';
            }
        }
    }
    add_action('admin_notices', 'jig_old_php_notice');
}
