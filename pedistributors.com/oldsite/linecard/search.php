<?php
define("IN_SCRIPT", true);
require("includes/global.php");

// check for search
if ($_GET["q"] <> ""){
	// run a search type thing
	$st = dbSecure($_GET["q"]);
	
	// search for topics
	$limit = intval($config["topicresults"]);
	$sql  = "SELECT *, MATCH (title, keywords) ";
	$sql .= "AGAINST ('" . $st . "' IN BOOLEAN MODE) AS score ";
	$sql .= "FROM " . $dbprefix . "topics ";
	$sql .= "WHERE MATCH (title, keywords) AGAINST ";
	$sql .= "('" . $st . "' IN BOOLEAN MODE) ORDER BY score DESC ";
	$sql .= "LIMIT 0, " . $limit;
	$top  = $db->execute($sql);
	
	// search for websites
	$sql  = "SELECT *, MATCH (website, description, url) ";
	$sql .= "AGAINST ('" . $st . "' IN BOOLEAN MODE) AS score ";
	$sql .= "FROM " . $dbprefix . "links ";
	$sql .= "WHERE MATCH (website, description, url) AGAINST ";
	$sql .= "('" . $st . "' IN BOOLEAN MODE) ORDER BY score DESC";
	
	// run the command
	$rec = $db->execute($sql);
}

// setup the variables
$bread = '<a href="' . $config["topicpage"] . '">' . $phrase["top"] . '</a> ' . $config["breadcrumb"] . ' <a href="search.php">' . $phrase["search"] . '</a>';
$pagetitle = $config["sitename"] . " Search";

// page header
include("includes/page_header.php");

// build main search page
$t->set_var("SEARCH_ACTION", "search.php");
$t->set_var("SEARCH_Q", htmlspecialchars(un($st)));
$t->set_var("SEARCH_PHRASE", $phrase["search"] . "!");

// search results
if ($st <> ""){
	// check for topic results
	if ($top->rows > 0){
		$t->set_file("search_topics", "search_topics");
		$t->set_var("SEARCH_TOPIC_RESULTS_TEXT", $phrase["topic"] . " " . $phrase["results"]);
		$t->set_file("search_topics_res", "element_list_basic");
		
		do {
			$t->set_var("LIST_CONTENT", fetchtopic($top->fields["topicid"]));
			$t->parse("SEARCH_TOPIC_RESULTS", "search_topics_res", true);
		} while ($top->loop());
		
		$t->parse("SEARCH_TOPICS", "search_topics");
	}
	
	// parse in header text
	$t->set_var("SEARCH_RESULTS_TEXT", $phrase["search"] . " " . $phrase["results"]);
	
	// main search results
	if ($rec->rows < 1){
		
		// no results found
		$t->set_file("no_results", "search_noresults");
		$t->set_var("SEARCH_NO_RESULTS", $phrase["noresults"]);
		$t->parse("SEARCH_RESULTS", "no_results");
		
	} else {
	
		$t->set_file("has_results", "search_results");
		$t->set_var("SEARCH_RESULTS_PAGES_TEXT", $phrase["resultspages"]);
		
		// do results paging
		$perpage = 10;
		$pnum = ceil($rec->rows / $perpage);
		$pqu = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
		$prc = "";
		$x = 1;
		while ($x <= $pnum){
			if ($x == $pqu){
				$prc .= " <span>" . $x . "</span>";
			} elseif ($x > ($pqu - 5) && $x < ($pqu + 5)) {
				$prc .= ' <a href="search.php?q=' . urlencode($_GET["q"]) . '&amp;page=' . $x . '">' . $x . '</a>';
			} elseif ($x == ($pqu - 5)){
				$prc .= ' <a href="search.php?q=' . urlencode($_GET["q"]) . '&amp;page=1">&laquo;</a>';
			} elseif ($x == ($pqu + 5)){
				$prc .= ' <a href="search.php?q=' . urlencode($_GET["q"]) . '&amp;page=' . $pnum . '">&raquo;</a>';
			}
			
			// and loop thing
			$x = ($x + 1);
		}
		
		// count results forward
		$ic = ($perpage * ($pqu - 1));
		while ($ic > 0){
			$rec->fields = $rec->loop();
			$ic = ($ic - 1);
		}
		
		// parse in results variable
		$t->set_file("results_item", "search_result");
		$rcount = 0;
		
		do {
			$rcount = ($rcount + 1);
			
			$t->set_var("RESULT_LINK", $rec->fields["url"]);
			$t->set_var("RESULT_NAME", $rec->fields["website"]);
			
			if ($rec->fields["description"] == ""){
				$t->set_var("RESULT_DESCRIPTION", "");
			} else {
				$t->set_var("RESULT_DESCRIPTION", $rec->fields["description"] . "<br />");
			}
			
			$t->set_var("RESULT_TOPIC", fetchtopic($rec->fields["topicid"]));
			$t->parse("RESULTS", "results_item", true);
			
		} while (($rec->loop()) && ($rcount < $perpage));
		
		// parse in search results
		$t->set_var("SEARCH_RESULTS_PAGES", $prc);
		$t->parse("SEARCH_RESULTS", "has_results");
	
	}
}

// parse everything in
$t->set_file("page_content", "search");
$t->parse("page_all", "page_content", true);

// include page footer
include("includes/page_footer.php");
?>