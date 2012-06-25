<?php
// admin functions
function versioninfo(){
	global $config;
	
	$result = @file("http://ping.particlesoft.net/getlatest/particlelinks.txt");
	if (!$result){
		$txt = "Unable to get version information";
	} else {
		$version  = intval($result[0]);
		$tversion = intval($config["versionint"]);
		
		if ($version > $tversion){
			$txt = "There is a newer version of the script available";
		} elseif ($version == $tversion){
			$txt = "You are running the latest version";
		} else {
			$txt = "You appear to be running an unreleased version";
		}
	}
	
	return $txt;
}

function updateconfig(){
	global $db, $dbprefix;
	
	$sql = "SELECT * FROM " . $dbprefix . "config WHERE config_help <> ''";
	$rec = $db->execute($sql);
	do {
	
		$sql  = "UPDATE " . $dbprefix . "config SET config_value = ";
		$sql .= "'" . dbSecure($_POST[$rec->fields["config_name"]]) . "' ";
		$sql .= " WHERE config_name = '" . dbSecure($rec->fields["config_name"]) . "'";
		$db->execute($sql);
	
	} while ($rec->loop());
	
	// and return
	return "Config updated successfully!";
}

function flushwebsites(){
	global $db, $dbprefix, $usr;
	
	if ($usr->Access < 2){ return "Admin only!"; }
	
	$sql = "DELETE FROM " . $dbprefix . "queue";
	$db->execute($sql);
	
	return "Website queue flushed successfully!";
}

function flushtopics(){
	global $db, $dbprefix, $usr;
	
	if ($usr->Access < 2){ return "Admin only!"; }
	
	$sql = "DELETE FROM " . $dbprefix . "newtopics";
	$db->execute($sql);
	
	return "Topic queue flushed successfully!";
}

// for removing old archived templates
function clearhistory($days){
	global $db, $dbprefix;
	
	$days = (intval($days) * 86400);
	
	$old = (time() - $days);
	
	// clear them out
	$sql = "DELETE FROM " . $dbprefix . "skinhistory WHERE postdate < " . $old;
	$db->execute($sql);
	
	// and return
	return "Archives older than " . date("j F Y", $old) . " cleared!";
}
?>