<?php

$host="76.163.252.26"; //Host Name
$username="pedist1_logger";
$password="logmanA69";
$db_name="pedist1_log";


mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
/*while ($data = mysql_fetch_array(mysql_query("SELECT * FROM pricing"))){
	$results[] .= $data;
}*/
$x = "0";
$data = array();
/*
while ($results = mysql_fetch_array(mysql_query("SELECT * FROM pricing"))){
	print_r($results);
}
*/
if($_SERVER['REMOTE_ADDR'] !== "12.71.211.66"){
	echo "Access Denied";
	exit();
	}

$result = mysql_query("SELECT * FROM pricing_raw");
$counter = 0;
echo "<table border=1>";
while($row = mysql_fetch_array($result))
  {

	$checkrow = explode(':',$row[price]);
	if ($checkrow[0] == "Part Number"){
		$getline = explode('-',$checkrow[1]);
		echo "<tr>";
		echo "<td>"; 
		echo $getline[0];
		echo "</td>";
		echo "<td>".$getline[1]."</td>";
		}
	$checkforp = explode('$',$row[price]);
	if (!empty($checkforp[1])){
		if (strlen($checkforp[1]) < 10){
		echo "<td>";
		echo $checkforp[1];
		echo "</td>";
		echo "</tr>";
		}}

		/*
	echo "Row #".$counter.":";
	echo $row['price'];
	echo "<br />";
	$counter++;
	*/
  }
 echo "</table>";


?>