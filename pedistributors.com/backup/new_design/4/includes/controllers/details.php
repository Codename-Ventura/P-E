<?php


class Details extends Index{

	function Details(){
		parent::Index();
		$ordernumber = $_GET['order'];
		$this->id = "detailQuery_" . $this->id;
		$this->queryText = $this->formatQueryLine(array('TYPE', 'ORDERDETAIL'));
		$this->queryText .= $this->formatQueryLine(array("HD",$_SESSION['customer']['login']));
		$this->queryText .= $this->formatQueryLine(array("D1",$ordernumber));
		$this->submitQuery();
		if (!$this->pollForResponse()) {
			//return $this->pollForOrders();
			return 0;
		}
		if ($this->responseType != "ORDERDETAIL") {
			$this->error ="Received a bogus type (\"{$this->responseType}\") to a
				part order query.";
			return 0;
		}

	}
	


}

$details = new Details;

?>