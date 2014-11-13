<?php
$directory = plugin_dir_path( __FILE__ );
require_once $directory . 'carrier-list.php';
add_action( 'admin_menu', 'wp_sms_menu' );
/**
* wp_sms_menu function.
*
* @access public
* @return void
*/
function wp_sms_menu() {
  add_submenu_page(
    'tools.php',
      __( 'WP SMS Notfications', 'wp-sms-notifications' ),
      __( 'WP SMS Notifications', 'wp-sms-notifications' ),
      'manage_options',
      'wp-sms-notifications',
      'wp_sms_notifications_menu',
      99
    );
  add_action( 'admin_init', 'update_wp_sms_settings' );
  }
/**
* update_wp_sms_settings function.
*
* @access public
* @return void
*/
function update_wp_sms_settings() {
  register_setting( 'wp_sms_settings', 'wp_sms_on_post_publish' );
  register_setting( 'wp_sms_settings', 'wp_sms_phone_number' );
  register_setting( 'wp_sms_settings', 'wp_sms_carrier' );
  register_setting( 'wp_sms_settings', 'wp_sms_on_user_login' );
  register_setting( 'wp_sms_settings', 'wp_sms_on_plugin_update' );
  register_setting( 'wp_sms_settings', 'wp_sms_on_plugin_install' );
  register_setting( 'wp_sms_settings', 'wp_sms_on_post_update' );
  register_setting( 'wp_sms_settings', 'wp_sms_on_theme_update' );
  register_setting( 'wp_sms_settings', 'wp_sms_on_theme_install' );
  do_action('wp_sms_register');
}

function add_action_link( $links, $file ) {
 $settings_link = '<a href="tools.php?page=wp-sms-notifications">Settings</a>';
  array_unshift( $links, $settings_link );
return $links;
} 
add_filter( 'plugin_action_links_' . $wp_sms_file_location, 'add_action_link', 10, 2 );


/**
* wp_sms_notifications_menu function.
*
* @access public
* @return void
*/
function wp_sms_notifications_menu() {
?>
  <div class="wrap">
    <h1><?php _e('WP SMS Notifications configuration'); ?></h1>
    <?php
    if( isset( $_GET[ 'tab' ] ) ) {
      $active_tab = $_GET[ 'tab' ];
    }
    else {
      $active_tab = 'general';
    }
    ?>
    <h2 class="nav-tab-wrapper">
      <a href="?page=wp-sms-notifications&tab=general" <?php echo $active_tab == 'general' ? 'nav-tab-active' : ''; ?> class="nav-tab">General</a>
      <a href="?page=wp-sms-notifications&tab=pro" <?php echo $active_tab == 'general' ? 'nav-tab-active' : ''; ?> class="nav-tab">Pro</a>
      <?php do_action('wp_sms_add_tab'); ?>
    </h2>
    <form method="post" action="options.php">
      <?php
      if (empty($active_tab)) {
        $active_tab == 'general';
      }
      if( $active_tab == 'general' ) {
        ?>
        <?php settings_fields( 'wp_sms_settings' ); ?>
        <?php do_settings_sections( 'wp_sms_settings' ); ?>
        <?php if (did_action( 'wp_sms_add_tab' ) < 1) {
        echo '<h3>Want more features?</h3>';
        echo '<p><a href="https://jeffmatson.net/wp-sms/">Upgrade to WP SMS Notifications Pro</a> today!</p>';
      } ?>
        <table class="form-table">
          <tr valign="top">
            <th scope="row"><?php _e('Phone number') ?>:</th>
            <td><input type="text" name="wp_sms_phone_number" value="<?php echo get_option('wp_sms_phone_number'); ?>"/></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Cell carrier'); ?>:</th>
            <?php $wp_sms_options_carrier = get_option('wp_sms_carrier'); ?>
            <td>
              <select name="wp_sms_carrier">
                <?php
                global $wp_sms_carrier_list;
                foreach ($wp_sms_carrier_list as $carrier_name => $carrier_address) {
                  $carrier_select_option = '<option value="';
                  $carrier_select_option .= $carrier_name;
                  $carrier_select_option .= '"';
                  if ( $wp_sms_options_carrier == $carrier_name) {
                    $carrier_select_option .= ' selected';
                  }
                  $carrier_select_option .= '>' . $carrier_name . '</option>';
                  echo $carrier_select_option;
                }
                ?>
              </select>
            </td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Send SMS when a post is published'); ?>:</th>
            <td><input type="checkbox" name="wp_sms_on_post_publish" value="1" <?php if (get_option('wp_sms_on_post_publish') == '1') { echo 'checked'; }?>/></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Send SMS when a post is updated'); ?>:</th>
            <td><input type="checkbox" name="wp_sms_on_post_update" value="1" <?php if (get_option('wp_sms_on_post_update') == '1') { echo 'checked'; }?>/></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Send SMS when user logs in') ?>:</th>
            <td><input type="checkbox" name="wp_sms_on_user_login" value="1" <?php if (get_option('wp_sms_on_user_login') == '1') { echo 'checked'; }?>/></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Send SMS when a plugin is installed'); ?>:</th>
            <td><input type="checkbox" name="wp_sms_on_plugin_install" value="1" <?php if (get_option('wp_sms_on_plugin_install') == '1') { echo 'checked'; }?>/></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Send SMS a plugin is updated'); ?>:</th>
            <td><input type="checkbox" name="wp_sms_on_plugin_update" value="1" <?php if (get_option('wp_sms_on_plugin_update') == '1') { echo 'checked'; }?>/></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Send SMS a theme is installed'); ?>:</th>
            <td><input type="checkbox" name="wp_sms_on_theme_install" value="1" <?php if (get_option('wp_sms_on_theme_install') == '1') { echo 'checked'; }?>/></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Send SMS a theme is updated'); ?>:</th>
            <td><input type="checkbox" name="wp_sms_on_theme_update" value="1" <?php if (get_option('wp_sms_on_theme_update') == '1') { echo 'checked'; }?>/></td>
          </tr>
          <?php  ?>
        </table>
      <?php
      submit_button();
      }
      if( $active_tab == 'pro' ) {
        echo '<h2>Want more notification options?  GO PRO!</h2>'; ?>
      <table style="border-collapse:collapse;border-spacing:0;">
  <tr>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><h3><center>Personal License</h3></th>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><h3><center>Developer License</h3></th>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><h3><center>Agency License</h3></th>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>$10</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>$25</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>$50</center></td>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>1 Site</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>25 Sites</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>Unlimited Sites</center></td>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>1 Year Premium Support</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>1 Year Premium Support</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>1 Year Premium Support</center></td>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>Automatic Updates</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>Automatic Updates</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>Automatic Updates</center></td>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>All Extensions</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>All Extensions</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>All Extensions</center></td>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center><a href="https://jeffmatson.net/downloads/wp-sms-notifications-pro/">Upgrade Now!</a></center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center><a href="https://jeffmatson.net/downloads/wp-sms-notifications-pro/">Upgrade Now!</a></center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center><a href="https://jeffmatson.net/downloads/wp-sms-notifications-pro/">Upgrade Now!</a></center></td>
  </tr>
</table>
<?php
        echo '<h3>Notifications for plugins you have installed:</h3>';
        $available_extensions = wp_remote_retrieve_body( wp_remote_get('http://jeffmatson.net/wp-sms-extensions.php') );
        $available_extensions = json_decode($available_extensions, true);
        foreach ($available_extensions as $key => $value) {
          if (is_plugin_active($value)) {
          echo '<strong>' . $key . '</strong><br/>';
          }
        }
        echo '<h3>All notification extensions available:</h3>';
        foreach ($available_extensions as $key => $value) {
          echo '<strong>' . $key . '</strong><br/>';
        }
      }
      elseif (did_action( 'wp_sms_add_tab' ) >= 1) {
        do_action('wp_sms_extensions_menu');
      }
?>
      </form>
    </div>
    <?php

}
