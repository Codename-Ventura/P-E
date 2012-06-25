<?php
include('includes/tssdb.php');
if(!empty($_REQUEST['linecode'])){
$linesort = $_REQUEST['linecode'];
$get_partprice = mysql_query("SELECT * FROM pricer3 WHERE line = '$linesort' ORDER BY partnum");
$numofrows = mysql_num_rows($get_partprice);
}







?>
<html>
<head>



<title>PricEr - Database Application</title>
</head>
<body style="margin:0; padding:0" onLoad="init()">
<img src="images/pricer/viewer.jpg" style="float:left; margin-bottom:2em"><?php include('menu.php'); ?>
<!-- <div style="float:right"><a href="pricer.php"><img src="images/pricer/return.jpg" border="0"></a></div> -->
<div style="clear:both">
<center></center>


<div id="loading" style="width:100%; text-align:center; float:left ">

<form style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px">
Select Specific Line to View<br>
<input type="hidden" name="getprice" value="yes">
<select name="linecode">
<?php
$noprice = "0"; 
$lines = mysql_query("SELECT * FROM lines_added");
while($rows = mysql_fetch_array($lines)){
	$fullname = mysql_fetch_array(mysql_query("SELECT fullname FROM linesheet WHERE line = '$rows[0]'"));
	echo "<option value=\"".$rows[0]."\">".$fullname[0]."</option>";
	}
?>
</select><button type="submit">Go</button><br>
<input type="checkbox" name="price_update" value="true" style="vertical-align:middle"><label for="price_update">Click here to update TSS prices</label>
</form>
<?php 
if(!empty($_REQUEST['getprice'])){
?>
Currently Viewing Line: 
<?php
echo $_REQUEST['linecode']."<br>";
echo $numofrows;?> Total Records Found<br>
<a href="#" onClick="javascript:document.getElementById('hiddendiv').style.display = 'block'" style="font-size:9px; color:#000000; text-decoration:none;">Click to Show Part Numbers</a></div>
<?php } ?>
<div id="hiddendiv" style="display:none">
<table align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; text-align:center">
<tr><td colspan="6" style="text-align:right; font-size:9px; background-color:#000000; color:#FFFFFF"><a href="#" onClick="javascript:getElementById('hiddendiv').style.display='none'" style="color:#FFFFFF; text-decoration:none">X Hide Data</a></td></tr>
<tr style="font-size:9px"><td>Part Number</td><td>Price</td><td>Manufacturer</td><td>Manufacturer ID</td><td>Product ID</td><td>Pricing Exists?</td></tr>
<?php
while($row = mysql_fetch_array($get_partprice)){
		$partnum = $row[0]."-".$row[1];
		$getcode = $row[0];
		echo "<tr><td style=\"border:1 #000000 solid; padding:.25em;\">".$partnum."</td>";
		$price = trim($row[2],"$");
		$price = str_replace(",","",$price);
		echo "<td style=\"border:1 #000000 solid;padding:.25em;\">".$price."</td>";
		$fullname = mysql_fetch_array(mysql_query("SELECT fullname FROM linesheet WHERE line = '$getcode'"));
		echo "<td style=\"border:1 #000000 solid;padding:.25em;\">".$fullname[0]."</td>";
		$manid = mysql_fetch_array(mysql_query("SELECT * FROM `xcart_manufacturers` WHERE `manufacturer` LIKE '%$fullname[0]%'"));
		echo "<td style=\"border:1 #000000 solid;padding:.25em;\">".$manid[0]."</td>";
		$xcart_prodid = mysql_fetch_array(mysql_query("SELECT * FROM xcart_products WHERE productcode = '$row[partnum]' AND manufacturerid = '$manid[0]'"));
		if(!empty($xcart_prodid[0])){
		echo "<td style=\"border:1 #000000 solid;padding:.25em;\">".$xcart_prodid[0]."</td>";

		//These lines update pricing info for the TSS storefront
			
			mysql_query("UPDATE `xcart_pricing` SET `price` = '$price' WHERE `productid` = '$xcart_prodid[0]' LIMIT 1");
		
			mysql_query("UPDATE `xcart_products` SET `list_price` = '$price' WHERE `productid` = '$xcart_prodid[0]' LIMIT 1");
			
		}
		//The Line Below will insert new rows if no entry for that product exists
		//mysql_query("INSERT INTO `xcart_pricing` (`priceid`, `productid`, `quantity`, `price`, `variantid`, `membershipid`) VALUES (NULL, '$xcart_prodid[0]', '1', '$price', '0', '0')"); }
		else { echo "<td style=\"border:1 #000000 solid;padding:.25em; background-color:#FF0000;\">NONE</td>";
		}
	$checkforprice = mysql_num_rows(mysql_query("SELECT * FROM `xcart_pricing` WHERE `productid` = '$xcart_prodid[0]'"));
	if($checkforprice == "1"){
	echo "<td>Yes</td></tr>"; 
	//mysql_query("UPDATE xcart_pricing SET price = '$price' WHERE productid = '$xcart_prodid[0]'");
	
	}
	else {
	$noprice = $noprice + 1;
	echo "<td>No</td></tr>"; 
	
	}

	}

?>
</table>
</div>
<div align="center">
<div style="width:50%; padding:.25em;  margin-left:auto; margin-right:auto; border:1px #000000 solid; margin-top:5em; text-align:left; clear:both"><center><ul><span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px">NOTES</span></ul></center><br>First, get corresponding manufacturer ids to match to line code then get corresponding variable "productid" from the x-cart products table based on manufacturer id and part #.
<br>
Get Product ID based on manufacturer id and product number, then inject data into price database (xcart_pricing)
<br>
Script to take uploaded pricing info and apply it to TSS DB - Going to import directly into TSS DB, 

</div>
</div>
</div>
</body>
</html>
