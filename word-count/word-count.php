<?php 
/*
Plugin Name: Word Count
Plugin URI: https://word-count.com/
Description: Word Counts for content writing marketing per articles in requested budgets counts
Version: 1.0.1
Author: Mazedur
Author URI: https://mazedur.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: word-count
*/

/* The initial stage to get these functions
function wordcount_activation_hook(){
   // code here ....
}

function wordcount_deactivation_hook(){
	// code here ....
}
registration_activation_hook(__FILE__,"wordcount_activation_hook");
registration_deactivation_hook(__FILE__,"wordcount_deactivation_hook");
*/

// Load Text Domain in your plugin
function wordcount_load_textdomain(){
	load_plugin_textdomain("word-count",false,dirname(__FILE__)."/languages");
}

add_action("plugins_loaded","wordcount_load_textdomain");

// Word Count Number Logic Function 
function wordcount_number($content){
	$var   = strip_tags($content);
	$count = str_word_count($var);
	$label = __("Total Number of Words : ", "word-count");
	$content .=sprintf("<h2>%s: %s</h2>",$label,$count);
	return $content;
}
add_filter("the_content","wordcount_number");

		/* updated by 18.01.2021 */

function wordcount_readingtime($content){
	$var      = strip_tags($content);
	$count 	  = str_word_count($var);	
	$minutes  = floor($count/200);
	$seconds  = floor($count % 200/(200/60));
	$visible  = apply_filters("wordcount_display_readingtime",1);
	if($visible){
		$label = __("Total Reading Time","word-count");
		$label = apply_filters("wordcount_readingtime_heading",$label);
		$tag   = apply_filters("wordcount_readingtime_tag",'h4');
		$content .=sprintf("<%s>%s %s minutes %s seconds</%s>",$tag,$label,$minutes, $seconds, $tag);
	}
	return $content;
}
add_filter("the_content","wordcount_readingtime");