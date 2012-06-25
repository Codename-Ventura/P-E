<?php
if (!defined("IN_SCRIPT")){
	die("Hacking attempt");
}

// plugin location
eval(pluginspot(2));

// parse footer template
$t->set_file("page_footer", "overall_footer");
$t->parse("page_all", "page_footer", true);

// output entire page
$t->p("page_all");
?>