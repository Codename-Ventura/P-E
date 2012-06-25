<?php
function checkforcsv($extension){
	$filetypes = array("csv","txt");
	if(in_array($extension, $filetypes)){
		return TRUE;}
	else{
		return FALSE;}
}

?>