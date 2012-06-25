<?php
define("IN_SCRIPT", true);
require("includes/global.php");

// get limit or disable stuff
$limit = intval($config["recentlyadded"]);
if ($limit == 0){ redirect($config["topicpage"]); }

// get recordset
$sql = "SELECT * FROM " . $dbprefix . "links ORDER BY postdate DESC LIMIT 0, " . $limit;
$nuw = $db->execute($sql);

// setup the variables
$bread = '<a href="' . $config["topicpage"] . '">' . $phrase["top"] . '</a> ' . $config["breadcrumb"] . ' <a href="recent.php">' . $phrase["recentlyadded"] . '</a>';
$pagetitle = $config["sitename"] . " - " . $phrase["recentlyadded"];

// page header
include("includes/page_header.php");

// get recent page
$tdat = date("j F Y");
$ydat = date("j F Y", (time() - 86400));
$dat = date("j F Y", 0);
$row = 0;

if ($nuw->rows < 1){

	$t->set_var("RECENT_LINKS", "There are no recent links");
	
} else {

	$t->set_file("recent_links", "recent_day");
	$t->set_file("recent_element", "element_list");
	
	do {
	
		// work out variables
		$ndat = date("j F Y", $nuw->fields["postdate"]);
		$description = ($nuw->fields["description"] <> "") ? " - " . $nuw->fields["description"] : "";
		
		// if this is a fresh date
		if ($ndat <> $dat){
			if ($row > 0){
				
				if ($dat == $tdat){
					$t->set_var("DAY_DATE", $phrase["today"]);
				} elseif ($dat == $ydat){
					$t->set_var("DAY_DATE", $phrase["yesterday"]);
				} else {
					$t->set_var("DAY_DATE", $dat);
				}
				
				$t->parse("RECENT_LINKS", "recent_links", true);
				$t->set_var("DAY_WEBSITES", "");
			}
			
			$dat = $ndat;
		}
		
		// add in this link
		$t->set_var("LIST_LINK", $nuw->fields["url"]);
		$t->set_var("LIST_NAME", $nuw->fields["website"]);
		$t->set_var("LIST_DESCRIPTION", $description);
		$t->parse("DAY_WEBSITES", "recent_element", true);
	
	$row++;
	} while ($nuw->loop());
	
	// do date in case of only one row
	if ($nuw->rows == 1){
		if ($dat == $tdat){
			$t->set_var("DAY_DATE", $phrase["today"]);
		} elseif ($dat == $ydat){
			$t->set_var("DAY_DATE", $phrase["yesterday"]);
		} else {
			$t->set_var("DAY_DATE", $dat);
		}
	}
	
	// parse in final day
	$t->parse("RECENT_LINKS", "recent_links", true);
}

// parse everything in
$t->set_file("page_content", "recent");
$t->parse("page_all", "page_content", true);

// end page
include("includes/page_footer.php");
?>