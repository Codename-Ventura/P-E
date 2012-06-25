<html>
<head>
<title>PricEr - Pricing Retrieval Application</title>
</head>
<body style="margin:0; padding:0">

<?php include('includes/tssdb.php'); 
$get = mysql_query("SELECT * FROM `xcart_products`");
while($row = mysql_fetch_array($get, MYSQL_ASSOC)){
	echo $row['productid'].":::::".$row['weight']."<br>
";
	}


?>
</body>
</html>
