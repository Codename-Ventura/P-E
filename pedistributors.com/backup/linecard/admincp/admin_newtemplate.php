<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for actions
if ($_POST["do"] == "add"){
	$errormsg = newtemplate($_POST["skinid"], $_POST["title"], $_POST["code"]);
}

// get list of skins
$sql = "SELECT * FROM " . $dbprefix . "skinsets ORDER BY title ASC";
$ski = $db->execute($sql);

// default values
if ($errormsg <> "" && $errormsg != "Template added successfully!"){
	
	$d_title = un($_POST["title"]);
	$d_code = un($_POST["code"]);
	
}

include("admin_header.php");
?>
<h1>Add New Template</h1>

<form action="admin_newtemplate.php" method="post" id="f" name="f">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th colspan="2">Template Details</th>
	</tr>
	<tr>
		<td>Title:</td>
		<td style="text-align: right;"><input type="text" size="40" maxlength="100" name="title" value="<?=$d_title?>" /></td>
	</tr>
	<tr>
		<td>Skinset:</td>
		<td style="text-align: right;">
			<select name="skinid">
				<?php if ($ski->rows > 0){ do { ?>
				<option value="<?=$ski->fields["skinid"]?>"<?php if (intval($_POST["skinid"]) == $ski->fields["skinid"]){ echo(" selected"); } ?>><?=$ski->fields["title"]?></option>
				<?php } while ($ski->loop()); } ?>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="text-align: center;">
			<textarea cols="60" rows="15" name="code"><?=$d_code?></textarea>
		</td>
	</tr>
	<tr>
		<th colspan="2">
			<input type="hidden" name="do" value="add" />
			<input type="submit" value="Add Template!" />
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