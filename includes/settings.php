<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Register settings
add_action( 'admin_init', 'edd_ga4_conversion_register_settings' );
function edd_ga4_conversion_register_settings() {
    register_setting( 'edd_ga4_conversion_options_group', 'edd_ga4_conversion_client_id' );
    register_setting( 'edd_ga4_conversion_options_group', 'edd_ga4_conversion_url' );
    register_setting( 'edd_ga4_conversion_options_group', 'edd_ga4_conversion_protocol_version' );
    register_setting( 'edd_ga4_conversion_options_group', 'edd_ga4_conversion_tracking_id' );

    add_settings_section( 'edd_ga4_conversion_main_section', 'Google Analytics Settings', null, 'edd-ga4-conversion' );

    add_settings_field( 'edd_ga4_conversion_client_id', 'Client Id', 'edd_ga4_conversion_client_id_callback', 'edd-ga4-conversion', 'edd_ga4_conversion_main_section' );
    add_settings_field( 'edd_ga4_conversion_url', 'URL', 'edd_ga4_conversion_url_callback', 'edd-ga4-conversion', 'edd_ga4_conversion_main_section' );
    add_settings_field( 'edd_ga4_conversion_protocol_version', 'Protocol Version', 'edd_ga4_conversion_protocol_version_callback', 'edd-ga4-conversion', 'edd_ga4_conversion_main_section' );
    add_settings_field( 'edd_ga4_conversion_tracking_id', 'Tracking Id', 'edd_ga4_conversion_tracking_id_callback', 'edd-ga4-conversion', 'edd_ga4_conversion_main_section' );
}

// Callback functions for the input fields
function edd_ga4_conversion_client_id_callback() {
    $option = get_option( 'edd_ga4_conversion_client_id' );
    echo "<input type='text' name='edd_ga4_conversion_client_id' value='" . esc_attr( $option ) . "' placeholder='_ga' />";
    echo "<span class='description'>" . esc_html__('Enter the Google Analytics client ID (usually starts with "_ga").', 'edd-ga4-conversion') . "</span>";
}

function edd_ga4_conversion_url_callback() {
    $option = get_option( 'edd_ga4_conversion_url' );
    echo "<input type='text' name='edd_ga4_conversion_url' value='" . esc_attr( $option ) . "' placeholder='Enter URl' />";
    echo "<span class='description'>" . esc_html__('Enter the Google Analytics URL (eg., https://www.google-analytics.com/collect ).', 'edd-ga4-conversion') . "</stylespan>";
}

function edd_ga4_conversion_protocol_version_callback() {
    $option = get_option( 'edd_ga4_conversion_protocol_version' );
    echo "<input type='text' name='edd_ga4_conversion_protocol_version' value='" . esc_attr( $option ) . "' placeholder='1' />";
    echo "<span class='description'>" . esc_html__('Enter the protocol version (usually "1").', 'edd-ga4-conversion') . "</span>";
}

function edd_ga4_conversion_tracking_id_callback() {
    $option = get_option( 'edd_ga4_conversion_tracking_id' );
    echo "<input type='text' name='edd_ga4_conversion_tracking_id' value='" . esc_attr( $option ) . "' placeholder='UA-XXXXX-Y' />";
    echo "<span class='description'>" . esc_html__('Enter your Google Analytics Tracking ID (e.g., UA-XXXXX-Y).', 'edd-ga4-conversion') . "</span>";
}
