<?php
include('includes/tssdb.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table>
<?php
	$query = mysql_query("SELECT * FROM `pricer3` WHERE `line` = 'ENE'");
	while($row = mysql_fetch_array($query)){
		$partnum = explode("-",$row['partnum']);
		$partnum = implode(".",$partnum);
		echo "<tr><td>".$row['line']."</td><td>".$partnum."</td><td>".$row['price']."</td></tr>";
	}
?>
</table>
</body>
</html>
