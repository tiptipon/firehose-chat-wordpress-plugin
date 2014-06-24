<?php
/*
Plugin Name: Firehose Chat Plugin
Plugin URI: http://wordpress.org/extend/plugins/googleanalytics/
Description: Enables FirehoseChat on all pages.
Version: 1.0.0
Author: Mysterious Trousers
Author URI: http://firehosechat.com
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');


function activate_firehose_chat() {
  add_option('firehose_product_id', 'UA-0000000-0');
}

function deactive_firehose_chat() {
  delete_option('firehose_product_id');
}

function admin_init_firehose_chat() {
  register_setting('firehose_chat', 'firehose_product_id');
}

function admin_menu_firehose_chat() {
  add_options_page('Firehose Chat', 'Firehose Chat', 'manage_options', 'firehose_chat', 'options_page_firehose_chat');
}

function options_page_firehose_chat() {
  include(WP_PLUGIN_DIR.'/firehose-chat-plugin/options.php');
}

function firehose_chat() {
  $firehose_product_id = get_option('firehose_product_id');
?>
<script type="text/javascript">
  var FHChat = {product_id: "<?php echo $firehose_product_id ?>"}
  FHChat.customAttributes=[];FHChat.sendCustomAttributes=function(data){this.customAttributes.push(data)};!function(){var a,b;return b=document.createElement("script"),a=document.getElementsByTagName("script")[0],b.src="https://chat-client-js.firehoseapp.com/chat-min.js",b.async=!0,a.parentNode.insertBefore(b,a)}();
</script>

<?php
}

register_activation_hook(__FILE__, 'activate_firehose_chat');
register_deactivation_hook(__FILE__, 'deactive_firehose_chat');

if (is_admin()) {
  add_action('admin_init', 'admin_init_firehose_chat');
  add_action('admin_menu', 'admin_menu_firehose_chat');
}

if (!is_admin()) {
  add_action('wp_head', 'firehose_chat');
}

?>
