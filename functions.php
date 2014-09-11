<?php

if ( ! function_exists( 'wp_mail' ) ) {

	include( ABSPATH . 'wp-includes/pluggable.php' );

}

/**
 * Defines how mail is sent.
 *
 * @access public
 * @param mixed $wp_sms_phone_number (default: NULL)
 * @param mixed $wp_sms_updated (default: NULL)
 * @param mixed $wp_sms_updated_item (default: NULL)
 * @return void
 */

function wp_sms_send_notification( $wp_sms_updated_item ) {
	global $wp_sms_carrier_list;
	$wp_sms_phone_unformatted = get_option( 'wp_sms_phone_number' );
	$wp_sms_phone_formatted = preg_replace('/(\W*)/', '', $wp_sms_phone_unformatted);
	$option = get_option( 'wp_sms_carrier', false );
	$wp_sms_carrier = $wp_sms_carrier_list[$option];
	// Brings the phone number and carrier together to create the carrier address.
	$wp_sms_phone = $wp_sms_phone_formatted . $wp_sms_carrier;
	wp_mail ( $wp_sms_phone, '', $wp_sms_updated_item );
}
