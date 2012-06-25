<?php
function addphrase($phrase_name, $phrase_value){
	global $db, $dbprefix;
	
	// standard validation
	if ($phrase_name == ""){ return "You did not enter a name for the phrase"; }
	if ($phrase_value == ""){ return "You did not enter the phrase itself"; }
	
	// check name isn't being used
	$sql = "SELECT * FROM " . $dbprefix . "phrases WHERE phrase_name = '" . dbSecure($phrase_name) . "'";
	$rec = $db->execute($sql);
	if ($rec->rows > 0){ return "A phrase with this name already exists"; }
	
	// ok, run the insert
	$sql  = "INSERT INTO " . $dbprefix . "phrases (phrase_name, phrase_value) VALUES (";
	$sql .= "'" . dbSecure($phrase_name) . "', ";
	$sql .= "'" . dbSecure($phrase_value) . "')";
	$db->execute($sql);
	
	// and return (ref: admin_newphrase.php)
	return "Phrase added successfully!";
}

function editphrases(){
	global $db, $dbprefix;
	
	$sql = "SELECT * FROM " . $dbprefix . "phrases";
	$rec = $db->execute($sql);
	do {
	
	if ($_POST[$rec->fields["phraseid"]] <> ""){
	
		$sql  = "UPDATE " . $dbprefix . "phrases SET phrase_value = ";
		$sql .= "'" . dbSecure($_POST[$rec->fields["phraseid"]]) . "' ";
		$sql .= " WHERE phraseid = " . $rec->fields["phraseid"];
		$db->execute($sql);
	
	}
	
	} while ($rec->loop());
	
	// and return
	return "Phrases updated successfully!";
}

function export_language($title = ""){
	global $db, $dbprefix, $config;
	
	if ($title == ""){ $title = "Untitled"; }
	
	$sql = "SELECT * FROM "  . $dbprefix . "phrases ORDER BY phrase_name ASC";
	$rec = $db->execute($sql);
	if ($rec->rows < 1){ return "No phrases found"; }
	
	header("Content-type: text/xml\n\n");
	header("Content-Disposition: attachment; filename=" . $title . ".xml");
	
	echo("<?xml version=\"1.0\" ?>\n");
	echo("<languagepack>\n");
	echo("	<title>" . $title . "</title>\n");
	echo("	<software>Particle Links</software>\n");
	echo("	<version>" . $config["version"] . "</version>\n");
	echo("	<published>" . date("j F Y") . "</published>\n");
	echo("	<phrases>\n");
	
	do {
	echo("		<phrase name=\"" . $rec->fields["phrase_name"] . "\">" . addcslashes($rec->fields["phrase_value"], "\0..\37!@\@\177..\377") . "</phrase>\n");
	} while ($rec->loop());
	
	echo("	</phrases>\n");
	echo("</languagepack>");
	
	// kill script to prevent page being written
	die();
}

function import_language($xmlfile){
	global $db, $dbprefix;
	
	// setup reading functions
	function startElement($parser, $name, $attrs){
		global $currentTag, $currentAtr;
		
		$currentTag = $name;
		$currentAtr = $attrs;
	}
	
	function endElement($parser, $name){
		global $currentTag, $currentAtr;
		
		$currentTag = "";
		$currentAtr = "";
	}
	
	function characterData($parser, $data){
		global $currentTag, $currentAtr, $db, $dbprefix;
		
		if ($currentTag == "PHRASE"){
			// read this!
			$pname = $currentAtr["NAME"];
			
			if ($pname <> ""){
				// this has a name, let's do this thing
				$sql = "SELECT * FROM " . $dbprefix . "phrases WHERE phrase_name = '" . addslashes($pname) . "'";
				$phr = $db->execute($sql);
				if ($phr->rows > 0){
					// this is an update job
					$sql  = "UPDATE " . $dbprefix . "phrases SET phrase_value = '" . addslashes(stripcslashes($data)) . "' ";
					$sql .= "WHERE phrase_name = '" . addslashes($pname) . "'";
					$db->execute($sql);
				} else {
					// insert new phrase
					$sql  = "INSERT INTO " . $dbprefix . "phrases (phrase_name, phrase_value) VALUES ";
					$sql .= "'" . addslashes($pname) . "', ";
					$sql .= "'" . addslashes(stripcslashes($data)) . "')";
					$db->execute($sql);
				}
			}
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
	
	// probably worked by now
	return "Phrases imported successfully!";
}

function multilinephrase($phrase){
	global $db, $dbprefix;
	
	// check the phrase exists
	$sql = "SELECT * FROM " . $dbprefix . "phrases WHERE phrase_name = '" . dbSecure($phrase) . "'";
	$rec = $db->execute($sql);
	if ($rec->rows < 1){ return "The phrase could not be found"; }
	
	// run the update
	$sql  = "UPDATE " . $dbprefix . "phrases SET ";
	$sql .= "phrase_value = '" . addslashes($rec->fields["phrase_value"] . "\n") . "' ";
	$sql .= "WHERE phraseid = " . $rec->fields["phraseid"];
	$db->execute($sql);
	
	// and return
	return "Phrase made multi-line successfully!";
}
?>