<?php
$userip = $_SERVER['REMOTE_ADDR'];
$userdomain = GetHostByName($userip);
echo $userip; echo "<br>";
echo $userdomain;
?>