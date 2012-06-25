<?php include('includes/tssdb.php');  

if(isset($_POST['man_cats'])){
	$allcats = array();
	for ($i=0; $i<count($_POST['cats']);$i++) {
		$allcats[$i] = $_POST['cats'][$i];
} 

foreach($allcats as $k=>$v){
	mysql_query("UPDATE `xcart_categories` SET `meta_description` = 'manufacturer_category' WHERE `categoryid` = '$v'");
	//echo "UPDATE `xcart_categories` SET `meta_description` = 'manufacturer_category' WHERE `categoryid` = '$v'";
	
	}
}

$get_cats = mysql_query("SELECT * FROM `xcart_categories` WHERE `meta_description` != 'manufacturer_category'");
?>

<html>
<head>
<title>PricEr - Pricing Retrieval Application</title>
</head>
<body style="margin:0; padding:0" onLoad="javascript:document.getElementById('loading').style.display = 'none';">
<img src="images/pricer/pricer2.jpg" style="float:left; margin-bottom:2em"><?php include('menu.php'); ?>
<div style="clear:both; float:left">
<form method="post">
<input type="hidden" name="man_cats" value="trigger">
 
<?php
while($rows = mysql_fetch_array($get_cats)){
?>
<div style="float:left; clear:left; text-align:left">
<input type="checkbox" name="cats[]" value="<?php echo $rows['categoryid'];?>"><?php echo $rows['category'];?>

</div>
<?php
	
	}
?>

<div style="float:left; clear:left; padding:1em;">
<button type="submit">Submit</button>
</div>
</form>
</div>
</body>
</html>
