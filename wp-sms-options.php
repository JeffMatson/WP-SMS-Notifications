<?php
if ( current_user_can( 'manage_options' ) ) {
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
	}

function wp_sms_scripts($wp_sms_hook) {

    if ( 'tools_page_wp-sms-notifications' !== $wp_sms_hook ) {
        return;
    }

	wp_enqueue_style( 'wp-sms-bootstrap-css', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css' );
	wp_enqueue_style( 'wp-sms-bootstrap-togglecss', plugin_dir_url( __FILE__ ) . 'css/bootstrap-toggle.min.css' );
//	wp_enqueue_style( 'wp-sms-bootstrap-theme-css', plugin_dir_url( __FILE__ ) . 'css/bootstrap-theme.min.css' );
	wp_enqueue_script( 'wp-sms-bootstrap-js', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js' );
	wp_enqueue_script( 'wp-sms-bootstrap-toggle-js', plugin_dir_url( __FILE__ ) . 'js/bootstrap-toggle.min.js' );
}

add_action( 'admin_enqueue_scripts', 'wp_sms_scripts' );

	function wp_sms_notifications_menu() {
		?>
<div class="wrap">
		<div class="bootstrap-wrapper">
			<div class="row">
				<div class="col-md-12">
					<h1>WP SMS Notifications configuration</h1>
				</div>
			</div>
		<div class="row">
			<div class="col-md-8">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<?php
					$blogusers = get_users( esc_sql( 'blog_id=1&orderby=nicename&role!=subscriber' ) );
					foreach ( $blogusers as $user ) :
						$sms_user_selection = 'wp_sms_allowed_' . $user->user_nicename;
						if ( isset ( $_POST[$sms_user_selection] ) && $_POST[$sms_user_selection] == '1' ) {
							update_user_meta($user->ID, 'wp_sms_allowed', '1');
						}
						if ( isset( $_POST['submit'] ) ) {
							if ( !isset( $_POST[$sms_user_selection] ) ) {
								delete_user_meta( $user->ID, 'wp_sms_allowed' );
							}
						}?>

						<div class="panel panel-default">

							<div class="panel-heading" role="tab" id="<?php echo esc_html( $user->user_nicename ); ?>-heading">
                                <?php $wp_sms_user_info = get_user_meta( $user->ID ); ?>
								<input class="sms-toggle-<?php echo $user->ID ?>" data-toggle="toggle" wp-sms-toggle="wp_sms_allowed" type="checkbox" style="float:right;" <?php checked( isset($wp_sms_user_info['wp_sms_allowed']), '1' ); ?>>
								<h4 class="panel-title" style="float:left;">
									<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#<?php echo esc_html( $user->user_nicename ); ?>" aria-expanded="false" aria-controls="<?php echo esc_html( $user->user_nicename ); ?>">
										<?php echo esc_html( $user->user_nicename ); ?>
									</a>
								</h4>
							</div>

							<div id="<?php echo esc_html( $user->user_nicename ); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo esc_html( $user->user_nicename ); ?>-heading">

								<div class="panel-body">
                                    <input class="sms-toggle-<?php echo $user->ID ?>" data-toggle="toggle" wp-sms-toggle="wp_sms_on_post_publish" type="checkbox" style="float:right;" <?php checked( isset($wp_sms_user_info['wp_sms_on_post_publish']), '1' ); ?>>Send SMS when a post is published<br/>
                                    <input class="sms-toggle-<?php echo $user->ID ?>" data-toggle="toggle" wp-sms-toggle="wp_sms_on_post_update" type="checkbox" style="float:right;" <?php checked( isset($wp_sms_user_info['wp_sms_on_post_update']), '1' ); ?>>Send SMS when a post is updated<br/>
                                    <input class="sms-toggle-<?php echo $user->ID ?>" data-toggle="toggle" wp-sms-toggle="wp_sms_on_user_login" type="checkbox" style="float:right;" <?php checked( isset($wp_sms_user_info['wp_sms_on_user_login']), '1' ); ?>>Send SMS when a user logs in<br/>
                                    <input class="sms-toggle-<?php echo $user->ID ?>" data-toggle="toggle" wp-sms-toggle="wp_sms_on_plugin_install" type="checkbox" style="float:right;" <?php checked( isset($wp_sms_user_info['wp_sms_on_plugin_install']), '1' ); ?>>Send SMS when a plugin is installed<br/>
                                    <input class="sms-toggle-<?php echo $user->ID ?>" data-toggle="toggle" wp-sms-toggle="wp_sms_on_plugin_update" type="checkbox" style="float:right;" <?php checked( isset($wp_sms_user_info['wp_sms_on_plugin_update']), '1' ); ?>>Send SMS when a plugin is updated<br/>
                                    <input class="sms-toggle-<?php echo $user->ID ?>" data-toggle="toggle" wp-sms-toggle="wp_sms_on_theme_install" type="checkbox" style="float:right;" <?php checked( isset($wp_sms_user_info['wp_sms_on_theme_install']), '1' ); ?>>Send SMS when a theme is installed<br/>
                                    <input class="sms-toggle-<?php echo $user->ID ?>" data-toggle="toggle" wp-sms-toggle="wp_sms_on_theme_update" type="checkbox" style="float:right;" <?php checked( isset($wp_sms_user_info['wp_sms_on_theme_update']), '1' ); ?>>Send SMS when a theme is updated<br/>

                                    <script>
										jQuery(function() {
											jQuery('.sms-toggle-<?php echo $user->ID ?>').change(function() {

												jQuery.ajax({

													type: "POST",
													url: '<?php echo plugin_dir_url( __FILE__ ) ?>toggle-user-options.php',
													data: 'wp_sms_notify_option_enabled=' + jQuery(this).prop('checked') + '&wp_sms_notify_user=' + '<?php echo $user->ID ?>' + '&wp_sms_notify_type=' + jQuery(this).attr('wp-sms-toggle')
												});
									 		})
										})
									</script>
								</div>

							</div>

						</div>
					<?php endforeach; ?>
				</div>

			</div>
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">

					<!-- PRICE ITEM -->
					<div class="panel price panel-green">
						<div class="panel-heading arrow_box text-center">
						<h3>WP SMS Pro</h3>
						</div>
						<div class="panel-body text-center">
							<p class="lead" style="font-size:40px"><strong>$10</strong></p>
							<p class="lead" style="font-size:30px">Personal License</p>
						</div>
						<ul class="list-group list-group-flush text-center">
							<li class="list-group-item"><i class="icon-ok text-success"></i>All addons</li>
							<li class="list-group-item"><i class="icon-ok text-success"></i>Premium support</li>
							<li class="list-group-item"><i class="icon-ok text-success"></i>Automatic updates</li>
						</ul>
						<div class="panel-footer">
							<a class="btn btn-lg btn-block btn-success" href="#">BUY NOW!</a>
						</div>
					</div>
					<!-- /PRICE ITEM -->


				</div>

		</div>







				</div>
	</div>



<!--				<h3>Extensions available for plugins you have installed:</h3>-->
<!---->
<!--				--><?php //$available_extensions = wp_remote_retrieve_body( wp_remote_get( 'http://jeffmatson.net/wp-sms-extensions.php' ) ); ?>
<!--				--><?php //$available_extensions = json_decode( $available_extensions, true ); ?>
<!---->
<!--				--><?php //foreach ( $available_extensions as $key => $value ): ?>
<!---->
<!--					--><?php //if ( is_plugin_active( $value ) ): ?>
<!--						<strong>--><?php //echo esc_html( $key ); ?><!--</strong><br/>-->
<!--					--><?php //endif; ?>
<!---->
<!--				--><?php //endforeach; ?>
<!---->
<!--				<h3>All notification extensions available:</h3>-->
<!---->
<!--				--><?php //foreach ( $available_extensions as $key => $value ): ?>
<!--					<strong>--><?php //echo esc_html( $key ); ?><!--</strong><br/>-->
<!--				--><?php //endforeach; ?>


	<?php
	}
}