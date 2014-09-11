<?php
$directory = plugin_dir_path( __FILE__ );
require_once $directory . 'carrier-list.php';
add_action( 'admin_menu', 'wp_sms_menu' );

/**
 * wp_sms_menu function.
 *
 * @access public
 * @return void
 */
function wp_sms_menu() {
	add_submenu_page(
		'tools.php',
	  	__( 'WP SMS Notfications',  'wp-sms-notifications' ),
		__( 'WP SMS Notifications', 'wp-sms-notifications' ),
		'manage_options',
		'wp-sms-notifications',
		'wp_sms_notifications_menu',
		99
	);

	add_action( 'admin_init', 'update_wp_sms_settings' );
}

/**
 * update_wp_sms_settings function.
 *
 * @access public
 * @return void
 */
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

/**
 * wp_sms_notifications_menu function.
 *
 * @access public
 * @return void
 */
function wp_sms_notifications_menu() {
	?>
	<div class="wrap">
	  <h1><?php _e('WP SMS Notifications configuration'); ?></h1>
			<form method="post" action="options.php">
			<?php settings_fields( 'wp_sms_settings' ); ?>
		<?php do_settings_sections( 'wp_sms_settings' ); ?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php _e('Phone number') ?>:</th>
				<td><input type="text" name="wp_sms_phone_number" value="<?php echo get_option('wp_sms_phone_number'); ?>"/></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Cell carrier'); ?>:</th>
				<?php $wp_sms_options_carrier = get_option('wp_sms_carrier'); ?>
				<td>

					<select name="wp_sms_carrier">
					<?php
					global $wp_sms_carrier_list;
					foreach ($wp_sms_carrier_list as $carrier_name => $carrier_address) {
						$carrier_select_option = '<option value="';
						$carrier_select_option .= $carrier_name;
						$carrier_select_option .= '"';
						if ( $wp_sms_options_carrier == $carrier_name) {
							$carrier_select_option .= ' selected';
						}
						$carrier_select_option .= '>' . $carrier_name . '</option>';
						echo $carrier_select_option;
					}
					?>
					</select>

				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Send SMS when a post is published'); ?>:</th>
				<td><input type="checkbox" name="wp_sms_on_post_publish" value="1" <?php if (get_option('wp_sms_on_post_publish') == '1') { echo 'checked'; }?>/></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Send SMS when a post is updated'); ?>:</th>
				<td><input type="checkbox" name="wp_sms_on_post_update" value="1" <?php if (get_option('wp_sms_on_post_update') == '1') { echo 'checked'; }?>/></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Send SMS when user logs in') ?>:</th>
				 <td><input type="checkbox" name="wp_sms_on_user_login" value="1" <?php if (get_option('wp_sms_on_user_login') == '1') { echo 'checked'; }?>/></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Send SMS when a plugin is installed'); ?>:</th>
				 <td><input type="checkbox" name="wp_sms_on_plugin_install" value="1" <?php if (get_option('wp_sms_on_plugin_install') == '1') { echo 'checked'; }?>/></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Send SMS a plugin is updated'); ?>:</th>
				 <td><input type="checkbox" name="wp_sms_on_plugin_update" value="1" <?php if (get_option('wp_sms_on_plugin_update') == '1') { echo 'checked'; }?>/></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Send SMS a theme is installed'); ?>:</th>
				 <td><input type="checkbox" name="wp_sms_on_theme_install" value="1" <?php if (get_option('wp_sms_on_theme_install') == '1') { echo 'checked'; }?>/></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Send SMS a theme is updated'); ?>:</th>
			 <td><input type="checkbox" name="wp_sms_on_theme_update" value="1" <?php if (get_option('wp_sms_on_theme_update') == '1') { echo 'checked'; }?>/></td>
			</tr>
			</table>
		<?php submit_button(); ?>
		</form>
	</div>
	<?php
}
