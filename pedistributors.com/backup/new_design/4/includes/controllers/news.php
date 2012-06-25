<?php
class news extends Index {

function get_data($type){
	$host="localhost"; //Host Name
	$username="pricer";
	$password="pricer";
	$db_name="pande";
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");	
	$query = mysql_query("SELECT * FROM `news` WHERE `type` = '$type'");
		$i = "0";
		$row_arr = array();
		while($row = mysql_fetch_array($query, MYSQL_ASSOC)){
			if($row['exp'] >= date("Y-m-d")){
				$row_arr[$i] = $row;
				$i++;			
			}
		}
		
	return $row_arr;
	}



}



$news = new news();

?>


