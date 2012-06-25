<?php
ini_set('display_errors', 1);
ini_set ('allow_url_fopen', 1);
error_reporting(E_ALL);

function curl($url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            return curl_exec($ch);
            curl_close($ch);
        }




?>

<html>
<head>
<title>PricEr - Pricing Retrieval Application</title>
</head>
<body style="margin:0; padding:0" onLoad="javascript:document.getElementById('loading').style.display = 'none';">
<img src="images/pricer/pricer2.jpg" style="float:left; margin-bottom:2em"><?php include('menu.php'); ?>
<div style="clear:both">
<?php
$sort = "0";
if (!empty($_POST['pages'])){
?>
<div id="loading" style="width:100%; float:left; text-align:center; margin-left:auto; margin-right:auto; clear:both"><img src="images/load.gif" /></div>
<?php } ?>

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
include('includes/tssdb.php');


echo "<table border=0 align=\"center\" style=\"font-family:Verdana\" style=\"clear:both\" cellspacing=\"0\">";
?>
<tr><td>
<form method="post" action="pricer.php">
URL: <input name="pricefile" type="text" size="50" style="margin-right:1em;"> # of pages:  <input name="pages" type="text" size="4" style="margin-right:1em" />
<button type="submit">Submit</button></td></tr>
<tr bgcolor="#deeaff" style="text-align:center; padding:0; margin:0; vertical-align:middle;"><td colspan="4" style="padding-top:1em">
<input type="checkbox" name="addtodb"><label for="addtodb">Add data to database</label><input type="text" size="4" name="manual_line" style="margin-left:10em;"> Manual Line Code
</td>
</tr>
<tr bgcolor="#deeaff" style="font-size:9px; text-align:center"><td><p>Enter Page Numbers Below (for large queries)</p></td></tr>
<tr bgcolor="#deeaff" style="display:table-cell; vertical-align:middle; text-align:center"><td>Start Page:<input type="text" size="2" name="start_pg"> End Page:<input type="text" size="2" name="end_pg"> </td></tr>
<input type="hidden" name="pricer_get" value="1"></form>



<?php

if(isset($_POST['pricer_get'])){


	
if (!empty($_POST['pages'])){
$current_page = "1";
$page_end = $_POST['pages'];

}

if(!empty($_POST['start_pg']) && !empty($_POST['end_pg'])){
$current_page = $_POST['start_pg'];
$page_end = $_POST['end_pg'];
echo $current_page." - ".$page_end;


}


while($current_page <= $page_end){
$url = $_POST['pricefile']."&page=".$current_page;

if(isset($test)){
$test .= htmlentities(curl($url));
}
else{
$test = htmlentities(curl($url));
}
$current_page++;
}


$test = explode("partno", $test);
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
			mysql_query("INSERT INTO pricer3 (line, partnum, price, popularity) VALUES ('$line','$partnumber', '$price', '$sort')");
			
			echo "<td bgcolor=\"#BCE8EB\">Data Added ".$sort."</td>";
			$sort++;
			}
	elseif(mysql_num_rows(mysql_query("SELECT * FROM pricer3 WHERE partnum = '$partnumber' AND price = '$price' AND line = '$line'")) == "0"){
			mysql_query("UPDATE pricer3 SET price = '$price', popularity = '$sort', WHERE partnum = '$partnumber' AND line = '$line'");
			echo "<td bgcolor=\"#FFFFCC\">Data Updated ".$sort."</td>";
			$sort++;
			}
	else{ echo "<td bgcolor=\"#9AE7A8\">Pricing Up to Date ".$sort."</td>";
	mysql_query("UPDATE pricer3 SET popularity = '$sort', WHERE partnum = '$partnumber' AND line = '$line'");
	$sort++;
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
