<?php

/**
 * Plugin Name: Zesty Custom Post Types for Paid Memberships Pro
 * Description: An add-on for Paid Memebrships Pro that allows for the restriction of custom post type content.
 * Version: 1.0.0
 * Author: Bijingus
 * Author URI: https://zestyplugins.com
 * Text Domain: zesty-pmpro-cpt
 * Domain Path: /lang
 */

defined('ABSPATH') or die("No script kiddies please!");
define("ZPMPRO_PLUGIN_URL", plugin_dir_url( __FILE__ ));

include 'admin/config.php';
include 'admin/admin-side-menu.php';
include 'init/enqueue.php';
include 'ajax/options-ajax.php';

// Add links below plugin on plugins page
function zpmpro_action_links( $links ) {
    $links = array_merge( array(
        '<a href="' . esc_url( admin_url( '/admin.php?page=zpmpro_options' ) ) . '">' . __( 'Options', 'zesty-pmpro-cpt' ) . '</a>',
        '<a href="' . esc_url( admin_url( '/admin.php?page=zpmpro_help' ) ) . '">' . __( 'Help', 'zesty-pmpro-cpt' ) . '</a>',
        '<a href="' . esc_url( admin_url( '/admin.php?page=zpmpro_plugins' ) ) . '">' . __( 'More by Zesty Plugins', 'zesty-pmpro-cpt' ) . '</a>',
    ), $links );
    return $links;
}
add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'zpmpro_action_links' );

function zpmpro_ajax_icon(){ ?>

  <div class="zpmpro-ajax-save-option-icon" style="display: none;">
    <div class="zpmpro-ajax-save-option-icon-inner">
      <div class="zpmpro-saving-text"><i class="fa fa-spinner fa-spin"></i> <?php _e('Saving', 'zesty_emails'); ?>...</div>
      <div class="zpmpro-saved-text" style="display: none;"><i class="fa fa-thumbs-up"></i> <?php _e('Saved!', 'zesty_emails'); ?></div>
    </div>
  </div>

<?php } 

add_action('admin_footer', 'zpmpro_ajax_icon');

// Add PMPro restriction meta box to custom post types

function zpmpro_pmpro_meta_wrapper(){
  $cpts = get_option('zpmpro_cp_types');
  $pmpro_active = is_plugin_active( 'paid-memberships-pro/paid-memberships-pro.php' );
  if(!empty($cpts) && $pmpro_active === true) {
    foreach($cpts as $cpt) {
      add_meta_box('pmpro_page_meta', 'Require Membership', 'pmpro_page_meta', $cpt, 'side', 'high');
    }
  }
}

function zpmpro_pmprocpt_init() {
  if( is_admin() ) {
    add_action('admin_menu', 'zpmpro_pmpro_meta_wrapper');
  }
}

add_action("init", "zpmpro_pmprocpt_init", 20);

?>