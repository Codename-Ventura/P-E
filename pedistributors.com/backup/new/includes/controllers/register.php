<?php
class Register extends Index {

	function Register(){
		if(isset($_POST['form_action'])){
			$this->SubmitCreditApp($_POST);
			
			}
		
		
	}

	function SubmitCreditApp($form){
		$this->credit_app = array();
		foreach($form as $k=>$v){
			$label = $this->makeLabel($k);
			$this->credit_app[$label] = $v;			
		}
		
		//Select which variables to unset
		unset($this->credit_app['Form Action']);
		include('includes/forms/credit_app.php');
	
		$this->formResponse = "1";
		$this->pageResponse("form_complete", $k);
		$temp = mysql_escape_string($this->creditAppTable);
		include('includes/db.php');
		$query = mysql_query("INSERT INTO `credapp` (`data`) VALUES ('$temp')");
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= 'To: Mike Harris <m.harris@pedistributors.com>, Jonathan James <jjames@pedistributors.com>' . "\r\n";
		$headers .= 'From: P&E Distributors <donotreply@pedistributors.com>' . "\r\n";
		$message = "A new credit application has been submitted.  To review an print this application, please click on the link.  http://www.pedistributors.com/new/index.php?p=admin&action=ca&id=".mysql_insert_id();
		mail('jjames@pedistributors.com','Credit Form',$message,$headers);
	}


	function makeLabel($label){
		$label = str_replace("_"," ",$label);
		$label = ucwords($label);
		return $label;
		
	}

}

$register = new Register;


?>