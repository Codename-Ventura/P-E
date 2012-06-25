<?php
define("IN_SCRIPT", true);
require("../includes/global.php");

// check for signin
if ($_POST["username"] <> ""){
	$errormsg = $usr->signin($_POST["username"], $_POST["password"], urldecode($_POST["from"]));
	$d_username = htmlspecialchars(un($_POST["username"]));
} else {
	$d_username = htmlspecialchars($_COOKIE["rem_username"]);
}

// work out default focus
if ($_COOKIE["rem_username"] <> ""){
	$d_focus = "password";
} else {
	$d_focus = "username";
}

include("admin_header.php");
?>
<form action="admin_signin.php?from=<?=urlencode($_GET["from"])?>" method="post" id="f" name="f">
<table cellpadding="3" cellspacing="1" border="0" align="center" class="tbl" style="margin-top: 50px;">
	<tr>
		<th colspan="2">
			Sign in
		</th>
	</tr>
	<tr>
		<td>Username:</td>
		<td><input type="text" size="30" maxlength="50" id="username" name="username" value="<?=$d_username?>" /></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" size="30" maxlength="50" id="password" name="password" /></td>
	</tr>
	<tr>
		<th colspan="2">
			<input type="hidden" id="from" name="from" value="<?=urlencode($_GET["from"])?>" />
			<input type="submit" value="Login!" />
		</th>
	</tr>
</table>
</form>

<script language="JavaScript" type="text/javascript">
<!--
window.onload = function(){
	document.forms.f.<?=$d_focus?>.focus();
}
-->
</script>
<?php
include("admin_footer.php");
?>