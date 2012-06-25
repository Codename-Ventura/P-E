<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// variables
$filename = $_GET["filename"];
$skinid   = intval($_GET["skinid"]);
$historyid= intval($_GET["historyid"]);

// validate skinid
$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE skinid = " . $skinid;
$skn = $db->execute($sql);
if ($skn->rows < 1){ notfound(); }

// check for a history
$sql = "SELECT * FROM " . $dbprefix . "skinhistory WHERE skinid = " . $skinid . " AND filename = '" . dbSecure($filename) . "' ORDER BY postdate DESC";
$his = $db->execute($sql);

// check for selection
if ($historyid > 0){
	$sql = "SELECT * FROM " . $dbprefix . "skinhistory WHERE historyid = " . $historyid;
	$rec = $db->execute($sql);
}

include("admin_header.php");
?>
<h1>Template History</h1>

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th colspan="2">Template History</th>
	</tr>
	<tr>
		<td style="width: 50%;">Skinset:</td>
		<td style="text-align: right;">
			<a href="admin_skins.php?show=<?=$skn->fields["skinid"]?>"><?=$skn->fields["title"]?></a>
		</td>
	</tr>
	<tr>
		<td style="width: 50%;">Template:</td>
		<td style="text-align: right;">
			<a href="admin_edittemplate.php?skinid=<?=$skn->fields["skinid"]?>&amp;filename=<?=$filename?>"><?=$filename?></a>
		</td>
	</tr>
	<?php if ($his->rows < 1){ ?>
	<tr>
		<td colspan="2" style="text-align: center;">
			There is no history available for this template
		</td>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="2" style="text-align: center;">
			<form action="admin_templatehistory.php" method="get">
			<select name="historyid">
				<?php do { ?>
				<option value="<?=$his->fields["historyid"]?>"><?=date("j F Y H:i", $his->fields["postdate"])?></option>
				<?php } while ($his->loop()); ?>
			</select>
			<input type="hidden" name="skinid" value="<?=$skinid?>" />
			<input type="hidden" name="filename" value="<?=$filename?>" />
			<input type="submit" value="View!" />
			</form>
		</td>
	</tr>
	<?php } // end history check ?>
</table>

<?php if ($rec->rows > 0){ // view a historial copy ?>
<br />
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th><?=date("j F Y H:i", $rec->fields["postdate"])?></th>
	</tr>
	<tr>
		<td colspan="2" style="text-align: center;">
			<textarea cols="60" rows="15" name="code"><?=$rec->fields["code"]?></textarea>
		</td>
	</tr>
	<tr>
		<th colspan="2">
			<form action="admin_skins.php" method="get">
				<input type="hidden" name="show" value="<?=$skinid?>" />
				<input type="submit" value="Return To Overview" />
			</form>
		</th>
	</tr>
</table>
<?php } // end check for showing ?>
<?php
include("admin_footer.php");
?>