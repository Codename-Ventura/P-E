<?php
// include other stuff
include("functions_admin.php");
include("functions_adminplugins.php");
include("functions_adminskins.php");
include("functions_adminusers.php");
include("functions_fetch.php");
include("functions_moderate.php");
include("functions_phrases.php");
include("functions_plugins.php");
include("functions_skins.php");
include("functions_submissions.php");
include("functions_url.php");

// mainstream functions
function dbSecure($code){
	
	if (get_magic_quotes_gpc()) {
	   $code = stripslashes($code);
	}
	
	if (function_exists("mysql_real_escape_string")){
		$code = mysql_real_escape_string($code);
	} elseif (function_exists("mysql_escape_string")){
		$code = mysql_escape_string($code);
	} else {
		$code = addslashes($code);
	}
	
	return $code;
}

function un($code){
	if (get_magic_quotes_gpc()) {
	   $code = stripslashes($code);
	}
	return $code;
}

// allow encoding of messages
function Encode($code){
	$code = nl2br($code);
	return $code;
}

// 404 error function pretty much
function notfound(){
	header("HTTP/1.0 404 Not Found");
	echo("<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">");
	echo("<HTML><HEAD>");
	echo("<TITLE>404 Not Found</TITLE>");
	echo("</HEAD><BODY>");
	echo("<H1>Not Found</H1>");
	echo("The requested URL was not found on this server.<P>");
	echo("</BODY></HTML>");
	die();
}

// crazy crap to start a session
function StartSession(){
	ini_set('url_rewriter.tags', '');
	session_start();
}

// redirect or echo URL if not supported
function redirect($url){
	Header("Location: " . $url);
	echo('<html><head><meta http-equiv="Refresh" content="0;url=' . $url . '">');
	echo('</head><body><a href="' . $url . '">Redirecting...</a></body></html>');
	die();
}

// output and kill caller
function endcaller($output){
	echo($output);
	die();
}
?>