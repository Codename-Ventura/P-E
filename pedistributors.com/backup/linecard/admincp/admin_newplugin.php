<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for action
if ($_POST["do"] == "createplugin"){
	$errormsg = createplugin($_POST["title"], $_POST["author"], $_POST["version"], $_POST["enabled"]);
}

// default form values
if ($_POST["do"] == "createplugin" && $errormsg != "Plugin created successfully!"){
	$d_title = htmlspecialchars(un($_POST["title"]));
	$d_author = htmlspecialchars(un($_POST["author"]));
	$d_version = htmlspecialchars(un($_POST["version"]));
	$d_enabled = intval($_POST["enabled"]);
} else {
	$d_version = "1.0.0";
	$d_enabled = 0;
}

include("admin_header.php");
?>
<h1>Create New Plugin</h1>

<form action="admin_newplugin.php" method="post" id="f" name="f">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th colspan="2">Plugin Information</th>
	</tr>
	<tr>
		<td style="width: 50%;">Title:</td>
		<td><input type="text" size="30" maxlength="255" name="title" id="title" value="<?=$d_title?>" /></td>
	</tr>
	<tr>
		<td>Author:</td>
		<td><input type="text" size="30" maxlength="255" name="author" value="<?=$d_author?>" /></td>
	</tr>
	<tr>
		<td>Version:</td>
		<td><input type="text" size="30" maxlength="255" name="version" value="<?=$d_version?>" /></td>
	</tr>
	<tr>
		<td>Enabled:</td>
		<td>
			<select name="enabled">
				<option value="1"<?php if ($d_enabled == 1){ echo(" selected"); } ?>>Enabled</option>
				<option value="0"<?php if ($d_enabled == 0){ echo(" selected"); } ?>>Disabled</option>
			</select>
		</td>
	</tr>
	<tr>
		<th colspan="2">
			<input type="submit" value="Create Plugin!" />
			<input type="hidden" name="do" value="createplugin" />
		</th>
	</tr>
</table>
</form>

<script language="JavaScript" type="text/javascript">
<!--
window.onload = function(){
	document.forms.f.title.focus();
}
-->
</script>
<?php
include("admin_footer.php");
?>