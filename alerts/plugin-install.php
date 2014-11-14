<?php

function wp_sms_plugin_install( $a, $b, $c ) {

    if ( $b['type'] == 'plugin' && $b['action'] == 'install' ) {

        wp_sms_send_notification( 'Plugin has been installed: ' . $c['destination_name'], 'wp_sms_on_plugin_install');

    }

}
add_action( 'upgrader_post_install', 'wp_sms_plugin_install', 10, 3 );