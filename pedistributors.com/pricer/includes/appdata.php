<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div style="float:left; font-size:9px; width:100%; padding-bottom:10px; border-bottom:2px #000000 solid; margin-bottom:10px">
<a href="appdata.php">Home</a>
</div>
<?php echo count($data);?> Records

<ul>
<?php
foreach($data as $k=>$v){

//BUILD THE URL
if(empty($_GET)){
$url = "appdata.php?year=".$v;
?>
<li><a href="<?php echo $url;?>"><?php echo $v;?></a></li>
<?php
}

if(isset($_GET['year']) && !isset($_GET['make']) && !isset($_GET['model'])){
	$v = strtoupper(str_replace(" ","-",$v));
	$url = "appdata.php?year=".$_GET['year']."&make=".$v."";
?>
<li><a href="<?php echo $url;?>"><?php echo $v;?></a></li>
<?php
	}


if(isset($_GET['year']) && isset($_GET['make']) && !isset($_GET['model'])){

	$url = "appdata.php?year=".$_GET['year']."&make=".$_GET['make']."&model=".$v;
?>
<li><a href="<?php echo $url;?>"><?php echo $v;?></a></li>
<?php } 

if(isset($_GET['year']) && isset($_GET['make']) && isset($_GET['model'])){

?>
<li><?php echo $v;?></li>
<?php }
}?>

</body>
</html>
