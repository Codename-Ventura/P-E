<?php
session_start();
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

include('includes/tssdb.php');

//BEGIN FUNCTIONS
function addToDatabase($string, $id){
	$query = mysql_query("UPDATE `app_data_eng` SET `parts` = '$string' WHERE `id` = '$id'");
}

function buildString($partsList){
	foreach($partsList as $k=>$v){
		$new_addition = $v['line']."|".$v['part_number'];
		if(isset($string)){
			$string = $string.",".$new_addition;
		}else{
			$string = $new_addition;
			}
	}
	return $string;
}

function convertLine($line){
	$query = mysql_query("SELECT * FROM `sumt_lines` WHERE `sumt` = '$line'");
	while($row = mysql_fetch_assoc($query)){
		$line = $row['line'];
	}
	return $line;	
}

function getEngineList(){
	$query = mysql_query("SELECT * FROM `app_data_eng` ORDER BY `make`");
	while($row = mysql_fetch_array($query)){
		$engines[] = $row;
	}

return $engines;
}

function get_EngUrl($id){
	$count = "0";
	$queries=array();
	$query = mysql_query("SELECT * FROM `app_data_eng` WHERE `id` = '$id'");
	while($row = mysql_fetch_assoc($query)){
	$queries['make'] = $row['make'];
	$queries['size'] = $row['size'];
	$queries['family'] = $row['family'];
		foreach($row as $k=>$v){
		//replace all url invalid characters
			$row[$k] = str_replace(".","-", str_replace(" ","", str_replace("/","-",$v)));
		}
	$url = "http://www.summitracing.com/search/make/".$row['make']."/engine-size/".$row['size']."/engine-family/".$row['family']."?RC=100";
	$queries['url'] = $url;
	//Get Number of results and handle page count
	$queries['no_of_results'] = getPages($url);
	$queries['no_of_pages'] = $queries['no_of_results']/1;
	
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

function getParts($engine){
$start_page = "1";
$url = $engine['url'];

while($start_page <= $engine['no_of_pages']){
	$url = $url."&page=".$start_page;
	if(isset($contents)){
		$contents .= file_get_contents($url);
	}else{
		$contents = file_get_contents($url);
	}
	
	$start_page++;
}

$contents = explode("partno", htmlentities($contents));
unset($contents[0]);
$lastrec = explode("/li",end($contents));
$contents[count($contents)] = $lastrec[0];
$contents = str_replace(" ", '', $contents);

$counter = "0";
$partNums = array();

foreach ($contents as $div){
	$div = explode("/li",$div);
	$raw = substr($div[0],108,20);
	$getnumber = explode("&lt;",$raw);
	$getnumber = explode("-",$getnumber[0]);
	$line = convertLine($getnumber[0]);
	$partnumber = $getnumber[1]; 
	if(!empty($getnumber[2])){ $partnumber .= "-".$getnumber[2];} 
	if(!empty($getnumber[3])){ $partnumber .= "-".$getnumber[3];}
	if(!empty($getnumber[4])){ $partnumber .= "-".$getnumber[4];}
	if(!empty($getnumber[5])){ $partnumber .= "-".$getnumber[5];}
	$partNums[$counter]['line'] = $line;
	$partNums[$counter]['part_number'] = $partnumber;
	$counter++;
	
	}

return $partNums;
}


//BEGIN PAGE PROCESSING
if(isset($_GET['mode'])){
	$action = $_GET['mode'];
	}
else{
	$action = "index";
	}

switch ($action){
	case "partsearch":
		$id = $_GET['id'];
		$currentEngine = get_EngUrl($id);
		$partslist = getParts($currentEngine);
		$string = buildString($partslist);
		$database = addToDatabase($string,$id);
		break;
	case "index":
		$engines = getEngineList();
		break;
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
if(isset($engines)){
?>
<table align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; clear:both; padding:.5em" cellpadding="0" cellspacing="5px" border="1" bgcolor="#CCCCCC" width="100%">
<tr style="font-size:9px; text-align:center">
<td>Engine Make</td>
<td>Engine Size</td>
<td>Engine Family</td>
<td>Click to Get Parts</td>
</tr>
<?php
foreach($engines as $k=>$v){
?>
<tr>
<td><?php echo $v['make']; ?></td>
<td><?php echo $v['size']; ?></td>
<td><?php echo $v['family']; ?></td>
<td><a href="parts.php?mode=partsearch&id=<?php echo $v['id'];?>">Get Parts</a></td>
</tr>
<?php
	}
?>
</table>
<?php
}
?>


<?php
if(isset($partslist)){
?>
<table align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; clear:both; padding:.5em" cellpadding="0" cellspacing="5px" border="1" bgcolor="#CCCCCC" width="100%">
<tr style="font-size:9px; text-align:center">
<tr style="text-align:center; font-size:24px">
<td colspan="2">Current Engine: <?php echo $currentEngine['make']." - ".$currentEngine['size']." - ".$currentEngine['family'];?></td>
</tr>
<td>Line</td>
<td>Part Number</td>
</tr>
<?php
foreach($partslist as $k=>$v){
?>
<tr>
<td><?php echo $v['line']; ?></td>
<td><?php echo $v['part_number']; ?></td>
</tr>
<?php
	}
?>
</table>
<?php
}
?>
</div>

<div style="float:left; clear:left; width:100%">
<?php
echo "<pre>";
print_r(get_defined_vars());
echo "</pre>";
?>
</div>

</body>
</html>
