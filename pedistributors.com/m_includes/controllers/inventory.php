<?php


class Inventory extends Index {

	function Inventory(){
		parent::Index();
		$this->id = "inv_" . $this->id;
		$this->queryText = $this->formatQueryLine(array('TYPE', 'QUOTE'));
		$this->queryText .= $this->formatQueryLine(array("HD",$_SESSION['customer']['login']));
		$this->queryText .= $this->formatQueryLine(array("D1","EDL2101"));
		$this->submitQuery();
		$this->responseParts = array();
		$this->alternateParts = array();		
		if (!$this->pollForResponse()) {
			//return $this->pollForOrders();
			return 0;
		}
		if ($this->responseType != "QUOTE") {
			$this->log("Received a bogus type (\"{$this->responseType}\") to a
					part order query.");
			$this->error ="Received a bogus type (\"{$this->responseType}\") to a
				part order query.";
			return 0;
		}
	
	}
	
	function checkInv($partNum, $lineCode){
		
	}


}

$inventory = new Inventory;

?>