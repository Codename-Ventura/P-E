<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for actions
if ($_POST["do"] == "create"){
	$errormsg = createskin($_POST["title"], $_POST["copyfrom"], $_POST["visible"]);
}

// get list of skins
$sql = "SELECT * FROM " . $dbprefix . "skinsets ORDER BY title ASC";
$ski = $db->execute($sql);

include("admin_header.php");
?>
<h1>Create Skinset</h1>

<form action="admin_newskin.php" method="post" id="f" name="f">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th colspan="2">Skin Information</th>
	</tr>
	<tr>
		<td>Title:</td>
		<td><input type="text" size="30" maxlength="255" name="title" value="<?=$d_title?>" /></td>
	</tr>
	<tr>
		<td>Copy From:</td>
		<td>
			<select name="copyfrom">
				<?php if ($ski->rows > 0){ do { ?>
				<option value="<?=$ski->fields["skinid"]?>"><?=$ski->fields["title"]?></option>
				<?php } while ($ski->loop()); } ?>
				<option value="0">Just create a blank skin</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Visibility:</td>
		<td>
			<select name="visible">
				<option value="1">Visible to users</option>
				<option value="0">Hidden to users</option>
			</select>
		</td>
	</tr>
	<tr>
		<th colspan="2">
			<input type="hidden" name="do" value="create" />
			<input type="submit" value="Create Skinset!" />
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