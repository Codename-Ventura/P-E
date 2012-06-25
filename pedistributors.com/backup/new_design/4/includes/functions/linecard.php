<?php
$host="localhost"; //Host Name
$username="pricer";
$password="pricer";
$db_name="pedist1_log";


mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");



if(isset($_GET['line'])){
	$t = $_GET['line'];}

switch ($t) {
	case 'truck':
		$type = "truck";
		break;
	case 'audio':
		$type = "audio";
		break;
	case 'performance':
		$type = "performance";
		break;
	default:
		$type = "all";
		break;
}
	
	

$alphabet = array ("3", "A","B","C","D","E","F","G","H","I","J","K","L","M",
"N","O","P","Q","R","S","T","U","V","W","X","Y","Z");


$lines = mysql_query("SELECT * FROM `linecard` ORDER BY `name`");
$all_lines = array();
while($row = mysql_fetch_array($lines)){
	$all_lines[$row['id']] = $row;
	$all_lines[$row['id']]['type'] = explode("|",$row['type']);
	
	
}

$lines_2['all'] = array();
$lines_2['all'] = $all_lines;
$lines_2['audio'] = array();
$lines_2['performance'] = array();
$lines_2['truck'] = array();
$lines_2_first['audio'] = array();
$lines_2_first['truck'] = array();
$lines_2_first['performance'] = array();
$lines_2_first['all'] = array();
$lines_2_first['all'] = $alphabet;
foreach($all_lines as $k){

if(is_array($k['type'])){
if(in_array("TD",$k['type'])){
	$lines_2['truck'][$k['id']] = $k;

if(is_array($lines_2_first['truck'])){
	if(!in_array(substr($k['name'],0,1),$lines_2_first['truck'])){
		$lines_2_first['truck'][] .= substr($k['name'],0,1);
		}
	}
	
	}
if(in_array("P",$k['type'])){
	$lines_2['performance'][$k['id']] = $k;


if(is_array($lines_2_first['performance'])){
	if(!in_array(substr($k['name'],0,1),$lines_2_first['performance'])){
		$lines_2_first['performance'][] .= substr($k['name'],0,1);
		}
	}	
	
	
	}
if(in_array("AV",$k['type'])){
	$lines_2['audio'][$k['id']] = $k;
	
if(is_array($lines_2_first['audio'])){
	if(!in_array(substr($k['name'],0,1),$lines_2_first['audio'])){
		$lines_2_first['audio'][] .= substr($k['name'],0,1);
		}
	}	
	
	
	
	}
}
}

?>
