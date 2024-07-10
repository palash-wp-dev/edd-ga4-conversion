<?php
/**
 * Plugin Name:       edd-ga4-conversion
 * Plugin URI:        https://www.example.com
 * Description:       Simple plugin for track conversion.
 * Version:           1.0.0
 * Author:            WpHex
 * Author URI:        https://www.facebook.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       edd-ga4-conversion
 * Domain Path:       /languages
 * Developer:         DeveloperName
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'EDD_GA4_VERSION', '1.0.0' );
define( 'EDD_GA4_CONVERSION', plugin_dir_path( __FILE__ ) );

// Include required files
require_once EDD_GA4_CONVERSION . 'includes/admin-menu.php';
require_once EDD_GA4_CONVERSION . 'includes/settings.php';
require_once EDD_GA4_CONVERSION . 'includes/conversion-tracking.php';
