<?php

$wp_sms_user_ID = get_current_user_id();

if ( '1' == get_user_meta( $wp_sms_user_ID, 'wp_sms_allowed', 'true' ) ) {
	add_action( 'show_user_profile', 'wp_sms_user_settings' );
	add_action( 'edit_user_profile', 'wp_sms_user_settings' );

	function wp_sms_user_settings ( $user ) { ?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php _e('Phone number') ?>:</th>
				<td><input type="text" name="wp_sms_phone_number" value="<?php echo get_user_meta( $user->ID, 'wp_sms_phone_number', 'true' ); ?>"/></td>
			</tr>
			<tr valign="top">
				
				<th scope="row"><?php _e('Cell carrier'); ?>:</th>
				
				<?php $wp_sms_options_carrier = get_user_meta( $user->ID, 'wp_sms_carrier', 'true' ); ?>
				<td>
					<select name="wp_sms_carrier">
						<?php
						global $wp_sms_carrier_list;
						if ( is_array( $wp_sms_carrier_list ) ) { ?>
							<?php foreach ($wp_sms_carrier_list as $carrier_name => $carrier_address) : ?>
								<option value="<?php echo esc_html( $carrier_name ); ?>" <?php selected( $wp_sms_options_carrier, $carrier_name ); ?>>
									<?php echo esc_html($carrier_name); ?>
								</option>
							<?php endforeach; ?>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Send SMS when a post is published'); ?>:</th>
				<td><input type="checkbox" name="wp_sms_on_post_publish" value="1" <?php if (get_the_author_meta('wp_sms_on_post_publish', $user->ID) == '1') { echo 'checked'; }?>/></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Send SMS when a post is updated'); ?>:</th>
				<td><input type="checkbox" name="wp_sms_on_post_update" value="1" <?php if (get_the_author_meta('wp_sms_on_post_update', $user->ID) == '1') { echo 'checked'; }?>/></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Send SMS when user logs in') ?>:</th>
				<td><input type="checkbox" name="wp_sms_on_user_login" value="1" <?php if (get_the_author_meta('wp_sms_on_user_login', $user->ID) == '1') { echo 'checked'; }?>/></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Send SMS when a plugin is installed'); ?>:</th>
				<td><input type="checkbox" name="wp_sms_on_plugin_install" value="1" <?php if (get_the_author_meta('wp_sms_on_plugin_install', $user->ID) == '1') { echo 'checked'; }?>/></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Send SMS a plugin is updated'); ?>:</th>
				<td><input type="checkbox" name="wp_sms_on_plugin_update" value="1" <?php if (get_the_author_meta('wp_sms_on_plugin_update', $user->ID) == '1') { echo 'checked'; }?>/></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Send SMS a theme is installed'); ?>:</th>
				<td><input type="checkbox" name="wp_sms_on_theme_install" value="1" <?php if (get_the_author_meta('wp_sms_on_theme_install', $user->ID) == '1') { echo 'checked'; }?>/></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Send SMS a theme is updated'); ?>:</th>
				<td><input type="checkbox" name="wp_sms_on_theme_update" value="1" <?php if (get_the_author_meta('wp_sms_on_theme_update', $user->ID) == '1') { echo 'checked'; }?>/></td>
			</tr>
			<?php  ?>
		</table>
	<?php } ?>
	
	<?php
	
	add_action( 'personal_options_update', 'wp_sms_save_user' );
	add_action( 'edit_user_profile_update', 'wp_sms_save_user' );

	function wp_sms_save_user( $user_id ) {
		if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

		update_user_meta( $user_id, 'wp_sms_phone_number', $_POST['wp_sms_phone_number'] );
		update_user_meta( $user_id, 'wp_sms_carrier', $_POST['wp_sms_carrier'] );
		update_user_meta( $user_id, 'wp_sms_on_post_publish', $_POST['wp_sms_on_post_publish'] );
		update_user_meta( $user_id, 'wp_sms_on_post_update', $_POST['wp_sms_on_post_update'] );
		update_user_meta( $user_id, 'wp_sms_on_user_login', $_POST['wp_sms_on_user_login'] );
		update_user_meta( $user_id, 'wp_sms_on_plugin_install', $_POST['wp_sms_on_plugin_install'] );
		update_user_meta( $user_id, 'wp_sms_on_plugin_update', $_POST['wp_sms_on_plugin_update'] );
		update_user_meta( $user_id, 'wp_sms_on_theme_install', $_POST['wp_sms_on_theme_install'] );
		update_user_meta( $user_id, 'wp_sms_on_theme_update', $_POST['wp_sms_on_theme_update'] );
	}
} else { return; }