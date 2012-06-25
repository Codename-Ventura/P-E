<?php
define("IN_SCRIPT", true);
require("includes/global.php");

// begin building breadcrumbs
$bread = '<a href="' . $config["topicpage"] . '">' . $phrase["top"] . '</a>';
$rlink = "";

// check for editor actions
if ($usr->Access > 0){
	
	// check for actions
	$editor_addlinks_error = false;
	$editor_edittopic_error = false;
	$editor_deletetopic_error = false;
	$editor_subtopics_default = false;
	$editor_visibility_error = false;
	
	if ($_GET["queueid"] <> ""){
		$errormsg = considersite($_GET["queueid"], $_GET["act"]);
	
	} elseif ($_GET["newtopicid"] <> ""){
		$errormsg = considertopic($_GET["newtopicid"], $_GET["nt_act"]);
	
	} elseif ($_POST["do"] == "editlink"){
		$errormsg = editlink($_POST["linkid"], $_POST["listing_title_" . $_POST["linkid"]], $_POST["listing_description_" . $_POST["linkid"]], $_POST["listing_url_" . $_POST["linkid"]], $_POST["listing_priority_" . $_POST["linkid"]], $_POST["listing_topic_" . $_POST["linkid"]]);
	
	} elseif ($_POST["do"] == "editqueue"){
		$errormsg = editqueue($_POST["queueid"], $_POST["url_title_" . $_POST["queueid"]], $_POST["url_description_" . $_POST["queueid"]], $_POST["url_url_" . $_POST["queueid"]], $_POST["url_email_" . $_POST["queueid"]], $_POST["url_topic_" . $_POST["queueid"]]);
	
	} elseif ($_POST["do"] == "editnewtopic"){
		$errormsg = editnewtopic($_POST["newtopicid"], $_POST["newtopic_title_" . $_POST["newtopicid"]], $_POST["newtopic_email_" . $_POST["newtopicid"]], $_POST["newtopic_parent_" . $_POST["newtopicid"]], $_POST["newtopic_description_" . $_POST["newtopicid"]]);
	
	} elseif ($_GET["deletelink"] <> ""){
		$errormsg = deletelink($_GET["deletelink"]);
	
	} elseif ($_POST["do"] == "addlink"){
		$editor_addlinks_error = true;
		$errormsg = addlink($_POST["topicid"], $_POST["title"], $_POST["description"], $_POST["url"], $_POST["priority"]);
		
		if ($errormsg != "Link added successfully!"){
			$d_editor_title = htmlspecialchars(un($_POST["title"]));
			$d_editor_description = htmlspecialchars(un($_POST["description"]));
			$d_editor_url = htmlspecialchars(un($_POST["url"]));
			$d_editor_priority = htmlspecialchars(un($_POST["priority"]));
		} else {
			$d_editor_url = "http://";
		}
		
	} elseif ($_POST["do"] == "addtopic"){
		$editor_subtopics_default = true;
		$errormsg = addtopic($_POST["topicid"], $_POST["title"], $_POST["visible"], $_POST["keywords"], $_POST["description"], $_POST["rules"]);
		
		if ($errormsg != "Topic created successfully!"){
			$d_subtopics_title = htmlspecialchars(un($_POST["title"]));
			$d_subtopics_keywords = htmlspecialchars(un($_POST["keywords"]));
			$d_subtopics_description = htmlspecialchars(un($_POST["description"]));
			$d_subtopics_rules = htmlspecialchars(un($_POST["rules"]));
			$d_subtopics_visible = intval($_POST["visible"]);
		} else {
			$d_subtopics_visible = 1;
		}
		
	} elseif ($_POST["act"] == "Toggle Visibility"){
		$editor_visibility_error = true;
		$errormsg = visible($_POST["topicid"]);
	
	} elseif ($_POST["do"] == "edittopic"){
		$editor_edittopic_error = true;
		$errormsg = edittopic($_POST["topicid"], $_POST["title"], $_POST["parent"], $_POST["visible"], $_POST["keywords"], $_POST["description"], $_POST["rules"]);
		
		// set default values
		$d_edittopic_title = htmlspecialchars(un($_POST["title"]));
		$d_edittopic_keywords = htmlspecialchars(un($_POST["keywords"]));
		$d_edittopic_description = htmlspecialchars(un($_POST["description"]));
		$d_edittopic_rules = htmlspecialchars(un($_POST["rules"]));
		$d_edittopic_visible = intval($_POST["visible"]);
		$d_edittopic_parent = intval($_POST["parent"]);
	
	} elseif ($_POST["do"] == "deletetopic"){
		$editor_deletetopic_error = true;
		$errormsg = deletetopic($_POST["topicid"]);
	
	}
	
	// work out which editor to show
	$exc["addlinks"] = "none";
	$exc["subtopics"] = "none";
	$exc["edittopic"] = "none";
	$exc["deletetopic"] = "none";
	
	$ext["addlinks"] = "editorboxtop";
	$ext["subtopics"] = "editorboxtop";
	$ext["edittopic"] = "editorboxtop";
	$ext["deletetopic"] = "editorboxtop";
	
	if ($_GET["editor"] <> ""){
		$exc[$_GET["editor"]] = "";
		$ext[$_GET["editor"]] = "editorboxtab";
	} elseif ($_GET["topic"] == ""){
		$exc["subtopics"] = "";
		$ext["subtopics"] = "editorboxtab";
	} else {
		$exc["addlinks"] = "";
		$ext["addlinks"] = "editorboxtab";
	}
}

// check for regular actions
if ($_POST["do"] == "suggesturl"){
	$errormsg = suggestsite($_POST["topicid"], $_POST["website"], $_POST["url"], $_POST["description"], $_POST["email"]);
	
	if ($errormsg != $phrase["submit_success"]){
		$d_suggesturl_title = htmlspecialchars(un($_POST["website"]));
		$d_suggesturl_url = htmlspecialchars(un($_POST["url"]));
		$d_suggesturl_description = htmlspecialchars(un($_POST["description"]));
		$d_suggesturl_email = htmlspecialchars(un($_POST["email"]));
	}
	
} elseif ($_POST["do"] == "suggesttopic"){
	$errormsg = suggesttopic($_POST["topicid"], $_POST["topic_title"], $_POST["email"], $_POST["description"]);
	
	if ($errormsg != $phrase["submit_topic_success"]){
		$d_suggesttopic_title = htmlspecialchars(un($_POST["topic_title"]));
		$d_suggesttopic_description = htmlspecialchars(un($_POST["description"]));
		$d_suggesttopic_email = htmlspecialchars(un($_POST["email"]));
	}
}

if ($_GET["topic"] <> ""){
	// browsing a topic
	$parent = 0;
	$topic  = $_GET["topic"];
	$cursor = explode("/", $topic);
	array_pop($cursor);
	
	// loop through path to get records
	foreach ($cursor as $t){
		$sql = "SELECT * FROM " . $dbprefix . "topics WHERE parent = " . dbSecure($parent) . " AND title = '" . dbSecure(d1($t)) . "'";
		$top = $db->execute($sql);
		if ($top->rows < 1){ notfound(); }
		$parent = $top->fields["topicid"];
		
		// build recordset
		$rlink .= d2($top->fields["title"]) . "/";
		$bread .= ' ' . $config["breadcrumb"] . ' <a href="' . $config["topicpage"] . $rlink . '">' . $top->fields["title"] . '</a>';
	}
	
	// set more variables?
	if ($editor_addlinks_error == FALSE){
		$d_editor_url = "http://";
	}
	
	if ($editor_subtopics_default == FALSE){
		$d_subtopics_visible = 1;
	}
	
	if ($editor_edittopic_error == FALSE){
		// edit topic defaults
		$d_edittopic_title = htmlspecialchars($top->fields["title"]);
		$d_edittopic_keywords = htmlspecialchars($top->fields["keywords"]);
		$d_edittopic_description = htmlspecialchars($top->fields["description"]);
		$d_edittopic_rules = htmlspecialchars($top->fields["rules"]);
		$d_edittopic_visible = $top->fields["visible"];
		$d_edittopic_parent = $top->fields["parent"];
	}
	
	// now get sub-topics recordset
	$vis = ($usr->Access > 0) ? 0 : 1;
	$sql = "SELECT * FROM " . $dbprefix . "topics WHERE parent = " . $top->fields["topicid"] . " AND visible >= " . $vis . " ORDER BY title ASC";
	$rec = $db->execute($sql);
	
	// and links recordset
	$sql = "SELECT * FROM " . $dbprefix . "links WHERE topicid = " . $top->fields["topicid"] . " ORDER BY priority DESC, website ASC";
	$web = $db->execute($sql);
	
	// put topic id in place
	$topicid = $top->fields["topicid"];
	
} else {
	
	// parent topics
	$vis = ($usr->Access > 0) ? 0 : 1;
	$sql = "SELECT * FROM " . $dbprefix . "topics WHERE parent = 0 AND visible >= " . $vis . " ORDER BY title ASC";
	$rec = $db->execute($sql);
	
	// put topic id in place
	$topicid = 0;
	
	// default values
	$d_subtopics_visible = 1;
}

// sub-topics half way point
if ($rec->rows > 0){
	$half = ceil($rec->rows / 2);
	$row  = 0;
}

// work out page title
if ($top){
	$pagetitle = $config["titleformat"];
	$pagetitle = str_replace("{SITENAME}", $config["sitename"], $pagetitle);
	$pagetitle = str_replace("{TOPICNAME}", $top->fields["title"], $pagetitle);
} else {
	$pagetitle = $config["sitename"];
}

// plugin location
eval(pluginspot(4));

// build a core URL
$root = $config["virtualpath"];
$core = $root . "index.php?topic=" . d2($_GET["topic"]);

// page header
include("includes/page_header.php");

// parse in variables
$t->set_var("TOPIC_ID", $topicid);
$t->set_var("LINK_TARGET", $config["linktarget"]);

// error message?
if ($errormsg <> ""){
	$t->set_file("top_error", "errormsg");
	$t->set_var("ERROR", $errormsg);
	$t->parse("ERRORMSG", "top_error");
}

// topic listings
if ($rec->rows > 0){
	
	// set up sub-topics file
	$t->set_file("topic_listings", "directory_topics");
	$t->set_file("topic_element", "element_list_topic");
	
	// parse in first half of topics
	do {
	
		$cssclass = ($rec->fields["visible"] == 1) ? '' : 'invisible';
		$marker   = ($rec->fields["visible"] == 1) ? '' : '*';
		
		$t->set_var("TOPIC_LINK", $config["topicpage"] . d2($topic . $rec->fields["title"]) . "/");
		$t->set_var("TOPIC_NAME", htmlspecialchars($rec->fields["title"]));
		$t->set_var("TOPIC_CLASS", $cssclass);
		$t->set_var("TOPIC_MARKER", $marker);
		
		if ($rec->fields["description"] != ""){
			$t->set_var("TOPIC_DESCRIPTION", " - " . htmlspecialchars($rec->fields["description"]));
		} else {
			$t->set_var("TOPIC_DESCRIPTION", "");
		}
		
		$row++;
		
		if ($row <= $half){
			$t->parse("TOPICS_1", "topic_element", true);
		} else {
			$t->parse("TOPICS_2", "topic_element", true);
		}
	
	} while ($rec->loop());
	
	// spacer required?
	if ($web->rows > 0){
		$t->set_file("spacer", "element_spacer");
		$t->parse("TOPICS_LINKS_SPACER", "spacer");
	}
	
	// parse it in
	$t->parse("SUB_TOPICS", "topic_listings");
}

// website listings
if ($web->rows > 0){
	
	$t->set_file("dir_listings", "directory_listings");
	$t->set_file("element_listing", "element_list_listing");
	$t->set_file("element_editbox", "element_box_editlink");
	do {
	
		$t->set_var("LISTING_ID", $web->fields["linkid"]);
		$t->set_var("LISTING_URL", htmlspecialchars($web->fields["url"]));
		$t->set_var("LISTING_NAME", htmlspecialchars($web->fields["website"]));
		
		// check description
		if ($web->fields["description"] == ""){
			$t->set_var("LISTING_CURRENT_DESCRIPTION", "");
		} else {
			$t->set_var("LISTING_CURRENT_DESCRIPTION", " - " . htmlspecialchars($web->fields["description"]));
		}
		
		// add in moderation options
		if ($usr->Access > 0){
			
			// standard stuff
			$t->set_var("LISTING_PRIORITY", $web->fields["priority"]);
			$t->set_var("LISTING_DESCRIPTION", htmlspecialchars($web->fields["description"]));
			$t->set_var("LISTING_EDIT_LINK", d3($core) . "&amp;editlink=" . $web->fields["linkid"] . "#listing_container_" . $web->fields["linkid"]);
			$t->set_var("LISTING_FORM_LINK", d3($core) . "&amp;editlink=" . $web->fields["linkid"]);
			$t->set_var("LISTING_EDIT_ONCLICK", "editlink(" . $web->fields["linkid"] . "); return false;");
			$t->set_var("LISTING_DELETE_LINK", d3($core) . "&amp;deletelink=" . $web->fields["linkid"]);
			$t->set_var("LISTING_DELETE_ONCLICK", "deletelink(" . $web->fields["linkid"] . ", '" . $config["virtualpath"] . "'); return false");
			$t->set_var("LISTING_ONSUBMIT", "editlinksave(" . $web->fields["linkid"] . ", '" . $config["virtualpath"] . "'); return false;");
			
			// topic ID
			if ($config["topicdropdown"] == "true"){
				$cde  = '<select name="listing_topic_' . $web->fields["linkid"] . '" id="listing_topic_' . $web->fields["linkid"] . '">';
				$cde .= fetchoptions($web->fields["topicid"], 0);
				$cde .= '</select>';
			} else {
				$cde  = '<input type="text" size="11" maxlength="11" name="listing_topic_{LISTING_ID}" id="listing_topic_{LISTING_ID}" value="' .$rec->fields["topicid"] . '" />';
			}
			$t->set_var("LISTING_TOPIC", $cde);
			
			// display it or not
			if (intval($_GET["editlink"]) == $web->fields["linkid"]){
				$t->set_var("LISTING_DISPLAY", "");
			} else {
				$t->set_var("LISTING_DISPLAY", "none");
			}
			
			// parse it in
			$t->parse("LISTING_MODERATION", "element_editbox");
		}
		
		// parse in
		$t->parse("LISTINGS", "element_listing", true);
	
	} while ($web->loop());
	
	// parse in to file
	$t->parse("LINKS", "dir_listings");
}

// should we display stats?
if ($config["showstats"] == "true" && $_GET["topic"] == ""){

$sql = "SELECT topicid FROM " . $dbprefix . "topics";
$sta = $db->execute($sql);
$st1 = number_format($sta->rows);
$sta->clear();

$sql = "SELECT linkid FROM " . $dbprefix . "links";
$sta = $db->execute($sql);
$st2 = number_format($sta->rows);
$sta->clear();

$sql = "SELECT queueid FROM " . $dbprefix . "queue";
$sta = $db->execute($sql);
$st3 = number_format($sta->rows);
$sta->clear();

$t->set_file("stats", "directory_stats");
$t->set_var("PHRASE_TOTAL_TOPICS", $phrase["total_topics"]);
$t->set_var("PHRASE_TOTAL_LINKS", $phrase["total_links"]);
$t->set_var("PHRASE_TOTAL_QUEUE", $phrase["total_queue"]);
$t->set_var("STAT_1", $st1);
$t->set_var("STAT_2", $st2);
$t->set_var("STAT_3", $st3);
$t->set_var("LINK_RANDOM", "random.php");
$t->set_var("PHRASE_RANDOM_LINK", $phrase["random_link"]);
$t->parse("STATS", "stats");

} // end stats check

// plugin location
eval(pluginspot(5));

// work out what options to show
if ($usr->Access > 0){
	// show editor box
	$t->set_var("EDITOR_ADMIN_LINK", $root . "admincp/");
	$t->set_var("EDITOR_SIGNOUT_LINK", $root . "admincp/admin_signout.php?from=" . urlencode($_SERVER["REQUEST_URI"]));
	
	// parse in editor tab classes
	$t->set_var("EDITOR_CLASS_ADDLINKS", $ext["addlinks"]);
	$t->set_var("EDITOR_CLASS_SUBTOPICS", $ext["subtopics"]);
	$t->set_var("EDITOR_CLASS_EDITTOPIC", $ext["edittopic"]);
	$t->set_var("EDITOR_CLASS_DELETETOPIC", $ext["deletetopic"]);
	
	// parse in display code
	$t->set_var("EDITOR_DISPLAY_ADDLINKS", $exc["addlinks"]);
	$t->set_var("EDITOR_DISPLAY_SUBTOPICS", $exc["subtopics"]);
	$t->set_var("EDITOR_DISPLAY_EDITTOPIC", $exc["edittopic"]);
	$t->set_var("EDITOR_DISPLAY_DELETETOPIC", $exc["deletetopic"]);
	
	// parse in tab names
	$t->set_var("EDITOR_TAB_SUBTOPICS", '<a href="' . d3($core) . '&amp;editor=subtopics#editor" onClick="return editorpage(\'subtopics\'); return false;">Sub-Topics</a>');
	if ($topic == ""){
		$t->set_var("EDITOR_TAB_ADDLINKS", "Add Links");
		$t->set_var("EDITOR_TAB_EDITTOPIC", "Edit Topic");
		$t->set_var("EDITOR_TAB_DELETETOPIC", "Delete Topic");
	} else {
		$t->set_var("EDITOR_TAB_ADDLINKS", '<a href="' . d3($core) . '&amp;editor=addlinks#editor" onClick="return editorpage(\'addlinks\'); return false;">Add Links</a>');
		$t->set_var("EDITOR_TAB_EDITTOPIC", '<a href="' . d3($core) . '&amp;editor=edittopic#editor" onClick="return editorpage(\'edittopic\'); return false;">Edit Topic</a>');
		$t->set_var("EDITOR_TAB_DELETETOPIC", '<a href="' . d3($core) . '&amp;editor=deletetopic#editor" onClick="return editorpage(\'deletetopic\'); return false;">Delete Topic</a>');
	}
	
	// form actions
	$t->set_var("EDITOR_FORM_ADDLINKS", d3($core));
	$t->set_var("EDITOR_FORM_SUBTOPICS", d3($core) . "&amp;editor=subtopics");
	$t->set_var("EDITOR_FORM_EDITTOPIC", d3($core) . "&amp;editor=edittopic");
	$t->set_var("EDITOR_FORM_DELETETOPIC", d3($core) . "&amp;editor=deletetopic");
	
	// error messages
	$t->set_file("editor_error", "errormsg");
	$t->set_var("ERROR", $errormsg);
	if ($editor_addlinks_error === TRUE){
		$t->parse("EDITOR_ERROR_ADDLINKS", "editor_error");
	} elseif ($editor_edittopic_error === TRUE || $editor_visibility_error === TRUE){
		$t->parse("EDITOR_ERROR_EDITTOPIC", "editor_error");
	} elseif ($editor_deletetopic_error === TRUE){
		$t->parse("EDITOR_ERROR_DELETETOPIC", "editor_error");
	}
	
	// add links form values
	$t->set_var("EDITOR_ADDLINKS_TITLE", $d_editor_title);
	$t->set_var("EDITOR_ADDLINKS_DESCRIPTION", htmlspecialchars($d_editor_description));
	$t->set_var("EDITOR_ADDLINKS_URL", htmlspecialchars($d_editor_url));
	$t->set_var("EDITOR_ADDLINKS_PRIORITY", $d_editor_priority);
	
	// sub-topics form values
	$t->set_var("EDITOR_SUBTOPICS_TITLE", $d_subtopics_title);
	$t->set_var("EDITOR_SUBTOPICS_KEYWORDS", $d_subtopics_keywords);
	$t->set_var("EDITOR_SUBTOPICS_DESCRIPTION", htmlspecialchars($d_subtopics_description));
	$t->set_var("EDITOR_SUBTOPICS_RULES", htmlspecialchars($d_subtopics_rules));
	
	if ($d_subtopics_visible == 1){
		$t->set_var("EDITOR_SUBTOPICS_VISIBLE_1", " selected");
	} else {
		$t->set_var("EDITOR_SUBTOPICS_VISIBLE_0", " selected");
	}
	
	// edit topic form values
	$t->set_var("EDITOR_EDITTOPIC_TOGGLE_ONCLICK", "togglevisibility(" . $topicid . ", '" . $config["virtualpath"] . "'); return false;");
	$t->set_var("EDITOR_EDITTOPIC_TITLE", $d_edittopic_title);
	$t->set_var("EDITOR_EDITTOPIC_KEYWORDS", $d_edittopic_keywords);
	$t->set_var("EDITOR_EDITTOPIC_DESCRIPTION", $d_edittopic_description);
	$t->set_var("EDITOR_EDITTOPIC_RULES", $d_edittopic_rules);
	
	if ($d_edittopic_visible == 1){
		$t->set_var("EDITOR_EDITTOPIC_VISIBLE_1", " selected");
	} else {
		$t->set_var("EDITOR_EDITTOPIC_VISIBLE_0", " selected");
	}
	
	if ($config["topicdropdown"] == "true"){
		$cde  = '<select name="parent">
					<option value="0">No parent</option>';
		$cde .= fetchoptions($d_edittopic_parent, $top->fields["topicid"]);
		$cde .= '</select>';
	} else {
		$cde  = '<input type="text" size="11" maxlength="11" id="parent" name="parent" value="' . $d_edittopic_parent . '" />';
	}
	$t->set_var("EDITOR_EDITTOPIC_PARENT", $cde);
	
	// URL submissions
	$sql = "SELECT * FROM " . $dbprefix . "queue WHERE topicid = " . intval($topicid) . " ORDER BY postdate ASC";
	$que = $db->execute($sql);
	if ($que->rows > 0){
		$t->set_file("url_submissions", "directory_editor_urls");
		$t->set_file("url_element", "element_list_urlsubmission");
		
		do {
			$t->set_var("URL_ID", $que->fields["queueid"]);
			$t->set_var("URL_NAME", htmlspecialchars($que->fields["website"]));
			$t->set_var("URL_LINK", htmlspecialchars($que->fields["url"]));
			$t->set_var("URL_EMAIL", $que->fields["email"]);
			$t->set_var("URL_IP_ADDRESS", $que->fields["ip"]);
			$t->set_var("URL_DESCRIPTION", htmlspecialchars($que->fields["description"]));
			$t->set_var("URL_EDIT_LINK", d3($core) . "&amp;editqueue=" . $que->fields["queueid"] . "#url_container_" . $que->fields["queueid"]);
			$t->set_var("URL_FORM_LINK", d3($core) . "&amp;editqueue=" . $que->fields["queueid"]);
			$t->set_var("URL_EDIT_ONCLICK", "editqueue(" . $que->fields["queueid"] . "); return false;");
			$t->set_var("URL_ONSUBMIT", "editqueuesave(" . $que->fields["queueid"] . ", '" . $config["virtualpath"] . "'); return false;");
			$t->set_var("URL_ACCEPT_LINK", d3($core) . "&amp;act=accept&amp;queueid=" . $que->fields["queueid"]);
			$t->set_var("URL_REJECT_LINK", d3($core) . "&amp;act=reject&amp;queueid=" . $que->fields["queueid"]);
			
			// display or not
			if (intval($_GET["editqueue"]) == $que->fields["queueid"]){
				$t->set_var("URL_DISPLAY", "");
			} else {
				$t->set_var("URL_DISPLAY", "none");
			}
			
			// description
			if ($que->fields["description"] <> ""){
				$t->set_var("URL_CURRENT_DESCRIPTION", " - " . htmlspecialchars($que->fields["description"]));
			}
			
			// parent topic
			if ($config["topicdropdown"] == "true"){
				$cde = '<select name="url_topic_' . $que->fields["queueid"] . '" id="url_topic_' . $que->fields["queueid"] . '">';
				$cde .= fetchoptions($que->fields["topicid"], 0);
				$cde .= '</select>';
			} else {
				$cde = '<input type="text" size="11" maxlength="11" name="url_topic_' . $que->fields["queueid"] . '" id="url_topic_' . $que->fields["queueid"] . '" value="' . $que->fields["topicid"] .'" />';
			}
			$t->set_var("URL_TOPIC", $cde);
			
			// parse in
			$t->parse("URLS_TO_MODERATE", "url_element", true);
			
		} while ($que->loop());
		
		$t->parse("URL_SUBMISSIONS", "url_submissions");
	}
	
	// topic submissions
	$sql = "SELECT * FROM " . $dbprefix . "newtopics WHERE topicid = " . intval($topicid) . " ORDER BY postdate ASC";
	$tqu = $db->execute($sql);
	if ($tqu->rows > 0){
		$t->set_file("topic_submissions", "directory_editor_topics");
		$t->set_file("topic_element", "element_list_topicsubmission");
		
		do {
			$t->set_var("TOPIC_S_ID", $tqu->fields["newtopicid"]);
			$t->set_var("TOPIC_ACCEPT_LINK", d3($core) . "&amp;nt_act=accept&amp;newtopicid=" . $tqu->fields["newtopicid"]);
			$t->set_var("TOPIC_REJECT_LINK", d3($core) . "&amp;nt_act=reject&amp;newtopicid=" . $tqu->fields["newtopicid"]);
			$t->set_var("TOPIC_EDIT_LINK", d3($core) . "&amp;editnewtopic=" . $tqu->fields["newtopicid"] . "#newtopic_container_" . $tqu->fields["newtopicid"]);
			$t->set_var("TOPIC_FORM_LINK", d3($core) . "&amp;editnewtopic=" . $tqu->fields["newtopicid"]);
			$t->set_var("TOPIC_EDIT_ONCLICK", "editnewtopic(" . $tqu->fields["newtopicid"] . "); return false;");
			$t->set_var("TOPIC_NAME", htmlspecialchars($tqu->fields["title"]));
			$t->set_var("TOPIC_EMAIL", $tqu->fields["email"]);
			$t->set_var("TOPIC_IP_ADDRESS", $tqu->fields["ip"]);
			$t->set_var("TOPIC_EDITABLE_DESCRIPTION", htmlspecialchars($tqu->fields["description"]));
			$t->set_var("TOPIC_ONSUBMIT", "editnewtopicsave(" . $tqu->fields["newtopicid"] . ", '" . $config["virtualpath"] . "'); return false;");
			
			// container visibility
			if (intval($_GET["editnewtopic"]) == $tqu->fields["newtopicid"]){
				$t->set_var("TOPIC_CONTAINER_DISPLAY", "");
			} else {
				$t->set_var("TOPIC_CONTAINER_DISPLAY", "none");
			}
			
			// topic description
			if ($tqu->fields["description"] <> ""){
				$t->set_var("TOPIC_DESCRIPTION", " - " . $tqu->fields["description"]);
			} else {
				$t->set_var("TOPIC_DESCRIPTION", "");
			}
			
			// parent topic
			if ($config["topicdropdown"] == "true"){
				$cde = '<select name="newtopic_parent_' . $tqu->fields["newtopicid"] . '" id="newtopic_parent_' . $tqu->fields["newtopicid"] . '">
					<option value="0">No parent</option>';
				$cde .= fetchoptions($tqu->fields["topicid"], 0);
				$cde .= '</select>';
			} else {
				$cde = '<input type="text" size="11" maxlength="11" name="newtopic_parent_' . $tqu->fields["newtopicid"] . '" id="newtopic_parent_' . $tqu->fields["newtopicid"] . '" value="' . $tqu->fields["topicid"] .'" />';
			}
			$t->set_var("TOPIC_PARENT", $cde);
			
			$t->parse("TOPICS_TO_MODERATE", "topic_element", true);
		} while ($tqu->loop());
		
		$t->parse("TOPIC_SUBMISSIONS", "topic_submissions");
	}
	
	// parse in editor box
	$t->set_file("editor_box", "directory_editor");
	$t->parse("USER_OPTIONS", "editor_box");
	
} elseif ($config["usersubmissions"] == "true" && $topicid > 0){
	// users are allowed to suggest URLs
	$t->set_var("USER_OPTIONS", "<hr />");
	
	if ($_GET["mode"] == "suggest"){
		// suggest URL
		$t->set_file("options", "directory_suggesturl");
		
		// global rules
		$t->set_file("rules", "directory_rules");
		if ($config["showsubmissionrules"] == "true" && $phrase["submit_rules"] <> ""){
			$t->set_var("RULES_TITLE", $phrase["submit_submission"] . " " . $phrase["rules"]);
			$t->set_var("RULES_RULES", Encode($phrase["submit_rules"]));
			$t->parse("GLOBAL_RULES", "rules");
		}
		
		// topic rules
		if ($top->fields["rules"] <> ""){
			$t->set_var("RULES_TITLE", $phrase["topic"] . " " . $phrase["rules"]);
			$t->set_var("RULES_RULES", Encode($top->fields["rules"]));
			$t->parse("TOPIC_RULES", "rules");
		}
		
		// regular variables
		$t->set_var("SUGGEST_URL_ACTION", d3($core) . "&amp;mode=suggest");
		$t->set_var("SUGGEST_URL_PHRASE_SITENAME", $phrase["sitename"]);
		$t->set_var("SUGGEST_URL_PHRASE_URL", $phrase["url"]);
		$t->set_var("SUGGEST_URL_PHRASE_DESCRIPTION", $phrase["description"]);
		$t->set_var("SUGGEST_URL_PHRASE_EMAILADDRESS", $phrase["emailaddress"]);
		$t->set_var("SUGGEST_URL_PHRASE_SUGGEST", $phrase["suggesturl"] . "!");
		
		// default form variables
		if ($d_suggesturl_url == ""){
			$d_suggesturl_url = "http://";
		}
		
		$t->set_var("SUGGEST_URL_FORM_TITLE", $d_suggesturl_title);
		$t->set_var("SUGGEST_URL_FORM_URL", $d_suggesturl_url);
		$t->set_var("SUGGEST_URL_FORM_DESCRIPTION", $d_suggesturl_description);
		$t->set_var("SUGGEST_URL_FORM_EMAIL", $d_suggesturl_email);
		
		$t->parse("USER_OPTIONS", "options", true);
	
	} elseif ($_GET["mode"] == "suggesttopic"){
		// suggest topic
		$t->set_file("options", "directory_suggesttopic");
		$t->set_var("SUGGEST_TOPIC_ACTION", d3($core) . "&amp;mode=suggesttopic");
		$t->set_var("SUGGEST_TOPIC_PHRASE_TOPIC", $phrase["topic"]);
		$t->set_var("SUGGEST_TOPIC_PHRASE_DESCRIPTION", $phrase["description"]);
		$t->set_var("SUGGEST_TOPIC_PHRASE_EMAILADDRESS", $phrase["emailaddress"]);
		$t->set_var("SUGGEST_TOPIC_PHRASE_SUGGEST", $phrase["suggesttopic"] . "!");
		
		// default form variables
		$t->set_var("SUGGEST_TOPIC_FORM_TITLE", $d_suggesttopic_title);
		$t->set_var("SUGGEST_TOPIC_FORM_DESCRIPTION", $d_suggesttopic_description);
		$t->set_var("SUGGEST_TOPIC_FORM_EMAIL", $d_suggesttopic_email);
		
		$t->parse("USER_OPTIONS", "options", true);
		
	} else {
		// links to suggest URL, etc
		$t->set_file("options", "directory_options");
		$t->set_var("SUGGEST_URL_LINK", d3($core) . "&amp;mode=suggest#suggest");
		$t->set_var("SUGGEST_URL_NAME", $phrase["suggesturl"]);
		
		if ($config["topicsubmissions"] == "true"){
			$t->set_file("options_suggest_topic", "element_list");
			$t->set_var("LIST_LINK", d3($core) . "&amp;mode=suggesttopic#suggesttopic");
			$t->set_var("LIST_NAME", $phrase["suggesttopic"]);
			$t->parse("SUGGEST_TOPIC", "options_suggest_topic");
		}
		
		$t->parse("USER_OPTIONS", "options", true);
	}
}

// parse everything in
$t->set_file("page_content", "directory");
$t->parse("page_all", "page_content", true);

// include page footer
include("includes/page_footer.php");
?>