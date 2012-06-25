<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for actions
if ($_POST["do"] == "addphrase"){
	$errormsg = addphrase($_POST["phrase_name"], $_POST["phrase_value"]);
	
	// default values
	if ($errormsg != "Phrase added successfully!"){
		$d_name = htmlspecialchars(un($_POST["phrase_name"]));
		$d_value = htmlspecialchars(un($_POST["phrase_value"]));
	}
}

include("admin_header.php");
?>
<h1>Add New Phrase</h1>

<form action="admin_newphrase.php" method="post" id="f" name="f">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th colspan="2">Phrase Information</th>
	</tr>
	<tr>
		<td>Name:</td>
		<td><input type="text" size="30" maxlength="255" id="phrase_name" name="phrase_name" value="<?=$d_name?>" /></td>
	</tr>
	<tr>
		<td>Value:</td>
		<td>
			<textarea cols="30" id="phrase_value" name="phrase_value"><?=$d_value?></textarea>
		</td>
	</tr>
	<tr>
		<th colspan="2">
			<input type="hidden" id="do" name="do" value="addphrase" />
			<input type="submit" value="Add Phrase!" />
		</th>
	</tr>
</table>
</form>

<script language="JavaScript" type="text/javascript">
<!--
window.onload = function(){
	document.forms.f.phrase_name.focus();
}
-->
</script>
<?php
include("admin_footer.php");
?>