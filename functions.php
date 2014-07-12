<?php
function wp_sms_send_notification( $wp_sms_phone_number, $wp_sms_updated, $wp_sms_updated_item ) {
        mail ($wp_sms_phone_number, $wp_sms_updated, $wp_sms_updated_item);
                
}

add_action( 'transition_post_status', 'detect_published_post', 10, 3 );

$wp_sms_phone = get_option('wp_sms_phone_number') . get_option('wp_sms_carrier');


function detect_published_post ( $wp_sms_new_status, $wp_sms_old_status, $wp_sms_post_ID ) {
	if ( $wp_sms_new_status == 'publish' && $wp_sms_old_status != 'publish' ) {
		wp_sms_send_notification( $GLOBALS['wp_sms_phone'], 'New Changes to your WordPress site', "This new post has been published: {$wp_sms_post_ID->post_title}" );	
	}
}
