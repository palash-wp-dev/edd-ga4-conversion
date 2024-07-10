<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$edd_installed = false;
$all_active_plugins = get_option( 'active_plugins' );
$edd_plugin_slug = 'easy-digital-downloads/easy-digital-downloads.php';

if ( in_array( $edd_plugin_slug, $all_active_plugins ) ) {
    $edd_installed = true;
}

// Sending conversion rate data after successful purchase completion
if ( $edd_installed ) {
    add_action( 'edd_complete_purchase', 'edd_send_conversion_data' );
}

function edd_send_conversion_data( $payment_id ) {
    $conversion_client_id = get_option( 'edd_ga4_conversion_client_id' );
    $conversion_url = get_option( 'edd_ga4_conversion_url' );
    $protocol_version = get_option( 'edd_ga4_conversion_protocol_version' );
    $tracking_id = get_option( 'edd_ga4_conversion_tracking_id' );


    $payment = edd_get_payment( $payment_id );
    $amount = edd_get_payment_amount( $payment_id );
    $currency = edd_get_currency();
    $transaction_id = edd_get_payment_transaction_id( $payment_id );

    $client_id = sanitize_text_field( $_COOKIE[$conversion_client_id] ); // Assuming you're using Google Analytics

    $url = $conversion_url;
    $data = [
        'v' => $protocol_version,
        'tid' => $tracking_id,
        'cid' => $client_id,
        't' => 'transaction',
        'ti' => $transaction_id,
        'tr' => $amount,
        'cu' => $currency
    ];

    wp_remote_post( $url, [
        'method' => 'POST',
        'body' => http_build_query( $data ),
        'timeout' => 45,
        'redirection' => 5,
        'blocking' => true,
        'headers' => [],
        'cookies' => []
    ] );
}