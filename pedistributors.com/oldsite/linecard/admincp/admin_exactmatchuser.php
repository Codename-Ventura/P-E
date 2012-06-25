<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for action
if ($_POST["do"] == "match"){
	$errormsg = exactmatchuser($_POST["username"]);
}

include("admin_header.php");
?>
<h1>Exact Match</h1>

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Exact Match Search</th>
	</tr>
	<tr>
		<td>
			<form action="admin_exactmatchuser.php" method="post" id="f" name="f">
			Use this to form to quickly edit a user by entering their exact username.<br /><br />
			
			<input type="text" size="40" name="username" id="username" maxlength="100" value="<?=un($_POST["username"])?>" />
			<input type="submit" value="Exact Match" />
			<input type="hidden" name="do" value="match" />
			</form>
		</td>
	</tr>
</table>

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