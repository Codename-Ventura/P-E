<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// variables
$filename = $_GET["filename"];
$skinid   = intval($_GET["skinid"]);

// check for actions
if ($_POST["do"] == "edit"){
	$errormsg = edittemplate($skinid, $filename, $_POST["code"]);
}

// validate skin
$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE skinid = " . $skinid;
$skn = $db->execute($sql);
if ($skn->rows < 1){ notfound(); }

// get baseskin for filename
$sql = "SELECT * FROM " . $dbprefix . "skinbase WHERE filename = '" . dbSecure($filename) . "'";
$bse = $db->execute($sql);

// and get current record
$sql = "SELECT * FROM " . $dbprefix . "skinfiles WHERE filename = '" . dbSecure($filename) . "' AND skinid = " . $skinid;
$cur = $db->execute($sql);

// work out code
$same = false;
if ($cur->rows > 0){
	$code = htmlspecialchars($cur->fields["code"]);
	$status = '<span style="background: #FFFFCC;">This template has been customised</span>';
	
	if ($cur->fields["code"] == $bse->fields["code"]){
		$same = true;
	}
} else {
	$code = htmlspecialchars($bse->fields["code"]);
	$status = "This template has not yet been customised";
}

// check for a history
$sql = "SELECT * FROM " . $dbprefix . "skinhistory WHERE skinid = " . $skinid . " AND filename = '" . dbSecure($filename) . "' ORDER BY postdate DESC";
$his = $db->execute($sql);

include("admin_header.php");
?>
<h1>Edit Template</h1>

<form action="admin_edittemplate.php?skinid=<?=$skinid?>&amp;filename=<?=$filename?>" method="post" id="f" name="f">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th colspan="2"><?=$filename?></th>
	</tr>
	<tr>
		<td style="width: 50%;">Skinset:</td>
		<td style="text-align: right;">
			<a href="admin_skins.php?show=<?=$skn->fields["skinid"]?>"><?=$skn->fields["title"]?></a>
		</td>
	</tr>
	<tr>
		<td>Status:</td>
		<td style="text-align: right;"><?=$status?></td>
	</tr>
	<?php if ($same === true){ ?>
	<tr>
		<td colspan="2" style="text-align: center;">
			<strong>Notice:</strong> Although this template has been customised, the customised version is idential to the base version. Therefore it is recommended you revert it unless you plan to make changes as if reverted it will update automatically when upgrading.
		</td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="2" style="text-align: center;">
			<textarea cols="60" rows="15" name="code"><?=$code?></textarea>
		</td>
	</tr>
	<tr>
		<th colspan="2">
			<input type="submit" name="act" value="Save Template" />
			<input type="hidden" name="do" value="edit" />
	</tr>
</table>
</form><br />

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl" id="history">
	<tr>
		<th>Template History</th>
	</tr>
	<?php if ($his->rows < 1){ ?>
	<tr>
		<td style="text-align: center;">
			There is no history available for this template
		</td>
	</tr>
	<?php } else { ?>
	<tr>
		<td style="text-align: center;">
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
<?php
include("admin_footer.php");
?>