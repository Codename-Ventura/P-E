<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for actions
if ($_GET["toggle"] <> ""){
	$errormsg = toggleplugin($_GET["toggle"]);
} elseif ($_GET["export"] <> ""){
	$errormsg = exportplugin($_GET["export"]);
} elseif ($_POST["act"] == "Delete"){
	$errormsg = deletecodeblock($_POST["codeid"]);
} elseif ($_POST["act"] == "Add New Code Block"){
	redirect("admin_newplugincode.php?pluginid=" . $_POST["pluginid"]);
} elseif ($_POST["act"] == "Edit Selected Code"){
	redirect("admin_editplugincode.php?codeid=" . $_POST["codeid"]);
} elseif ($_POST["act"] == "View History"){
	redirect("admin_editplugincode.php?codeid=" . $_POST["codeid"] . "#history");
}

// get list of plugins
$sql = "SELECT * FROM " . $dbprefix . "plugin_plugins ORDER BY title ASC";
$rec = $db->execute($sql);

include("admin_header.php");
?>
<h1>Manage Plugins</h1>

<?php if (ENABLE_PLUGINS === FALSE){ ?>
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Plugins are currently globally disabled via includes/constants.php</th>
	</tr>
</table><br />
<?php } // end plugins enabled check ?>

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Plugin</th>
		<th>Version</th>
		<th>Enabled?</th>
		<th>Options</th>
	</tr>
	<?php if ($rec->rows < 1){ ?>
	<tr>
		<td colspan="4" style="text-align: center;">
			You do not currently have any plugins
		</td>
	</tr>
	<?php } else { do { ?>
	<tr>
		<td><?=$rec->fields["title"]?></td>
		<td><?=$rec->fields["version"]?></td>
		<td style="text-align: center;">
			<a href="admin_plugins.php?toggle=<?=$rec->fields["pluginid"]?>">
			<?php
			if ($rec->fields["enabled"] == 1){
				echo("Enabled");
			} else {
				echo("Disabled");
			}
			?>
			</a>
		</td>
		<td style="text-align: center;">
			<a href="admin_editplugin.php?pluginid=<?=$rec->fields["pluginid"]?>">Edit</a> | 
			<a href="admin_deleteplugin.php?pluginid=<?=$rec->fields["pluginid"]?>">Delete</a> | 
			<a href="admin_plugins.php?export=<?=$rec->fields["pluginid"]?>">Export</a> | 
			<a href="admin_plugins.php?show=<?=$rec->fields["pluginid"]?>" onClick="show_code_blocks(<?=$rec->fields["pluginid"]?>); return false;">Edit Code</a>
		</td>
	</tr>
	<?php
	$dis = (intval($_GET["show"]) == $rec->fields["pluginid"]) ? "" : "none";
	?>
	<tr style="display: <?=$dis?>;" id="codeblocks<?=$rec->fields["pluginid"]?>">
		<td colspan="4" style="text-align: center;">
			<form action="admin_plugins.php?show=<?=$rec->fields["pluginid"]?>" method="post">
			<table cellpadding="0" cellspacing="0" border="0" align="center"><tr><td>
			<select id="codeid" name="codeid" size="10">
				<?php
				$sql = "SELECT * FROM " . $dbprefix . "plugin_code AS c INNER JOIN " . $dbprefix . "plugin_locations AS l ON c.locationid = l.locationid WHERE c.pluginid = " . $rec->fields["pluginid"] . " ORDER BY l.description ASC";
				$cde = $db->execute($sql);
				if ($cde->rows > 0){ do {
				?>
				<option value="<?=$cde->fields["codeid"]?>">[<?=$cde->fields["codeid"]?>] <?=$cde->fields["description"]?></option>
				<?php
				} while ($cde->loop()); }
				?>
			</select>
			</td><td style="text-align: center; padding-left: 10px;">
				<input type="hidden" name="do" value="template" />
				<input type="hidden" name="pluginid" value="<?=$rec->fields["pluginid"]?>" />
				<input type="submit" name="act" value="Edit Selected Code" /><br />
				<input type="submit" name="act" value="View History" /><input type="submit" name="act" value="Delete" onClick="return confirm('Are you sure you want to delete this code block?');" /><br />
				<input type="submit" name="act" value="Add New Code Block" />
			</td></tr></table>
			</form>
		</td>
	</tr>
	<?php } while ($rec->loop()); } ?>
</table>
<?php
include("admin_footer.php");
?>