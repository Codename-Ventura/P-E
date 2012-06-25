<?php
$host="76.163.252.26"; //Host Name
$username="pedist1_logger";
$password="logmanA69";
$db_name="pedist1_log";


mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$userip = $_SERVER['REMOTE_ADDR'];
$thispage = explode('?',$_SERVER['REQUEST_URI']);
$thispage = $thispage[0];
$page = $_SERVER['HTTP_HOST'].$thispage;
$date = date('m-d-Y');
$time = strftime('%r', time());
$addcount = mysql_query("INSERT INTO page_log (page, ip, time, date) VALUES ('$page', '$userip', '$time', '$date')");

?>