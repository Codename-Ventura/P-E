<?php


class Feedback {

	function Feedback(){
	if(!empty($_POST)){
		$feedback = "Feedback Form from: ".$_SESSION['customer']['name']."\r\n";
		foreach($_POST as $k=>$v){
			if($v !== "specify here..."){
			$feedback .= str_replace("_"," ",$k).": ".$v."\r\n";
			}
		}
	$this->form_submit = "TRUE";
	}
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	mail('jjames@pedistributors.com','Feedback Form',$feedback,$headers);
	}
	


}

$feedback = new Feedback;

?>