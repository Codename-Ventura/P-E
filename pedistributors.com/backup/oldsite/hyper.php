<?php
include('includes/tssdb.php');
$get_part = mysql_query("SELECT * FROM `xcart_products` WHERE `manufacturerid` = '0'");
while($row = mysql_fetch_array($get_part)){
	echo $row['productid']."<br>";
}










?>
<html>
<head>



<title>PricEr - Database Application</title>
</head>
<body style="margin:0; padding:0" onLoad="init()">

</body>
</html>
