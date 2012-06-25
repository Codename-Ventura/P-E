<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// exact match search
if ($_GET["act"] == "Exact Match"){
	$q = $_GET["q"];
	$errormsg = exactmatchuser($q);
}

// check for listing
if ($_GET["q"] <> "" || $_GET["list"] <> ""){
	
	$page = ($_GET["page"] <> "") ? intval($_GET["page"]) : 1;
	if ($page < 1){ $page = 1; }
	$maxitems = 25;
	$from = (($page * $maxitems) - $maxitems);
	
	$q = ($_GET["q"] <> "") ? $_GET["q"] : "%";
	$l = ($_GET["list"] <> "") ? $_GET["list"] : "username";
	$o = ($_GET["orderby"] == "DESC") ? "DESC" : "ASC";
	
	$sql  = "SELECT * FROM " . $dbprefix . "users WHERE ";
	$sql .= "username LIKE '" . dbSecure($q) . "' ";
	$sql .= "ORDER BY " . dbSecure($l) . " " . dbSecure($o);
	$mex  = $db->execute($sql);
	
	$total_pages = ceil($mex->rows / $maxitems);
	
	$sql .= " LIMIT " . $from . ", ". $maxitems;
	$rec  = $db->execute($sql);
	
	$listing = true;
	$baseurl = "admin_users.php?q=" . urlencode(un($q)) . "&amp;list=" . un($l) . "&amp;orderby=" . un($o) . "&amp;page=";
}

include("admin_header.php");
?>
<h1>Manage Users</h1>

<form action="admin_users.php" method="get" id="f" name="f">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Search Users</th>
	</tr>
	<tr>
		<td style="text-align: center;">
			<input type="text" name="q" id="q" size="40" value="<?=un($_GET["q"])?>" />
			<input type="submit" value="Search Users!" />
			<input type="submit" name="act" value="Exact Match" /><br />
			Use % for partial matches
		</td>
	</tr>
	<tr>
		<th>List All Users</th>
	</tr>
	<tr>
		<td>
			<ul>
				<li><a href="admin_users.php?list=username">List all users alphabetically</a></li>
				<li><a href="admin_users.php?list=username&amp;orderby=DESC">List all users reverse alphabetically</a></li>
				<li><a href="admin_users.php?list=joindate&amp;orderby=DESC">List all users by join date, oldest first</a></li>
				<li><a href="admin_users.php?list=joindate">List all users by join date, oldest first</a></li>
			</ul>
		</td>
	</tr>
</table>
</form>

<script language="JavaScript" type="text/javascript">
<!--
window.onload = function(){
	document.forms.f.q.focus();
}
-->
</script>

<?php if ($listing == true){ ?>
<br />
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th colspan="4">Search Results</th>
		<th colspan="2" style="font-weight: normal;">
			<?php
			if ($total_pages){
				echo("Pages:");
				for($i = 1; $i <= $total_pages; $i++){
					if ($page == $i){
						echo ' <a href="' . $baseurl . $i . '"><strong>' . $i . '</strong></a>';
					} elseif(($i < ($page + 3)) && ($i > ($page - 3))){
						echo ' <a href="' . $baseurl . $i . '">' . $i . '</a>';
					}
				}
			}
			?>
		</th>
	</tr>
	<tr>
		<th>Username</th>
		<th>Email</th>
		<th>IP Address</th>
		<th>Last Visit</th>
		<th colspan="2">Options</th>
	</tr>
	<?php if ($rec->rows < 1){ ?>
	<tr>
		<td colspan="6" style="text-align: center;">
			No users matched the specified criteria
		</td>
	</tr>
	<?php } else { do { ?>
	<tr>
		<td><?=$rec->fields["username"]?></td>
		<td><?=$rec->fields["email"]?></td>
		<td><?=$rec->fields["ipaddress"]?></td>
		<td>
			<?php
			if ($rec->fields["logindate"] == 0){
				echo("Never");
			} else {
				echo(date("j F Y", $rec->fields["logindate"]));
			}
			?>
		</td>
		<td style="text-align: center;"><a href="admin_edituser.php?userid=<?=$rec->fields["userid"]?>">Edit</a></td>
		<td style="text-align: center;"><a href="admin_deleteuser.php?userid=<?=$rec->fields["userid"]?>">Delete</a></td>
	</tr>
	<?php } while ($rec->loop()); } ?>
</table>
<?php } // end listing check ?>
<?php
include("admin_footer.php");
?>