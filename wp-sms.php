<?php
/**
 * Plugin Name: WP SMS Notifications
 * Plugin URI: http://jeffmatson.net/wp-sms
 * Description: Send SMS notifications when things are updated.
 * Version: 2.2
 * Author: Jeff Matson
 * Author URI: http://jeffmatson.net
 * License: GPL2
 */

global $wp_sms_file_location;

$wp_sms_file_location = plugin_basename( __FILE__ );
$directory            = plugin_dir_path( __FILE__ );

require_once $directory . '/functions.php';
require_once $directory . '/wp-sms-options.php';
require_once $directory . '/carrier-list.php';
require_once $directory . '/wp-sms-user-settings.php';
require_once $directory . '/alerts/alerts.php';