<?php
function createuser($username, $email, $password, $confirm, $status, $ipaddress){
	global $db, $dbprefix;
	
	// standard validation
	if ($username == ""){ return "You did not enter a username"; }
	if ($email == ""){ return "You did not enter an email address"; }
	if ($password == ""){ return "You did not enter a password"; }
	if ($password <> $confirm){ return "Your passwords did not match"; }
	$status = intval($status);
	
	// status
	if ($status < 0 || $status > 2){
		$status = 1;
	}
	
	// check username
	$sql = "SELECT * FROM " . $dbprefix . "users WHERE username = '" . dbSecure($username) . "'";
	$usn = $db->execute($sql);
	if ($usn->rows > 0){ return "This username is already taken"; }
	
	// inser the user
	$sql  = "INSERT INTO " . $dbprefix . "users (username, email, password, ipaddress, status, joindate) VALUES (";
	$sql .= "'" . dbSecure($username) . "', ";
	$sql .= "'" . dbSecure($email) . "', ";
	$sql .= "'" . dbSecure(md5($password)) . "', ";
	$sql .= "'" . dbSecure($ipaddress) . "', ";
	$sql .= $status . ", ";
	$sql .= time() . ")";
	$db->execute($sql);
	
	// and notify (ref: admin_newuser.php)
	return "User created successfully!";
}

function deleteuser($userid){
	global $db, $dbprefix;
	
	// standard validation
	$userid = intval($userid);
	
	// validate the user
	$sql = "SELECT * FROM " . $dbprefix . "users WHERE userid = " . $userid;
	$use = $db->execute($sql);
	if ($use->rows < 1){ return "The user could not be found"; }
	
	// and remove from the users table
	$sql = "DELETE FROM " . $dbprefix . "users WHERE userid = " . $use->fields["userid"];
	$db->execute($sql);
	
	// and redirect back
	redirect("admin_users.php");
}

function edituser($userid, $username, $email, $password, $confirm, $status, $ipaddress){
	global $db, $dbprefix;
	
	// standard validation
	if ($username == ""){ return "You did not enter a username"; }
	if ($email == ""){ return "You did not enter an email address"; }
	if ($password <> $confirm){ return "Your passwords did not match"; }
	$userid = intval($userid);
	$status = intval($status);
	
	// validate user
	$sql = "SELECT * FROM " . $dbprefix . "users WHERE userid = " . $userid;
	$use = $db->execute($sql);
	if ($use->rows < 1){ return "The user account could not be found"; }
	
	// check username
	if ($use->fields["username"] <> $username){
		$sql = "SELECT * FROM " . $dbprefix . "users WHERE username = '" . dbSecure($username) . "'";
		$usn = $db->execute($sql);
		if ($usn->rows > 0){ return "This username is already taken"; }
	}
	
	// password
	if ($password == ""){
		$password = $use->fields["password"];
	} else {
		$password = md5($password);
	}
	
	// status
	if ($status < 0 || $status > 2){
		$status = 1;
	}
	
	// run the update
	$sql  = "UPDATE " . $dbprefix . "users SET ";
	$sql .= "username = '" . dbSecure($username) . "', ";
	$sql .= "password = '" . dbSecure($password) . "', ";
	$sql .= "email = '" . dbSecure($email) . "', ";
	$sql .= "status = " . $status . ", ";
	$sql .= "ipaddress = '" . dbSecure($ipaddress) . "' ";
	$sql .= "WHERE userid = " . $use->fields["userid"];
	$db->execute($sql);
	
	// and return
	return "User updated successfully!";
}

function exactmatchuser($username){
	global $db, $dbprefix;
	
	// standard validation
	if ($username == ""){ return "You did not enter a username"; }
	
	// find the user
	$sql = "SELECT * FROM " . $dbprefix . "users WHERE username = '" . dbSecure($username) . "'";
	$rec = $db->execute($sql);
	if ($rec->rows < 1){ return "No user was matched to this username"; }
	
	// and redirect
	redirect("admin_edituser.php?userid=" . $rec->fields["userid"]);
}
?>