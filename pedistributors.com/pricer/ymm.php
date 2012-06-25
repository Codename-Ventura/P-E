<?php
session_start();
include('includes/tssdb.php');

function get_last_engine($id){
	$query = mysql_query("SELECT * FROM `app_data_eng` WHERE `id` = '$id'");
	$row = mysql_fetch_array($query);
	return $row;
}

function get_partNums($id){
	$count = "0";
	$queries=array();
	$query = mysql_query("SELECT * FROM `app_data_eng` WHERE `id` = '$id'");
	while($row = mysql_fetch_assoc($query)){
		foreach($row as $k=>$v){
		//replace all url invalid characters
			$row[$k] = str_replace(".","-", str_replace(" ","", str_replace("/","-",$v)));
		}
	$url = "http://www.summitracing.com/search/make/".$row['make']."/engine-size/".$row['size']."/engine-family/".$row['family'];
	$queries[$row[id]]['url'] = $url;
	$queries[$row[id]]['no_of_results'] = getPages($url);
	
	$count++;
	}
	
return $queries;
}


function getPages($url){
	$test = file_get_contents($url);
	$test = explode("Results Found",$test);
	$test = explode("<h2>",$test[0]);
	$test = trim($test[1]);
	
	return $test;
}






if(isset($_POST['engine_get'])){

 
$size = $_POST['size'];
$make = $_POST['make'];
$family = $_POST['family'];
$query = mysql_query("INSERT INTO `app_data_eng` (`id`,`make`,`size`,`family`) VALUES (NULL,'$make','$size','$family')");
$_SESSION['last_done'] = mysql_insert_id();
}

if(isset($_SESSION['last_done'])){
	$_SESSION['lastengine'] = get_last_engine($_SESSION['last_done']);
	unset($_SESSION['last_done']);
}

if(isset($_GET['mode'])){

$action = $_GET['mode'];

switch ($action){
	case "partsearch":
		$parts = get_partNums('4');
		break;
	}
}




?>

<html>
<head>
<script type="text/javascript" src="js/scripts.js"></script>
<title>PricEr - Pricing Retrieval Application</title>
</head>
<body style="margin:0; padding:0">
<img src="images/pricer/pricer2.jpg" style="float:left; margin-bottom:2em"><?php include('menu.php'); ?>
<div style="clear:both; float:left; width:100%; text-align:center">


<?php
if(isset($_SESSION['lastengine'])){
?>
<table align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; clear:both; padding:.5em; margin:1em" cellpadding="0" cellspacing="5px" border="0" bgcolor="#CCCCCC">
<tr><td>Last Engine Inserted:
<?php
echo $_SESSION['lastengine']['make']."-".$_SESSION['lastengine']['size']."-".$_SESSION['lastengine']['family'];
?>

</td></tr>
</table>

<?php
}
?>

<table align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; clear:both; padding:.5em" cellpadding="0" cellspacing="5px" border="0" bgcolor="#CCCCCC">
<tr style="font-size:9px; text-align:center">
<td>Engine Make</td>
<td>Engine Size</td>
<td>Engine Family</td>
<td></td>
</tr>


<tr><td>
<form method="post" action="ymm.php" onSubmit="return CheckEmpty(this)">
<input type="text" name="make"
value="
<?php if(isset($_SESSION['lastengine'])){
echo $_SESSION['lastengine']['make'];
}
?>
"


>
</td>
<td><input type="text" name="size" class="req"
value="
<?php if(isset($_SESSION['lastengine'])){
echo $_SESSION['lastengine']['size'];
}
?>
"

></td><td><input type="text" name="family" class="req"

value="
<?php if(isset($_SESSION['lastengine'])){
echo $_SESSION['lastengine']['family'];
}
?>
"

></td>
<td><input type="hidden" name="engine_get" value="1"></td>
<td><button type="submit">Submit</button></td>

</tr>


</form>
</table>
</div>

<div style="float:left; clear:left; width:100%">
<?php
echo "<pre>";
//print_r(get_defined_vars());
echo "</pre>";


?>
</div>

</body>
</html>
