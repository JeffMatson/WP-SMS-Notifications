<?php

$directory = plugin_dir_path( __FILE__ );

if ( get_option( 'wp_sms_on_post_publish', false ) == '1' ) {
  require_once $directory . '/alerts/post-publish.php';
  add_action( 'transition_post_status', 'detect_published_post', 10, 3 );
}

if ( get_option( 'wp_sms_on_user_login' ) == '1' ) {
  require_once $directory . '/alerts/user-login.php';
  add_action('wp_login', 'detect_user_login', 10, 2);
}

if ( get_option( 'wp_sms_on_plugin_update', false ) == '1' ) {
  require_once $directory . '/alerts/plugin-update.php';
  add_action( 'upgrader_post_install', 'wp_sms_plugin_updated', 10, 3 );
}

if ( get_option( 'wp_sms_on_plugin_install', false ) == '1' ) {
  require_once $directory . '/alerts/plugin-install.php';
  add_action( 'upgrader_post_install', 'wp_sms_plugin_install', 10, 3 );
}

if ( get_option( 'wp_sms_on_post_update', false ) == '1' ) {
  require_once $directory . '/alerts/post-update.php';
  add_action( 'post_updated', 'wp_sms_post_update', 10, 3 );
}

if ( get_option( 'wp_sms_on_theme_install', false ) == '1' ) {
  require_once $directory . '/alerts/theme-install.php';
  add_action( 'upgrader_post_install', 'wp_sms_theme_install', 10, 3 );
}

if ( get_option( 'wp_sms_on_theme_update', false ) == '1' ) {
  require_once $directory . '/alerts/theme-update.php';
  add_action( 'upgrader_post_install', 'wp_sms_theme_update', 10, 3 );
}
