<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for actions
if ($_POST["do"] == "createuser"){
	$errormsg = createuser($_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirm"], $_POST["status"], $_POST["ipaddress"]);
}

// default values
if ($_POST["do"] == "createuser" && $errormsg != "User created successfully!"){
	
	$d_username = un($_POST["username"]);
	$d_email    = un($_POST["email"]);
	$d_status   = intval($_POST["status"]);
	$d_ipaddress= un($_POST["ipaddress"]);
	
} else {

	$d_status   = 1;

}

include("admin_header.php");
?>
<h1>Create User</h1>

<form action="admin_newuser.php" method="post" name="f" id="f">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th colspan="4">User Details</th>
	</tr>
	<tr>
		<td style="width: 20%;">Username:</td>
		<td style="width: 30%; text-align: right;"><input type="text" size="20" maxlength="100" name="username" value="<?=$d_username?>" /></td>
		<td style="width: 20%;">Email:</td>
		<td style="width: 30%; text-align: right;"><input type="text" size="20" maxlength="100" name="email" value="<?=$d_email?>" /></td>
	</tr>
	<tr>
		<td style="width: 20%;">Password:</td>
		<td style="width: 30%; text-align: right;"><input type="password" size="20" maxlength="100" name="password" /></td>
		<td style="width: 20%;">Confirm Password:</td>
		<td style="width: 30%; text-align: right;"><input type="password" size="20" maxlength="100" name="confirm" /></td>
	</tr>
	<tr>
		<td style="width: 20%;">IP Address:</td>
		<td style="width: 30%; text-align: right;"><input type="text" size="20" maxlength="100" name="ipaddress" value="<?=$d_ipaddress?>" /></td>
		<td style="width: 20%;">Status:</td>
		<td style="width: 30%; text-align: right;">
			<select name="status">
				<option value="0"<?php if ($d_status == 0){ echo(" selected"); } ?>>Locked</option>
				<option value="1"<?php if ($d_status == 1){ echo(" selected"); } ?>>Moderator</option>
				<option value="2"<?php if ($d_status == 2){ echo(" selected"); } ?>>Administrator</option>
			</select>
		</td>
	</tr>
	<tr>
		<th colspan="4">
			<input type="hidden" name="do" value="createuser" />
			<input type="submit" value="Create User!" />
		</th>
	</tr>
</table>
</form>

<script language="JavaScript" type="text/javascript">
<!--
window.onload = function(){
	document.forms.f.username.focus();
}
-->
</script>
<?php
include("admin_footer.php");
?>