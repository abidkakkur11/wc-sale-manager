<?php
/**
 * Plugin Name: WC Sale Manager
 * Plugin URI: https://abidkp.com
 * Description: Manage sale prices for WooCommerce products. Apply discounts by category, schedule sales, and customize settings easily.
 * Version: 1.0.0
 * Author: Abid KP
 * Author URI: https://abidkp.com
 * Text Domain: wc-sale-manager
 * Domain Path: /languages
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Define plugin constants
define( 'WC_SALE_MANAGER_VERSION', '1.0.0' );
define( 'WC_SALE_MANAGER_DIR', plugin_dir_path( __FILE__ ) );
define( 'WC_SALE_MANAGER_URL', plugin_dir_url( __FILE__ ) );

// Include necessary files
require_once WC_SALE_MANAGER_DIR . 'includes/class-wc-sale-manager-init.php';

// Initialize the plugin
WC_Sale_Manager_Init::init();
