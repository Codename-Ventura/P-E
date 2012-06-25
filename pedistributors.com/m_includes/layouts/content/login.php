<?php
if(isset($_GET['a']) && $_GET['a'] == "reminder"){
	include('includes/layouts/content/login/reminder.php');
}else{
	include('includes/layouts/content/login/login.php');
}


?>