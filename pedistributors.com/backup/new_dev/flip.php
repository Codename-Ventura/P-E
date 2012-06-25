<?php
session_start();
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");






if(!isset($_SESSION['counter']) || ($_SESSION['counter'] > 3)){
	$_SESSION['counter'] = "1";
	}
else{
	$_SESSION['counter']++;
	}

if(!empty($_GET['index'])){
	$counter = $_GET['index'];
	$_SESSION['counter'] = $counter;
}
else{
	$counter = $_SESSION['counter'];
}

?>
<img src="<?php echo $_SESSION[image_array][$counter]['src'];?>">