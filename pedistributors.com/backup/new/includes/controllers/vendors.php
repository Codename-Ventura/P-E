<?php



//FILE TO HANDLE MANUFACTURER DATA




$host="localhost"; //Host Name
$username="pricer";
$password="pricer";
$db_name="pande";


mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$manufacturers = array();
$query = mysql_query("SELECT * FROM `linecard`");
while($row = mysql_fetch_array($query)){
	$manufacturers[$row[line]] = $row;
	if(file_exists("images/man_logos/".strtolower($row[line]).".jpg")){	$manufacturers[$row[line]][logo] = "images/man_logos/".strtolower($row[line]).".jpg";
	$manufacturers[$row[line]][db_id] = get_id($row[name]);
	$manufacturers[$row[line]][db_id] = $manufacturers[$row[line]][db_id][manufacturerid];

	}

}

function get_id($line){
	include('includes/config/tssdb.php');
	$query = mysql_query("SELECT * FROM `xcart_manufacturers` WHERE '$line' LIKE `manufacturer`");
	if(mysql_num_rows($query) == "0"){
		return FALSE;
	}else{
		return mysql_fetch_array($query);
	}
}

function get_products($id){
	include('includes/config/tssdb.php');
	$query = mysql_query("SELECT * FROM xcart_products LEFT JOIN xcart_images_T ON xcart_products.productid = xcart_images_T.id   WHERE manufacturerid = $id");
	if(mysql_num_rows($query) == "0"){
		return FALSE;
	}else{
		$products = array();
		$i = "0";
		while($row = mysql_fetch_array($query)){			
			$product_array[$i] = $row;
			$i++;
		}
		return $product_array;
	}
}

$array_slice = array();
foreach($manufacturers as $k=>$v){
	if(isset($v[logo])){
		$array_slice[] = $v;
		}

}



?>
