<?php
function wp_sms_theme_install( $a, $b, $c ) {

    if ( $b['type'] == 'theme' && $b['action'] == 'install' ) {

        wp_sms_send_notification( "Theme has been installed: {$c['destination_name']}" );
    }

}
add_action( 'upgrader_post_install', 'wp_sms_theme_install', 10, 3 );