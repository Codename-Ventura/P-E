<?php
$host="localhost"; //Host Name
$username="store";
$password="store";
$db_name="PELOGIN";


mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


?>