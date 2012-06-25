<?php
include('includes/tssdb.php');
include('includes/functions.php');
	if(isset($_FILES['stagefile'])){
	$file = $_FILES['stagefile']['name'];
	$ext = explode(".",$file);
	mysql_query("TRUNCATE TABLE `staging`");
	//$file = file_get_contents($file);
	if(checkforcsv($ext[1])){
		$file = file_get_contents($_FILES['stagefile']['tmp_name']);
		$file = explode("\n",$file);
		unset($file['0']); unset($file['1']);
		foreach($file as $key => $value){
			$row = explode(",",$value);
			//echo "INSERT INTO `staging` () VALUES ('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[13]','$row[14]','$row[15]','$row[16]','$row[17]','$row[18]','$row[19]','$row[20]','$row[21]','$row[22],'$row[23]')<br>";
			}
		
		
		}
	else{ echo "Invalid File";}
	} 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stager :: Part Type -> X-Cart Category Conversion</title>
<style type="text/css">
<!--
table, td
{
    border-color: #600;
    border-style: solid;
}

table
{
    border-width: 0 0 1px 1px;
    border-spacing: 0;
    border-collapse: collapse;
}

td
{
    margin: 0;
    padding: 4px;
    border-width: 1px 1px 0 0;
    background-color: #FFC;
}

-->
</style>


</head>
<body onload="javascript:document.getElementById('loading').style.display = 'none';"><img src="images/pricer/stager.jpg" style="float:left; margin-bottom:2em"><?php include('menu.php'); ?>
<div id="loading" style="width:100; text-align:center; margin-left:auto; margin-right:auto; clear:both"><img src="images/load.gif" /></div>
<table width="75%" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; border-color:#000000; border-width:0 0 1px 1px; border-style:solid;" align="center" style="clear:both">

<!--
<tr valign="top"><td colspan="4"><p style="float:left; width:99%; margin:0; background-color:#000000; color:#FFFFFF; padding:.5em">Import a new staging file:</p>
	<form method="post" style="float:left" enctype="multipart/form-data" style="margin:1em">
    	<input type="file" name="stagefile" width="20" style="float:left; border:2px #000000 solid"/><button type="submit" style="float:left; border:1px #000000 solid; margin-left:1em">Upload</button>
        </form>
</td></tr>
-->

<tr style="background-color:#FFFFCC; font-weight:bold"><td style="width:20%; text-align:center">Product #</td><td style="width:20%; text-align:center">Part Type</td><td style="width:20%; text-align:center">Category</td><td style="width:20%; text-align:center">Status</td></tr>
<?php if(isset($_GET['action']) && $_GET['action'] == "stage"){
	include('dostage.php');
	}
	else {
	?>
    <div style="width:100%; text-align:center; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; padding-bottom:5em; clear:both"><a href="staging.php?action=stage" style="text-decoration:none; color:#FF0000">Click to Activate</a></div>
    <?php
	}
?>


</table>


</body>
</html>
