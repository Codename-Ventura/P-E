<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for actions
if ($_POST["do"] == "flushqueue"){
	$errormsg = flushwebsites();
} elseif ($_POST["do"] == "flushtopics"){
	$errormsg = flushtopics();
} elseif ($_POST["do"] == "clearhistory"){
	$errormsg = clearhistory($_POST["days"]);
}

include("admin_header.php");
?>
<h1>Maintenance</h1>

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Flush Website Queue</th>
	</tr>
	<tr>
		<td>
			This will delete ALL user suggested websites that have not yet been moderated from the queue.<br /><br />
			
			<form action="admin_maintenance.php" method="post" style="text-align: center;">
				<input type="submit" value="Flush Websites!" />
				<input type="hidden" name="do" value="flushqueue" />
			</form>
		</td>
	</tr>
</table><br />

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Flush Topics Queue</th>
	</tr>
	<tr>
		<td>
			This will delete ALL user suggested topics that have not yet been moderated from the queue.<br /><br />
			
			<form action="admin_maintenance.php" method="post" style="text-align: center;">
				<input type="submit" value="Flush Topics!" />
				<input type="hidden" name="do" value="flushtopics" />
			</form>
		</td>
	</tr>
</table><br />

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Clear Template History</th>
	</tr>
	<tr>
		<td>
			This will delete all the archived copies of templates that were created before a set amount of days (specified in the box). You don't need to do this as they take up very little space but you may want to. Note: 1 day will cover the past 24 hours, not just today. You can clear them all by setting it to 0.<br /><br />
			
			<form action="admin_maintenance.php" method="post" style="text-align: center;">
				<input type="text" size="4" maxlength="4" id="days" name="days" value="90" />
				<input type="submit" value="Clear History!" />
				<input type="hidden" name="do" value="clearhistory" />
			</form>
		</td>
	</tr>
</table>
<?php
include("admin_footer.php");
?>