<?php
add_action( 'admin_menu', 'wp_sms_menu' );

function wp_sms_menu(){

  $page_title = 'WP SMS Notfications';
  $menu_title = 'WP SMS Notifications';
  $capability = 'manage_options';
  $menu_slug  = 'wp-sms-notifications';
  $function   = 'wp_sms_notifications_menu';
  $icon_url   = 'dashicons-media-code';
  $position   = 4;

  add_menu_page( $page_title,
                 $menu_title,
                 $capability,
                 $menu_slug,
                 $function,
                 $icon_url,
                 $position );


add_action( 'admin_init', 'update_wp_sms_settings' );
}

function update_wp_sms_settings() {
	register_setting( 'wp_sms_settings', 'wp_sms_on_post_publish' );
	register_setting( 'wp_sms_settings', 'wp_sms_phone_number' );
	register_setting( 'wp_sms_settings', 'wp_sms_carrier' );
	register_setting( 'wp_sms_settings', 'wp_sms_on_user_login' );
	register_setting( 'wp_sms_settings', 'wp_sms_on_plugin_update' );
	register_setting( 'wp_sms_settings', 'wp_sms_on_plugin_install' );
        register_setting( 'wp_sms_settings', 'wp_sms_on_post_update' );
}

function wp_sms_notifications_menu(){
?>
<div class="wrap">
  <h1>WP SMS Notifications configuration</h1>
        <form method="post" action="options.php">
        <?php settings_fields( 'wp_sms_settings' ); ?>
	<?php do_settings_sections( 'wp_sms_settings' ); ?>
	<table class="form-table">
                <tr valign="top">
			<th scope="row">Phone number:</th>
                        <td><input type="text" name="wp_sms_phone_number" value="<?php echo get_option('wp_sms_phone_number'); ?>"/></td>
		</tr>
		<tr valign="top">
			<th scope="row">Cell carrier:</th>
			<?php $wp_sms_options_carrier = get_option('wp_sms_carrier'); ?>
		<td><select name="wp_sms_carrier" selected="<?php echo get_option('wp_sms_carrier'); ?>">
                                <option value="@sms.3rivers.net" <?php if ( $wp_sms_options_carrier == '@sms.3rivers.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>3 River Wireless</option>
                                <option value="@paging.acswireless.com" <?php if ( $wp_sms_options_carrier == '@paging.acswireless.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>ACS Wireless</option>
                                <option value="@message.alltel.com" <?php if ( $wp_sms_options_carrier == '@message.alltel.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Alltel</option>
                                <option value="@txt.att.net" <?php if ( $wp_sms_options_carrier == '@txt.att.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>AT&T</option>
                                <option value="@bellmobility.ca" <?php if ( $wp_sms_options_carrier == '@bellmobility.ca' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Bell Canada</option>
                                <option value="@txt.bell.ca" <?php if ( $wp_sms_options_carrier == '@txt.bell.ca' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Bell Mobility (Canada)</option>
                                <option value="@txt.bellmobility.ca" <?php if ( $wp_sms_options_carrier == '@txt.bellmobility.ca' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Bell Mobility</option>
                                <option value="@blueskyfrog.com" <?php if ( $wp_sms_options_carrier == '@blueskyfrog.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Blue Sky Frog</option>
                                <option value="@sms.bluecell.com" <?php if ( $wp_sms_options_carrier == '@sms.bluecell.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Bluegrass Cellular</option>
                                <option value="@myboostmobile.com" <?php if ( $wp_sms_options_carrier == '@myboostmobile.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Boost Mobile</option>
                                <option value="@bplmobile.com" <?php if ( $wp_sms_options_carrier == '@bplmobile.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>BPL Mobile</option>
                                <option value="@cwwsms.com" <?php if ( $wp_sms_options_carrier == '@cwwsms.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Carolina West Wireless</option>
                                <option value="@mobile.celloneusa.com" <?php if ( $wp_sms_options_carrier == '@mobile.celloneusa.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Cellular One</option>
                                <option value="@csouth1.com" <?php if ( $wp_sms_options_carrier == '@csouth1.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Cellular South</option>
                                <option value="@messaging.centurytel.net" <?php if ( $wp_sms_options_carrier == '@messaging.centurytel.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>CenturyTel</option>
                                <option value="@txt.att.net" <?php if ( $wp_sms_options_carrier == '@txt.att.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Cingular</option>
                                <option value="@msg.clearnet.com" <?php if ( $wp_sms_options_carrier == '@msg.clearnet.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Clearnet</option>
                                <option value="@comcastpcs.textmsg.com" <?php if ( $wp_sms_options_carrier == '@comcastpcs.textmsg.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Comcast</option>
                                <option value="@corrwireless.net" <?php if ( $wp_sms_options_carrier == '@corrwireless.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Corr Wireless Communications</option>
                                <option value="@mobile.dobson.net" <?php if ( $wp_sms_options_carrier == '@mobile.dobson.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Dobson</option>
                                <option value="@sms.edgewireless.com" <?php if ( $wp_sms_options_carrier == '@sms.edgewireless.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Edge Wireless</option>
                                <option value="@fido.ca" <?php if ( $wp_sms_options_carrier == '@fido.ca' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Fido</option>
                                <option value="@sms.goldentele.com" <?php if ( $wp_sms_options_carrier == '@sms.goldentele.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Golden Telecom</option>
                                <option value="@messaging.sprintpcs.com" <?php if ( $wp_sms_options_carrier == '@messaging.sprintpcs.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Helio</option>
                                <option value="@text.houstoncellular.net" <?php if ( $wp_sms_options_carrier == '@text.houstoncellular.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Houston Cellular</option>
                                <option value="@ideacellular.net" <?php if ( $wp_sms_options_carrier == '@ideacellular.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Idea Cellular</option>
                                <option value="@ivctext.com" <?php if ( $wp_sms_options_carrier == '@ivctext.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Illinois Valley Cellular</option>
                                <option value="@inlandlink.com" <?php if ( $wp_sms_options_carrier == '@inlandlink.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Inland Cellular Telephone</option>
                                <option value="@pagemci.com" <?php if ( $wp_sms_options_carrier == '@pagemci.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>MCI</option>
                                <option value="@page.metrocall.com" <?php if ( $wp_sms_options_carrier == '@page.metrocall.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Metrocall</option>
                                <option value="@my2way.com" <?php if ( $wp_sms_options_carrier == '@my2way.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Metrocall 2-way</option>
                                <option value="@mymetropcs.com" <?php if ( $wp_sms_options_carrier == '@mymetropcs.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Metro PCS</option>
                                <option value="@fido.ca" <?php if ( $wp_sms_options_carrier == '@fido.ca' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Microcell</option>
                                <option value="@clearlydigital.com" <?php if ( $wp_sms_options_carrier == '@clearlydigital.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Midwest Wireless</option>
                                <option value="@mobilecomm.net" <?php if ( $wp_sms_options_carrier == '@mobilecomm.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Mobilcomm</option>
                                <option value="@text.mtsmobility.com" <?php if ( $wp_sms_options_carrier == '@text.mtsmobility.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>MTS</option>
                                <option value="@messaging.nextel.com" <?php if ( $wp_sms_options_carrier == '@messaging.nextel.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Nextel</option>
                                <option value="@onlinebeep.net" <?php if ( $wp_sms_options_carrier == '@onlinebeep.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>OnlineBeep</option>
                                <option value="@pcsone.net" <?php if ( $wp_sms_options_carrier == '@pcsone.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>PCS One</option>
                                <option value="@txt.bell.ca" <?php if ( $wp_sms_options_carrier == '@txt.bell.ca' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>President's Choice</option>
                                <option value="@sms.pscel.com" <?php if ( $wp_sms_options_carrier == '@sms.pscel.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Public Service Cellular</option>
                                <option value="@qwestmp.com" <?php if ( $wp_sms_options_carrier == '@qwestmp.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Qwest</option>
                                <option value="@pcs.rogers.com" <?php if ( $wp_sms_options_carrier == '@pcs.rogers.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Rogers AT&T Wireless</option>
                                <option value="@pcs.rogers.com" <?php if ( $wp_sms_options_carrier == '@pcs.rogers.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Rogers Canada</option>
                                <option value="@satellink.net" <?php if ( $wp_sms_options_carrier == '@satellink.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Satellink</option>
                                <option value="@txt.bell.ca" <?php if ( $wp_sms_options_carrier == '@txt.bell.ca' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Solo Mobile</option>
                                <option value="@email.swbw.com" <?php if ( $wp_sms_options_carrier == '@email.swbw.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Southwestern Bell</option>
                                <option value="@messaging.sprintpcs.com" <?php if ( $wp_sms_options_carrier == '@messaging.sprintpcs.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Sprint</option>
                                <option value="@tms.suncom.com" <?php if ( $wp_sms_options_carrier == '@tms.suncom.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Sumcom</option>
                                <option value="@mobile.surewest.com" <?php if ( $wp_sms_options_carrier == '@mobile.surewest.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Surewest Communicaitons</option>
                                <option value="@tmomail.net" <?php if ( $wp_sms_options_carrier == '@tmomail.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>T-Mobile</option>
                                <option value="@msg.telus.com" <?php if ( $wp_sms_options_carrier == '@msg.telus.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Telus</option>
                                <option value="@txt.att.net" <?php if ( $wp_sms_options_carrier == '@txt.att.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Tracfone</option>
                                <option value="@tms.suncom.com" <?php if ( $wp_sms_options_carrier == '@tms.suncom.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Triton</option>
                                <option value="@utext.com" <?php if ( $wp_sms_options_carrier == '@utext.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Unicel</option>
                                <option value="@email.uscc.net" <?php if ( $wp_sms_options_carrier == '@email.uscc.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>US Cellular</option>
                                <option value="@uswestdatamail.com" <?php if ( $wp_sms_options_carrier == '@uswestdatamail.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>US West</option>
                                <option value="@vtext.com" <?php if ( $wp_sms_options_carrier == '@vtext.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Verizon</option>
                                <option value="@vmobl.com" <?php if ( $wp_sms_options_carrier == '@vmobl.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Virgin Mobile</option>
                                <option value="@vmobile.ca" <?php if ( $wp_sms_options_carrier == '@vmobl.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Virgin Mobile Canada</option>
                                <option value="@sms.wcc.net" <?php if ( $wp_sms_options_carrier == '@sms.wcc.net' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>West Central Wireless</option>
                                <option value="@cellularonewest.com" <?php if ( $wp_sms_options_carrier == '@cellularonewest.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Western Wireless</option>
                        </select></td>
		</tr>
		<tr valign="top">
                        <th scope="row">Send SMS when a post is published:</th>
                        <td><input type="checkbox" name="wp_sms_on_post_publish" value="1" <?php if (get_option('wp_sms_on_post_publish') == '1') { echo 'checked'; }?>/></td>
                </tr>
                <tr valign="top">
                        <th scope="row">Send SMS when a post is updated:</th>
                        <td><input type="checkbox" name="wp_sms_on_post_update" value="1" <?php if (get_option('wp_sms_on_post_update') == '1') { echo 'checked'; }?>/></td>
                </tr>
		<tr valign="top">
			<th scope="row">Send SMS when user logs in:</th>
			 <td><input type="checkbox" name="wp_sms_on_user_login" value="1" <?php if (get_option('wp_sms_on_user_login') == '1') { echo 'checked'; }?>/></td>
		</tr>
		<tr valign="top">
                        <th scope="row">Send SMS when a plugin is installed:</th>
                         <td><input type="checkbox" name="wp_sms_on_plugin_install" value="1" <?php if (get_option('wp_sms_on_plugin_install') == '1') { echo 'checked'; }?>/></td>
                </tr>
		<tr valign="top">
                        <th scope="row">Send SMS a plugin is updated:</th>
                         <td><input type="checkbox" name="wp_sms_on_plugin_update" value="1" <?php if (get_option('wp_sms_on_plugin_update') == '1') { echo 'checked'; }?>/></td>
                </tr>
                </tr>
                <tr valign="top">
                        <th scope="row">Send SMS a theme is installed:</th>
                         <td><input type="checkbox" name="wp_sms_on_theme_install" value="1" <?php if (get_option('wp_sms_on_theme_install') == '1') { echo 'checked'; }?>/></td>
                </tr>
                </tr>
                <tr valign="top">
                        <th scope="row">Send SMS a theme is updated:</th>
                         <td><input type="checkbox" name="wp_sms_on_theme_update" value="1" <?php if (get_option('wp_sms_on_theme_update') == '1') { echo 'checked'; }?>/></td>
                </tr>
        </table>
	<?php submit_button(); ?>
	</form>
</div>
<?php
}
?>
