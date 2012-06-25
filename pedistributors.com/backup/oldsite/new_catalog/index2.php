<?php # Script v1.0 # - index.php

/*  Thios is the main page
 *  Includes the config file
 *  the layouts and all modules
*/

	//Require config file
	require_once('./includes/config.inc.php');
	
	//Validate what page to show:
	if (isset($_GET['p'])) {
		$p = $_GET['p'];
	} elseif (isset($_POST['p'])) { //Forms
		$p = $_POST['p'];
	} else {
		$p = NULL;
	}
	
	if(isset($_REQUEST['s'])){
		$s = $_GET['s'];		
	}

	//Determine what page to grab
	switch ($p) {
		
		case 'thumbs';
			$page = 'thumbs.inc.php';
			$page_title = 'Catalog 2009';
			break;
			
		case 'help';
			$page = 'help.inc.php';
			$page_title = 'Catalog Help';
			break;
		
		case 'locations';
			$page = 'locations.inc.php';
			$page_title = 'Store Locations';
			break;
			
		default:
			$page = 'main2.inc.php';
			$page_title = 'Online Catalog 2010';
			break;
	
	} //End of Main Switch
	
	//Make sure file exists
	if(!file_exists('includes/mods/' . $page)) {
		$page = 'main.inc.php';
		$page_title = 'P&E Distributors - 2009 Catalog';
	}
	//Get images array

	$count = 0;
	if ($handle = opendir('thumbs')) {
		$retval = array();
		    while (false !== ($file = readdir($handle))) {
				
				if (($file <> ".") && ($file <> "..")) {
			        $retval[] = $file;
				}
	    }

    	closedir($handle);
		sort($retval);
	}
	$num = 0;
	$key = 0;
	$retval_pages = array();
	while ($num <= 432){
	$counter = 0;
		while ($counter <= 1) {
			$retval_pages[$key][$counter] = $retval[$num];
			$num = $num + 1;
			$counter = $counter + 1;
			if ($num == "433"){
				$retval_pages[$key][$counter] = null;
				}
			else {
				$retval_pages[$key][$counter] = $retval[$num];
				}
			$key = $key + 1;
			$num = $num + 1;
			$counter = $counter + 1;
				}

			}

	//Retrieve URL GET variables
	if (isset($_GET['s'])){
		$s = $_GET['s'];
		}
	else { $s = "thumbs"; }
	
	if (isset($_GET['c'])){
		if ($s == "full") {
			if (isset($_GET['c']) && ($_GET['c'] > 432)){
				$c = "432";
				}
			}
		elseif ($s == "thumbs"){
			if ($_GET['c'] > 216){
				$c = "216";
				}
			}	
		}
	else { 
		$count = "0" ; }
	    $next = $count + 1;
	    $prev = $count - 1;
    if ($prev < 0){
    	$prev = "0";
     }
	 
	 
	//Header for full size images
	if ($s == "full"){
	include_once('./includes/layout/header3.inc.html');
	}
	//Header for thumbnail size images
	else {
	include_once('./includes/layout/header4.inc.html');
	}
	
	//Content Mod Include
	include('./includes/mods/' . $page);
	
	//Footer
	include_once('./includes/layout/footer.inc.html');
	
?>