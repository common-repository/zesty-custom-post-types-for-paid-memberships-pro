<?php

add_action('admin_menu', 'zpmpro_create_menu');
function zpmpro_create_menu() {
	add_menu_page(ZPMPRO_PLUGIN_NAME, ZPMPRO_PLUGIN_NAME, 'administrator', 'zpmpro_options', 'zpmpro_options_page', ZPMPRO_MENU_LOGO_URL);
}

function zpmpro_register_submenu(){
	add_submenu_page( 'zpmpro_options', 'Options', 'Options', 'manage_options', 'zpmpro_options', 'zpmpro_options_page' );
	add_submenu_page( 'zpmpro_options', 'Help', 'Help', 'manage_options', 'zpmpro_help', 'zpmpro_help_page' );
	add_submenu_page( 'zpmpro_options', 'More Plugins', 'More Plugins', 'manage_options', 'zpmpro_plugins', 'zpmpro_plugins_page' );
}

add_action('admin_menu', 'zpmpro_register_submenu');

function zpmpro_options_page(){
    include 'options-page.php';
}

function zpmpro_help_page(){
    include 'help-page.php';
} 

function zpmpro_plugins_page(){
    include 'plugins-page.php';
}

?>