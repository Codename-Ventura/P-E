<html>
<head>
<title>PricEr - Pricing Retrieval Application</title>
</head>
<body style="margin:0; padding:0">
<img src="images/pricer/import.jpg" style="float:left; margin-bottom:2em"><?php include('menu.php'); ?>
<div style="clear:both">

<?php
include('includes/tssdb.php');
function checkit($line, $sku){
	$check = mysql_query("SELECT * FROM `pricer3` WHERE `line` = '$line' AND `partnum` = '$sku'");
	$check = mysql_num_rows($check);
	if($check > 0){
		return TRUE;
		}
	else{
		return FALSE;
		}
	}
/*  
-----------------------------------------
File uploader for Data/Price entry
Code written by Jonathan James
For P&E Distributors
-----------------------------------------

Summary:

Draft 1:  **ABANDONED**
After formatting using Excel macro, CSV will be uploaded to this script and matched to SQL database.
Script will search for part number/line code in master database list and UPDATE the price field accordingly



Draft 2:  **SUCCESSFUL TEST OF AT LEAST 6500**
Enter the URL, and the total page count, script runs thru data, pulling all pages and combines it into one string.
Script then strips out only the data that is needed.  Then formats into a table and echo all values.

Click checkbox to add or update pricing

Further Updates:

Files: pricer2.php, getpages.php, pricergl.php => Files to automatically retrieve links and pages

Actions:
---------------------------------------

if (!file_exists('temp/pricing.csv')){
	echo "File not found";
	}
	else{
		echo "File found";
		echo "<br>";
				}
$test = file_get_contents('temp/pricing.csv');
echo "<pre>";
print_r($test);
echo "</pre>";


if (isset($_POST['pricefile'])){
	echo "File Uploaded";
	$target = "temp/testing";
	$target = $target . basename($_FILES['pricefile']['name']); 
	$_FILES['pricefile']['tmp_name'];
	}

*/

// DB CONNECTOR







?>

</div>
<div style="width:100%; margin-left:auto; margin-right:auto; text-align:center">

<form method="post" enctype="multipart/form-data">
<input type="file" name="pricefile"><br>
<button type="submit">Import</button>

</form>
</div>

<?php
$updates = "1"; 
$count = "1";
$pricelist = array();

	if(isset($_FILES['pricefile'])){
	$file = $_FILES['pricefile']['tmp_name'];
	$file = file_get_contents($file);
	}

$file = explode("\n",$file);

foreach($file as $key=>$value){
	$pricelist[$key] = explode(",",$value);
	}

foreach($pricelist as $key=>$value){
	$line = $pricelist[$key]['0'];
	$sku = $pricelist[$key]['1'];
	$price = $pricelist[$key]['2'];
	if(!empty($line) && !empty($sku)){
		if(checkit($line, $sku)){
			echo "Part ".$line."-".$sku." Found<br>";
			$found++;
			mysql_query("UPDATE `pricer3` SET `price` = '$price' WHERE  `line` = '$line' AND `partnum` = '$sku'");
			}
		else{
			echo "Part ".$line."-".$sku." Not Found<br>";
			$unfound++;
			mysql_query("INSERT INTO `pricer3` (`line`,`partnum`,`price`) VALUES ('$line','$sku','$price')");
/*JJ original query:
mysql_query("INSERT INTO `pricer3` VALUES ('$line','$sku','$price')");
correction by Matthew Jackman 4/8/11:
mysql_query("INSERT INTO `pricer3` (`line`,`partnum`,`price`) VALUES ('$line','$sku','$price')");
*/
			}
		}
	/*
	$checkpricer = mysql_num_rows(mysql_query("SELECT * FROM `pricer3` WHERE `line` = '$id' AND `partnum` = '$sku'"));
	if($checkpricer == "0" && !empty($sku)){
		if(mysql_query("INSERT INTO `pricer3` VALUES ('$id','$sku','$price')"));{
		
		echo "<center>Pricing not found for ".$id."-".$sku.":::DATA INSERTED<center><br>";
		$updates = $updates + 1;
		}
		}*/
	/*$id = $value[0];
	$price = $value[2];
	if(!empty($id)){
		if(checkprice($id)){
			mysql_query("UPDATE `xcart_pricing` SET `price` = '$price' WHERE `productid` = '$id'");
			echo "Price Updated<BR>";
			}
		else{ echo "NOT FOUND<br>";}
		} */
	}	



/*echo "<pre>";
print_r(get_defined_vars());
echo "</pre>";
*/?>
<div style="width:50%; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; background-color:#CCCCCC; border:1px #000000 solid; margin-left:auto; margin-right:auto;">
<?php
echo $found." parts already priced<br>";
echo $unfound." parts added<br>";
?>
</div>
<?php
exit();
?>




</body>
</html>
