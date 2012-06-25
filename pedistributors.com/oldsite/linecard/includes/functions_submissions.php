<?php
// functions for user submissions and moderation
function suggestsite($topicid, $title, $url, $description, $email = ""){
	global $db, $dbprefix, $config, $phrase;
	
	$topicid = intval($topicid);
	if ($title == ""){ return $phrase["submit_notitle"]; }
	if ($url == "" || $url == "http://"){ return $phrase["submit_nourl"]; }
	
	if ($config["requiredescription"] == "true"){
		if ($description == ""){ return $phrase["submit_nodescription"]; }
	}
	
	// validate topic
	$sql = "SELECT * FROM " . $dbprefix . "topics WHERE topicid = " . dbSecure($topicid);
	$top = $db->execute($sql);
	if ($top->rows < 1){ return $phrase["submit_missingtopic"]; }
	
	// check for it being in the directory
	if ($config["allowduplicateurls"] <> "true"){
		$sql = "SELECT * FROM  " . $dbprefix . "links WHERE url = '" . dbSecure($url) . "'";
	} else {
		$sql = "SELECT * FROM  " . $dbprefix . "links WHERE url = '" . dbSecure($url) . "' AND topicid = " . $top->fields["topicid"];
	}
	
	$chk = $db->execute($sql); // run the actual check
	if ($chk->rows > 0){ return $phrase["submit_urlindirectory"]; }
	
	// no double submissions
	$sql = "SELECT * FROM  " . $dbprefix . "queue WHERE url = '" . dbSecure($url) . "'";
	$chk = $db->execute($sql);
	if ($chk->rows > 0){ return $phrase["submit_urlinqueue"]; }
	
	// ok, insert into the queue
	$sql  = "INSERT INTO " . $dbprefix . "queue (postdate, topicid, website, url, description, email, ip) VALUES (";
	$sql .= time() . ", ";
	$sql .= dbSecure($topicid) . ", ";
	$sql .= "'" . dbSecure($title) . "', ";
	$sql .= "'" . dbSecure($url) . "', ";
	$sql .= "'" . dbSecure($description) . "', ";
	$sql .= "'" . dbSecure($email) . "', ";
	$sql .= "'" . dbSecure($_SERVER["REMOTE_ADDR"]) . "')";
	$db->execute($sql);
	
	// and return
	return $phrase["submit_success"];
}

function considersite($queueid, $act){
	global $db, $dbprefix, $phrase;
	
	if ($act == ""){ return "No action specified"; }
	
	$sql = "SELECT * FROM " . $dbprefix . "queue WHERE queueid = " . dbSecure($queueid);
	$rec = $db->execute($sql);
	if ($rec->rows < 1){ return "Unable to locate site in the queue"; }
	
	// work out the response
	if ($act == "accept"){
		// site has been accepted
		$sql  = "INSERT INTO " . $dbprefix . "links (topicid, postdate, website, description, url) VALUES (";
		$sql .= addslashes($rec->fields["topicid"]) . ", ";
		$sql .= time() . ", ";
		$sql .= "'" . addslashes($rec->fields["website"]) . "', ";
		$sql .= "'" . addslashes($rec->fields["description"]) . "', ";
		$sql .= "'" . addslashes($rec->fields["url"]) . "')";
		$db->execute($sql);
		
		$sql = "DELETE FROM " . $dbprefix . "queue WHERE queueid = " . $rec->fields["queueid"];
		$db->execute($sql);
		
		notifysite($phrase["submit_accepted"], $rec->fields["website"], $rec->fields["email"]);
		return "Site has been accepted";
		
	} elseif ($act == "reject"){
		// site has been rejected
		$sql = "DELETE FROM " . $dbprefix . "queue WHERE queueid = " . $rec->fields["queueid"];
		$db->execute($sql);
		
		notifysite($phrase["submit_rejected"], $rec->fields["website"], $rec->fields["email"]);
		return "Site has been rejected";
	} else {
		return "Unknown action";
	}
}

function notifysite($msg, $website, $email = "", $usebody = 1){
	global $config, $phrase;
	
	if ($email == ""){ return false; }
	if ($config["notifyuser"] <> "true"){ return false; }
	
	// build headers
	$headers = "From: \"" . $config["sitename"] . "\"\r\n\r\n";
	
	// build the body
	if ($usebody == 2){
		$body = $phrase["submit_topic_email"];
	} else {
		$body = $phrase["submit_emailbody"];
	}
	
	// parse the body
	$body = str_replace("{SITENAME}", $config["sitename"], $body);
	$body = str_replace("{TOPICNAME}", $config["sitename"], $body);
	$body = str_replace("{WEBSITE}", $website, $body);
	$body = str_replace("{MSG}", $msg, $body);
	
	// send the email
	mail($email, $config["sitename"] . " " . $phrase["submit_submission"], $body, $headers);
}

// functions for topic suggestions
function suggesttopic($topicid, $title, $email = "", $description = ""){
	global $db, $dbprefix, $phrase;
	
	$topicid = intval($topicid);
	if ($title == ""){ return $phrase["submit_notitle"]; }
	
	// check the topic exists
	$sql = "SELECT * FROM " . $dbprefix . "topics WHERE topicid = " . dbSecure($topicid);
	$top = $db->execute($sql);
	if ($top->rows < 1){ return $phrase["submit_missingtopic"]; }
	
	// check for an existing sub-topic
	$sql = "SELECT * FROM " . $dbprefix . "topics WHERE parent = " . dbSecure($topicid) . " AND title = '" . dbSecure($title) . "'";
	$chk = $db->execute($sql);
	if ($chk->rows > 0){ return $phrase["submit_topicexists"]; }
	
	// and insert the topic
	$sql  = "INSERT INTO " . $dbprefix . "newtopics (topicid, postdate, title, email, description, ip) VALUES (";
	$sql .= "" . dbSecure($topicid) . ", ";
	$sql .= "" . time() . ", ";
	$sql .= "'" . dbSecure($title) . "', ";
	$sql .= "'" . dbSecure($email) . "', ";
	$sql .= "'" . dbSecure($description) . "', ";
	$sql .= "'" . dbSecure($_SERVER["REMOTE_ADDR"]) . "')";
	$db->execute($sql);
	
	// and return
	return $phrase["submit_topic_success"];
}

function considertopic($newtopicid, $act){
	global $db, $dbprefix, $phrase;
	
	if ($act == ""){ return "No action specified"; }
	
	$sql = "SELECT * FROM " . $dbprefix . "newtopics WHERE newtopicid = " . dbSecure(intval($newtopicid));
	$rec = $db->execute($sql);
	if ($rec->rows < 1){ return "Unable to locate topic in the queue"; }
	
	// work out the response
	if ($act == "accept"){
		// site has been accepted
		$sql  = "INSERT INTO " . $dbprefix . "topics (parent, title, description) VALUES (";
		$sql .= addslashes($rec->fields["topicid"]) . ", ";
		$sql .= "'" . addslashes($rec->fields["title"]) . "', ";
		$sql .= "'" . addslashes($rec->fields["description"]) . "')";
		$db->execute($sql);
		
		$sql = "DELETE FROM " . $dbprefix . "newtopics WHERE newtopicid = " . $rec->fields["newtopicid"];
		$db->execute($sql);
		
		notifysite($phrase["submit_accepted"], $rec->fields["title"], $rec->fields["email"], 2);
		return "Topic has been accepted";
		
	} elseif ($act == "reject"){
		// site has been rejected
		$sql = "DELETE FROM " . $dbprefix . "newtopics WHERE newtopicid = " . $rec->fields["newtopicid"];
		$db->execute($sql);
		
		notifysite($phrase["submit_rejected"], $rec->fields["title"], $rec->fields["email"], 2);
		return "Topic has been rejected";
	} else {
		return "Unknown action";
	}
}
?>