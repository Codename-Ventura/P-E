<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// variables
$filename = $_GET["filename"];

// get recordset
$sql = "SELECT * FROM " . $dbprefix . "skinbase WHERE filename = '" . dbSecure($filename) . "'";
$rec = $db->execute($sql);

include("admin_header.php");
?>
<h1>View Original</h1>

<form action="admin_skins.php" method="get">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th><?=$filename?></th>
	</tr>
	<tr>
		<td style="text-align: center;">
			<?php if ($rec->rows < 0){ ?>
			There is no original template available. Perhaps it is a user created template?
			<?php } else { ?>
			<textarea cols="60" rows="15" name="code"><?=$rec->fields["code"]?></textarea>
			<?php } ?>
		</td>
	</tr>
	<tr>
		<th>
			<input type="hidden" name="show" value="<?=$_GET["skinid"]?>" />
			<input type="submit" value="Return To Overview" />
		</th>
	</tr>
</table>
</form>
<?php
include("admin_footer.php");
?>