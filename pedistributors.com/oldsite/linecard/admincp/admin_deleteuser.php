<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for action
if ($_POST["act"] == "Yes, Delete Them!"){
	$errormsg = deleteuser($_POST["userid"]);
} elseif ($_POST["act"] == "No"){
	redirect("admin_users.php");
}

// get the user
$sql = "SELECT * FROM " . $dbprefix . "users WHERE userid = " . intval($_GET["userid"]);
$use = $db->execute($sql);
if ($use->rows < 1){ notfound(); }

include("admin_header.php");
?>
<h1>Delete User</h1>

<form action="admin_deleteuser.php?userid=<?=$use->fields["userid"]?>" method="post">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Delete User</td>
	</tr>
	<tr>
		<td>
			Are you sure you want to delete this user, <strong><?=$use->fields["username"]?></strong>? Remember you can always just lock their account to stop them accessing it and still have all their information on file.<br /><br />
			
			<input type="hidden" name="userid" value="<?=$use->fields["userid"]?>" />
			<input type="submit" name="act" value="Yes, Delete Them!" />
			<input type="submit" name="act" value="No" />
		</td>
	</tr>
</table>
</form>
<?php
include("admin_footer.php");
?>