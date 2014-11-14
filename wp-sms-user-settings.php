<?php

$wp_sms_user_ID = get_current_user_id();

if ( '1' == get_user_meta( $wp_sms_user_ID, 'wp_sms_allowed', 'true' ) ) {
	add_action( 'show_user_profile', 'wp_sms_user_settings' );
	add_action( 'edit_user_profile', 'wp_sms_user_settings' );

	function wp_sms_user_settings( $user ) {

		?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php _e( 'Phone number' ) ?>:</th>
				<td>
					<label>
						<input type="text" name="wp_sms_phone_number"
						       value="<?php echo get_user_meta( $user->ID, 'wp_sms_phone_number', 'true' ); ?>"/>
					</label>
				</td>
			</tr>
			<tr valign="top">

				<th scope="row"><?php _e( 'Cell carrier' ); ?>:</th>

				<?php $wp_sms_options_carrier = get_user_meta( $user->ID, 'wp_sms_carrier', 'true' ); ?>
				<td>
					<label>
						<select name="wp_sms_carrier">
							<?php
						global $wp_sms_carrier_list;
						if ( is_array( $wp_sms_carrier_list ) ) {
							?>
							<?php foreach ( $wp_sms_carrier_list as $carrier_name => $carrier_address ) : ?>
							<option value="<?php echo esc_html( $carrier_name ); ?>"
							<?php selected( $wp_sms_options_carrier, $carrier_name ); ?>>
							<?php echo esc_html( $carrier_name ); ?>
							</option>
							<?php endforeach; ?>
							<?php } ?>
						</select>
					</label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e( 'Send SMS when a post is published' ); ?>:</th>
				<td>
					<label>
						<input type="checkbox" name="wp_sms_on_post_publish"
						       value="1" <?php if ( get_the_author_meta( 'wp_sms_on_post_publish', $user->ID ) == '1' )
						{
						echo 'checked';
						} ?>/>
					</label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e( 'Send SMS when a post is updated' ); ?>:</th>
				<td>
					<label>
						<input type="checkbox" name="wp_sms_on_post_update"
						       value="1" <?php if ( get_the_author_meta( 'wp_sms_on_post_update', $user->ID ) == '1' ) {
						echo 'checked';
						} ?>/>
					</label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e( 'Send SMS when user logs in' ) ?>:</th>
				<td>
					<label>
						<input type="checkbox" name="wp_sms_on_user_login"
						       value="1" <?php if ( get_the_author_meta( 'wp_sms_on_user_login', $user->ID ) == '1' ) {
						echo 'checked';
						} ?>/>
					</label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e( 'Send SMS when a plugin is installed' ); ?>:</th>
				<td>
					<label>
						<input type="checkbox" name="wp_sms_on_plugin_install"
						       value="1" <?php if ( get_the_author_meta( 'wp_sms_on_plugin_install', $user->ID ) == '1'
						) {
						echo 'checked';
						} ?>/>
					</label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e( 'Send SMS a plugin is updated' ); ?>:</th>
				<td>
					<label>
						<input type="checkbox" name="wp_sms_on_plugin_update"
						       value="1" <?php if ( get_the_author_meta( 'wp_sms_on_plugin_update', $user->ID ) == '1' )
						{
						echo 'checked';
						} ?>/>
					</label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e( 'Send SMS a theme is installed' ); ?>:</th>
				<td>
					<label>
						<input type="checkbox" name="wp_sms_on_theme_install"
						       value="1" <?php if ( get_the_author_meta( 'wp_sms_on_theme_install', $user->ID ) == '1' )
						{
						echo 'checked';
						} ?>/>
					</label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e( 'Send SMS a theme is updated' ); ?>:</th>
				<td>
					<label>
						<input type="checkbox" name="wp_sms_on_theme_update"
						       value="1" <?php if ( get_the_author_meta( 'wp_sms_on_theme_update', $user->ID ) == '1' )
						{
						echo 'checked';
						} ?>/>
					</label>
				</td>
			</tr>
			<?php ?>
		</table>
	<?php }

	add_action( 'personal_options_update', 'wp_sms_save_user' );
	add_action( 'edit_user_profile_update', 'wp_sms_save_user' );

	/**
	 * @param $user_id
	 *
	 * @return bool
	 */
	function wp_sms_save_user( $user_id ) {

		if ( ! current_user_can( 'edit_user', $user_id ) ) {
            return false;
        }

		// Update the phone number
        if ( isset( $_POST['wp_sms_phone_number'] ) ) {
	        $phone_number = preg_replace('/[^0-9]/', '', $_POST['wp_sms_phone_number']);
	        update_user_meta( $user_id, 'wp_sms_phone_number', $phone_number );
        } else {
	        delete_user_meta( $user_id, 'wp_sms_phone_number' );
        }

		// Update the carrier
		global $wp_sms_carrier_list;
		if ( isset( $_POST['wp_sms_carrier'] ) && array_key_exists( $_POST['wp_sms_carrier'], $wp_sms_carrier_list ) ) {
			update_user_meta( $user_id, 'wp_sms_carrier', $_POST['wp_sms_carrier'] );
		} else {
			delete_user_meta( $user_id, 'wp_sms_carrier' );
		}

		// Update published post notification
		if ( isset( $_POST['wp_sms_on_post_publish'] ) && $_POST['wp_sms_on_post_publish'] == '1' ) {
			update_user_meta( $user_id, 'wp_sms_on_post_publish', $_POST['wp_sms_on_post_publish'] );
		} else {
			delete_user_meta( $user_id, 'wp_sms_on_post_publish' );
		}

		// Update post update notification
		if ( isset( $_POST['wp_sms_on_post_update'] ) && $_POST['wp_sms_on_post_update'] == '1' ) {
			update_user_meta( $user_id, 'wp_sms_on_post_update', $_POST['wp_sms_on_post_update'] );
		} else {
			delete_user_meta( $user_id, 'wp_sms_on_post_update' );
		}

		// Update user login notification
		if ( isset( $_POST['wp_sms_on_user_login'] ) && $_POST['wp_sms_on_user_login'] == '1' ) {
			update_user_meta( $user_id, 'wp_sms_on_user_login', $_POST['wp_sms_on_user_login'] );
		} else {
			delete_user_meta( $user_id, 'wp_sms_on_user_login' );
		}

		// Update plugin install notification
		if ( isset( $_POST['wp_sms_on_plugin_install'] ) && $_POST['wp_sms_on_plugin_install'] == '1' ) {
			update_user_meta( $user_id, 'wp_sms_on_plugin_install', $_POST['wp_sms_on_plugin_install'] );
		} else {
			delete_user_meta( $user_id, 'wp_sms_on_plugin_install' );
		}

		// Update plugin update notification
		if ( isset( $_POST['wp_sms_on_plugin_update'] ) && $_POST['wp_sms_on_plugin_update'] == '1' ) {
			update_user_meta( $user_id, 'wp_sms_on_plugin_update', $_POST['wp_sms_on_plugin_update'] );
		} else {
			delete_user_meta( $user_id, 'wp_sms_on_plugin_update' );
		}

		// Update theme install notification
		if ( isset( $_POST['wp_sms_on_theme_install'] ) && $_POST['wp_sms_on_theme_install'] == '1' ) {
			update_user_meta( $user_id, 'wp_sms_on_theme_install', $_POST['wp_sms_on_theme_install'] );
		} else {
			delete_user_meta( $user_id, 'wp_sms_on_theme_install' );
		}

		// Update theme update notification
		if ( isset( $_POST['wp_sms_on_theme_update'] ) && $_POST['wp_sms_on_theme_update'] == '1' ) {
			update_user_meta( $user_id, 'wp_sms_on_theme_update', $_POST['wp_sms_on_theme_update'] );
		} else {
			delete_user_meta( $user_id, 'wp_sms_on_theme_update' );
		}
		return false;
	}
} else {
	return;
}