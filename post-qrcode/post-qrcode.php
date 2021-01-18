<?php 
/*
Plugin Name: Post QR Code
Plugin URI: https://word-count.com/
Description: Display Post QR Code
Version: 1.0.1
Author: Mazedur
Author URI: https://mazedur.com/
License: GPLv2 or later
Text Domain: postqrcode
Domain Path: /languages
*/

function postqrcode_load_textdomain(){
	load_plugin_textdomain("post-qrcode",false,dirname(__FILE__)."/languages");
}
add_action("plugins_loaded","postqrcode_load_textdomain");

function pqrc_display_qr_code($content){
	$current_post       = get_the_ID();
	$current_post_url   = urlencode(get_the_permalink());
	$current_post_title = get_the_title($current_post);
	$qrcode_image       = sprintf('https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=%s',$current_post_url);
	$content           .= sprintf("<img src='%s alt='%s/>'",$qrcode_image, $current_post_title);
	return $content;

}
add_filter("the_content","pqrc_display_qr_code");