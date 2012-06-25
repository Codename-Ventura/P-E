<?php
// class for user authorisation, registration, etc
class UserSys{
	
	// variables up for grabs
	var $Access;
	
	// user sign in and validation function
	function signin($username, $password = "", $from = ""){
		global $config, $db, $dbprefix;
		
		// validate the information
		if ($username == ""){ return "No username entered"; }
		if ($password == ""){ return "No password entered"; }
		
		// select user from the database
		$sql = "SELECT * FROM " . $dbprefix . "users WHERE username = '" . dbSecure($username) . "'";
		$userget = $db->execute($sql);
		if ($userget->rows < 1){ return "This username is not registerd"; }
		
		// validate the password
		if ($from === 0){
			if ($userget->fields["password"] <> $password){
				return "Your password was incorrect";
			}
		} else {
			if ($userget->fields["password"] <> md5($password)){
				return "Your password was incorrect";
			}
		}
		
		// check the account isn't locked
		if ($userget->fields["status"] == 0){ return "Your account has been locked"; }
		
		// user is cleared, update database
		$sql = "UPDATE " . $dbprefix . "users SET logindate = " . time() . ", ipaddress = '";
		$sql .= $_SERVER["REMOTE_ADDR"] . "'";
		$sql .= " WHERE userid = " . $userget->fields["userid"];
		$db->execute($sql);
		
		// load information into session
		$_SESSION["userid"] = $userget->fields["userid"];
		$_SESSION["username"] = $userget->fields["username"];
		$_SESSION["password"] = $userget->fields["password"];
		
		// create cookies for auto-sign-in
		setcookie("rem_username", $userget->fields["username"], time()+7776000);
		setcookie("rem_password", $userget->fields["password"], time()+7776000);
		
		// where to send the user?
		if ($from === 0){
			// do nothing
		} elseif ($from <> ""){
			redirect($from);
		} else {
			redirect("./");
		}
	}
	
	// log user out, destroy sessions
	function signout(){
		$_SESSION = Array();
		session_destroy();
		
		setcookie("rem_username", null, time()+7776000);
		setcookie("rem_password", null, time()+7776000);
	}
	
	// user authorisation function
	function Auth($level){
		global $config, $db, $dbprefix;
		
		if ($_SESSION["userid"] <> ""){
			// validate users login
			$sql = "SELECT * FROM " . $dbprefix . "users WHERE userid = " . dbSecure($_SESSION["userid"]);
			$userd = $db->execute($sql);
			if ($userd->rows < 1){
				// user account not found
				$this->signout();
				$authlevel = 0;
			} else {
				// user account found
				if ($_SESSION["username"] <> $userd->fields["username"] || $_SESSION["password"] <> $userd->fields["password"]){
					// incorrect details
					$this->signout();
					$authlevel = 0;
				} else {
					// user is actually ok, supringly
					$authlevel = $userd->fields["status"];
				}
			}
		} else {
			// user is just a visitor
			$authlevel = 0;
		}
		
		// set auth level
		$this->Access = $authlevel;
		
		// finally, check if user has access
		if ($level > $authlevel){
			if ($authlevel > 0){
				die("You are not authorised to view this page.");
			} else {
				if ($_SERVER["REQUEST_URI"]){
					$qs = "";
					foreach($_SERVER["argv"] as $x){
						$qs .= $x . "&";
					}
					
					redirect($config["virtualpath"] . "admincp/admin_signin.php?from=" . urlencode($_SERVER["PHP_SELF"] . "?" . $qs));
				} else {
					redirect($config["virtualpath"] . "admincp/admin_signin.php?from=" . urlencode($_SERVER["REQUEST_URI"]));
				}
			}
		}
	
	}
	
	// registration
	function register(){
		global $db, $dbprefix, $config;
		
		// standard validation
		if ($_POST["rusername"] == ""){ return "No username entered"; }
		if ($_POST["password"] == ""){ return "No password entered"; }
		if ($_POST["password2"] == ""){ return "You did not confirm your password"; }
		if ($_POST["email"] == ""){ return "You did not enter your email address"; }
		
		// check passwords
		if ($_POST["password"] <> $_POST["password2"]){ return "Your passwords did not match"; }
		
		// email address validation
		if (function_exists("checkdnsrr")){
			$emailsplit = split("@", $_POST["email"]);
			if (!(checkdnsrr($emailsplit[1], "MX"))){
				return "Your email address is not valid";
			}
		}
		
		// check for taken username
		$sql = "SELECT * FROM " . $dbprefix . "users WHERE username = '" . dbSecure($_POST["rusername"]) . "'";
		$chk = $db->execute($sql);
		if ($chk->rows > 0){ return "This username has already been taken"; }
		
		// check for taken email address
		$sql = "SELECT * FROM " . $dbprefix . "users WHERE email = '" . dbSecure($_POST["email"]) . "'";
		$chk = $db->execute($sql);
		if ($chk->rows > 0){ return "This email address is already in use"; }
		
		// run the insert statement
		$sql = "INSERT INTO " . $dbprefix . "users (username, password, email, ipaddress, regdate) VALUES (";
		$sql .= "'" . dbSecure($_POST["rusername"]) . "', ";
		$sql .= "'" . dbSecure(md5($_POST["password"])) . "', ";
		$sql .= "'" . dbSecure($_POST["email"]) . "', ";
		$sql .= "'" . $_SERVER["REMOTE_ADDR"] . "', ";
		$sql .= time() . ")";
		$db->execute($sql);
		
		// ok, send welcome email
		$msg = "Hi,\nThank you for registering. Your username is: ";
		$msg = $msg . $_POST["rusername"] . "\n\nYou can log in on the site.";
		communicate($_POST["email"], $config["sitename"] . " Registration", $msg);
		
		// and sign user in
		$this->signin($_POST["rusername"], $_POST["password"]);
		
		// and return
		return false;
	}
	
	// updating a profile
	function profile(){
		global $db, $dbprefix;
		
		$pass1 = $_POST["pass1"];
		$pass2 = $_POST["pass2"];
		$pass3 = $_POST["pass3"];
		$email = $_POST["email"];
		$usern = $_POST["usern"];
		
		// ok, lets begin with validation
		if ($pass1 == ""){ return "You did not enter your old password"; }
		if ($pass2 <> $pass3){ return "Your new passwords did not match"; }
		if ($usern == ""){ return "You did not enter a username"; }
		
		// validate and get existing profile
		$this->auth(1);
		$sql = "SELECT * FROM " . $dbprefix . "users WHERE userid = " . dbSecure(intval($_SESSION["userid"]));
		$pro = $db->execute($sql);
		if ($pro->rows < 1){ return "Unable to locate your profile"; }
		
		// validate current password
		if ($pro->fields["password"] <> md5($pass1)){
			return "Your current password was incorrect";
		}
		
		// work out new password
		if ($pass2 <> ""){
			$newpass = md5($pass2);
			
			// sign user in and out
			$newsignin = 1;
		} else {
			$newpass = $pro->fields["password"];
		}
		
		// username change check?
		if ($pro->fields["username"] <> $usern){
			$newsignin = 1;
		}
		
		// work out new email address
		if ($pro->fields["email"] <> $email){
			// make sure it's a real address
			if (function_exists("checkdnsrr")){
				$emailsplit = split("@", $email);
				if (!(checkdnsrr($emailsplit[1], "MX"))){
					return "Your email address is not valid";
				}
			}
			
			// now make sure that is isn't being used
			$sql = "SELECT email FROM " . $dbprefix . "users WHERE email = '" . dbSecure($email) . "' AND userid <> " . $pro->fields["userid"];
			$chk = $db->execute($sql);
			if ($chk->rows > 0){ return "This email address is already in use"; }
			
			// and set variable
			$newemail = $email;
		} else {
			$newemail = $pro->fields["email"];
		}
		
		// and run the update dealie
		$sql  = "UPDATE " . $dbprefix . "users SET ";
		$sql .= "password = '" . dbSecure($newpass) . "', ";
		$sql .= "email = '" . dbSecure($newemail) . "', ";
		$sql .= "username = '" . dbSecure($usern) . "' ";
		$sql .= "WHERE userid = " . $pro->fields["userid"];
		$db->execute($sql);
		
		// sign user in and out?
		if ($newsignin == 1){
			$this->signout();
			StartSession();
			$this->signin($usern, $newpass, 0);
		}
		
		// and return
		return "Profile updated successfully!";
	}
}
?>