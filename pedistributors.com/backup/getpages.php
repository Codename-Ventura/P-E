<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
function getpagecount($url){

$test = file_get_contents($url);
$test = htmlentities($test);
$test = explode("Page 1",$test);
$test = explode("of ", $test[1]);
$test = explode("&lt;", $test[1]);
$pagecount = $test[0];
return $pagecount;

}
?>
<body>
</body>
</html>
