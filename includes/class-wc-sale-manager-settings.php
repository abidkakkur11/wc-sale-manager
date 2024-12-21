<?php

function wc_sale_manager_enqueue_admin_assets( $hook ) {
    if ( 'toplevel_page_wc-sale-manager' === $hook ) {
        // Enqueue Select2 CSS
        wp_enqueue_style(
            'select2-css',
            plugin_dir_url( __FILE__ ) . 'assets/css/select2.css',
            array(),
            '4.0.13' // Version of the Select2 library
        );

        // Enqueue Select2 JS
        wp_enqueue_script(
            'select2-js',
            plugin_dir_url( __FILE__ ) . 'assets/js/select2.js',
            array( 'jquery' ),
            '4.0.13', // Version of the Select2 library
            true
        );

        // Enqueue custom JS
        wp_enqueue_script(
            'wc-sale-manager-select2-init',
            plugin_dir_url( __FILE__ ) . 'assets/js/wc-sale-manager.js',
            array( 'jquery', 'select2-js' ),
            filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/wc-sale-manager.js' ), // File modification time as version
            true
        );
    }
}
add_action( 'admin_enqueue_scripts', 'wc_sale_manager_enqueue_admin_assets' );



if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class WC_Sale_Manager_Settings {
    public static function render_admin_page() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e( 'WooCommerce Sale Manager', 'wc-sale-manager' ); ?></h1>
            <form method="post" action="options.php" class="wc-sale-manager-wrap-form">
                <!-- Category Selection -->
                <label for="sale-categories"><?php esc_html_e( 'Select Categories (max 5 at a time)', 'wc-sale-manager' ); ?></label>
                <select id="sale-categories" name="sale_categories[]" multiple="multiple" style="width: 100%;">
                    <?php
                    $categories = get_terms( array(
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => false,
                    ) );
                    foreach ( $categories as $category ) {
                        printf(
                            '<option value="%s">%s</option>',
                            esc_attr( $category->slug ),
                            esc_html( $category->name )
                        );
                    }
                    ?>
                </select>
                <p class="description"><?php esc_html_e( 'Select up to 5 categories at a time.', 'wc-sale-manager' ); ?></p>

                <!-- Discount Type -->
                <label for="discount"><?php esc_html_e( 'Discount (Enter % or Fixed Amount)', 'wc-sale-manager' ); ?></label>
                <input type="text" id="discount" name="discount" class="regular-text" />
                <p class="description"><?php esc_html_e( 'Enter a percentage (e.g., 10%) or a fixed amount (e.g., 20).', 'wc-sale-manager' ); ?></p>

                <!-- Product Type -->
                <label for="product-type"><?php esc_html_e( 'Apply to Product Type', 'wc-sale-manager' ); ?></label>
                <select id="product-type" name="product_type">
                    <option value="simple"><?php esc_html_e( 'Simple Products', 'wc-sale-manager' ); ?></option>
                    <option value="variable"><?php esc_html_e( 'Variable Products', 'wc-sale-manager' ); ?></option>
                    <option value="both"><?php esc_html_e( 'Both', 'wc-sale-manager' ); ?></option>
                </select>

                <!-- Schedule -->
                <label for="start-date"><?php esc_html_e( 'Start Date & Time', 'wc-sale-manager' ); ?></label>
                <input type="datetime-local" id="start-date" name="start_date" />
                <label for="end-date"><?php esc_html_e( 'End Date & Time', 'wc-sale-manager' ); ?></label>
                <input type="datetime-local" id="end-date" name="end_date" />

                <button type="submit" class="button button-primary"><?php esc_html_e( 'Save & Apply Sale', 'wc-sale-manager' ); ?></button>
            </form>
        </div>
        <?php
    }
}
