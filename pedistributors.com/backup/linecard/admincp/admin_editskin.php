<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for actions
if ($_POST["do"] == "edit"){
	$errormsg = editskin($_POST["skinid"], $_POST["title"], $_POST["imagesdir"], $_POST["visible"], $_POST["css"]);
}

// get the skin
$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE skinid = " . intval($_GET["skinid"]);
$rec = $db->execute($sql);
if ($rec->rows < 1){ notfound(); }

// work out default values
if ($_POST["do"] == "edit"){

	$d_title = un($_POST["title"]);
	$d_imagesdir = un($_POST["imagesdir"]);
	$d_css = un($_POST["css"]);
	$d_visible = un($_POST["visible"]);
	
} else {

	$d_title = $rec->fields["title"];
	$d_imagesdir = $rec->fields["imagesdir"];
	$d_css = $rec->fields["css"];
	$d_visible = $rec->fields["visible"];

}

include("admin_header.php");
?>
<h1>Edit Skinset</h1>

<form action="admin_editskin.php?skinid=<?=$rec->fields["skinid"]?>" method="post" id="f" name="f">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th colspan="2">Skin Information</th>
	</tr>
	<tr>
		<td>Title:</td>
		<td style="text-align: right;"><input type="text" size="40" maxlength="255" name="title" id="title" value="<?=$d_title?>" /></td>
	</tr>
	<tr>
		<td>Images Directory:</td>
		<td style="text-align: right;"><input type="text" size="40" maxlength="255" name="imagesdir" value="<?=$d_imagesdir?>" /></td>
	</tr>
	<tr>
		<td>Visibility:</td>
		<td style="text-align: right;">
			<select name="visible">
				<option value="1"<?php if ($d_visible == "1"){ echo(" selected"); } ?>>Visible to users</option>
				<option value="0"<?php if ($d_visible == "0"){ echo(" selected"); } ?>>Hidden to users</option>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="text-align: center;">
			CSS Code:
			<textarea cols="60" rows="15" name="css" style="width: 95%;"><?=$d_css?></textarea>
		</td>
	</tr>
	<tr>
		<th colspan="2">
			<input type="hidden" name="skinid" value="<?=$rec->fields["skinid"]?>" />
			<input type="hidden" name="do" value="edit" />
			<input type="submit" value="Update Skinset!" />
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