<?php


class Details extends Index{

	function Details(){
		parent::Index();
		if(!isset($_GET['order']) || empty($_GET['order'])){
			$this->pageResponse("error");
		}
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
			$this->error ="Received a bogus type (\"{$this->responseType}\") to an ORDER DETAIL query.";
			return 0;
		}

	}
	


}

$details = new Details;

?>

<!-- 
<div style="float:left; width:100%; background:#FFF; text-align:left">
<pre>

// print_r(get_defined_vars());

</pre>
</div> -->
