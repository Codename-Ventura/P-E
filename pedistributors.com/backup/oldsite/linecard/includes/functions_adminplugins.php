<?php
function addcodeblock($pluginid, $locationid, $code){
	global $db, $dbprefix;
	
	// standard validation
	$pluginid = intval($pluginid);
	$locationid = intval($locationid);
	if ($code == ""){ return "You did not enter any code"; }
	
	// validate plugin
	$sql = "SELECT * FROM " . $dbprefix . "plugin_plugins WHERE pluginid = " . $pluginid;
	$plg = $db->execute($sql);
	if ($plg->rows < 1){ return "Unable to locate the plugin"; }
	
	// validate location
	$sql = "SELECT * FROM " . $dbprefix . "plugin_locations WHERE locationid = " . $locationid;
	$loc = $db->execute($sql);
	if ($loc->rows < 1){ return "Unable to locate the location"; }
	
	// insert it
	$sql  = "INSERT INTO " . $dbprefix . "plugin_code (pluginid, locationid, code) VALUES (";
	$sql .= $pluginid . ", ";
	$sql .= $locationid . ", ";
	$sql .= "'" . dbSecure($code) . "')";
	$db->execute($sql);
	
	// and return (ref: admin_newcodeblock.php)
	return "Code block added successfully!";
}

function archivecodeblock($codeid, $code){
	global $db, $dbprefix;
	
	// standard validation
	$codeid = intval($codeid);
	if ($code == ""){ return "No code to archive"; }
	
	// insert it into the database
	$sql  = "INSERT INTO " . $dbprefix . "plugin_code_history (codeid, postdate, code) VALUES (";
	$sql .= $codeid . ", ";
	$sql .= time() . ", ";
	$sql .= "'" . addslashes($code) . "')";
	$db->execute($sql);
	
	// and return
	return "Code archived successfully!";
}

function createplugin($title, $author, $version, $enabled){
	global $db, $dbprefix;
	
	// standard validation
	if ($title == ""){ return "You did not enter a title"; }
	if ($author == ""){ return "You did not enter an author"; }
	if ($version == ""){ return "You did not enter a version"; }
	
	// checked enabled or not
	$enabled = intval($enabled);
	if ($enabled == 1){
		$enabled = 1;
	} else {
		$enabled = 0;
	}
	
	// validate version
	if (!(preg_match("/^([0-9]+).([0-9]+).([0-9]+)$/", $version))){
		return "Version must be specified x.x.x";
	}
	
	// ok, insert plugin
	$sql  = "INSERT INTO " . $dbprefix . "plugin_plugins (title, author, version, enabled) VALUES (";
	$sql .= "'" . dbSecure($title) . "', ";
	$sql .= "'" . dbSecure($author) . "', ";
	$sql .= "'" . dbSecure($version) . "', ";
	$sql .= $enabled . ")";
	$db->execute($sql);
	
	// and return (ref: admin_newplugin.php)
	return "Plugin created successfully!";
}

function deletecodeblock($codeid){
	global $db, $dbprefix;
	
	// standard validation
	$codeid = intval($codeid);
	
	// delete code history
	$sql = "DELETE FROM " . $dbprefix . "plugin_code_history WHERE codeid = " . $codeid;
	$db->execute($sql);
	
	// delete code
	$sql = "DELETE FROM " . $dbprefix . "plugin_code WHERE codeid = " . $codeid;
	$db->execute($sql);
	
	// and return
	return "Code block deleted successfully!";
}

function deleteplugin($pluginid){
	global $db, $dbprefix;
	
	// standard validation
	$pluginid = intval($pluginid);
	
	// delete code blocks
	$sql = "SELECT * FROM " . $dbprefix . "plugin_code WHERE pluginid = " . $pluginid;
	$cde = $db->execute($sql);
	if ($cde->rows > 0){ do {
		deletecodeblock($cde->fields["codeid"]);
	} while ($cde->loop()); }
	
	// delete actual plugin
	$sql = "DELETE FROM " . $dbprefix . "plugin_plugins WHERE pluginid = " . $pluginid;
	$db->execute($sql);
	
	// and redirect
	redirect("admin_plugins.php");
}

function editcodeblock($codeid, $locationid, $code){
	global $db, $dbprefix;
	
	// standard validation
	$codeid = intval($codeid);
	$locationid = intval($locationid);
	if ($code == ""){ return "You did not enter any code"; }
	
	// validate code block
	$sql = "SELECT * FROM " . $dbprefix. "plugin_code WHERE codeid = " . $codeid;
	$cde = $db->execute($sql);
	if ($cde->rows < 1){ return "The code block could not be found"; }
	
	// validate location
	$sql = "SELECT * FROM " . $dbprefix . "plugin_locations WHERE locationid = " . $locationid;
	$loc = $db->execute($sql);
	if ($loc->rows < 1){ return "Unable to locate the location"; }
	
	// run the update
	$sql  = "UPDATE " . $dbprefix . "plugin_code SET ";
	$sql .= "locationid = " . $locationid . ", ";
	$sql .= "code = '" . dbSecure($code) . "' ";
	$sql .= "WHERE codeid = " . $codeid;
	$db->execute($sql);
	
	// should we archive the old code?
	if (un($code) <> $cde->fields["code"]){
		archivecodeblock($codeid, $cde->fields["code"]);
	}
	
	// and return
	return "Code block updated successfully!";
}

function editplugin($pluginid, $title, $author, $version, $enabled){
	global $db, $dbprefix;
	
	// standard validation
	if ($title == ""){ return "You did not enter a title"; }
	if ($author == ""){ return "You did not enter an author"; }
	if ($version == ""){ return "You did not enter a version"; }
	$pluginid = intval($pluginid);
	
	// checked enabled or not
	$enabled = intval($enabled);
	if ($enabled == 1){
		$enabled = 1;
	} else {
		$enabled = 0;
	}
	
	// validate version
	if (!(preg_match("/^([0-9]+).([0-9]+).([0-9]+)$/", $version))){
		return "Version must be specified x.x.x";
	}
	
	// update plugin
	$sql  = "UPDATE " . $dbprefix . "plugin_plugins SET ";
	$sql .= "title = '" . dbSecure($title) . "', ";
	$sql .= "author = '" . dbSecure($author) . "', ";
	$sql .= "version = '" . dbSecure($version) . "', ";
	$sql .= "enabled = " . $enabled . " ";
	$sql .= "WHERE pluginid = " . $pluginid;
	$db->execute($sql);
	
	// and return (ref: admin_editplugin.php)
	return "Plugin updated successfully!";
}

function exportplugin($pluginid){
	global $config, $db, $dbprefix;
	
	// standard validation
	$pluginid = intval($pluginid);
	
	// get recordset
	$sql = "SELECT * FROM " . $dbprefix. "plugin_plugins WHERE pluginid = " . $pluginid;
	$rec = $db->execute($sql);
	if ($rec->rows < 1){ return "The plugin could not be found"; }
	
	// get code too
	$sql = "SELECT * FROM " . $dbprefix . "plugin_code WHERE pluginid = " . $pluginid;
	$cde = $db->execute($sql);
	if ($cde->rows < 1){ return "This plugin has no code to export"; }
	
	header("Content-type: text/xml\n\n");
	header("Content-Disposition: attachment; filename=" . $rec->fields["title"] . ".xml");
	
	echo("<?xml version=\"1.0\" ?>\n");
	echo("<plugin>\n");
	echo("	<title>" . $rec->fields["title"] . "</title>\n");
	echo("	<software version=\"" . $config["version"] . "\">Particle Links</software>\n");
	echo("	<author>" . $rec->fields["author"] . "</author>\n");
	echo("	<version>" . $rec->fields["version"] . "</version>\n");
	echo("	<published>" . date("j F Y") . "</published>\n");
	echo("	<codeblocks>\n");
	
	do {
	echo("		<codeblock location=\"" . $cde->fields["locationid"] . "\">" . addcslashes(htmlentities($cde->fields["code"]), "\0..\37!@\@\177..\377") . "</codeblock>\n");
	} while ($cde->loop());
	
	echo("	</codeblocks>\n");
	echo("</plugin>");
	
	// kill script to prevent page being written
	die();
}

function installplugin($xmlfile, $enabled = 1){
	global $db, $dbprefix;
	
	// initialise some variables
	$GLOBALS["row"] = 0;
	$GLOBALS["tagnum"] = 0;
	$GLOBALS["endnum"] = 0;
	
	// setup reading functions
	function startElement($parser, $name, $attrs){
		global $currentTag, $currentAtr;
		
		$currentTag = $name;
		$currentAtr = $attrs;
		
		$GLOBALS["tagnum"]++;
	}
	
	function endElement($parser, $name){
		global $currentTag, $currentAtr;
		
		$currentTag = "";
		$currentAtr = "";
	}
	
	function characterData($parser, $data){
		global $currentTag, $currentAtr, $db, $dbprefix;
		
		if ($currentTag == "TITLE"){
			$GLOBALS["plugindata"]["title"] = $data;
			
		} elseif ($currentTag == "AUTHOR"){
			$GLOBALS["plugindata"]["author"] = $data;
			
		} elseif ($currentTag == "VERSION"){
			$GLOBALS["plugindata"]["version"] = $data;
			
		} elseif ($currentTag == "CODEBLOCK"){
			
			$GLOBALS["plugindata"]["code"][$GLOBALS["tagnum"]]["location"] = $currentAtr["LOCATION"];
			$GLOBALS["plugindata"]["code"][$GLOBALS["tagnum"]]["code"] .= $data;
			$GLOBALS["row"]++;
		}
	}
	
	// start up the parser
	$p = xml_parser_create();
	xml_set_element_handler($p, "startElement", "endElement");
	xml_set_character_data_handler($p, "characterData");
	$currentTag = "";
	$currentAtr = "";
	
	// open the file
	$filepath = $xmlfile["tmp_name"];
	if (!($fp = fopen($filepath, "r"))) {
	   return "could not open XML input";
	}
	
	// read the file
	while ($data = fread($fp, 4096)) {
		if (!xml_parse($p, $data, feof($fp))) {
			return sprintf("XML error: %s at line %d",
				xml_error_string(xml_get_error_code($xml_parser)),
				xml_get_current_line_number($xml_parser));
		}
	}
	
	// free up memory
	xml_parser_free($p);
	
	// now process data
	if ($GLOBALS["plugindata"]["title"] == ""){ return "The plugin did not contain a valid title"; }
	if ($GLOBALS["plugindata"]["author"] == ""){ $GLOBALS["plugindata"]["author"] = "Unknown"; }
	
	// validate version
	if (!(preg_match("/^([0-9]+).([0-9]+).([0-9]+)$/", $GLOBALS["plugindata"]["version"]))){
		return "The plugin contained an invalid version number";
	}
	
	// should it be enabled?
	$enabled = intval($enabled);
	if ($enabled < 0 || $enabled > 1){ $enabled = 1; }
	
	// ok, insert the plugin
	$sql  = "INSERT INTO " . $dbprefix . "plugin_plugins (title, author, version, enabled) VALUES (";
	$sql .= "'" . addslashes($GLOBALS["plugindata"]["title"]) . "', ";
	$sql .= "'" . addslashes($GLOBALS["plugindata"]["author"]) . "', ";
	$sql .= "'" . addslashes($GLOBALS["plugindata"]["version"]) . "', ";
	$sql .= $enabled . ")";
	$db->execute($sql);
	
	// get pluginid
	$pluginid = $db->insertid;
	
	// now insert the code
	for ($i = 1; $i <= $GLOBALS["tagnum"]; $i++){
		$locationid = intval($GLOBALS["plugindata"]["code"][$i]["location"]);
		$codeblock  = $GLOBALS["plugindata"]["code"][$i]["code"];
		
		if ($locationid > 0 && $codeblock != ""){
		
			$sql  = "INSERT INTO " . $dbprefix . "plugin_code (pluginid, locationid, code) VALUES (";
			$sql .= $pluginid . ", ";
			$sql .= $locationid . ", ";
			$sql .= "'" . addslashes(stripcslashes(html_entity_decode($codeblock))) . "')";
			$db->execute($sql);
		
		}
	}
	
	// probably worked by now
	return "Plugin installed successfully!";
}

function toggleplugin($pluginid){
	global $db, $dbprefix;
	
	// standard validation
	$pluginid = intval($pluginid);
	
	// recordset
	$sql = "SELECT * FROM " . $dbprefix . "plugin_plugins WHERE pluginid = " . $pluginid;
	$rec = $db->execute($sql);
	if ($rec->rows < 1){ return "Unable to locate the plugin"; }
	
	// new value
	if ($rec->fields["enabled"] == 1){
		$enabled = 0;
	} else {
		$enabled = 1;
	}
	
	// update
	$sql  = "UPDATE " . $dbprefix . "plugin_plugins SET enabled = " . $enabled;
	$sql .= " WHERE pluginid = " . $pluginid;
	$db->execute($sql);
	
	// and return
	return false;
}
?>