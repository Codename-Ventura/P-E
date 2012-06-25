<?php
	$database="pedist1_sphider";
	$mysql_user = "pedist1_sphider1";
	$mysql_password = "1950caddy"; 
	$mysql_host = "76.163.252.26";
	$mysql_table_prefix = "";



	$success = mysql_pconnect ($mysql_host, $mysql_user, $mysql_password);
	if (!$success)
		die ("<b>Cannot connect to database, check if username, password and host are correct.</b>");
    $success = mysql_select_db ($database);
	if (!$success) {
		print "<b>Cannot choose database, check if database name is correct.";
		die();
	}
?>

