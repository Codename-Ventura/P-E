<?php
$host="localhost"; //Host Name
$username="pricer";
$password="pricer";
$db_name="pedist1_xcart2";


mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

?>