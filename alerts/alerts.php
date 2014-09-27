<?php

$directory = plugin_dir_path( __FILE__ );

if ( get_option( 'wp_sms_on_post_publish', false ) == 'checked' ) {
  require_once $directory . 'post-publish.php';
  add_action( 'transition_post_status', 'detect_published_post', 10, 3 );
}

if ( get_option( 'wp_sms_on_user_login', false ) == 'checked' ) {
  require_once $directory . 'user-login.php';
  add_action('wp_login', 'detect_user_login', 10, 2);
}

if ( get_option( 'wp_sms_on_plugin_update', false ) == 'checked' ) {
  require_once $directory . 'plugin-update.php';
  add_action( 'upgrader_post_install', 'wp_sms_plugin_updated', 10, 3 );
}

if ( get_option( 'wp_sms_on_plugin_install', false ) == 'checked' ) {
  require_once $directory . 'plugin-install.php';
  add_action( 'upgrader_post_install', 'wp_sms_plugin_install', 10, 3 );
}

if ( get_option( 'wp_sms_on_post_update', false ) == 'checked' ) {
  require_once $directory . 'post-update.php';
  add_action( 'post_updated', 'wp_sms_post_update', 10, 3 );
}

if ( get_option( 'wp_sms_on_theme_install', false ) == 'checked' ) {
  require_once $directory . 'theme-install.php';
  add_action( 'upgrader_post_install', 'wp_sms_theme_install', 10, 3 );
}

if ( get_option( 'wp_sms_on_theme_update', false ) == 'checked' ) {
  require_once $directory . 'theme-update.php';
  add_action( 'upgrader_post_install', 'wp_sms_theme_update', 10, 3 );
}
