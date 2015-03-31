<?php

require_once( '../../../wp-load.php');

if ( $_POST['wp_sms_notify_option_enabled'] == 'true' ) {

        $wp_sms_notify_user = $_POST['wp_sms_notify_user'];

        $wp_sms_notify_type = $_POST['wp_sms_notify_type'];

    update_user_meta( $wp_sms_notify_user, $wp_sms_notify_type, '1' );
} elseif ($_POST['wp_sms_notify_option_enabled'] == 'false' ) {
    $wp_sms_notify_type = $_POST['wp_sms_notify_type'];
    $wp_sms_notify_user = $_POST['wp_sms_notify_user'];
    delete_user_meta( $wp_sms_notify_user, $wp_sms_notify_type );
}