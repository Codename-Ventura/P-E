<?php
include('includes/vagoo.php');


function page_count(){
$userip = $_SERVER['REMOTE_ADDR'];
$page = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$date = date('m-d-Y');
$time = strftime('%r', time());
$addcount = mysql_query("INSERT INTO page_log (page, ip, time, date) VALUES ('$page', '$userip', '$time', '$date')");
}


?>