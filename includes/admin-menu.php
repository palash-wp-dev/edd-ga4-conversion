<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Register the menu page
add_action( 'admin_menu', 'edd_ga4_conversion_menu' );

function edd_ga4_conversion_menu() {
    add_menu_page(
        'EDD GA4 Conversion',
        'EDD GA4 Conversion',
        'manage_options',
        'edd-ga4-conversion',
        'edd_ga4_conversion_settings_page',
        'dashicons-analytics'
    );
}

function edd_ga4_conversion_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('EDD GA4 Conversion Settings', 'edd-ga4-conversion' );?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'edd_ga4_conversion_options_group' );
            do_settings_sections( 'edd-ga4-conversion' );
            submit_button();
            ?>
        </form>
    </div>
    <?php
}