<?php
include('includes/controllers/news.php');
include('includes/controllers/vendors.php');
include('includes/controllers/search.php');
class Specials extends News{

	function Specials(){
		$this->specials = $this->get_data("special");

	}


}

$specials = new Specials;


?>

