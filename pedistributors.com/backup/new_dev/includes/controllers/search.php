<?php


class Search extends Index {

	function Search(){
		parent::Index();
		$this->id = "partQuery_" . $this->id;
		$this->queryText = $this->formatQueryLine(array('TYPE', 'QUOTE'));
		$this->responseParts = array();
		$this->alternateParts = array();
		if(isset($_POST['partnumber'])){
			$this->queryPart($_POST['linecode'],$_POST['partnumber']);
		}
	
	}

	function queryPart($lineCode, $partNumber) {
		$this->queryText .= $this->formatQueryLine(array("HD",$_SESSION[customer][login]));
		if (isset($lineCode)) {
		$this->queryText .= $this->formatQueryLine(array("D1",
					$lineCode . $partNumber));
		} else {
		$this->queryText .= $this->formatQueryLine(array("D1",
					$partNumber));
		}

		$this->submitQuery();
		if (!$this->pollForResponse()) {
			$this->pageResponse("search_error");
			return 0;
		}
		if ($this->responseType != "QUOTE") {
			$this->error ="Received a bogus type (\"{$this->responseType}\") to a
				part order query.";
			return 0;
		}
		

		
		foreach($this->responseLines as $line){
			$parts = explode("|",$line);
			if($parts[0] == "DR"){				
				$this->responseParts[$parts[1]] = $parts;
				$this->responseParts[$parts[1]][2] = substr($this->responseParts[$parts[1]][1],0,3);
				if(empty($this->responseParts[$parts[1]][12])){
					$this->responseParts[$parts[1]][12] = $this->responseParts[$parts[1]][13];
				}
				if(empty($this->responseParts[$parts[1]][1])){
					unset($this->responseParts);
					$this->pageResponse("search_error");
					
				}
			}elseif($parts[0] == "A"){
				$this->alternateParts[$parts[1]] = $parts;			
			}
			
			$_SESSION['last_search_results'] = $this->responseParts;
			$_SESSION['search_history'] = array_merge($_SESSION['last_search_results'], $this->responseParts);
		
		}

		/*foreach ($this->responseLines as $line) {
			$parts = explode("|", $line);
			if ($parts[0] == "DR") {
				// This is a part number response, so add it to the list:
				if ($newPart = new Part($parts)) {
					if (!empty($newPart->partNumber) && !empty($newPart->lineCode)) {
						$this->responseParts[$newPart->lineCode . $newPart->partNumber] = $newPart;
						
					}
				}

			} elseif ($parts[0] == "A") {
				// Alternate part provided:
				$newPart = new Part($parts);
				$this->alternateParts[$newPart->lineCode . $newPart->partNumber] =
				$newPart;
			}
		} 
	foreach($controller->results as $k=>$v){
		$k[$v]['details'] = "details";
		}*/
	
	}


}

$search = new Search;


?>