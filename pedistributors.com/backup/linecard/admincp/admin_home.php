<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(1);

// get stats
$sql = "SELECT COUNT(topicid) FROM " . $dbprefix . "topics";
$st1 = $db->execute($sql);
$st1 = $st1->fields["COUNT(topicid)"];

$sql = "SELECT COUNT(linkid) FROM " . $dbprefix . "links";
$st2 = $db->execute($sql);
$st2 = $st2->fields["COUNT(linkid)"];

$sql = "SELECT COUNT(queueid) FROM " . $dbprefix . "queue";
$st3 = $db->execute($sql);
$st3 = $st3->fields["COUNT(queueid)"];

$sql = "SELECT COUNT(newtopicid) FROM " . $dbprefix . "newtopics";
$st4 = $db->execute($sql);
$st4 = $st4->fields["COUNT(newtopicid)"];

// work out daily stats
$days = ceil((time() - intval($config["created"])) / 86400);

// moderation queue
$sql = "SELECT DISTINCT topicid FROM " . $dbprefix . "queue ORDER BY postdate ASC";
$ned = $db->execute($sql);

$sql = "SELECT DISTINCT topicid FROM " . $dbprefix . "newtopics ORDER BY postdate ASC";
$nei = $db->execute($sql);

include("admin_header.php");
?>
<h1>Admin Home</h1>

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th colspan="4">Directory Statistics</th>
	</tr>
	<tr>
		<td style="width: 25%;">Number of topics:</td>
		<td style="width: 25%;"><?=number_format($st1)?></td>
		<td style="width: 25%;">Topics in queue:</td>
		<td style="width: 25%;"><?=number_format($st4)?></td>
	</tr>
	<tr>
		<td>Number of links:</td>
		<td><?=number_format($st2)?></td>
		<td>Links in queue:</td>
		<td><?=number_format($st3)?></td>
	</tr>
	<tr>
		<td>Site created:</td>
		<td><?=date("j F Y", $config["created"])?></td>
		<td>Days online:</td>
		<td><?=number_format($days)?></td>
	</tr>
</table><br />

<?php if ($usr->Access > 1){ ?>
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Version Information</th>
	</tr>
	<tr>
		<td><?=versioninfo()?></td>
	</tr>
</table><br />
<?php } // end admin check ?>

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Moderation Queue</th>
	</tr>
	<tr>
		<td>
			<?php if ($ned->rows < 1){ ?>
			No topics currently require moderation
			<?php } else { ?>
			<ul>
				<?php do { ?>
				<li><?=fetchtopic($ned->fields["topicid"])?></li>
				<?php } while ($ned->loop()); ?>
			</ul>
			<?php } // moderation check ?>
		</td>
	</tr>
</table><br />

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Topic Suggestion Queue</th>
	</tr>
	<tr>
		<td>
			<?php if ($nei->rows < 1){ ?>
			No topics currently have topic suggestions awaiting moderation
			<?php } else { ?>
			<ul>
				<?php do { ?>
				<li><?=fetchtopic($nei->fields["topicid"])?></li>
				<?php } while ($nei->loop()); ?>
			</ul>
			<?php } // moderation check ?>
		</td>
	</tr>
</table>
<?php
include("admin_footer.php");
?>