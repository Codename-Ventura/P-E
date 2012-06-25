<?php


include('includes/linedb.php');
$lines = mysql_query("SELECT * FROM `linecard` ORDER BY `name`");
$all_lines = array();
while($row = mysql_fetch_array($lines)){
	$all_lines[$row['id']] = $row;
	$all_lines[$row['id']]['type'] = explode("|",$row['type']);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table><tr>
<td>Line Code</td><td>Brand Name</td><td>Description</td><td>Website</td><td>Parts Lookup</td><td>Categories</td>
</tr>
<?php
foreach(a

?>
</body>
</html>
