<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for actions
if ($_POST["do"] == "editphrases"){
	$errormsg = editphrases();
} elseif ($_GET["multiline"] <> ""){
	$errormsg = multilinephrase($_GET["multiline"]);
}

// get phrases
$sql = "SELECT * FROM " . $dbprefix . "phrases ORDER BY phrase_name ASC";
$phr = $db->execute($sql);

include("admin_header.php");
?>
<h1>Edit Phrases</h1>

<form action="admin_editphrases.php" method="post">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th colspan="2">Phrases</th>
	</tr>
	<?php if ($phr->rows > 0){ do { ?>
	<tr id="phrase_<?=$phr->fields["phrase_name"]?>">
		<td style="width: 50%;">
			<strong><?=$phr->fields["phrase_name"]?></strong>
			<?php if (!strstr($phr->fields["phrase_value"], "\n")){ ?>
			[ <a href="admin_editphrases.php?multiline=<?=$phr->fields["phrase_name"]?>#phrase_<?=$phr->fields["phrase_name"]?>">Make Multi-Line</a> ]
			<?php } // end make multi-line check ?>
		</td>
		<td style="width: 50%;">
			<?php if (strstr($phr->fields["phrase_value"], "\n")){ ?>
			<textarea cols="40" rows="4" id="<?=$phr->fields["phraseid"]?>" name="<?=$phr->fields["phraseid"]?>"><?=htmlspecialchars($phr->fields["phrase_value"])?></textarea>
			<?php } else { ?>
			<input type="text" size="50" maxlength="255" id="<?=$phr->fields["phraseid"]?>" name="<?=$phr->fields["phraseid"]?>" value="<?=htmlspecialchars($phr->fields["phrase_value"])?>" />
			<?php } ?>
		</td>
	</tr>
	<?php } while ($phr->loop()); } ?>
	<tr>
		<th colspan="2">
			<input type="hidden" name="do" value="editphrases" />
			<input type="submit" value="Edit Phrases!" />
		</th>
	</tr>
</table>
</form>
<?php
include("admin_footer.php");
?>