<html>
<head>
<title>PricEr - Pricing Retrieval Application</title>
</head>
<body style="margin:0; padding:0">
<img src="images/pricer/import.jpg" style="float:left; margin-bottom:2em"><?php include('menu.php'); ?>
<div style="clear:both">


</div>
<div style="width:100%; margin-left:auto; margin-right:auto; text-align:center">

<form method="post" enctype="multipart/form-data">
<input type="file" name="pricefile"><br>
<button type="submit">Import</button>

</form>
</div>

<?php
include('includes/tssdb.php');
$count = "0";

	if(isset($_FILES['pricefile'])){
	$file = $_FILES['pricefile']['tmp_name'];
	$file = file_get_contents($file);
	}

$file = explode("\n",$file);

foreach($file as $key=>$value){
	if(!empty($value)){
	//$deleteprod = mysql_query("DELETE FROM `xcart_pricing` WHERE `productid` = '$value'");
	mysql_query("DELETE FROM `xcart_pricing` WHERE `productid` = '$value'");
	mysql_query("DELETE FROM `xcart_products` WHERE `productid` = '$value'");
	$count = $count + 1;
	}
	}
	echo $count;
exit();
?>




</body>
</html>
