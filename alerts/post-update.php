<?php
if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
  return;
} else {
    wp_sms_send_notification( "A post has been updated: {$post_after->post_title}");
  }
}
