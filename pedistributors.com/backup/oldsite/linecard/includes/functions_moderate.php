<?php
// moderation functions
function visible($topicid){
	global $db, $dbprefix;
	
	if ($topicid === 0){ return "Cannot toggle top category"; }
	if ($topicid == ""){ return "No topic number supplied"; }
	
	$sql = "SELECT * FROM " . $dbprefix . "topics WHERE topicid = " . dbSecure($topicid);
	$rec = $db->execute($sql);
	if ($rec->rows < 1){ return "The topic could not be found"; }
	
	if ($rec->fields["visible"] == 0){
		$newv = 1;
		$text = "Topic has been set to visible";
	} else {
		$newv = 0;
		$text = "Topic has been set to invisible";
	}
	
	$sql = "UPDATE " . $dbprefix . "topics SET visible = " . $newv . " WHERE topicid = " . $rec->fields["topicid"];
	$db->execute($sql);
	
	return $text;
}

function addtopic($parent, $title, $visible = 1, $keywords = "", $description = "", $rules = ""){
	global $db, $dbprefix;
	
	// standard validation
	if ($title == ""){ return "No title supplied"; }
	$parent = intval($parent);
	
	if ($parent > 0){
		$sql = "SELECT * FROM " . $dbprefix . "topics WHERE topicid = " . dbSecure($parent);
		$chk = $db->execute($sql);
		if ($chk->rows < 1){ return "Parent topic not found"; }
	}
	
	// work out vinsibility
	$visible = intval($visible);
	if ($visible > 1){ $visible = 1; }
	if ($visible < 0){ $visible = 0; }
	
	// check for same name topic
	$sql = "SELECT * FROM " . $dbprefix . "topics WHERE parent = " . dbSecure($parent) . " AND title = '" . dbSecure($title) . "'";
	$chk = $db->execute($sql);
	if ($chk->rows > 0){ return "This topic already exists"; }
	
	// else, insert the topic
	$sql  = "INSERT INTO " . $dbprefix ."topics (parent, visible, title, keywords, description, rules) VALUES (";
	$sql .= $parent . ", ";
	$sql .= $visible . ", ";
	$sql .= "'" . dbSecure(str_replace("_", " ", $title)) . "', ";
	$sql .= "'" . dbSecure($keywords) . "', ";
	$sql .= "'" . dbSecure($description) . "', ";
	$sql .= "'" . dbSecure($rules) . "')";
	$db->execute($sql);
	
	// and return (ref: index.php
	return "Topic created successfully!";
}

function edittopic($topicid, $title, $parent, $visible, $keywords = "", $description = "", $rules = ""){
	global $db, $dbprefix;
	
	$topicid = intval($topicid);
	$parent  = intval($parent);
	$visible = intval($visible);
	
	if ($title == ""){ return "No title entered"; }
	
	$sql = "SELECT * FROM " . $dbprefix . "topics WHERE topicid = " . $topicid;
	$rec = $db->execute($sql);
	if ($rec->rows < 1){ return "Unable to locate topic"; }
	
	if ($parent > 0){
		$sql = "SELECT * FROM " . $dbprefix . "topics WHERE topicid = " . $parent;
		$chk = $db->execute($sql);
		if ($chk->rows < 1){ return "Parent topic could not be found"; }
		
		// make sure it isn't it's own parent
		if ($topicid == $parent){ return "You cannot set the topic as it's own parent!"; }
		
		// make sure it isn't in it's own downline
		function getdownline($parent){
			global $db, $dbprefix;
			$stack = Array();
			$sql = "SELECT * FROM " . $dbprefix . "topics WHERE parent = " . dbSecure($parent);
			$dwn = $db->execute($sql);
			if ($dwn->rows > 0){ do {
				if (!isset($stack)){ $stack = Array(); }
				array_push($stack, $dwn->fields["topicid"]);
				$stack = getdownline($dwn->fields["topicid"]);
			} while ($dwn->loop()); }
			return $stack;
		}
		
		$stack = getdownline($topicid);
		
		// and search the downline array
		if (!(array_search($parent, $stack) === FALSE)){
			return "The parent topic you selected is a child topic of this topic!";
		}
	}
	
	// validate visibility
	if ($visible < 0 || $visible > 1){
		$visible = 0;
	}
	
	// ok, update the topic
	$sql  = "UPDATE " . $dbprefix . "topics SET ";
	$sql .= "title = '" . dbSecure(str_replace("_", " ", $title)) . "', ";
	$sql .= "keywords = '" . dbSecure($keywords) . "', ";
	$sql .= "description = '" . dbSecure($description) . "', ";
	$sql .= "rules = '" . dbSecure($rules) . "', ";
	$sql .= "parent = " . $parent . ", ";
	$sql .= "visible = " . $visible . " ";
	$sql .= "WHERE topicid = " . $topicid;
	$db->execute($sql);
	
	// handle changes of URL
	if ($rec->fields["title"] <> $title || $parent <> $rec->fields["parent"]){
		// URL has changed, redirect
		redirect(fetchurl($rec->fields["topicid"]));
	}
	
	// and return
	return "Topic updated successfully!";
}

function deletetopic($topicid){
	global $db, $dbprefix;
	
	// standard validation
	$topicid = intval($topicid);
	if ($topicid < 1){ return "Topic could not be found or was root topic"; }
	
	// get recordset for topic
	$sql = "SELECT * FROM " . $dbprefix . "topics WHERE topicid = " . $topicid;
	$top = $db->execute($sql);
	if ($top->rows < 1){ return "The topic could not be located"; }
	
	// set up the variables
	$row  = 0;
	$cur  = 1;
	$scan = array();
	array_push($scan, $topicid);
	
	// begin the loop thing
	while ($row < $cur){
		$sql = "SELECT * FROM " . $dbprefix . "topics WHERE parent = " . $scan[$row];
		$rec = $db->execute($sql);
		if ($rec->rows > 0){ do {
			
			array_push($scan, $rec->fields["topicid"]);
			
		} while ($rec->loop()); }
		
		$row++;
		$cur = count($scan);
	}
	
	// have all IDs, post-processing
	foreach($scan as $e){
		$x .= "|" . $e;
	} $x = substr($x, 1);
	
	// now we have all ID's, delete links
	$sql = "DELETE FROM " . $dbprefix . "links WHERE topicid REGEXP '^(" . $x . ")$'";
	$db->execute($sql);
	
	// and delete all the topics
	$sql = "DELETE FROM " . $dbprefix . "topics WHERE topicid REGEXP '^(" . $x . ")$'";
	$db->execute($sql);
	
	// redirect one level up
	redirect(fetchurl($top->fields["parent"]));
}

function addlink($topicid, $title, $description, $url, $priority){
	global $db, $dbprefix;
	
	$topicid = intval($topicid);
	if ($title == ""){ return "No title entered"; }
	if ($url == "" || $url == "http://"){ return "No URL entered"; }
	$priority = intval($priority);
	
	// validate topic exists
	if ($topicid > 0){
		$sql = "SELECT * FROM " . $dbprefix . "topics WHERE topicid = " . dbSecure($topicid);
		$chk = $db->execute($sql);
		if ($chk->rows < 1){ return "The topic could not be found"; }
	} else {
		return "Links need to be in a topic";
	}
	
	// and insert the link
	$sql  = "INSERT INTO " . $dbprefix . "links (topicid, priority, postdate, website, description, url) VALUES (";
	$sql .= dbSecure($topicid) . ", ";
	$sql .= dbSecure($priority) . ", ";
	$sql .= time() . ", ";
	$sql .= "'" . dbSecure($title) . "', ";
	$sql .= "'" . dbSecure($description) . "', ";
	$sql .= "'" . dbSecure($url) . "')";
	$db->execute($sql);
	
	// and return (ref: index.php)
	return "Link added successfully!";
}

function deletelink($linkid){
	global $db, $dbprefix;
	
	$linkid = intval($linkid);
	
	$sql = "DELETE FROM " . $dbprefix . "links WHERE linkid = " . dbSecure($linkid);
	$db->execute($sql);
	
	# ref: functions.js
	return "Link deleted successfully!";
}

function editlink($linkid, $title, $description, $url, $priority, $topicid){
	global $db, $dbprefix;
	
	// standard validation
	$linkid = intval($linkid);
	$priority = intval($priority);
	$topicid = intval($topicid);
	
	if ($title == ""){ return "You did not enter a title"; }
	if ($url == ""){ return "You did not enter a URL"; }
	
	// validate topic exists
	$sql = "SELECT * FROM " . $dbprefix . "topics WHERE topicid = " . $topicid;
	$chk = $db->execute($sql);
	if ($chk->rows < 1){ return "Unable to locate the topic"; }
	
	// make sure link exists
	$sql = "SELECT * FROM " . $dbprefix . "links WHERE linkid = " . $linkid;
	$rec = $db->execute($sql);
	if ($rec->rows < 1){ return "The link could not be found"; }
	
	// and run the update
	$sql  = "UPDATE " . $dbprefix . "links SET ";
	$sql .= "website = '" . dbSecure($title) . "', ";
	$sql .= "description = '" . dbSecure($description) . "', ";
	$sql .= "url = '" . dbSecure($url) . "', ";
	$sql .= "priority = " . dbSecure($priority) . ", ";
	$sql .= "topicid = " . dbSecure($topicid) . " WHERE ";
	$sql .= "linkid = " . dbSecure($linkid);
	$db->execute($sql);
	
	// finally return, ref: functions.js
	return "Link updated successfully!";
}

function editqueue($queueid, $title, $description = "", $url, $email = "", $topicid){
	global $db, $dbprefix;
	
	// standard validation
	$queueid = intval($queueid);
	$topicid = intval($topicid);
	
	if ($title == ""){ return "You did not enter a title"; }
	if ($url == ""){ return "You did not enter a URL"; }
	
	// validate topic exists
	$sql = "SELECT * FROM " . $dbprefix . "topics WHERE topicid = " . dbSecure($topicid);
	$chk = $db->execute($sql);
	if ($chk->rows < 1){ return "Unable to locate the topic"; }
	
	// make sure link exists
	$sql = "SELECT * FROM " . $dbprefix . "queue WHERE queueid = " . dbSecure($queueid);
	$rec = $db->execute($sql);
	if ($rec->rows < 1){ return "The link could not be found"; }
	
	// and run the update
	$sql  = "UPDATE " . $dbprefix . "queue SET ";
	$sql .= "website = '" . dbSecure($title) . "', ";
	$sql .= "description = '" . dbSecure($description) . "', ";
	$sql .= "url = '" . dbSecure($url) . "', ";
	$sql .= "email = '" . dbSecure($email) . "', ";
	$sql .= "topicid = " . dbSecure($topicid) . " WHERE ";
	$sql .= "queueid = " . dbSecure($queueid);
	$db->execute($sql);
	
	// finally return (ref: functions.js)
	return "Link updated successfully!";
}

function editnewtopic($newtopicid, $title, $email = "", $topicid, $description = ""){
	global $db, $dbprefix;
	
	// standard validation
	$newtopicid = intval($newtopicid);
	$topicid = intval($topicid);
	
	if ($title == ""){ return "You did not enter a title"; }
	
	// validate topic exists
	$sql = "SELECT * FROM " . $dbprefix . "topics WHERE topicid = " . dbSecure($topicid);
	$chk = $db->execute($sql);
	if ($chk->rows < 1){ return "Unable to locate the parent topic"; }
	
	// make sure link exists
	$sql = "SELECT * FROM " . $dbprefix . "newtopics WHERE newtopicid = " . dbSecure($newtopicid);
	$rec = $db->execute($sql);
	if ($rec->rows < 1){ return "The suggested topic could not be found"; }
	
	// and run the update
	$sql  = "UPDATE " . $dbprefix . "newtopics SET ";
	$sql .= "title = '" . dbSecure($title) . "', ";
	$sql .= "description = '" . dbSecure($description) . "', ";
	$sql .= "email = '" . dbSecure($email) . "', ";
	$sql .= "topicid = " . dbSecure($topicid) . " WHERE ";
	$sql .= "newtopicid = " . dbSecure($newtopicid);
	$db->execute($sql);
	
	// finally return (ref: functions.js)
	return "Topic updated successfully!";
}
?>