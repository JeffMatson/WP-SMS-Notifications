<?php
function wp_sms_plugin_updated( $a, $b, $c ) {

  if ( $b['type'] == 'plugin' && $b['action'] == 'update' ) {

    wp_sms_send_notification( 'Plugin has been updated' . $c['destination_name'] . '', 'wp_sms_on_plugin_update');

  }

}
add_action( 'upgrader_post_install', 'wp_sms_plugin_updated', 10, 3 );