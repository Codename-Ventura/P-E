<?php

//Script to replace non alpha mnumerica characters in titles of products

include('includes/tssdb.php');
$get_man = mysql_query("SELECT * FROM `xcart_products` WHERE `manufacturerid` = '42'");
while($row = mysql_fetch_array($get_man)){
	$string = $row['product'];
	$product = preg_replace('/[^a-zA-Z0-9\s-]/', '', $string);
	$id = $row['productid'];
	$get_other = mysql_fetch_array(mysql_query("SELECT * FROM `xcart_products_lng` WHERE `productid` = '$id'"));
	if($get_other['product'] !== $product){
		echo $get_other['product']."<br>";
		echo $product."<br>";
		echo "Products Differ for ".$id;
		
		
		mysql_query("UPDATE `xcart_products` SET `product` = '$product' WHERE `productid` = '$id'");
		mysql_query("UPDATE `xcart_products_lng` SET `product` = '$product' WHERE `productid` = '$id'");
		echo "<br>**************************************************<br>";
		}	
	
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
