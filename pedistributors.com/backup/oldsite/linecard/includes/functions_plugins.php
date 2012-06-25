<?php
function pluginspot($id){
	global $config, $db, $dbprefix;
	
	// check if system is disabled
	if (!(ENABLE_PLUGINS === true)){
		return "";
	}
	
	// standard validation
	$id = intval($id);
	
	// get code to be executed
	$sql  = "SELECT * FROM " . $dbprefix . "plugin_code AS c INNER JOIN " . $dbprefix;
	$sql .= "plugin_plugins AS p ON c.pluginid = p.pluginid WHERE ";
	$sql .= "p.enabled = 1 AND c.locationid = " . $id;
	$rec  = $db->execute($sql);
	
	// loop through code
	if ($rec->rows > 0){ do {
		
		$code .= $rec->fields["code"] . "\n";
		
	} while ($rec->loop()); }
	
	// finish code
	$code = "?>\n" . $code . "<?php\n";
	//echo($code);
	// return code
	return $code;
}
?>