<?php
/*
Plugin Name: UiPress Lite (formerly Admin 2020)
Plugin URI: https://uipress.co
Description: Powerful WordPress admin extension with a streamlined dashboard, global search, dark mode and much more.
Version: 2.1.6.1
Author: Admin 2020
Text Domain: admin2020
Domain Path: /admin/languages
Author URI: https://admintwentytwenty.com
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) exit;

////PRODUCT ID
$productid = "5fb144db00b05d1058a9d3cc";
////VERSION
$version = '2.1.6.1'; 
////NAME
$pluginName = 'UiPress Lite';
///PATH
$plugin_path = plugin_dir_url( __FILE__ );

require plugin_dir_path( __FILE__ ) . 'admin/inlcudes/class-admin-2020.php';

$plugin = new Admin_2020($productid,$version,$pluginName,$plugin_path);
$plugin->run();

/// SHOW ERRORS
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
