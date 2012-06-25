<?php


class Account extends Index{

	function Account(){
		parent::Index();
		if(isset($_POST[update_acct])){
			if($this->checkinfo($_POST)){
				include('includes/db.php');
				$login = $_SESSION[customer][login];
				$email = $_POST[new_email];
				$password = $_POST[newpass1];
				$master = $_SESSION[customer][pw];
				$date = date("Y-m-d");
				if(mysql_query("INSERT INTO `login` (`id`,`customer_number`,`date`,`password`,`masterpass`,`email`,`passtype`) VALUES (NULL,'$login','$date','$password','$master','$email','perm')")){
					$this->pageResponse("sql_success");
					$_SESSION[customer][has_sql_data] = "TRUE";
					$_SESSION[customer][email] = $email;
				}else{
					$this->pageResponse("sql_fail");
				}
			}
		}
		
		if(isset($_POST[change_password])){
			$this->changePassword($_POST);
		}
	}
	
	function changePassword($password_data){
		if($password_data[newpass1] !== $password_data[newpass2] || empty($password_data[newpass1]) || empty($password_data[newpass2])){
			$this->pageResponse("pw_mismatch");
		}else{
			$newpassword = $password_data[newpass1];
			$_SESSION[customer][email] = $new_email = $password_data[email];
			$login = $_SESSION[customer][login];
			if(mysql_query("UPDATE `login` SET `password` = '$newpassword', `email` = '$new_email'  WHERE `customer_number` = '$login'")){
				$this->pageResponse("sql_success");
				$message = $_SESSION[customer][name]." has changed their password.  The new password is: ".$newpassword;
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				mail('m.harris@pedistributors.com','User password changed',$message, $headers);
				mail('jjames@pedistributors.com','User password changed',$message, $headers);
			}else{
				$this->pageResponse("sql_fail");
			}
		}
	}

	function checkinfo($formdata){
		if(($formdata[newpass1] !== $formdata[newpass2])){
			echo $formdata[newpass1];
			$this->pageResponse("pw_mismatch");
			return FALSE;
		}else{
		foreach($formdata as $k=>$v){
			if(empty($formdata[$k])){
				$this->pageResponse("form_incomplete");
				return FALSE;
			}
		return TRUE;
		}
	}

	}
}

$account = new Account;

?>