<?php
/*
Plugin Name: 	VA Overlay
Plugin URI:		
Description: 	Overlay with custom WYSIWYG editable content
Version: 		1.0.0
Author: 		VA Web Solutions
Author URI: 	https://vawebsolutions.fi/
Text Domain: 	va-overlay
Domain Path:	/languages
License: 		GPLv2 or later
License URI:	http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Global variables
 */
$plugin_file = plugin_basename(__FILE__);							// plugin file for reference
define( 'VA_OVERLAY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );	// define the absolute plugin path for includes
define( 'VA_OVERLAY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );		// define the plugin url for use in enqueue
$va_overlay_options = get_option('va_overlay_settings');			// retrieve our plugin settings from the options table

/**
 * Includes - keeping it modular
 */
include( VA_OVERLAY_PLUGIN_PATH . 'admin/admin.php' );         				// initialize admin menu & settings page
include( VA_OVERLAY_PLUGIN_PATH . 'functions/display-overlay.php' );				// setup mime types support for SVG (with fix for WP 4.7.1 - 4.7.2)
