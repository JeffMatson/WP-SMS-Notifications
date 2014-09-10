<?php
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

// Sends SMS when post is published.
if ( get_option( 'wp_sms_on_post_publish', false ) == '1' ) {

	/**
	 * detect_published_post function.
	 *
	 * @access public
	 * @param mixed $wp_sms_new_status (default: NULL)
	 * @param mixed $wp_sms_old_status (default: NULL)
	 * @param mixed $wp_sms_post_ID (default: NULL)
	 * @return void
	 */
	function detect_published_post ( $wp_sms_new_status = NULL, $wp_sms_old_status = NULL, $wp_sms_post_ID = NULL ) {

		if ( 'publish' == $wp_sms_new_status && 'publish' != $wp_sms_old_status ) {


			wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "This new post has been published: {$wp_sms_post_ID->post_title}" );

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

	$wp_sms_new_user_logged_in = ! empty ( $current_user->user_login ) ? $current_user->user_login : '';

	if ( '' == $wp_sms_new_user_logged_in ) {

		/**
		 * detect_user_login function.
		 *
		 * @access public
		 * @param mixed $wp_sms_new_user_logged_in
		 * @return void
		 */
		function detect_user_login( $wp_sms_new_user_logged_in ) {

			wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "User successfully logged in: {$wp_sms_new_user_logged_in}");

		}

		add_action('wp_login', 'detect_user_login', 10, 2);

	}

}

// Sends SMS when a plugin is updated.
if ( '1' == get_option( 'wp_sms_on_plugin_update', false ) ) {

	/**
	 * wp_sms_plugin_updated function.
	 *
	 * @access public
	 * @param mixed $a
	 * @param mixed $b
	 * @param mixed $c
	 * @return void
	 */
	function wp_sms_plugin_updated( $a, $b, $c ) {

		if ( $b['type'] == 'plugin' && $b['action'] == 'update' ) {

			wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "Plugin has been updated: {$c['destination_name']}");

		}

	}

	add_action( 'upgrader_post_install', 'wp_sms_plugin_updated', 10, 3 );
}

// Sends SMS when a plugin is installed.
if ( '1' == get_option( 'wp_sms_on_plugin_install', false ) ) {

		/**
		 * wp_sms_plugin_install function.
		 *
		 * @access public
		 * @param mixed $a
		 * @param mixed $b
		 * @param mixed $c
		 * @return void
		 */
		function wp_sms_plugin_install( $a, $b, $c ) {

				if ( $b['type'] == 'plugin' && $b['action'] == 'install' ) {

						wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "Plugin has been installed: {$c['destination_name']}");

				}

		}

		add_action( 'upgrader_post_install', 'wp_sms_plugin_install', 10, 3 );
}

// Sends SMS when a post is updated
if ( '1' == get_option( 'wp_sms_on_post_update', false ) ) {

	/**
	 * wp_sms_post_update function.
	 *
	 * @access public
	 * @param mixed $post_ID
	 * @param mixed $post_after
	 * @param mixed $post_before
	 * @return void
	 */
	function wp_sms_post_update( $post_ID, $post_after, $post_before ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {

		return;
	} else {
		wp_sms_send_notification("A post has been updated: {$post_after->post_title}");
	}
	}
	add_action( 'post_updated', 'wp_sms_post_update', 10, 3 );


}
if ( '1' == get_option( 'wp_sms_on_theme_install', false ) ) {

		/**
		 * wp_sms_theme_install function.
		 *
		 * @access public
		 * @param mixed $a
		 * @param mixed $b
		 * @param mixed $c
		 * @return void
		 */
		function wp_sms_theme_install( $a, $b, $c ) {

				if ( $b['type'] == 'theme' && $b['action'] == 'install' ) {

						wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "Theme has been installed: {$c['destination_name']}" );
				}

		}

		add_action( 'upgrader_post_install', 'wp_sms_theme_install', 10, 3 );

}

if ( '1' == get_option( 'wp_sms_on_theme_update', false ) ) {

		/**
		 * wp_sms_theme_update function.
		 *
		 * @access public
		 * @param mixed $a
		 * @param mixed $b
		 * @param mixed $c
		 * @return void
		 */
		function wp_sms_theme_update( $a, $b, $c ) {

				if ( $b['type'] == 'theme' && $b['action'] == 'update' ) {

						wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "Theme has been updated: {$c['destination_name']}" );

				}

		}

		add_action( 'upgrader_post_install', 'wp_sms_theme_update', 10, 3 );

}
