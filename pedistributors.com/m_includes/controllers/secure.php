<?php
//Hardcode a qualifier
if($_SERVER['REMOTE_ADDR'] == "192.168.1.27" || isset($_SESSION['loggedin'])){
	//Authorize User
	$authorize = "true";
	}
	else{
	
	$funcs->pageResponse("unauth");
	$_SESSION['returnu'] = $main;
	header('Location: index.php?p=login');
	exit();
}


?>