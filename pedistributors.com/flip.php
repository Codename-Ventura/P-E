
<?php
session_start();
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");






if(!isset($_SESSION['counter']) || ($_SESSION['counter'] > 4)){
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
<div style="float:left; height:188px; width:775px; color:#FFFFFF">

<?php
if(isset($_SESSION[image_slice][$counter]['link'])){
?>
<a href="<?php echo $_SESSION[image_slice][$counter]['link']; ?>">
<img src="<?php echo $_SESSION[image_slice][$counter]['src'];?>" height="188px">
</a>
<?php
}else{
?>
<img src="<?php echo $_SESSION[image_slice][$counter]['src'];?>" height="188px">
<?php
}
?>
</div>