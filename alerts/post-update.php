<?php
function wp_sms_post_update( $post_ID, $post_after, $post_before ) {
if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
  return;
} else {
    wp_sms_send_notification( "A post has been updated: {$post_after->post_title}");
  }
}
