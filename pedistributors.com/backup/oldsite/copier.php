<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

include('includes/tssdb.php');
$test = mysql_query("SELECT * FROM pricer");

while($row = mysql_fetch_array($test)){
	$parts = explode("-",$row[0]);
	$line = $parts[0];
	unset($parts[0]);
	$partnum = implode("-",$parts);
	$price = $row['price'];
	mysql_query("INSERT INTO `pricer3` VALUES ('$line', '$partnum', '$price')");
	
	
	}
?>
</body>
</html>
