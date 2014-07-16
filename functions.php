<?php
// Defines how mail is sent.
function wp_sms_send_notification( $wp_sms_phone_number = NULL, $wp_sms_updated = NULL, $wp_sms_updated_item = NULL ) {

		mail ( $wp_sms_phone_number, $wp_sms_updated, $wp_sms_updated_item );
				
}

// Strips all symbols from the phone number
$wp_sms_phone_unformatted = get_option( 'wp_sms_phone_number' );
$wp_sms_phone_formatted = preg_replace('/(\W*)/', '', $wp_sms_phone_unformatted);

// Brings the phone number and carrier together to create the carrier address.
if ( get_option( 'wp_sms_carrier' ) == '3 River Wireless' ) {
	$wp_sms_carrier = '@sms.3rivers.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'ACS Wireless' ) {
        $wp_sms_carrier = '@paging.acswireless.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Alltel' ) {
        $wp_sms_carrier = '@message.alltel.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'AT&T' ) {
        $wp_sms_carrier = '@txt.att.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'Bell Canada' ) {
        $wp_sms_carrier = '@bellmobility.ca';
}
if ( get_option( 'wp_sms_carrier' ) == 'Bell Mobility (Canada)' ) {
        $wp_sms_carrier = '@txt.bell.ca';
}
if ( get_option( 'wp_sms_carrier' ) == 'Bell Mobility' ) {
        $wp_sms_carrier = '@txt.bellmobility.ca';
}
if ( get_option( 'wp_sms_carrier' ) == 'Blue Sky Frog' ) {
        $wp_sms_carrier = '@blueskyfrog.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Bluegrass Cellular' ) {
        $wp_sms_carrier = '@sms.bluecell.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Boost Mobile' ) {
        $wp_sms_carrier = '@myboostmobile.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'BPL Mobile' ) {
        $wp_sms_carrier = '@bplmobile.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Carolina West Wireless' ) {
        $wp_sms_carrier = '@cwwsms.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Cellular One' ) {
        $wp_sms_carrier = '@mobile.celloneusa.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Cellular South' ) {
        $wp_sms_carrier = '@csouth1.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'CenturyTel' ) {
        $wp_sms_carrier = '@messaging.centurytel.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'Cingular' ) {
        $wp_sms_carrier = '@txt.att.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'Clearnet' ) {
        $wp_sms_carrier = '@msg.clearnet.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Comcast' ) {
        $wp_sms_carrier = '@comcastpcs.textmsg.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Corr Wireless Communications' ) {
        $wp_sms_carrier = '@corrwireless.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'Dobson' ) {
        $wp_sms_carrier = '@mobile.dobson.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'Edge Wireless' ) {
        $wp_sms_carrier = '@sms.edgewireless.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Fido' ) {
        $wp_sms_carrier = '@fido.ca';
}
if ( get_option( 'wp_sms_carrier' ) == 'Golden Telecom' ) {
        $wp_sms_carrier = '@sms.goldentele.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Helio' ) {
        $wp_sms_carrier = '@messaging.sprintpcs.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Houston Cellular' ) {
        $wp_sms_carrier = '@text.houstoncellular.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'Idea Cellular' ) {
        $wp_sms_carrier = '@ideacellular.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'Illinois Valley Cellular' ) {
        $wp_sms_carrier = '@ivctext.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Inland Cellular Telephone' ) {
        $wp_sms_carrier = '@inlandlink.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'MCI' ) {
        $wp_sms_carrier = '@pagemci.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Metrocall' ) {
        $wp_sms_carrier = '@page.metrocall.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Metrocall 2-way' ) {
        $wp_sms_carrier = '@my2way.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Metro PCS' ) {
        $wp_sms_carrier = '@mymetropcs.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Microcell' ) {
        $wp_sms_carrier = '@fido.ca';
}
if ( get_option( 'wp_sms_carrier' ) == 'Midwest Wireless' ) {
        $wp_sms_carrier = '@clearlydigital.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Mobilcomm' ) {
        $wp_sms_carrier = '@mobilecomm.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'MTS' ) {
        $wp_sms_carrier = '@text.mtsmobility.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Nextel' ) {
        $wp_sms_carrier = '@messaging.nextel.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'OnlineBeep' ) {
        $wp_sms_carrier = '@onlinebeep.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'PCS One' ) {
        $wp_sms_carrier = '@pcsone.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'Presidents Choice' ) {
        $wp_sms_carrier = '@txt.bell.ca';
}
if ( get_option( 'wp_sms_carrier' ) == 'Public Service Cellular' ) {
        $wp_sms_carrier = '@sms.pscel.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Qwest' ) {
        $wp_sms_carrier = '@qwestmp.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Rogers AT&T Wireless' ) {
        $wp_sms_carrier = '@pcs.rogers.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Rogers Canada' ) {
        $wp_sms_carrier = '@pcs.rogers.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Satellink' ) {
        $wp_sms_carrier = '@satellink.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'Solo Mobile' ) {
        $wp_sms_carrier = '@txt.bell.ca';
}
if ( get_option( 'wp_sms_carrier' ) == 'Southwestern Bell' ) {
        $wp_sms_carrier = '@email.swbw.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Sprint' ) {
        $wp_sms_carrier = '@messaging.sprintpcs.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Suncom' ) {
        $wp_sms_carrier = '@tms.suncom.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Surewest Communicaitons' ) {
        $wp_sms_carrier = '@mobile.surewest.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'T-Mobile' ) {
        $wp_sms_carrier = '@tmomail.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'Telus' ) {
        $wp_sms_carrier = '@msg.telus.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Tracfone' ) {
        $wp_sms_carrier = '@txt.att.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'Triton' ) {
        $wp_sms_carrier = '@tms.suncom.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Unicel' ) {
        $wp_sms_carrier = '@utext.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'US Cellular' ) {
        $wp_sms_carrier = '@email.uscc.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'US West' ) {
        $wp_sms_carrier = '@uswestdatamail.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Verizon' ) {
        $wp_sms_carrier = '@vtext.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Virgin Mobile' ) {
        $wp_sms_carrier = '@vmobl.com';
}
if ( get_option( 'wp_sms_carrier' ) == 'Virgin Mobile Canada' ) {
        $wp_sms_carrier = '@vmobile.ca';
}
if ( get_option( 'wp_sms_carrier' ) == 'West Central Wireless' ) {
        $wp_sms_carrier = '@sms.wcc.net';
}
if ( get_option( 'wp_sms_carrier' ) == 'Western Wireless' ) {
        $wp_sms_carrier = '@cellularonewest.com';
}


	
$wp_sms_phone = $wp_sms_phone_formatted . $wp_sms_carrier;

// Sends SMS when post is published.
if ( get_option( 'wp_sms_on_post_publish' ) == '1' ) {

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

		function detect_user_login( $wp_sms_new_user_logged_in ) {

			wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', 'User successfully logged in: { $wp_sms_new_user_logged_in }');   

		}

		add_action('wp_login', 'detect_user_login', 10, 2);

	}

}

// Sends SMS when a plugin is updated.
if ( '1' == get_option( 'wp_sms_on_plugin_update' ) ) {

	function wp_sms_plugin_updated( $a, $b, $c ) {

		if ( $b['type'] == 'plugin' && $b['action'] == 'update' ) {

			wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "Plugin has been updated: {$c['destination_name']}");

		}

	}

	add_action( 'upgrader_post_install', 'wp_sms_plugin_updated', 10, 3 );
}

// Sends SMS when a plugin is installed.
if ( '1' == get_option( 'wp_sms_on_plugin_install' ) ) {

		function wp_sms_plugin_install( $a, $b, $c ) {

				if ( $b['type'] == 'plugin' && $b['action'] == 'install' ) {

						wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "Plugin has been installed: {$c['destination_name']}");

				}

		}

		add_action( 'upgrader_post_install', 'wp_sms_plugin_install', 10, 3 );
}

// Sends SMS when a post is updated
if ( '1' == get_option( 'wp_sms_on_post_update' ) ) {
	
	function wp_sms_post_update( $post_ID, $post_after, $post_before ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {

		return;
	} else {
		wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "A post has been updated: {$post_after->post_title}");
	}
	}
	add_action( 'post_updated', 'wp_sms_post_update', 10, 3 );


}
if ( '1' == get_option( 'wp_sms_on_theme_install' ) ) {

		function wp_sms_theme_install( $a, $b, $c ) {

				if ( $b['type'] == 'theme' && $b['action'] == 'install' ) {

						wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "Theme has been installed: {$c['destination_name']}" );
				}

		}

		add_action( 'upgrader_post_install', 'wp_sms_theme_install', 10, 3 );

}

if ( '1' == get_option( 'wp_sms_on_theme_update' ) ) {

		function wp_sms_theme_update( $a, $b, $c ) {

				if ( $b['type'] == 'theme' && $b['action'] == 'update' ) {

						wp_sms_send_notification( $GLOBALS['wp_sms_phone'], '', "Theme has been updated: {$c['destination_name']}" );

				}

		}

		add_action( 'upgrader_post_install', 'wp_sms_theme_update', 10, 3 );

}
