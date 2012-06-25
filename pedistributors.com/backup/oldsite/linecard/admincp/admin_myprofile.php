<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(1);

// check for actions
if ($_POST["do"] == "updateprofile"){
	$errormsg = $usr->profile();
	
	$d_username = htmlspecialchars(un($_POST["usern"]));
	$d_email = htmlspecialchars(un($_POST["email"]));
	
} else {
	$sql = "SELECT * FROM " . $dbprefix . "users WHERE userid = " . intval($_SESSION["userid"]);
	$rec = $db->execute($sql);
	
	$d_username = htmlspecialchars($rec->fields["username"]);
	$d_email = htmlspecialchars($rec->fields["email"]);
}

include("admin_header.php");
?>
<h1>My Profile</h1>

<form action="admin_myprofile.php" method="post" id="f" name="f">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th colspan="2">Edit My Profile</th>
	</tr>
	<tr>
		<td>Current Password:</td>
		<td><input type="password" size="30" maxlength="50" id="pass1" name="pass1" /></td>
	</tr>
	<tr>
		<td>New Password:</td>
		<td><input type="password" size="30" maxlength="50" id="pass2" name="pass2" /></td>
	</tr>
	<tr>
		<td>Confirm New:</td>
		<td><input type="password" size="30" maxlength="50" id="pass3" name="pass3" /></td>
	</tr>
	<tr>
		<td>Username:</td>
		<td><input type="text" size="30" maxlength="50" id="usern" name="usern" value="<?=$d_username?>" /></td>
	</tr>
	<tr>
		<td>E-Mail:</td>
		<td><input type="text" size="30" maxlength="50" id="email" name="email" value="<?=$d_email?>" /></td>
	</tr>
	<tr>
		<th colspan="2" style="text-align: center;">
			<input type="hidden" id="do" name="do" value="updateprofile" />
			<input type="submit" value="Update Profile!" />
		</th>
	</tr>
</table>
</form>

<script language="JavaScript" type="text/javascript">
<!--
window.onload = function(){
	document.forms.f.pass1.focus();
}
-->
</script>
<?php
include("admin_footer.php");
?>