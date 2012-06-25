<?php
if (!defined("IN_SCRIPT")){
	die("Hacking attempt");
}

// set up the template
include("template.php");

// create template from class
$t = new Template(skinget());

// work out the page title
if ($pagetitle == ""){ $pagetitle = $config["sitename"]; }

// set up some variables
$t->set_var("SITENAME", $config["sitename"]);
$t->set_var("DATETIME", date($config["dateformat"]));
$t->set_var("VERSION", $config["version"]);
$t->set_var("PAGETITLE", $pagetitle);
$t->set_var("META_DESCRIPTION", $config["metadescription"]);
$t->set_var("META_KEYWORDS", $config["metakeywords"]);
$t->set_var("BREADCRUMBS", $bread);
$t->set_var("CSS_CODE", $t->csscode());
$t->set_var("IMAGES_DIR", $config["virtualpath"] . $t->imagesdir);
$t->set_var("ROOT", $config["virtualpath"]);
$t->set_var("LANGUAGE_CODE", $config["languagecode"]);

// implement fix for Internet Explorer
if ($usr->Access > 0){
	$t->set_file("iefix", "misc_iefix");
	$t->parse("HEAD_CODE", "iefix", true);
}

// language phrases
$t->set_var("SEARCH", $phrase["search"]);
$t->set_var("ALLRIGHTSRESERVED", $phrase["allrightsreserved"]);
$t->set_var("POWERED_BY", $phrase["poweredby"]);

// parse the skin selector?
$sql = "SELECT COUNT(skinid) FROM " . $dbprefix . "skinsets WHERE visible = 1";
$scc = $db->execute($sql);

if ($config["skinselector"] == "true" && $scc->fields["COUNT(skinid)"] > 1){
	$t->set_var("SKIN_SELECTOR", skinselector());
}

// parse in the admin navigation
if ($config["showadminlink"] == "true" || $config["showrecentlink"] == "true"){
	// put the recent  link in?
	if ($config["showrecentlink"] == "true"){
		$ncode = '<a href="' . $config["virtualpath"] . 'recent.php">' . $phrase["newest"] . '</a>';
		
		if ($config["showadminlink"] == "true"){
			$ncode .= ' | ';
		}
	}
	
	// put the admin link in?
	if ($config["showadminlink"] == "true"){
		if ($_SERVER["REQUEST_URI"]){
			$qs = "";
			foreach($_SERVER["argv"] as $x){
				$qs .= $x . "&";
			}
			
			$url = "admincp/?from=" . urlencode($_SERVER["PHP_SELF"] . "?" . $qs);
		} else {
			$url = "admincp/?from=" . urlencode($_SERVER["REQUEST_URI"]);
		}
		
		$ncode .= '<a href="' . $config["virtualpath"] . $url . '">' . $phrase["admin"] . '</a>';
	}
	
	// and parse it in
	$t->set_var("ADMIN_LINK", $ncode);
}

// plugin location
eval(pluginspot(1));

// parse and output straight away
$t->set_file("page_footer", "overall_header");
$t->parse("page_all", "page_footer", true);
?>