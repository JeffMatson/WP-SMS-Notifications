<?php
if ( is_admin() && current_user_can( 'manage_options' ) ) {
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
			__( 'WP SMS Notfications', 'wp-sms-notifications' ),
			__( 'WP SMS Notifications', 'wp-sms-notifications' ),
			'manage_options',
			'wp-sms-notifications',
			'wp_sms_notifications_menu',
			99
		);
		// add_action( 'admin_init', 'update_wp_sms_settings' );
	}

	?>
	<?php function wp_sms_notifications_menu() { ?>

		<div class="wrap">

			<h1>WP SMS Notifications configuration</h1>

			<div style="margin-right:auto; float:left;">
				<form method="post" action="tools.php?page=wp-sms-notifications">
					<h3>Allow these users to configure SMS notifications:</h3>
					<?php
					$blogusers = get_users( 'blog_id=1&orderby=nicename&role!=subscriber' );

					foreach ( $blogusers as $user ) :

						if ( ! empty( $_POST ) ) {

							if ( is_numeric( $_POST['wp_sms_allowed'] ) ) {
								update_user_meta( $user->ID, 'wp_sms_allowed', $_POST['wp_sms_allowed'] );
							}

						} ?>

						<tr valign="top">

							<th scope="row"><?php echo esc_html( $user->user_nicename ); ?></th>
							<?php $user_allowed = get_user_meta( $user->ID, 'wp_sms_allowed', 'true' ); ?>
							<td>
								<input type="checkbox" name="wp_sms_allowed" value="1" <?php checked( $user_allowed, '1' ); ?>/>
							</td>

						</tr>

					<?php endforeach; ?>

					<?php submit_button(); ?>

				</form>
			</div>

			<div style="margin-left:auto; float:right;">

				<h2>Want more features?</h2>
				<a href="https://jeffmatson.net/wp-sms/">Upgrade to WP SMS Notifications Pro</a> today!</p>
				<table style="border-collapse:collapse;border-spacing:0;">
					<tr>
						<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<h3>
								<center>Personal License</center>
							</h3>
						</th>
						<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<h3>
								<center>Developer License</center>
							</h3>
						</th>
						<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<h3>
								<center>Agency License</center>
							</h3>
						</th>
					</tr>
					<tr>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center>$10</center>
						</td>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center>$25</center>
						</td>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center>$50</center>
						</td>
					</tr>
					<tr>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center>1 Site</center>
						</td>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center>5 Sites</center>
						</td>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center>30 Sites</center>
						</td>
					</tr>
					<tr>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center>1 Year Premium Support</center>
						</td>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center>1 Year Premium Support</center>
						</td>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center>1 Year Premium Support</center>
						</td>
					</tr>
					<tr>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center>Automatic Updates</center>
						</td>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center>Automatic Updates</center>
						</td>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center>Automatic Updates</center>
						</td>
					</tr>
					<tr>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center>All Extensions</center>
						</td>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center>All Extensions</center>
						</td>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center>All Extensions</center>
						</td>
					</tr>
					<tr>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center><a href="https://jeffmatson.net/downloads/wp-sms-notifications-pro/">Upgrade
							                                                                             Now!</a>
							</center>
						</td>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center><a href="https://jeffmatson.net/downloads/wp-sms-notifications-pro/">Upgrade
							                                                                             Now!</a>
							</center>
						</td>
						<td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;">
							<center><a href="https://jeffmatson.net/downloads/wp-sms-notifications-pro/">Upgrade
							                                                                             Now!</a>
							</center>
						</td>
					</tr>
				</table>
				<h3>Extensions available for plugins you have installed:</h3>

				<?php $available_extensions = wp_remote_retrieve_body( wp_remote_get( 'http://jeffmatson.net/wp-sms-extensions.php' ) ); ?>
				<?php $available_extensions = json_decode( $available_extensions, true ); ?>

				<?php foreach ( $available_extensions as $key => $value ): ?>

					<?php if ( is_plugin_active( $value ) ): ?>
						<strong><?php echo esc_html( $key ); ?></strong><br/>
					<?php endif; ?>

				<?php endforeach; ?>

				<h3>All notification extensions available:</h3>

				<?php foreach ( $available_extensions as $key => $value ): ?>
					<strong><?php echo esc_html( $key ); ?></strong><br/>
				<?php endforeach; ?>

			</div>
		</div>
	<?php
	}
} else {
	return;
}
?>

