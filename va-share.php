<?php
/*
Plugin Name: 	VA Share
Plugin URI:		https://github.com/villearo/va-share
Description: 	Add Share links to the bottom of the posts and pages or with [share] shortcode
Version: 		1.0.0
Author: 		Ville Aro
Author URI: 	https://villearo.fi/
Text Domain: 	va-share
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
define( 'VA_SHARE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );	// define the absolute plugin path for includes
define( 'VA_SHARE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );		// define the plugin url for use in enqueue
$va_share_options = get_option('va_share_settings');			// retrieve our plugin settings from the options table

/**
 * Includes
 */
include( VA_SHARE_PLUGIN_PATH . 'admin/admin.php' );
include( VA_SHARE_PLUGIN_PATH . 'functions/display-share.php' );
