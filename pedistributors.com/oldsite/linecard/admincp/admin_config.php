<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for actions
if ($_POST["do"] == "config"){
	$errormsg = updateconfig();
}

// get config rows
$sql = "SELECT * FROM " . $dbprefix . "config WHERE config_help <> '' ORDER BY config_name ASC";
$cng = $db->execute($sql);

include("admin_header.php");
?>
<h1>Configuration</h1>

<form action="admin_config.php" method="post">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th colspan="2">Configuration Options</th>
	</tr>
	<?php if ($cng->rows > 0){ do { ?>
	<tr>
		<td style="width: 50%;">
			<strong><?=$cng->fields["config_name"]?></strong><br />
			<?=$cng->fields["config_help"]?>
		</td>
		<td style="width: 50%;">
			<input type="text" size="40" maxlength="100" name="<?=$cng->fields["config_name"]?>" value="<?=htmlspecialchars($cng->fields["config_value"])?>" />
		</td>
	</tr>
	<?php } while ($cng->loop()); } ?>
	<tr>
		<th colspan="2">
			<input type="hidden" name="do" value="config" />
			<input type="submit" value="Edit Configuration!" />
		</th>
	</tr>
</table>
</form>
<?php
include("admin_footer.php");
?>