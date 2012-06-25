<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for actions
if ($_POST["do"] == "addcodeblock"){
	$errormsg = addcodeblock($_POST["pluginid"], $_POST["locationid"], $_POST["code"]);
	
	$d_pluginid = intval($_POST["pluginid"]);
	$d_locationid = intval($_POST["locationid"]);
} else {
	$d_pluginid = intval($_GET["pluginid"]);
}

// default values
if ($_POST["do"] == "addcodeblock" && $errormsg != "Code block added successfully!"){
	$d_code = htmlspecialchars(un($_POST["code"]));
}

// get all plugins
$sql = "SELECT * FROM " . $dbprefix . "plugin_plugins ORDER BY title ASC";
$plg = $db->execute($sql);

// get all locations
$sql = "SELECT * FROM " . $dbprefix . "plugin_locations ORDER BY description ASC";
$loc = $db->execute($sql);

include("admin_header.php");
?>
<h1>New Plugin Code</h1>

<form action="admin_newplugincode.php" method="post" id="f" name="f">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th colspan="2">Code Block</th>
	</tr>
	<tr>
		<td>For Plugin:</td>
		<td style="text-align: right;">
			<select name="pluginid">
				<?php if ($plg->rows > 0){ do { ?>
				<option value="<?=$plg->fields["pluginid"]?>"<?php if ($plg->fields["pluginid"] == $d_pluginid){ echo(" selected"); } ?>><?=$plg->fields["title"]?></option>
				<?php } while ($plg->loop()); } ?>
			</select>
		</td>
	</tr>
	<tr>
		<td>At Location:</td>
		<td style="text-align: right;">
			<select name="locationid">
				<?php if ($loc->rows > 0){ do { ?>
				<option value="<?=$loc->fields["locationid"]?>"<?php if ($loc->fields["locationid"] == $d_locationid){ echo(" selected"); } ?>><?=$loc->fields["description"]?></option>
				<?php } while ($loc->loop()); } ?>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="text-align: center;">
			<textarea name="code" id="code" cols="60" rows="15"><?=$d_code?></textarea>
		</td>
	</tr>
	<tr>
		<th colspan="2">
			<input type="submit" value="Add New Code Block!" />
			<input type="hidden" name="do" value="addcodeblock" />
		</th>
	</tr>
</table>
</form>

<script language="JavaScript" type="text/javascript">
<!--
window.onload = function(){
	document.forms.f.code.focus();
}
-->
</script>
<?php
include("admin_footer.php");
?>