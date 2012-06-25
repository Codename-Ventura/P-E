<?php
function archivecode($skinid, $filename, $code){
	// requires code to be without slashes!
	global $db, $dbprefix;
	
	// standard validation
	if ($filename == ""){ return "No template name supplied"; }
	if ($code == ""){ return "I'm not archiving an empty template!"; }
	$skinid = intval($skinid);
	
	// validate the skin
	$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE skinid = " . $skinid;
	$skn = $db->execute($sql);
	if ($skn->rows < 1){ return "Skinset could not be found"; }
	
	// validate differences
	$sql = "SELECT * FROM " . $dbprefix . "skinhistory WHERE skinid = " . $skn->fields["skinid"] . " AND filename = '" . dbSecure($filename) . "' ORDER BY postdate DESC LIMIT 0, 1";
	$las = $db->execute($sql);
	if ($las->rows > 0){
		// there is a previous copy
		if ($code == $las->fields["code"]){
			// code is identical
			return "Not archiving, as code is identical to last save";
		}
	}
	
	// insert the code
	$sql  = "INSERT INTO " . $dbprefix . "skinhistory (postdate, skinid, filename, code) VALUES (";
	$sql .= time() . ", ";
	$sql .= $skn->fields["skinid"] . ", ";
	$sql .= "'" . dbSecure($filename) . "', ";
	$sql .= "'" . addslashes($code) . "')";
	$db->execute($sql);
	
	// and return
	return "Archived copy created successfully!";
}

function createskin($title, $copyfrom, $visible){
	global $db, $dbprefix;
	
	// standard validation
	if ($title == ""){ return "You did not enter a title"; }
	$copyfrom = intval($copyfrom);
	
	// check title
	$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE title = '" . dbSecure($title) . "'";
	$tit = $db->execute($sql);
	if ($tit->rows > 0){ return "This title is already in use"; }
	
	// visibility
	if ($visible == "1"){
		$visible = 1;
	} else {
		$visible = 0;
	}
	
	// copy from somewhere?
	if ($copyfrom > 0){
		$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE skinid = " . $copyfrom;
		$rec = $db->execute($sql);
		
		if ($rec->rows > 0){
			$d_imagesdir = $rec->fields["imagesdir"];
			$d_css = $rec->fields["css"];
		}
	}
	
	// and insert it
	$sql  = "INSERT INTO " . $dbprefix . "skinsets (title, imagesdir, css, visible) VALUES (";
	$sql .= "'" . dbSecure($title) . "', ";
	$sql .= "'" . dbSecure($d_imagesdir) . "', ";
	$sql .= "'" . dbSecure($d_css) . "', ";
	$sql .= $visible . ")";
	$db->execute($sql);
	
	// and return
	return "Skinset created sucessfully!";
}

function deleteskin($skinid){
	global $config, $db, $dbprefix;
	
	// standard validation
	$skinid = intval($skinid);
	
	// validation thing
	$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE skinid = " . $skinid;
	$rec = $db->execute($sql);
	if ($rec->rows < 1){ return "The skinset could not be found"; }
	
	// check it isn't Particle Blue
	if ($skinid == 1){ return "Sorry, you can't delete the skin with ID #1. You can however make it invisible to users."; }
	
	// check for being default skin
	if ($rec->fields["skinid"] == intval($config["defaultskin"])){
		return "You cannot delete this skin while it is set as the default";
	}
	
	// check for only one skin
	$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE visible = 1 AND skinid != " . $skinid;
	$chk = $db->execute($sql);
	if ($chk->rows < 1){ return "Unable to delete as no other skins are available to users"; }
	
	// let's delete all the files
	$sql = "DELETE FROM " . $dbprefix . "skinfiles WHERE skinid = " . $rec->fields["skinid"];
	$db->execute($sql);
	
	// now lets delete all the historical entries
	$sql = "DELETE FROM " . $dbprefix . "skinhistory WHERE skinid = " . $rec->fields["skinid"];
	$db->execute($sql);
	
	// and delete the skinset
	$sql = "DELETE FROM " . $dbprefix . "skinsets WHERE skinid = " . $rec->fields["skinid"];
	$db->execute($sql);
	
	// and redirect
	redirect("admin_skins.php");
}

function editskin($skinid, $title, $imagesdir, $visible, $css){
	global $config, $db, $dbprefix;
	
	// standard validation
	if ($title == ""){ return "You did not enter a title"; }
	
	// validate the skinset existance
	$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE skinid = " . dbSecure($skinid);
	$rec = $db->execute($sql);
	if ($rec->rows < 1){ return "The skinset could not be found"; }
	
	// check title
	$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE title = '" . dbSecure($title) . "' AND skinid <> " . $rec->fields["skinid"];
	$tit = $db->execute($sql);
	if ($tit->rows > 0){ return "This title is already in use"; }
	
	// work out skin value
	if ($visible == "1"){
		$visible = 1;
	} else {
		$visible = 0;
	}
	
	// check visibility issues
	if ($visible == 0){
		// check for only one skin
		$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE visible = 1 AND skinid != " . $skinid;
		$chk = $db->execute($sql);
		if ($chk->rows < 1){ return "Unable to set as invisible as no other skins are available to users"; }
	}
	
	// check for being default skin
	if (($visible == 0) && ($rec->fields["skinid"] == intval($config["defaultskin"]))){
		return "You cannot set the default skin to invisible";
	}
	
	// and let us update
	$sql  = "UPDATE " . $dbprefix . "skinsets SET ";
	$sql .= "title = '" . dbSecure($title) . "', ";
	$sql .= "imagesdir = '" . dbSecure($imagesdir) . "', ";
	$sql .= "visible = " . dbSecure($visible) . ", ";
	$sql .= "css = '" . dbSecure($css) . "' ";
	$sql .= "WHERE skinid = " . dbSecure($skinid);
	$db->execute($sql);
	
	// and return
	return "Skinset updated successfully";
}

function edittemplate($skinid, $filename, $code){
	global $db, $dbprefix;
	
	// standard validation
	$skinid = intval($skinid);
	if ($filename == ""){ return "No template name entered"; }
	
	// validate existance of template
	$sql = "SELECT * FROM " . $dbprefix . "skinfiles WHERE skinid = " . dbSecure($skinid) . " AND filename = '" . dbSecure($filename) . "'";
	$rec = $db->execute($sql);
	
	if ($rec->rows < 1){
	
		// newly customised, insert entry
		$sql  = "INSERT INTO " . $dbprefix . "skinfiles (skinid, filename, code) VALUES (";
		$sql .= $skinid . ", ";
		$sql .= "'" . dbSecure($filename) . "', ";
		$sql .= "'" . dbSecure($code) . "')";
		$db->execute($sql);
	
	} else {
	
		// make an archive of the old one
		archivecode($skinid, $filename, un($code));
		
		// update the template
		$sql  = "UPDATE " . $dbprefix . "skinfiles SET ";
		$sql .= "code = '" . dbSecure($code) . "' ";
		$sql .= "WHERE fileid = " . $rec->fields["fileid"];
		$db->execute($sql);
	
	}
	
	// finally return
	return "Template edited successfully";
}

function newtemplate($skinid, $filename, $code){
	global $db, $dbprefix;
	
	// standard validation
	$skinid = intval($skinid);
	if ($filename == ""){ return "You did not enter a name for the template"; }
	
	// validate the skinset
	$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE skinid = " . dbSecure($skinid);
	$skn = $db->execute($sql);
	if ($skn->rows < 1){ return "The skinset could not be found"; }
	
	// check there isn't one already
	$sql = "SELECT * FROM " . $dbprefix . "skinfiles WHERE skinid = " . $skn->fields["skinid"] . " AND filename = '" . dbSecure($filename) . "'";
	$chk = $db->execute($sql);
	if ($chk->rows > 0){ return "A template with this name already exists"; }
	
	// check base files
	$sql = "SELECT * FROM " . $dbprefix . "skinbase WHERE filename = '" . dbSecure($filename) . "'";
	$chk = $db->execute($sql);
	if ($chk->rows > 0){ return "This template name is a base template name, either pick a different name or customise the existing template"; }
	
	// and run the insert
	$sql  = "INSERT INTO " . $dbprefix . "skinfiles (skinid, filename, code) VALUES (";
	$sql .= $skn->fields["skinid"] . ", ";
	$sql .= "'" . dbSecure($filename) . "', ";
	$sql .= "'" . dbSecure($code) . "')";
	$db->execute($sql);
	
	// finally return (ref: admin_newtemplate.php)
	return "Template added successfully!";
}

function reverttemplate($skinid, $filename){
	global $db, $dbprefix;
	
	// standard validation
	$skinid = intval($skinid);
	
	// validate the existance of the template
	$sql = "SELECT * FROM " . $dbprefix . "skinfiles WHERE skinid = " . $skinid . " AND filename = '" . dbSecure($filename) . "'";
	$fil = $db->execute($sql);
	if ($fil->rows < 1){ return "This template has not been customised"; }
	
	// now archive a copy of it
	archivecode($skinid, $filename, $fil->fields["code"]);
	
	// and remove template
	$sql = "DELETE FROM " . $dbprefix . "skinfiles WHERE fileid = " . $fil->fields["fileid"];
	$db->execute($sql);
	
	// and return
	return "Template reverted successfully!";
}

function toggleskin($skinid){
	global $config, $db, $dbprefix;
	
	// standard validation
	$skinid = intval($skinid);
	
	// recordset
	$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE skinid = " . $skinid;
	$rec = $db->execute($sql);
	if ($rec->rows < 1){ return "Unable to locate the skinset"; }
	
	// new value
	if ($rec->fields["visible"] == 1){
		$visible = 0;
	} else {
		$visible = 1;
	}
	
	// check visibility issues
	if ($visible == 0){
		// check for only one skin
		$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE visible = 1 AND skinid != " . $skinid;
		$chk = $db->execute($sql);
		if ($chk->rows < 1){ return "Unable to set as invisible as no other skins are available to users"; }
	}
	
	// check for being default skin
	if (($visible == 0) && ($rec->fields["skinid"] == intval($config["defaultskin"]))){
		return "You cannot set the default skin to invisible";
	}
	
	// update
	$sql  = "UPDATE " . $dbprefix . "skinsets SET visible = " . $visible;
	$sql .= " WHERE skinid = " . $skinid;
	$db->execute($sql);
	
	// and return
	return false;
}
?>