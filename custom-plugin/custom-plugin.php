<?php 
/*
Plugin Name: Custom Plugin
Plugin URI: https://word-count.com/
Description: Built a custom plugin in wordpress
Version: 1.0.1
Author: Mazedur
Author URI: https://mazedur.com/
License: GPLv2 or later
Text Domain: custom-plugin
Domain Path: /languages
*/

define("PLUGIN_DIR_PATH",plugin_dir_path(__FILE__));
define("PLUGINS_URL",plugins_url());

function my_custom_menu_page() {
    add_menu_page( 'customplugin','Custom Plugin','manage_options','custom-plugin', 'custom_plugin_func','dashicons-share-alt', 9);
    add_submenu_page('custom-plugin','Add New','Add New','manage_options','custom-plugin','custom_plugin_func');
    add_submenu_page('custom-plugin','All Pages','All Pages','manage_options','all-page','custom_plugin_func1');
}
add_action( 'admin_menu', 'my_custom_menu_page' );

function custom_plugin_func(){
	include_once PLUGIN_DIR_PATH.'/views/add-new.php';
}

function custom_plugin_func1(){
	include_once PLUGIN_DIR_PATH.'/views/all-pages.php';
}
function custom_plugin_assets(){
	wp_enqueue_style('custom-plugin-css',PLUGINS_URL."/custom-plugin/assets/css/style.css",null,'1.0');
	wp_enqueue_script('custom-plugin-js',PLUGINS_URL."/custom-plugin/assets/js/script.js",null,'1.0',false);	
}
add_action('wp_enqueue_scripts','custom_plugin_assets');


