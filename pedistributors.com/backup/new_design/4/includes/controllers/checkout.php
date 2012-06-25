<?php


class Checkout extends Index {

	function Checkout(){
	parent::Index();
	
		if(isset($_POST['ship_to_loc']) && $_POST['ship_to_loc'] == "billtoshipto" || !isset($_SESSION['address']) || empty($_SESSION['address'])){
			unset($_SESSION[address]);	
			$_SESSION['address']->address1 = $_SESSION['customer']['streetAddress'];
			$_SESSION['address']->address2 = $_SESSION['customer']['streetAddress2'];
			$_SESSION['address']->city = $_SESSION['customer']['city'];
			$_SESSION['address']->state = $_SESSION['customer']['state'];
			$_SESSION['address']->zip = $_SESSION['customer']['zip'];		
		}
		
		if(!isset($_SESSION['shopping_cart']) || empty($_SESSION['shopping_cart'])){
			header('Location: index.php?p=account');
		}
		
		if(isset($_GET['a']) && $_GET['a'] == "clearcart"){
			unset($_SESSION['shopping_cart']);
			unset($_SESSION['cart_total']);
			$_SESSION['sitemessage'] = "clear_cart";
			header('Location: index.php?p=account');
		}
		
		if(isset($_POST['ship_to_loc']) && !empty($_POST['ship_to_num']) || $_POST['ship_to_loc'] == "on_file"){
			$this->shipToQueryTransaction();
			$this->address = $this->queryShipTo();
			$_SESSION[address] = $this->responseAddress;
		}
		if(isset($_POST['ship_to_careof']) && !empty($_POST['ship_to_careof'])){
				$_SESSION['address']->careof = $_POST['ship_to_careof'];
			}
			
			if(isset($_POST['ship_to_address']) && !empty($_POST['ship_to_address'])){
				$_SESSION['address']->address1 = $_POST['ship_to_address'];
			}

			if(isset($_POST['ship_to_address2']) && !empty($_POST['ship_to_address2'])){
				$_SESSION['address']->address2 = $_POST['ship_to_address2'];
			}
			
			if(isset($_POST['ship_to_city']) && !empty($_POST['ship_to_city'])){
				$_SESSION['address']->city = $_POST['ship_to_city'];
			}
			
			if(isset($_POST['ship_to_state']) && !empty($_POST['ship_to_stateddress2'])){
				$_SESSION['address']->state = $_POST['ship_to_state'];
			}
			
			if(isset($_POST['ship_to_zip']) && !empty($_POST['ship_to_zip'])){
				$_SESSION['address']->zip = $_POST['ship_to_zip'];
			}
		
		$this->OrderTransaction();
		if(isset($_POST['submit_order_x'])){
			if(!isset($_SESSION['address']) || empty($_SESSION['address']) || $_POST['ship_to_loc'] == "billtoshipto"){
			$_SESSION['address']->address1 = $_SESSION['customer']['streetAddress'];
			$_SESSION['address']->address2 = $_SESSION['customer']['streetAddress2'];
			$_SESSION['address']->city = $_SESSION['customer']['city'];
			$_SESSION['address']->state = $_SESSION['customer']['state'];
			$_SESSION['address']->zip = $_SESSION['customer']['zip'];
			}	
			
			
		

		if($this->placeOrder()){
			unset($_SESSION['shopping_cart']);
			unset($_SESSION['cart_total']);
			header('Location: http://www.pedistributors.com/new_design/4/index.php?p=details&order='.$this->orderNumber.'');
			} //Place Order Function
		}
	
	
	}

	function shipToQueryTransaction() {
		$this->id = "shipToQuery_" . $this->id;
		$this->queryText = $this->formatQueryLine(array('TYPE', 'ST'));
		$this->customerNumber = $_SESSION['customer']['login'];
	}

	function queryShipTo() {
		$this->queryText .= $this->formatQueryLine(array($_SESSION['customer']['login'],""));
		$this->queryText .= $this->formatQueryLine(array($_SESSION['customer']['pw'],""));
		$this->queryText .= $this->formatQueryLine(array($_POST['ship_to_num']),"");

		$this->submitQuery();
		if (!$this->pollForResponse()) {
			return 0;
		}
		if ($this->responseType != "ST") {
			$this->error ="Received a bogus type (\"{$this->responseType}\") to a
				ship-to location query.";
			return 0;
		}
		if(empty($this->responseLines)){
			$this->pageResponse("address_not_found");
			unset($_SESSION['address']);
		}
		foreach ($this->responseLines as $line) {
			$parts = explode("|", $line);
			switch ($parts[0]) {
				case "A1":
					$this->responseAddress->address1 = $parts[1];
					break;
				case "A2":
					$this->responseAddress->address2 = $parts[1];
					break;
				case "A3":
					$this->responseAddress->city = $parts[1];
					$this->responseAddress->state = $parts[2];
					$this->responseAddress->zip = $parts[3];
					break;
			}
		}
	}

	function OrderTransaction(){
		$po_number = $_POST['po_number'];
		$notes = $_POST['notes'];
		$this->id = "auth_" . $this->id;
		$this->queryText = $this->formatQueryLine(array('TYPE', 'STATUS'));
		$this->id = "order_" . $this->id;
		$this->queryText = $this->formatQueryLine(array('TYPE', 'STATUS'));
		$this->queryText .= $this->formatQueryLine(array('BS', $_SESSION['customer']['login'],
		$_SESSION['customer']['pw']));
		$this->queryText .= $this->formatQueryLine(array('TYPE', 'ORDER'));
		$this->queryText .= $this->formatQueryLine(array('HD', $_SESSION['customer'][login]));
		$this->queryText .= $this->formatQueryLine(array('PO', $_POST['po_number']));
		$this->queryText .= $this->formatQueryLine(array('C2', $_POST['notes']));
		$this->queryText .= $this->formatQueryLine(array('M', $_SESSION['address']->careof));
		$this->queryText .= $this->formatQueryLine(array('M', $_SESSION['address']->address1));
		$this->queryText .= $this->formatQueryLine(array('M', $_SESSION['address']->address2));
		$this->queryText .= $this->formatQueryLine(array('M', $_SESSION['address']->apt));
		$this->queryText .= $this->formatQueryLine(array('M', $_SESSION['address']->city));
		$this->queryText .= $this->formatQueryLine(array('M', $_SESSION['address']->state));
		$this->queryText .= $this->formatQueryLine(array('M', $_SESSION['address']->zip));
		
		
		foreach ($_SESSION['shopping_cart'] as $lineItem) {
			$this->queryText .= $this->formatQueryLine(array(
				'D1',
				$lineItem[1],
				$lineItem[quantity]
			));
			
		}
	}
	
	function OrderDropShipTranaction(){
		$this->id = "auth_" . $this->id;
		$this->queryText = $this->formatQueryLine(array('TYPE', 'STATUS'));
		$this->id = "order_" . $this->id;
		$this->queryText = $this->formatQueryLine(array('TYPE', 'STATUS'));
		$this->queryText .= $this->formatQueryLine(array('BS', $_SESSION['customer']['0'],
		$_SESSION['customer']['pw']));
		$this->queryText .= $this->formatQueryLine(array('TYPE', 'ORDER'));
		$this->queryText .= $this->formatQueryLine(array('HD', $_SESSION['customer']['0']));
		$this->queryText .= $this->formatQueryLine(array('PO', $po_number));
		$this->queryText .= $this->formatQueryLine(array('C2', $notes));
		
		if(isset($_SESSION['customer']['can_drop_ship']) && $_SESSION['customer']['can_drop_ship'] == "true"){
			//get Drop Ship Info
		}
		
		if (isset($location) && !empty($location)) {
		$this->queryText .= $this->formatQueryLine(array('ST', $location));
			}
		$this->queryText .= $this->formatQueryLine(array('M', $co));
		$this->queryText .= $this->formatQueryLine(array('M', $add1));
		$this->queryText .= $this->formatQueryLine(array('M', $add2));
		$this->queryText .= $this->formatQueryLine(array('M', $apt));
		$this->queryText .= $this->formatQueryLine(array('M', $city));
		$this->queryText .= $this->formatQueryLine(array('M', $state));
		$this->queryText .= $this->formatQueryLine(array('M', $zip));
	}
	
	function placeOrder(){	
	$this->submitQuery();
		if (!$this->pollForResponse()) {
			$this->pageResponse("order_fail");
			return 0;
		}
		
		$type = explode("|", $this->responseLines[1]);
		$this->responseType2 = $type[1];
		if ($this->responseType != "STATUS" || $this->responseType2 != "ORDER") {
			$this->error ="Received a bogus type (\"{$this->responseType}\") to a
				part order query.";
			$this->pageResponse("order_fail");
			return 0;
		}
		
		foreach ($this->responseLines as $line) {
			$parts = explode("|", $line);
			if ($parts[0] == "U1" && $parts[12] == "OK" && $parts[13] == "ORDER PLACED") {
				$this->orderNumber = $parts[14];
				return 1;
			}
		}
			$this->error = "There was a problem placing the order! Please contact your salesman or call 1-800-251-2034.";
			$this->pageResponse("order_fail");
			return 0;
		}
	
	}



$checkout = new Checkout;

?>