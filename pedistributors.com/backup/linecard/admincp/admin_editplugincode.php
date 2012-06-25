<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for actions
if ($_POST["do"] == "editcodeblock"){
	$errormsg = editcodeblock($_GET["codeid"], $_POST["locationid"], $_POST["code"]);
}

// get recordset
$codeid = intval($_GET["codeid"]);
$sql = "SELECT * FROM " . $dbprefix . "plugin_code WHERE codeid = " . $codeid;
$rec = $db->execute($sql);
if ($rec->rows < 1){ notfound(); }

// get plugin
$sql = "SELECT * FROM " . $dbprefix . "plugin_plugins WHERE pluginid = " . $rec->fields["pluginid"];
$plg = $db->execute($sql);

// get all locations
$sql = "SELECT * FROM " . $dbprefix . "plugin_locations ORDER BY description ASC";
$loc = $db->execute($sql);

// get archived versions
$sql = "SELECT * FROM " . $dbprefix . "plugin_code_history WHERE codeid = " . $codeid . " ORDER BY postdate DESC";
$arc = $db->execute($sql);

if ($_GET["historyid"] <> ""){
	$sql = "SELECT * FROM " . $dbprefix . "plugin_code_history WHERE historyid = " . intval($_GET["historyid"]);
	$vhv = $db->execute($sql);
}

// default form values
if ($errormsg <> ""){
	$d_code = htmlspecialchars(un($_POST["code"]));
	$d_locationid = intval($_POST["locationid"]);
} else {
	$d_code = htmlspecialchars($rec->fields["code"]);
	$d_locationid = $rec->fields["locationid"];
}

include("admin_header.php");
?>
<h1>Edit Plugin Code</h1>

<form action="admin_editplugincode.php?codeid=<?=$rec->fields["codeid"]?>" method="post" id="f" name="f">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th colspan="2">Edit Code Block</th>
	</tr>
	<tr>
		<td>For Plugin:</td>
		<td style="text-align: right;">
			<a href="admin_plugins.php?show=<?=$rec->fields["pluginid"]?>"><?=$plg->fields["title"]?></a>
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
			<input type="submit" value="Edit Code Block!" />
			<input type="hidden" name="do" value="editcodeblock" />
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

<?php if ($arc->rows > 0){ ?>
<span id="history"></span><br />
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Historical Versions</th>
	</tr>
	<tr>
		<td style="text-align: center;">
			<form action="admin_editplugincode.php#history" method="get">
				<select name="historyid">
					<?php do { ?>
					<option value="<?=$arc->fields["historyid"]?>"<?php if ($_GET["historyid"] == $arc->fields["historyid"]){ echo(" selected"); } ?>><?=date("j F Y H:i:s", $arc->fields["postdate"])?></option>
					<?php } while ($arc->loop()); ?>
				</select>
				<input type="hidden" name="codeid" value="<?=$codeid?>" />
				<input type="submit" value="View!" />
			</form>
		</td>
	</tr>
	<?php if ($_GET["historyid"] <> "" && $vhv->rows > 0){ ?>
	<tr>
		<th><?=date("j F Y H:i:s", $vhv->fields["postdate"])?></th>
	</tr>
	<tr>
		<td style="text-align: center;">
			<textarea cols="60" rows="15"><?=htmlspecialchars($vhv->fields["code"])?></textarea>
		</td>
	</tr>
	<?php } // view historical copy check ?>
</table>
<?php } // end code history check ?>
<?php
include("admin_footer.php");
?>