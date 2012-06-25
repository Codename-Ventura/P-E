<html>
<head>
<title>PricEr - Pricing Retrieval Application</title>
</head>
<body style="margin:0; padding:0" onLoad="javascript:document.getElementById('loading').style.display = 'none';">
<?php
include('includes/tssdb.php');
$getman = mysql_query("SELECT * FROM `xcart_products` WHERE `manufacturerid` = '40'");
/*while($row = mysql_fetch_assoc($getman)){

		$id = $row['productid'];
		mysql_query("DELETE FROM `xcart_products` WHERE `productid` = '$id'");
		mysql_query("DELETE FROM `xcart_pricing` WHERE `productid` = '$id'");
		$count++;
		
	}
*/
echo "Number of deletions: $count";
?>
</div>
</body>
</html>
