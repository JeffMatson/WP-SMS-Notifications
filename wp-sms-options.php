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
			<td><select name="wp_sms_carrier">
				<option value="@messaging.sprintpcs.com">Sprint</option>
			</select></td>
		</tr>
		<tr valign="top">
                        <th scope="row">Send SMS when a post is published:</th>
                        <td><input type="checkbox" name="wp_sms_on_post_publish" value="1" <?php if (get_option('wp_sms_on_post_publish') == '1') { echo 'checked'; }?>/></td>
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
        </table>
	<?php submit_button(); ?>
	</form>
</div>
<?php
}
?>
