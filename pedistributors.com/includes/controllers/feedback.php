<?php


class Feedback {


	function Feedback(){

	
	if(!empty($_POST)){
	
		if($_POST['feedbackform']){
			$feedback = "Feedback Form from: ".$_SESSION['customer']['name']."\r\n";
				foreach($_POST as $k=>$v){
					if($v !== "specify here..."){
						$feedback .= str_replace("_"," ",$k).": ".$v."\r\n";
					}
				}
	
			$this->form_submit = "TRUE";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers = 'From: webmaster@pedistributors.com' . "\r\n" .
		    'Reply-To: webmaster@pedistributors.com' . "\r\n";
			mail('mj@pedistributors.com','P&amp;E Feedback Form',$feedback,$headers);
		}
		
		if($_POST['bullydogtvform'] == "true"){
			$postdata = array();
			foreach($_POST as $k=>$v){
				$postdata[$k] = mysql_real_escape_string($v);
			}
		
				
			$path = "uploads/bullytv";
			$filename = basename( $_FILES['truck_pic']['name']);
			$randomize = explode(".",$filename);
			$digits = rand(0,9999);
			$filename = $randomize[0].$digits.".".$randomize[1];
			$path = $path.$filename;			
			include('includes/db.php');
			$query = mysql_query("INSERT INTO `bdtv` VALUES('$postdata[name]','$postdata[customer_num]','$postdata[phone]','$postdata[email]','$path','$postdata[why]')");
			$file_ul = move_uploaded_file($_FILES['truck_pic']['tmp_name'], $path);
			if($query && $file_ul) {
    //If Successful, send to confirmation page
				$this->layout = "bdtv_confirm.php";
			} else{
				$this->pageResponse = "error";
			}

					
		}
	

	}
	
	}
	
	
	


}

$feedback = new Feedback;

if(isset($feedback->layout)){
	$layout = $feedback->layout;
}

if(isset($feedback->pageResponse)){
	$funcs->pageResponse($feedback->pageResponse);
}
?>