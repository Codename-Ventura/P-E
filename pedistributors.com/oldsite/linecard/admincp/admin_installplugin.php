<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for action
if ($_POST["do"] == "installplugin"){
	$errormsg = installplugin($_FILES["file"], $_POST["enabled"]);
}

include("admin_header.php");
?>
<h1>Install Plugin</h1>

<form action="admin_installplugin.php" method="post" enctype="multipart/form-data">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Install Plugin</th>
	</tr>
	<tr>
		<td>
			Select the XML file you would like the install from...<br /><br />
			
			<input type="file" name="file" size="40" /><br /><br />
			
			Do you want it enabled immediately?<br /><br />
			
			<select name="enabled">
				<option value="1">Yes, enable it</option>
				<option value="0">No, disable it</option>
			</select>
		</td>
	</tr>
	<tr>
		<th>
			<input type="hidden" name="do" value="installplugin" />
			<input type="submit" value="Install Plugin!" />
		</th>
	</tr>
</table>
</form>
<?php
include("admin_footer.php");
?>