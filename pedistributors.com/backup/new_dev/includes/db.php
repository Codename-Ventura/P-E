<?php
$host="localhost"; //Host Name
$uname="store";
$pword="store";
$db_name="PELOGIN";


mysql_connect("$host", "$uname", "$pword")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


?>