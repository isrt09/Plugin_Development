<?php 
  /****** WordPress v4.9.1  ******/
 /****** Twenty Seventeen  ******/
/******  wordcount plugin ******/

function wordcount_heading($heading){
	$heading = "Total Words";
	return $heading;
}
add_filter("wordcount_heading","wordcount_heading");

function wordcount_tag($tag){
	$tag = "h4";
	return $tag;
}
add_filter("wordcount_tag","wordcount_tag");

function wordcount_readingtime_tag($tag){
	return 'h4';
}
add_filter("wordcount_readingtime_tag","wordcount_readingtime_tag");