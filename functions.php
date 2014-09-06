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
function wp_sms_send_notification( $wp_sms_phone_number = NULL, $wp_sms_updated = NULL, $wp_sms_updated_item = NULL ) {
	$wp_sms_site_domain = get_bloginfo( 'wpurl' );
	$wp_sms_replace_rules = array();
	$wp_sms_replace_rules[0] = '/http\:\/\//';
	$wp_sms_replace_rules[1] = '/https\:\/\//';
	$wp_sms_site_domain = preg_replace($wp_sms_replace_rules, "", $wp_sms_site_domain);
	$wp_sms_headers = "From: admin@{$wp_sms_site_domain}\r\n";
	wp_mail ( $wp_sms_phone_number, $wp_sms_updated, $wp_sms_updated_item, $wp_sms_headers );
}
// Strips all symbols from the phone number
$wp_sms_phone_unformatted = get_option( 'wp_sms_phone_number' );
$wp_sms_phone_formatted = preg_replace('/(\W*)/', '', $wp_sms_phone_unformatted);

// Brings the phone number and carrier together to create the carrier address.
$option = get_option( 'wp_sms_carrier', false );
if ( $option == '3 River Wireless' ) {
	$wp_sms_carrier = '@sms.3rivers.net';
}
else if ( $option == 'ACS Wireless' ) {
        $wp_sms_carrier = '@paging.acswireless.com';
}
else if ( $option == 'Alltel' ) {
        $wp_sms_carrier = '@message.alltel.com';
}
else if ( $option == 'AT&T' ) {
        $wp_sms_carrier = '@txt.att.net';
}
else if ( $option == 'Bell Canada' ) {
        $wp_sms_carrier = '@bellmobility.ca';
}
else if ( $option == 'Bell Mobility (Canada)' ) {
        $wp_sms_carrier = '@txt.bell.ca';
}
else if ( $option == 'Bell Mobility' ) {
        $wp_sms_carrier = '@txt.bellmobility.ca';
}
else if ( $option == 'Blue Sky Frog' ) {
        $wp_sms_carrier = '@blueskyfrog.com';
}
else if ( $option == 'Bluegrass Cellular' ) {
        $wp_sms_carrier = '@sms.bluecell.com';
}
else if ( $option == 'Boost Mobile' ) {
        $wp_sms_carrier = '@myboostmobile.com';
}
else if ( $option == 'BPL Mobile' ) {
        $wp_sms_carrier = '@bplmobile.com';
}
else if ( $option == 'Carolina West Wireless' ) {
        $wp_sms_carrier = '@cwwsms.com';
}
else if ( $option == 'Cellular One' ) {
        $wp_sms_carrier = '@mobile.celloneusa.com';
}
else if ( $option == 'Cellular South' ) {
        $wp_sms_carrier = '@csouth1.com';
}
else if ( $option == 'CenturyTel' ) {
        $wp_sms_carrier = '@messaging.centurytel.net';
}
else if ( $option == 'Cingular' ) {
        $wp_sms_carrier = '@txt.att.net';
}
else if ( $option == 'Clearnet' ) {
        $wp_sms_carrier = '@msg.clearnet.com';
}
else if ( $option == 'Comcast' ) {
        $wp_sms_carrier = '@comcastpcs.textmsg.com';
}
else if ( $option == 'Corr Wireless Communications' ) {
        $wp_sms_carrier = '@corrwireless.net';
}
else if ( $option == 'Dobson' ) {
        $wp_sms_carrier = '@mobile.dobson.net';
}
else if ( $option == 'Edge Wireless' ) {
        $wp_sms_carrier = '@sms.edgewireless.com';
}
else if ( $option == 'Fido' ) {
        $wp_sms_carrier = '@fido.ca';
}
else if ( $option == 'Golden Telecom' ) {
        $wp_sms_carrier = '@sms.goldentele.com';
}
else if ( $option == 'Helio' ) {
        $wp_sms_carrier = '@messaging.sprintpcs.com';
}
else if ( $option == 'Houston Cellular' ) {
        $wp_sms_carrier = '@text.houstoncellular.net';
}
else if ( $option == 'Idea Cellular' ) {
        $wp_sms_carrier = '@ideacellular.net';
}
else if ( $option == 'Illinois Valley Cellular' ) {
        $wp_sms_carrier = '@ivctext.com';
}
else if ( $option == 'Inland Cellular Telephone' ) {
        $wp_sms_carrier = '@inlandlink.com';
}
else if ( $option == 'MCI' ) {
        $wp_sms_carrier = '@pagemci.com';
}
else if ( $option == 'Metrocall' ) {
        $wp_sms_carrier = '@page.metrocall.com';
}
else if ( $option == 'Metrocall 2-way' ) {
        $wp_sms_carrier = '@my2way.com';
}
else if ( $option == 'Metro PCS' ) {
        $wp_sms_carrier = '@mymetropcs.com';
}
else if ( $option == 'Microcell' ) {
        $wp_sms_carrier = '@fido.ca';
}
else if ( $option == 'Midwest Wireless' ) {
        $wp_sms_carrier = '@clearlydigital.com';
}
else if ( $option == 'Mobilcomm' ) {
        $wp_sms_carrier = '@mobilecomm.net';
}
else if ( $option == 'MTS' ) {
        $wp_sms_carrier = '@text.mtsmobility.com';
}
else if ( $option == 'Nextel' ) {
        $wp_sms_carrier = '@messaging.nextel.com';
}
else if ( $option == 'OnlineBeep' ) {
        $wp_sms_carrier = '@onlinebeep.net';
}
else if ( $option == 'PCS One' ) {
        $wp_sms_carrier = '@pcsone.net';
}
else if ( $option == 'Presidents Choice' ) {
        $wp_sms_carrier = '@txt.bell.ca';
}
else if ( $option == 'Public Service Cellular' ) {
        $wp_sms_carrier = '@sms.pscel.com';
}
else if ( $option == 'Qwest' ) {
        $wp_sms_carrier = '@qwestmp.com';
}
else if ( $option == 'Rogers AT&T Wireless' ) {
        $wp_sms_carrier = '@pcs.rogers.com';
}
else if ( $option == 'Rogers Canada' ) {
        $wp_sms_carrier = '@pcs.rogers.com';
}
else if ( $option == 'Satellink' ) {
        $wp_sms_carrier = '@satellink.net';
}
else if ( $option == 'Solo Mobile' ) {
        $wp_sms_carrier = '@txt.bell.ca';
}
else if ( $option == 'Southwestern Bell' ) {
        $wp_sms_carrier = '@email.swbw.com';
}
else if ( $option == 'Sprint' ) {
        $wp_sms_carrier = '@messaging.sprintpcs.com';
}
else if ( $option == 'Suncom' ) {
        $wp_sms_carrier = '@tms.suncom.com';
}
else if ( $option == 'Surewest Communicaitons' ) {
        $wp_sms_carrier = '@mobile.surewest.com';
}
else if ( $option == 'T-Mobile' ) {
        $wp_sms_carrier = '@tmomail.net';
}
else if ( $option == 'Telus' ) {
        $wp_sms_carrier = '@msg.telus.com';
}
else if ( $option == 'Tracfone' ) {
        $wp_sms_carrier = '@txt.att.net';
}
else if ( $option == 'Triton' ) {
        $wp_sms_carrier = '@tms.suncom.com';
}
else if ( $option == 'Unicel' ) {
        $wp_sms_carrier = '@utext.com';
}
else if ( $option == 'US Cellular' ) {
        $wp_sms_carrier = '@email.uscc.net';
}
else if ( $option == 'US West' ) {
        $wp_sms_carrier = '@uswestdatamail.com';
}
else if ( $option == 'Verizon' ) {
        $wp_sms_carrier = '@vtext.com';
}
else if ( $option == 'Virgin Mobile' ) {
        $wp_sms_carrier = '@vmobl.com';
}
else if ( $option == 'Virgin Mobile Canada' ) {
        $wp_sms_carrier = '@vmobile.ca';
}
else if ( $option == 'West Central Wireless' ) {
        $wp_sms_carrier = '@sms.wcc.net';
}
else if ( $option == 'Western Wireless' ) {
        $wp_sms_carrier = '@cellularonewest.com';
}


// Check if $wp_sms_carrier is set to avoid errors.
if ( isset( $wp_sms_carrier )) {
	$wp_sms_phone = $wp_sms_phone_formatted . $wp_sms_carrier;
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
		wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "A post has been updated: {$post_after->post_title}");
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
