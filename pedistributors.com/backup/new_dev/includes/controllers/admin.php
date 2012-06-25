<?php
include('includes/controllers/vendors.php');
include('includes/controllers/search.php');
include('includes/controllers/news.php');

class Admin extends Index {

	function Admin(){
	parent::Index();
	$this->entry_array = array();
	if(isset($_POST['submit_special'])){
		//Build Preview
		unset($_POST['submit_special']);
		foreach($_POST as $k=>$v){
			$this->entry_array[$k] = $v;
		}
	$this->add_entry = "TRUE";
	
	}
	
	if(!empty($this->entry_array['part_numbers'])){
		$this->part_number_array = explode(",",$this->entry_array['part_numbers']);
		foreach($this->part_number_array as $k=>$v){
			$this->part_number_array[$k] = $_POST['manufacturer'].trim($v);
		}
	}
}


}

$admin = new Admin;

if(isset($admin->part_number_array)){
	foreach($admin->part_number_array as $k=>$v){
		$search->queryPart($v);
	}
	$admin->part_number_array = $search->responseParts;

}

?>