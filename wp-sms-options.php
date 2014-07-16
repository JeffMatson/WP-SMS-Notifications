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
	register_setting( 'wp_sms_settings', 'wp_sms_on_theme_update' );
	register_setting( 'wp_sms_settings', 'wp_sms_on_theme_install' );
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
                                <option value="3 River Wireless" <?php if ( $wp_sms_options_carrier == '3 River Wireless' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>3 River Wireless</option>
                                <option value="ACS Wireless" <?php if ( $wp_sms_options_carrier == 'ACS Wireless' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>ACS Wireless</option>
                                <option value="Alltel" <?php if ( $wp_sms_options_carrier == 'Alltel' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Alltel</option>
                                <option value="AT&T" <?php if ( $wp_sms_options_carrier == 'AT&T' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>AT&T</option>
                                <option value="Bell Canada" <?php if ( $wp_sms_options_carrier == 'Bell Canada' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Bell Canada</option>
                                <option value="Bell Mobility (Canada)" <?php if ( $wp_sms_options_carrier == 'Bell Mobility (Canada)' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Bell Mobility (Canada)</option>
                                <option value="Bell Mobility" <?php if ( $wp_sms_options_carrier == 'Bell Mobility' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Bell Mobility</option>
                                <option value="Blue Sky Frog" <?php if ( $wp_sms_options_carrier == 'Blue Sky Frog' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Blue Sky Frog</option>
                                <option value="Bluegrass Cellular" <?php if ( $wp_sms_options_carrier == 'Bluegrass Cellular' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Bluegrass Cellular</option>
                                <option value="Boost Mobile" <?php if ( $wp_sms_options_carrier == 'Boost Mobile' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Boost Mobile</option>
                                <option value="BPL Mobile" <?php if ( $wp_sms_options_carrier == 'BPL Mobile' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>BPL Mobile</option>
                                <option value="Carolina West Wireless" <?php if ( $wp_sms_options_carrier == 'Carolina West Wireless' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Carolina West Wireless</option>
                                <option value="Cellular One" <?php if ( $wp_sms_options_carrier == 'Cellular One' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Cellular One</option>
                                <option value="Cellular South" <?php if ( $wp_sms_options_carrier == 'Cellular South' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Cellular South</option>
                                <option value="CenturyTel" <?php if ( $wp_sms_options_carrier == 'CenturyTel' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>CenturyTel</option>
                                <option value="Cingular" <?php if ( $wp_sms_options_carrier == 'Cingular' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Cingular</option>
                                <option value="Clearnet" <?php if ( $wp_sms_options_carrier == 'Clearnet' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Clearnet</option>
                                <option value="Comcast" <?php if ( $wp_sms_options_carrier == 'Comcast' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Comcast</option>
                                <option value="Corr Wireless Communications" <?php if ( $wp_sms_options_carrier == 'Corr Wireless Communications' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Corr Wireless Communications</option>
                                <option value="Dobson" <?php if ( $wp_sms_options_carrier == 'Dobson' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Dobson</option>
                                <option value="Edge Wireless" <?php if ( $wp_sms_options_carrier == 'Edge Wireless' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Edge Wireless</option>
                                <option value="Fido" <?php if ( $wp_sms_options_carrier == 'Fido' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Fido</option>
                                <option value="Golden Telecom" <?php if ( $wp_sms_options_carrier == 'Golden Telecom' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Golden Telecom</option>
                                <option value="Helio" <?php if ( $wp_sms_options_carrier == 'Helio' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Helio</option>
                                <option value="Houston Cellular" <?php if ( $wp_sms_options_carrier == 'Houston Cellular' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Houston Cellular</option>
                                <option value="Idea Cellular" <?php if ( $wp_sms_options_carrier == 'Idea Cellular' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Idea Cellular</option>
                                <option value="Illinois Valley Cellular" <?php if ( $wp_sms_options_carrier == 'Illinois Valley Cellular' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Illinois Valley Cellular</option>
                                <option value="Inland Cellular Telephone" <?php if ( $wp_sms_options_carrier == 'Inland Cellular Telephone' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Inland Cellular Telephone</option>
                                <option value="MCI" <?php if ( $wp_sms_options_carrier == 'MCI' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>MCI</option>
                                <option value="Metrocall" <?php if ( $wp_sms_options_carrier == 'Metrocall' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Metrocall</option>
                                <option value="Metrocall 2-way" <?php if ( $wp_sms_options_carrier == 'Metrocall 2-way' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Metrocall 2-way</option>
                                <option value="@mymetropcs.com" <?php if ( $wp_sms_options_carrier == '@mymetropcs.com' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Metro PCS</option>
                                <option value="Metro PCS" <?php if ( $wp_sms_options_carrier == 'Metro PCS' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Microcell</option>
                                <option value="Midwest Wireless" <?php if ( $wp_sms_options_carrier == 'Midwest Wireless' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Midwest Wireless</option>
                                <option value="Mobilcomm" <?php if ( $wp_sms_options_carrier == 'Mobilcomm' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Mobilcomm</option>
                                <option value="MTS" <?php if ( $wp_sms_options_carrier == 'MTS' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>MTS</option>
                                <option value="Nextel" <?php if ( $wp_sms_options_carrier == 'Nextel' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Nextel</option>
                                <option value="OnlineBeep" <?php if ( $wp_sms_options_carrier == 'OnlineBeep' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>OnlineBeep</option>
                                <option value="PCS One" <?php if ( $wp_sms_options_carrier == 'PCS One' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>PCS One</option>
                                <option value="Presidents Choice" <?php if ( $wp_sms_options_carrier == 'Presidents Choice' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>President's Choice</option>
                                <option value="Public Service Cellular" <?php if ( $wp_sms_options_carrier == 'Public Service Cellular' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Public Service Cellular</option>
                                <option value="Qwest" <?php if ( $wp_sms_options_carrier == 'Qwest' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Qwest</option>
                                <option value="Rogers AT&T Wireless" <?php if ( $wp_sms_options_carrier == 'Rogers AT&T Wireless' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Rogers AT&T Wireless</option>
                                <option value="Rogers Canada" <?php if ( $wp_sms_options_carrier == 'Rogers Canada' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Rogers Canada</option>
                                <option value="Satellink" <?php if ( $wp_sms_options_carrier == 'Satellink' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Satellink</option>
                                <option value="Solo Mobile" <?php if ( $wp_sms_options_carrier == 'Solo Mobile' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Solo Mobile</option>
                                <option value="Southwestern Bell" <?php if ( $wp_sms_options_carrier == 'Southwestern Bell' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Southwestern Bell</option>
                                <option value="Sprint" <?php if ( $wp_sms_options_carrier == 'Sprint' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Sprint</option>
                                <option value="Suncom" <?php if ( $wp_sms_options_carrier == 'Suncom' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Suncom</option>
                                <option value="Surewest Communicaitons" <?php if ( $wp_sms_options_carrier == 'Surewest Communicaitons' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Surewest Communicaitons</option>
                                <option value="T-Mobile" <?php if ( $wp_sms_options_carrier == 'T-Mobile' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>T-Mobile</option>
                                <option value="Telus" <?php if ( $wp_sms_options_carrier == 'Telus' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Telus</option>
                                <option value="Tracfone" <?php if ( $wp_sms_options_carrier == 'Tracfone' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Tracfone</option>
                                <option value="Triton" <?php if ( $wp_sms_options_carrier == 'Triton' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Triton</option>
                                <option value="Unicel" <?php if ( $wp_sms_options_carrier == 'Unicel' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Unicel</option>
                                <option value="US Cellular" <?php if ( $wp_sms_options_carrier == 'US Cellular' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>US Cellular</option>
                                <option value="US West" <?php if ( $wp_sms_options_carrier == 'US West' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>US West</option>
                                <option value="Verizon" <?php if ( $wp_sms_options_carrier == 'Verizon' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Verizon</option>
                                <option value="Virgin Mobile" <?php if ( $wp_sms_options_carrier == 'Virgin Mobile' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Virgin Mobile</option>
                                <option value="Virgin Mobile Canada" <?php if ( $wp_sms_options_carrier == 'Virgin Mobile Canada' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Virgin Mobile Canada</option>
                                <option value="West Central Wireless" <?php if ( $wp_sms_options_carrier == 'West Central Wireless' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>West Central Wireless</option>
                                <option value="Western Wireless" <?php if ( $wp_sms_options_carrier == 'Western Wireless' ) { echo "selected=\"$wp_sms_options_carrier\""; } ?>>Western Wireless</option>
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
                <tr valign="top">
                        <th scope="row">Send SMS a theme is installed:</th>
                         <td><input type="checkbox" name="wp_sms_on_theme_install" value="1" <?php if (get_option('wp_sms_on_theme_install') == '1') { echo 'checked'; }?>/></td>
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
