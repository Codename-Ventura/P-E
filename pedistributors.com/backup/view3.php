<?php
include('includes/tssdb.php');
$get_parts = mysql_query("SELECT * FROM `xcart_products` WHERE `manufacturerid` = '25'");
while($row = mysql_fetch_array($get_parts)){
	$id = $row['productid'];
	$get_price = mysql_query("SELECT * FROM `xcart_pricing` WHERE `productid` = '$id'");
	while($row2 = mysql_fetch_array($get_price)){
		if($row2['price'] == "0.00"){
			$id2 = $row['productcode']."0";
			echo $id." has a zero price - Need to change to ".$id2."<br>";
			mysql_query("UPDATE `xcart_products` SET `productcode` = '$id2' WHERE `productid` = '$id'");
			
			}
		}


}
echo $count;
?>
<html>
<head>



<title>PricEr - Database Application</title>
</head>
<body style="margin:0; padding:0">
<title>PricEr - Database Application</title>
</head>
<body style="margin:0; padding:0" onLoad="init()">
<img src="images/pricer/viewer.jpg" style="float:left; margin-bottom:2em"><?php include('menu.php'); ?>
<div style="float:left; clear:bothl; width:100%; text-align:center; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px">
<form method="get" action="view2.php">

Enter linecode to apply to TSS database:  <input type="text" size="3" name="linecode">
<button type="submit">Go!</button>
</form>
</div>

</body>
</html>
