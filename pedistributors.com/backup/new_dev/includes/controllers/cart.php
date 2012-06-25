<?php

class Cart extends Search {

	function Cart(){
		parent::Search();
		if(isset($_SESSION['shopping_cart'])){
			$this->cart = $_SESSION['shopping_cart'];
		}
		else{ $this->cart = array();
		}

		if(isset($_POST['part_additions']) && isset($_POST['parts'])){
			$this->addtocart($_POST['parts']);						
		}
		
		if(isset($_POST['modify_cart'])){
			$this->modifycart($_POST['parts']);						
		}
		
		
		/*if(isset($_POST['parts'])){
			include('includes/db.php');
			foreach($_POST['parts'] as $k=>$v){
			
			$this->partNumber = explode("|",$this->convertLineCode($k));
			if($this->queryPart($this->partNumber[0],$this->partNumber[1])){
				$parts = array($this->partNumber[0].$this->partNumber[1],"1");
				print_r($parts);
				$this->addtocart($parts);
				}
			}
		}*/
	
		
		
	}
		




function addtocart($parts){
	foreach($parts as $k=>$v){
		if($this->zero($v)){unset($parts[$k]);}
		elseif($this->convertLineCode($k)){
			$partnum = $this->convertLineCode($k);
			$partnum = explode("|",$partnum);
			$parts = array($partnum[0].$partnum[1]=>"1");
			$this->queryPart($partnum[0],$partnum[1]);
		}
	}

	foreach($parts as $k=>$v){
		if($_SESSION['search_history'][$k][7] == "0"){
			$this->pageResponse("out_of_stock", $k);
			unset($parts[$k]);
		}
		elseif($v > $_SESSION['search_history'][$k][7]){
			$this->pageResponse("qty_exceeded", $k);
			$parts[$k] = $_SESSION['search_history'][$k];
			$parts[$k]['quantity'] = $_SESSION['search_history'][$k][7];
		}
		else{
			$parts[$k] = $_SESSION['search_history'][$k];
			$parts[$k]['quantity'] = $v;
			}
	}
	if(isset($this->cart) && !empty($this->cart)){
		$this->cart = array_merge($this->cart,$parts);
	}
	else{
		$this->cart = $parts;
	}
	$this->updateTotals();
}

function modifycart($parts){
	foreach($parts as $k=>$v){
	$temp_line = substr($k,0,3);
	$temp_part = str_replace($temp_line, "",$k);
		if($v == "0"){
			unset($this->cart[$k]);
			$this->pageResponse("part_deleted", $k);
			}
		elseif($v == $this->cart[$k]['quantity']){

			}
		elseif($v > $this->cart[$k][7]){
			$this->pageResponse("qty_exceeded", $k);
			$this->cart[$k]['quantity'] = $this->cart[$k][7];
		}
		else{
			$this->pageResponse("part_updated", $k);
			$this->cart[$k]['quantity'] = $v;
		}
		$this->updateTotals();
	}
	
	//$this->cart = $parts;
}

function updateTotals(){
	foreach($this->cart as $key=>$val){
		$cost_qty = $val[10] * $val['quantity'];
		$this->cart[$key]['total_per'] = $cost_qty;
	}
	$this->total = "0";
	foreach($this->cart as $key=>$val){
		$this->total = $this->total + $val['total_per'];
	}
	return $_SESSION[cart_total] = $this->total;
}


function convertLineCode($partnum){
	include('includes/db.php');
	$oldlinecode = substr($partnum,0,4);
	$partnum = str_replace($oldlinecode, "", $partnum);
	$q = mysql_query("SELECT * FROM `lines` WHERE `industry_code` = '$oldlinecode'");
	if(mysql_num_rows($q) == "0"){
		//$this->pageResponse("no_linecode", $k);
		return 0;
	}else{
		$q = mysql_fetch_array(mysql_query("SELECT * FROM `lines` WHERE `industry_code` = '$oldlinecode'"));
		return $q['pe_code']."|".$partnum;	
	}
}

}



$cart = new Cart;
$_SESSION['shopping_cart'] = $cart->cart;

?>