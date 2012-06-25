<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for actions
if (un($_POST["act"]) == "Yes, delete it"){
	$errormsg = deleteskin($_POST["skinid"]);
} elseif (un($_POST["act"]) == "No, don't delete"){
	redirect("admin_skins.php");
}

// validate the skin
$sql = "SELECT * FROM " . $dbprefix . "skinsets WHERE skinid = " . intval($_GET["skinid"]);
$rec = $db->execute($sql);
if ($rec->rows < 1){ notfound(); }

include("admin_header.php");
?>
<h1>Delete Skinset</h1>

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Confirm Deletion</th>
	</tr>
	<tr>
		<td>
			Are you sure you want to delete <strong><?=$rec->fields["title"]?></strong>?<br /><br />
			
			<form action="admin_deleteskin.php?skinid=<?=$rec->fields["skinid"]?>" method="post" style="text-align: center;">
				<input type="hidden" name="skinid" value="<?=$rec->fields["skinid"]?>" />
				<input type="submit" name="act" value="Yes, delete it" />
				<input type="submit" name="act" value="No, don't delete" />
			</form>
		</td>
	</tr>
</table>
<?php
include("admin_footer.php");
?>