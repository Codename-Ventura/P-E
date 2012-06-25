<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for action
if ($_POST["do"] == "deleteplugin"){
	$errormsg = deleteplugin($_GET["pluginid"]);
}

// get recordset
$sql = "SELECT * FROM " . $dbprefix . "plugin_plugins WHERE pluginid = " . intval($_GET["pluginid"]);
$rec = $db->execute($sql);
if ($rec->rows < 1){ notfound(); }

include("admin_header.php");
?>
<h1>Delete Plugin</h1>

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Delete Plugin</th>
	</tr>
	<tr>
		<td>
			Are you sure you want to delete the plugin <strong><?=$rec->fields["title"]?></strong>? It is recommended you download a backup using the export tool before you do.<br /><br />
			
			<form action="admin_deleteplugin.php?pluginid=<?=$rec->fields["pluginid"]?>" method="post" style="text-align: center;">
				<input type="submit" value="Yes, Delete It!" />
				<input type="hidden" name="do" value="deleteplugin" />
				<a href="admin_plugins.php">No, cancel</a>
			</form>
		</td>
	</tr>
</table>
<?php
include("admin_footer.php");
?>