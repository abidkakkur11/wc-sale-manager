<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class WC_Sale_Manager_Init {

    public static function init() {
        // Load admin settings page
        add_action( 'admin_menu', array( __CLASS__, 'add_admin_menu' ) );

        // Enqueue admin assets
        add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_admin_assets' ) );

        // Load core plugin files
        require_once WC_SALE_MANAGER_DIR . 'includes/class-wc-sale-manager-settings.php';
        require_once WC_SALE_MANAGER_DIR . 'includes/class-wc-sale-manager-logic.php';
    }

    public static function add_admin_menu() {
        add_menu_page(
            __( 'Sale Manager', 'wc-sale-manager' ),
            __( 'Sale Manager', 'wc-sale-manager' ),
            'manage_options',
            'wc-sale-manager',
            array( 'WC_Sale_Manager_Settings', 'render_admin_page' ),
            'dashicons-tag',
            56
        );
    }

    public static function enqueue_admin_assets() {
        // Load CSS
        wp_enqueue_style(
            'wc-sale-manager-admin-style',
            WC_SALE_MANAGER_URL . 'assets/css/admin-style.css',
            array(),
            WC_SALE_MANAGER_VERSION
        );

        // Load JS
        wp_enqueue_script(
            'wc-sale-manager-admin-script',
            WC_SALE_MANAGER_URL . 'assets/js/admin-script.js',
            array( 'jquery' ),
            WC_SALE_MANAGER_VERSION,
            true
        );
    }
}


