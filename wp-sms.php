<?php
/**
 * Plugin Name: WP SMS Notifications
 * Plugin URI: http://jeffmatson.net/wp-sms
 * Description: Send SMS notifications when things are updated.
 * Version: 1.0
 * Author: Jeff Matson
 * Author URI: http://jeffmatson.net
 * License: GPL2
 */
$directory = plugin_dir_path( __FILE__ );
require_once $directory . '/functions.php';
require_once $directory . '/wp-sms-options.php';
require_once $directory . '/carrier-list.php';
