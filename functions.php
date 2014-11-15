<?php

if ( ! function_exists( 'wp_mail' ) ) {

	include( ABSPATH . 'wp-includes/pluggable.php' );

}


/**
 * @param $message
 * @param $alert_type
 */
function wp_sms_send_notification( $message, $alert_type ) {

	global $wp_sms_carrier_list;

	$users = get_users( esc_sql( 'meta_key=' . $alert_type . '&fields=ID' ) );

	foreach ( $users as $user ) {
		if ( get_user_meta($user, $alert_type, 'true') == '1' ) {
			$wp_sms_phone   = get_the_author_meta( 'wp_sms_phone_number', $user );
			$wp_sms_carrier = get_the_author_meta( 'wp_sms_carrier', $user );
			$wp_sms_carrier = $wp_sms_carrier_list[ $wp_sms_carrier ];
			$wp_sms_phone   = $wp_sms_phone . $wp_sms_carrier;
			wp_mail( $wp_sms_phone, '', $message );
		}
	}

}