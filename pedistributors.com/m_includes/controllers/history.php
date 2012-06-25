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
	
	function subval_sort($a,$subkey) {
	foreach($a as $k=>$v) {
		$b[$k] = strtolower($v[$subkey]);
	}
	asort($b);
	foreach($b as $key=>$val) {
		$c[] = $a[$key];
	}
	return $c;
}
	


}

$history = new History;
?>

<?php



	
	unset($history->responseLines[0]);
	foreach($history->responseLines as $k=>$v){
		$tempArray[] = explode("|",$v);
	}
	
	foreach($tempArray as $k=>$v){
		$responseArray[$k]['status'] = $tempArray[$k][0];
		$responseArray[$k]['orderno'] = $tempArray[$k][1];
		$responseArray[$k]['date'] = $tempArray[$k][2];
		$responseArray[$k]['po_number'] = $tempArray[$k][3];
		$responseArray[$k]['price'] = $tempArray[$k][4];
	}

	if(isset($_REQUEST['sortby'])){
	$responseArray = $history->subval_sort($responseArray, $_REQUEST['sortby']);


	}
?>