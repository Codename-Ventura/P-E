<html>
<head>
<title>PricEr - Pricing Retrieval Application</title>
</head>
<body style="margin:0; padding:0">
<div style="float:right"><a href="view.php"><img src="images/pricer/viewdb.jpg" border="0"></a></div>
<div style="clear:both">
<center><img src="http://www.pedistributors.com/images/pricer/pricer.jpg"></center>
<?php
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

function getpagecount($url){

$test = file_get_contents($url);
$test = htmlentities($test);
$test = explode("Page 1",$test);
$test = explode("of ", $test[1]);
$test = explode("&lt;", $test[1]);
$pagecount = $test[0];
return $pagecount;

}

include('includes/tssdb.php');


echo "<table border=0 align=\"center\" style=\"font-family:Verdana\" style=\"clear:both\">";
?>
<tr><td>
<form method="post">
URL: <select name="pricefile">

<?php

$brands = file_get_contents("http://www.summitracing.com/brands/ShowAll");
$brands = explode("brandname",$brands);
unset($brands[0]);
foreach($brands as $key=>$value){
	$value = explode("href",$value);
		foreach($value as $key => $value){
			$value = htmlentities($value);
			$value = explode("&quot;",$value);
				foreach($value as $key=>$value){
					$value = explode("/",$value);
					if($value[4] == "brand"){
					$brandname = $value[5];
					$link = implode("/",$value);
					echo "<option value=\"$link?RC=100\">$brandname</option>";
						}
					}
			}
	}
?>
</select>
<button type="submit">Submit</button></td></tr>
<tr bgcolor="#deeaff" style="text-align:center; padding:0; margin:0; vertical-align:middle;"><td colspan="4" style="padding-top:1em">
<input type="checkbox" name="addtodb"><label for="addtodb">Add data to database</label><input type="text" size="4" name="manual_line" style="margin-left:10em;"> Manual Line Code
</form></td></tr>

<?php

if($_SERVER['REMOTE_ADDR'] !== "12.71.211.66"){
	exit();
	}
	
if (!empty($_POST['pricefile'])){
$current_page = "1";
$no_of_pages = getpagecount($_POST['pricefile']);
echo $no_of_pages;
while($current_page <= $no_of_pages){
$url = $_POST['pricefile']."&page=".$current_page;
$test .= file_get_contents($url);
$current_page = $current_page + 1;
}

$test = explode("partno", htmlentities($test));
unset($test[0]);
$lastrec = explode("/li",end($test));
$test[count($test)] = $lastrec[0];
$test = str_replace(" ", '', $test);
/*$test = str_replace("<","&lt",$test);
$test = str_replace(">","&gt",$test);
*/
?>
<tr><td colspan="3" style="text-align:center"><?php echo count($test);?> Records Returned</td></tr>
<?php
echo "<table border=\"1\" align=\"center\" width=\"45%\" style=\"font-family:Verdana\">";
?>
<tr><td style="text-align:center">Line Code</td><td style="text-align:center">Part #</td><td style="text-align:center">Price</td><?php if(isset($_POST['addtodb'])){ echo "<td align=\"center\">Database Info</td>";}?></tr>
<?php
foreach ($test as $div){
	echo "<tr>";
	$div = explode("/li",$div);
	/*echo "********************************************************************************************";
	echo "<br>";
	echo $div[0];
	echo "<br>";
	echo "SUB-SUB-SUB-SUB-SUB-SUB-SUB-SUB"; echo "<br>";
	*/
	$raw = substr($div[0],108,20);
	$getnumber = explode("&lt;",$raw);
	$getnumber = explode("-",$getnumber[0]);
	if(!empty($_REQUEST['manual_line'])){
		$line = strtoupper($_REQUEST['manual_line']);
		}
	else{
		$line = $getnumber[0];
		}
	echo "<td>"; echo $line; echo "</td>";
	echo "<td>"; $partnumber = $getnumber[1]; 
	if(!empty($getnumber[2])){ $partnumber .= "-".$getnumber[2];} 
	if(!empty($getnumber[3])){ $partnumber .= "-".$getnumber[3];}
	if(!empty($getnumber[4])){ $partnumber .= "-".$getnumber[4];}
	if(!empty($getnumber[5])){ $partnumber .= "-".$getnumber[5];}
	echo $partnumber;
	
	
	echo "</td>";
	$getprice = explode("price",$div[0]);
	$getprice = explode("&gt;",$getprice[1]);
	$getprice = explode("&lt;",$getprice[1]);
	echo "<td>"; $price = $getprice[0];
	$price = explode(".",$price);
	$price[1] = "99";
	$price = $price[0].".".$price[1];
	$price = trim($price);
	echo $price; echo "</td>";
	$checkrows = mysql_num_rows(mysql_query("SELECT * FROM pricer3 WHERE partnum = '$partnumber' AND line = '$line'"));
	if (isset($_POST['addtodb'])){
	
	
	
	if($checkrows == "0"){
			mysql_query("INSERT INTO pricer3 (line, partnum, price) VALUES ('$line','$partnumber', '$price')");
			echo "<td bgcolor=\"#BCE8EB\">Data Added</td>";
			}
	elseif(mysql_num_rows(mysql_query("SELECT * FROM pricer3 WHERE partnum = '$partnumber' AND price = '$price' AND line = '$line'")) == "0"){
			mysql_query("UPDATE pricer3 SET price = '$price' WHERE partnum = '$partnumber' AND line = '$line'");
			echo "<td bgcolor=\"#FFFFCC\">Data Updated</td>";
			}
	else{ echo "<td bgcolor=\"#9AE7A8\">Pricing Up to Date</td>";
			}
		
		}
	
	}
	echo "</tr>";



/*
echo "<pre>";
print_r($test[2]);
echo "</pre>";
*/
}

if(!empty($_REQUEST['manual_line'])){
		$line = strtoupper($_REQUEST['manual_line']);
			if(mysql_num_rows(mysql_query("SELECT * FROM lines_added WHERE `lines` = '$line'")) == "0"){
				mysql_query("INSERT INTO lines_added VALUES ('$line')");
				}
		}
		
?>

</table></table>
</div>
</body>
</html>
