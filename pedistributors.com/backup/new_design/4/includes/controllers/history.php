<?php


class History extends Index{

	function History(){
		parent::Index();
		$this->id = "historyQuery_" . $this->id;
		$this->queryText = $this->formatQueryLine(array('TYPE', 'OPENORDER'));
		$this->queryText .= $this->formatQueryLine(array("HD",$_SESSION['customer']['login']));
		$this->submitQuery();
		if (!$this->pollForResponse()) {
			//return $this->pollForOrders();
			return 0;
		}
		if ($this->responseType != "OPENORDER") {
			$this->error ="Received a bogus type (\"{$this->responseType}\") to a
				part order query.";
			return 0;
		}

	}
	


}

$history = new History;

?>