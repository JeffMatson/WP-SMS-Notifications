<?php
function wp_sms_post_update( $post_ID, $post_after, $post_before ) {
if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
  return;
} else {
    wp_sms_send_notification( 'A post has been updated: ' . $post_after[post_title] . '', 'wp_sms_on_post_update');
    print_r($post_after);
  }
}
add_action( 'transition_post_status', 'wp_sms_post_update', 10, 3 );