<?php
/**
 * Plugin Name: WooCommerce Sale Manager
 * Description: A plugin to apply scheduled sales by category, product type, and discount type (percentage or fixed).
 * Version: 1.0.0
 * Author: Abid KP
 * Text Domain: wc-sale-manager
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
