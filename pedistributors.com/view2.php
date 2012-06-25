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




<?php
include('includes/tssdb.php');
if(!empty($_REQUEST['linecode'])){
$linesort = $_REQUEST['linecode'];
$get_partprice = mysql_query("SELECT * FROM pricer3 WHERE line = '$linesort' ORDER BY partnum");
$numofrows = mysql_num_rows($get_partprice);


include('includes/tssdb2.php');
while($views = mysql_fetch_array($get_partprice)){
	$partnum = $views['line'].$views['partnum'];
	$price = $views['price'];
	$price = str_replace(",","",$price);
	$price = str_replace("$","",$price);
	if($linesort == "EIB"){
		$partnum = str_replace("-",".",$partnum);
		}
	$get_x = mysql_fetch_array(mysql_query("SELECT * FROM `xcart_products` WHERE `productcode` = '$partnum'"));
	
	$current_id = $get_x['productid'];
	mysql_query("UPDATE `xcart_products` SET `sorter` = '$views[popularity]' WHERE `productid` = '$current_id'");
	if(!empty($current_id)){
	$haves[] = $current_id."|".$partnum."|".$price;
	if(mysql_query("UPDATE `xcart_pricing` SET `price` = '$price' WHERE `productid` = '$current_id' LIMIT 1")){
				?>
                <div style="float:left; margin:.5em; padding:.5em; border:1px #000000 solid; background:#FFFFCC; width:20%; font-size:9px; text-align:center">
                <?php
                echo $partnum.":::".$price.":::Updated";
				?>
                </div>
                <?php
				
				}
				else { 
				?>
                <div style="float:left; margin:.5em; padding:.5em; border:1px #000000 solid; background:#FF5B5B">
                <?php
                echo $partnum.":::".$price.":::Not Updated";
				?>
				</div>
                <?php
				}
		}
	else{
	$havenots[] = $partnum."|".$price;
		}
	}
}









?>


</body>
</html>