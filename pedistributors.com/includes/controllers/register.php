<?php
class Register extends Index {

	function Register(){
		if(isset($_POST['form_action']) && $_POST['form_action'] == "submit_app"){
			$this->SubmitCreditApp($_POST);
			}
		if(isset($_POST['form_action']) && $_POST['form_action'] == "online_ordering"){
			$this->SubmitOnlineOrdering($_POST);
			}
		if(isset($_POST['form_action']) && $_POST['form_action'] == "eBlast"){
			$this->eBlast($_POST);
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
		/*OLD Stopped working 2-21-12*/
		//$headers  = 'MIME-Version: 1.0' . "\r\n";
		//mail('m.harris@pedistributors.com','Credit Form',$message,$headers);
		//mail('jonathanljames@gmail.com','Credit Form',$message,$headers);


		require_once('Mail.php');
$from = "P&E Website <online@pedistributors.com>";
$to = "Mike Harris <m.harris@pedistributors.com>";
$subject = "Credit Form";
$body = "A new credit application has been submitted.  To review an print this application, please click on the link.  http://www.pedistributors.com/index.php?p=admin&action=ca&id=".mysql_insert_id();

$host = "mail.pedistributors.com";
$username = "online@pedistributors.com";
$password = "1960redFLH";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);


}

	function makeLabel($label){
		$label = str_replace("_"," ",$label);
		$label = ucwords($label);
		return $label;
		
	}

	function SubmitOnlineOrdering($form){
		/* OLD - stopped working 2-21-12*/
		$message = 
			"
			Email: $form[email]
			Customer Number: $form[cust_num]
			Password: $form[password]
			Company Name: $form[company_name]
			First Name: $form[first_name]
			Last Name: $form[last_name]
			Title: $form[title]
			Address: $form[address]
			Address (line 2): $form[password]
			City: $form[city]
			State: $form[state]
			Zip: $form[zip]
			Phone: $form[phone]
			Alt. Phone: $form[alt_phone]
			Website: $form[website]";
			
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		#$headers .= 'To: Mike Harris <m.harris@pedistributors.com>, Jonathan James <jjames@pedistributors.com>' . "\r\n";
		$headers .= 'From: P&E Distributors <donotreply@pedistributors.com>' . "\r\n";
		
		mail('jjames@pedistributors.com','Online Ordering Request',$message,$headers);
		mail('m.harris@pedistributors.com','Online Ordering Request',$message,$headers);			/*
require_once('Mail.php');
$from = "P&E Website <online@pedistributors.com>";
$to = "Mike Harris <m.harris@pedistributors.com>";
$subject = "Online Ordering Request";
$body = 
			"
			Email: $form[email]
			Customer Number: $form[cust_num]
			Password: $form[password]
			Company Name: $form[company_name]
			First Name: $form[first_name]
			Last Name: $form[last_name]
			Title: $form[title]
			Address: $form[address]
			Address (line 2): $form[password]
			City: $form[city]
			State: $form[state]
			Zip: $form[zip]
			Phone: $form[phone]
			Alt. Phone: $form[alt_phone]
			Website: $form[website]";

$host = "mail.pedistributors.com";
$username = "online@pedistributors.com";
$password = "online";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);

		if(isset($_POST['emailblast'])){
			include('includes/db.php');
			mysql_query("INSERT INTO `emailblast` (`customer_number`,`email`) VALUES ('$_POST[cust_num]','$_POST[email]')");
		}			 
		$this->formResponse = "1";
		$this->pageResponse("form_complete", $k); */
	}

function eBlast($form){
if(!filter_var($form[email], FILTER_VALIDATE_EMAIL) OR empty($form[company_name]))
{
$this->pageResponse("eBlast_error", $k);
}
else{
		/* Jonathan's old method - Stopped working on 2-21-12
		$message = 
			"
			Email: $form[email]
			Company Name: $form[company_name]";
			
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		#$headers .= 'To: Dave Echols <dave@pedistributors.com>, Matt Jackman <mj@pedistributors.com>' . "\r\n";
		#$headers .= 'From: $form[email]' . "\r\n";

		
		mail('dave@pedistributors.com','P&E eBlast Signup Request',$message,$headers);
		mail('mj@pedistributors.com','P&E eBlast Signup Request',$message,$headers);		*/	
require_once('Mail.php');
$from = "P&E Website <online@pedistributors.com>";
$to = "Dave Echols <dave@pedistributors.com>, Matt Jackman <mj@pedistributors.com>";
$subject = "P&E eBlast Signup Request";
$body = "
			Email: $form[email]
			Company Name: $form[company_name]";

$host = "mail.pedistributors.com";
$username = "online@pedistributors.com";
$password = "online";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password));

$mail = $smtp->send($to, $headers, $body);
		if(isset($_POST['email'])){
			include('includes/db.php');
			mysql_query("INSERT INTO `emailblast` (`customer_number`,`email`) VALUES ('$_POST[company_name]','$_POST[email]')");
		}			 
		#$this->formResponse2 = "1";
		$this->pageResponse("form_complete", $k); 
	}
}
}
$register = new Register;


?>
