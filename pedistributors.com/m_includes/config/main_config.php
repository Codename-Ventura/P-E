<?php

ini_set('display_errors', 0);

function checkAdminkey($key){
	if($key == "1950admin"){
		return true;
	}else{
		return false;
	}
}

$_SESSION['configuration'] = array();
$_SESSION['configuration']['layouts']['dir_location'] = "m_includes/layouts/content/";
$_SESSION['configuration']['modules']['dir_location'] = "m_includes/layouts/modules/";

define(INCOMING_QUEUE, "/mnt/web_in");
define(OUTGOING_QUEUE, "/mnt/web_out");

if($_SERVER['REMOTE_ADDR'] == "192.168.1.150" && isset($_GET['adminkey'])){
	$adminkey = $_GET['adminkey'];
	if(checkAdminkey($adminkey)){
		define(ADMIN, "true");
		}
}

?>