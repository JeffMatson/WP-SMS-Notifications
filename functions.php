<?php
// Ideally this would all be in a class
// This will fail if vars are not set
function wp_sms_send_notification( $wp_sms_phone_number = NULL, $wp_sms_updated = NULL, $wp_sms_updated_item = NULL ) {

		mail ( $wp_sms_phone_number, $wp_sms_updated, $wp_sms_updated_item );
				
}
// space out all parentheses
// Also you should check that these options are not empty
$wp_sms_phone = get_option( 'wp_sms_phone_number' ) . get_option( 'wp_sms_carrier' );


// Sends SMS when post is published.
// '1' should be defined so that it has symantic meaning. i.e. define ( SOMETHING = '1' );
if ( get_option( 'wp_sms_on_post_publish' ) == '1' ) {

	function detect_published_post ( $wp_sms_new_status = NULL, $wp_sms_old_status = NULL, $wp_sms_post_ID = NULL ) {

		// All if statements should be Yoda'ed up
		if ( 'publish' == $wp_sms_new_status && 'publish' != $wp_sms_old_status ) {

			// No need for double quotes here
			wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', 'This new post has been published: { $wp_sms_post_ID->post_title }' );	

		}

	}

	add_action( 'transition_post_status', 'detect_published_post', 10, 3 );

}

// Sends SMS when a user logs in.
if ( get_option( 'wp_sms_on_user_login' ) == '1' ) {

	if ( ! function_exists( 'get_currentuserinfo' ) ) {

		include( ABSPATH . 'wp-includes/pluggable.php' ); 

	}

	global $current_user;

	get_currentuserinfo();

	// set $GLOBALS['wp_sms_phone'] as a var here as it is called a few times below

	$wp_sms_new_user_logged_in = ! empty ( $current_user->user_login ) ? $current_user->user_login : '';

	if ( '' == $wp_sms_new_user_logged_in ) {

		function detect_user_login( $wp_sms_new_user_logged_in ) {

			wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', 'User successfully logged in: { $wp_sms_new_user_logged_in }');   

		}

		add_action('wp_login', 'detect_user_login', 10, 2);

	}

}

// Sends SMS when a plugin is updated.
if ( '1' == get_option( 'wp_sms_on_plugin_update' ) ) {

	// Name your vars so we know what they mean. i.e. a b and c dont means anything to me right now
	function wp_sms_plugin_updated( $a, $b, $c ) {

		// Yoda these up
		if ( $b['type'] == 'plugin' && $b['action'] == 'update' ) {

			wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "Plugin has been updated: { $c['destination_name'] }");

		}

	}

	add_action( 'upgrader_post_install', 'wp_sms_plugin_updated', 10, 3 );
}

// Sends SMS when a plugin is installed.
if ( '1' == get_option( 'wp_sms_on_plugin_install' ) ) {

		// Same thing on a b c naming
		function wp_sms_plugin_install( $a, $b, $c ) {

				// Yoda these up
				if ( $b['type'] == 'plugin' && $b['action'] == 'install' ) {

						wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "Plugin has been installed: { $c['destination_name'] }");

				}

		}

		add_action( 'upgrader_post_install', 'wp_sms_plugin_install', 10, 3 );
}

// Sends SMS when a post is updated
if ( '1' == get_option('wp_sms_on_post_update' ) ) {

	// same thing on failing vars
	function wp_sms_post_update( $post_ID, $post_after, $post_before ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {

		return;

	} else {

		wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', 'A post has been updated: { $post_after->post_title }');

	}

	add_action( 'post_updated', 'wp_sms_post_update', 10, 3 );

}

if ( '1' == get_option( 'wp_sms_on_theme_install' ) ) {

		// Smae thing on a b c
		function wp_sms_theme_install( $a, $b, $c ) {

				//Yoda these up
				if ( $b['type'] == 'theme' && $b['action'] == 'install' ) {

						wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "Theme has been installed: { $c['destination_name'] }" );
				}

		}

		add_action( 'upgrader_post_install', 'wp_sms_theme_install', 10, 3 );

}

if ( '1' == get_option( 'wp_sms_on_theme_update' ) ) {

		function wp_sms_theme_update( $a, $b, $c ) {

				// Yoda these up
				if ( $b['type'] == 'theme' && $b['action'] == 'update' ) {

						wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "Theme has been updated: { $c['destination_name'] }" );

				}

		}

		add_action( 'upgrader_post_install', 'wp_sms_theme_update', 10, 3 );

}
