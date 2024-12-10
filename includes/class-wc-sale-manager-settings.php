<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class WC_Sale_Manager_Settings {
    public static function render_admin_page() {
        ?>
        <div class="wrap">
            <h1><?php _e( 'WooCommerce Sale Manager', 'wc-sale-manager' ); ?></h1>
            <form method="post" action="options.php">
                <!-- Category Selection -->
                <label for="sale-categories"><?php _e( 'Select Categories (max 5 at a time)', 'wc-sale-manager' ); ?></label>
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
                <label for="discount"><?php _e( 'Discount (Enter % or Fixed Amount)', 'wc-sale-manager' ); ?></label>
                <input type="text" id="discount" name="discount" />

                <!-- Product Type -->
                <label for="product-type"><?php _e( 'Apply to Product Type', 'wc-sale-manager' ); ?></label>
                <select id="product-type" name="product_type">
                    <option value="simple"><?php _e( 'Simple Products', 'wc-sale-manager' ); ?></option>
                    <option value="variable"><?php _e( 'Variable Products', 'wc-sale-manager' ); ?></option>
                    <option value="both"><?php _e( 'Both', 'wc-sale-manager' ); ?></option>
                </select>

                <!-- Schedule -->
                <label for="schedule"><?php _e( 'Schedule', 'wc-sale-manager' ); ?></label>
                <input type="datetime-local" id="start-date" name="start_date" />
                <input type="datetime-local" id="end-date" name="end_date" />

                <button type="submit"><?php _e( 'Save & Apply Sale', 'wc-sale-manager' ); ?></button>
            </form>
        </div>
        <?php
    }
}
