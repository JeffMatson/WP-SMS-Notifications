<?php

if ( ! function_exists( 'wp_mail' ) ) {

	include( ABSPATH . 'wp-includes/pluggable.php' );

}

/**
 * Defines how mail is sent.
 *
 * @access public
 *
 * @param mixed $wp_sms_phone_number (default: NULL)
 * @param mixed $wp_sms_updated      (default: NULL)
 * @param mixed $wp_sms_updated_item (default: NULL)
 *
 * @return void
 */
// function alert_type_enabled_users( $alert_type = 'wp_sms_on_post_publish', $enabled = '1' ) {
// 	$user_query = new WP_User_Query(
// 		array(
// 			'meta_key'	=> $alert_type,
// 			'meta_value'=> $enabled
// 			)
// 		);
// 	$users = $user_query->get_results();
// 	return $users;
// 	echo $users;
// }

function wp_sms_send_notification( $message, $alert_type ) {

	global $wp_sms_carrier_list;
	
	$users = get_users( 'meta_key=' . $alert_type . '&fields=ID' );
	// $user_query = new WP_User_Query(
	// 	array(
	// 		'meta_key'	=> $alert_type,
	// 		'meta_value'=> '1'
	// 		)
	// 	);
	// $users = $user_query->get_results();

	// var_dump($users);

	foreach ( $users as $user ) {
		$wp_sms_phone_unformatted = get_the_author_meta( 'wp_sms_phone_number', $user[ ID ] );
		$wp_sms_phone_formatted   = preg_replace( '/(\W*)/', '', $wp_sms_phone_unformatted );
		$wp_sms_carrier           = get_the_author_meta( 'wp_sms_carrier', $user->ID );
		$wp_sms_carrier           = $wp_sms_carrier_list[ $wp_sms_carrier ];
		$wp_sms_phone             = $wp_sms_phone_formatted . $wp_sms_carrier;
		wp_mail( $wp_sms_phone, '', $message );
	}

}