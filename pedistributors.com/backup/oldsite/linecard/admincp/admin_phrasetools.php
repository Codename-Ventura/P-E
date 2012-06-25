<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for actions
if ($_POST["do"] == "exportlanguage"){
	$errormsg = export_language($_POST["title"]);
} elseif ($_POST["do"] == "importlanguage"){
	$errormsg = import_language($_FILES["xmlfile"]);
}

include("admin_header.php");
?>
<h1>Phrase Import &amp; Export</h1>

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Export Phrases</th>
	</tr>
	<tr>
		<td>
			Export the phrases as an XML language pack. Give it a name like English or Klingon and click export. This is useful if you have translated a new language and want to send it to us (which is much appreciated :).<br /><br />
			
			<form action="admin_phrasetools.php" method="post" style="text-align: center;">
				<input type="text" size="20" maxlength="50" id="title" name="title" />
				<input type="hidden" id="do" name="do" value="exportlanguage" />
				<input type="submit" value="Export!" />
			</form>
		</td>
	</tr>
</table><br />

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>Import Phrases</th>
	</tr>
	<tr>
		<td>
			Caution: this will overwrite the existing phrases!<br /><br />
			
			<form action="admin_phrasetools.php" method="post" enctype="multipart/form-data" style="text-align: center;">
				<input type="file" size="20" id="xmlfile" name="xmlfile" />
				<input type="hidden" id="do" name="do" value="importlanguage" />
				<input type="submit" value="Import!" />
			</form>
		</td>
	</tr>
</table>
<?php
include("admin_footer.php");
?>