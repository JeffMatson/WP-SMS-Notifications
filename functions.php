<?php
function wp_sms_send_notification( $wp_sms_phone_number, $wp_sms_updated, $wp_sms_updated_item ) {
        mail ($wp_sms_phone_number, $wp_sms_updated, $wp_sms_updated_item);
                
}
$wp_sms_phone = get_option('wp_sms_phone_number') . get_option('wp_sms_carrier');


// Sends SMS when post is published.
if (get_option('wp_sms_on_post_publish') == '1'){
function detect_published_post ( $wp_sms_new_status, $wp_sms_old_status, $wp_sms_post_ID ) {
	if ( $wp_sms_new_status == 'publish' && $wp_sms_old_status != 'publish' ) {
		wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "This new post has been published: {$wp_sms_post_ID->post_title}" );	
	}
}
add_action( 'transition_post_status', 'detect_published_post', 10, 3 );
}

// Sends SMS when a user logs in.
if (get_option('wp_sms_on_user_login') == '1'){
if(!function_exists('get_currentuserinfo')) {
    include(ABSPATH . "wp-includes/pluggable.php"); 
}
global $current_user;
get_currentuserinfo();
$wp_sms_new_user_logged_in = $current_user->user_login;
function detect_user_login( $wp_sms_new_user_logged_in ) {
	wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "User successfully logged in: {$wp_sms_new_user_logged_in}");
}
add_action('wp_login', 'detect_user_login', 10, 2);
}

// Sends SMS when a plugin is updated.
if (get_option('wp_sms_on_plugin_update') == '1') {
	function wp_sms_plugin_updated( $a, $b, $c ) {
		if ( $b['type'] == 'plugin' && $b['action'] == 'update' ) {
			wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "Plugin has been updated: {$c['destination_name']}");
		}
	}
	add_action('upgrader_post_install', 'wp_sms_plugin_updated', 10, 3);
}

// Sends SMS when a plugin is installed.
if (get_option('wp_sms_on_plugin_install') == '1') {
        function wp_sms_plugin_install( $a, $b, $c ) {
                if ( $b['type'] == 'plugin' && $b['action'] == 'install' ) {
                        wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "Plugin has been installed: {$c['destination_name']}");
                }
        }
        add_action('upgrader_post_install', 'wp_sms_plugin_install', 10, 3);
}


