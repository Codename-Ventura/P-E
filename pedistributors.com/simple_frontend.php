<?php
if(isset($auth) && ($auth == "true")){
	include('includes/controllers/secure.php');
}

include($_SESSION['configuration'][$mod_type]['dir_location'].$layout);
?>    
  
