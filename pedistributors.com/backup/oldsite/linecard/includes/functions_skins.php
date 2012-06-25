<?php
function skinget(){
	global $db, $dbprefix, $config;
	
	// work out what to use
	if ($_GET["s"] <> ""){
		$skinid = $_GET["s"];
	} elseif ($_SESSION["skin"] <> ""){
		$skinid = $_SESSION["skin"];
	} else {
		$skinid = $config["defaultskin"];
	}
	
	// and intval it
	$skinid = intval($skinid);
	
	// validate it's existance
	$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE skinid = " . dbSecure($skinid);
	$rec = $db->execute($sql);
	if ($rec->rows < 1){
		$result = 1;
	} else {
		$result = $rec->fields["skinid"];
	}
	
	// and return
	return $result;
}

function skinset($skinid){
	
	if ($skinid == "default"){
		$skinresult = 0;
	} else {
		$skinresult = $skinid;
	}
	
	$_SESSION["skin"] = $skinresult;
}

function skinselector(){
	global $db, $dbprefix, $config, $phrase;
	
	// start building code
	$code  = '<form action="' . $config["topicpage"] . '" method="get" id="ss" name="ss">';
	$code .= '<select id="skinselector" name="skinselector">';
	$code .= '<option value="default">' . $phrase["usedefaultskin"] . '</option>';
	
	// work out current skin
	if ($_SESSION["skin"] <> ""){
		$curr = $_SESSION["skin"];
	} else {
		$curr = 0;
	}
	
	// loop through skinsets
	$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE visible = 1 ORDER BY title ASC";
	$rec = $db->execute($sql);
	do {
	
		if ($rec->fields["skinid"] == $curr){
			$extra = ' selected="selected"';
		} else {
			$extra = '';
		}
		
		$code .= '<option value="' . $rec->fields["skinid"] . '"' . $extra . '>' . $rec->fields["title"] . ' ' . strtolower($phrase["skin"]) . '</option>';
		
	} while ($rec->loop());
	
	// end the code
	$code .= '</select>';
	$code .= '<input type="submit" value="' . $phrase["change"] . '!" />';
	$code .= '</form>';
	
	// and return code
	return $code;
}
?>