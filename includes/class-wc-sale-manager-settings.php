<?php

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
                <select id="sale-categories" name="sale_categories[]" multiple>
                    <?php
                    $categories = get_terms( array(
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => false,
                    ) );
                    foreach ( $categories as $category ) {
                        echo '<option value="' . esc_attr( $category->slug ) . '">' . esc_html( $category->name ) . '</option>';
                    }
                    ?>
                </select>

                <!-- Discount Type -->
                <label for="discount"><?php esc_html_e( 'Discount (Enter % or Fixed Amount)', 'wc-sale-manager' ); ?></label>
                <input type="text" id="discount" name="discount" />

                <!-- Product Type -->
                <label for="product-type"><?php esc_html_e( 'Apply to Product Type', 'wc-sale-manager' ); ?></label>
                <select id="product-type" name="product_type">
                    <option value="simple"><?php esc_html_e( 'Simple Products', 'wc-sale-manager' ); ?></option>
                    <option value="variable"><?php esc_html_e( 'Variable Products', 'wc-sale-manager' ); ?></option>
                    <option value="both"><?php esc_html_e( 'Both', 'wc-sale-manager' ); ?></option>
                </select>

                <!-- Schedule -->
                <label for="schedule"><?php esc_html_e( 'Schedule', 'wc-sale-manager' ); ?></label>
                <input type="datetime-local" id="start-date" name="start_date" />
                <input type="datetime-local" id="end-date" name="end_date" />

                <button type="submit"><?php esc_html_e( 'Save & Apply Sale', 'wc-sale-manager' ); ?></button>
            </form>
        </div>
        <?php
    }
}
