<?php
// functions for URL encoding
function d1($code){
	$code = str_replace("_", " ", $code);
	return $code;
}

function d2($code){
	global $config;
	
	if (strpos($config["topicpage"], "?")){
		$code = str_replace("&", "%26", $code);
	} else {
		$code = str_replace("&", "%2526", $code);
	}
	
	if (strpos($config["topicpage"], "?")){
		$code = str_replace("/", "%2f", $code);
	}
	
	$code = str_replace(" ", "_", $code);
	
	
	return $code;
}

function d3($code){
	global $config;
	
	if (!(strpos($config["topicpage"], "?"))){
		$code = urldecode($code);
	}
	
	return $code;
}
?>