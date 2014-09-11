<?php
function detect_published_post (
  $wp_sms_new_status = NULL,
  $wp_sms_old_status = NULL,
  $wp_sms_post_ID = NULL ) {
    if ( 'publish' == $wp_sms_new_status && 'publish' != $wp_sms_old_status ) {
      wp_sms_send_notification( 'This new post has been published: ' . $wp_sms_post_ID->post_title );
    }
  }
