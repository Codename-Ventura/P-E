<?php
$host="76.163.252.26"; //Host Name
$username="pedist1_logger";
$password="logmanA69";
$db_name="pedist1_credits";


mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

?>