<?php
if($_SERVER['REMOTE_ADDR'] !== '192.168.1.150'){
exit();
}
include("../includes/db.php");

if(isset($_REQUEST['sortby'])){
	$sort = $_REQUEST['sortby'];
	switch ($sort){
		case 'date';
			$sortby = 'ORDER BY `date` ASC';
			break;
		case 'customer';
			$sortby = 'ORDER BY ABS(`cust_num`) ASC';
			break;
		case 'amount';
			$sortby = 'ORDER BY ABS(`amount`) ASC';
			break;
	}
	
	$query = "SELECT * FROM `b2b_orderlog`";
	
	$query = $query." ".$sortby;

}elseif(isset($_REQUEST['oneday'])){
	
	$sort = $_REQUEST['oneday'];
	$sortby = "WHERE `date` = '".$sort."'";
	
	$query = "SELECT * FROM `b2b_orderlog`";
	$query = $query." ".$sortby;
	
}else{
	$query = "SELECT * FROM `b2b_orderlog`";
}




$get_store_log = mysql_query($query);
$store_log = array();
while($k = mysql_fetch_array($get_store_log)){
	$store_log[] = $k;
	}


function get_total_income($data){

$total_price = "0";


foreach($data as $k=>$v){
	$total_price = $total_price + $v['amount'];
	}


return $total_price;
}



include('templates/index.php');
?>