<?php
define("IN_SCRIPT", true);
require("../includes/global.php");
$usr->auth(2);

// check for actions
if ($_POST["do"] == "template"){
	
	if ($_POST["filename"] == ""){
	
		$errormsg = "You did not select a template";
	
	} else {
	
		if ($_POST["act"] == "View Original"){
			
			redirect("admin_vieworiginal.php?skinid=" . $_POST["skinid"] . "&filename=" . $_POST["filename"]);
		
		} elseif ($_POST["act"] == "View History"){
		
			redirect("admin_templatehistory.php?skinid=" . $_POST["skinid"] . "&filename=" . $_POST["filename"]);
		
		} elseif ($_POST["act"] == "Revert / Delete"){
		
			$errormsg = reverttemplate($_POST["skinid"], $_POST["filename"]);
		
		} else {
			redirect("admin_edittemplate.php?skinid=" . $_POST["skinid"] . "&filename=" . $_POST["filename"]);
		}
	
	}
	
} elseif ($_GET["toggle"] <> ""){
	$errormsg = toggleskin($_GET["toggle"]);
}
	
// get list of skinsets
$sql = "SELECT * FROM " . $dbprefix . "skinsets ORDER BY title ASC";
$rec = $db->execute($sql);

// get list of templates
$temlist = Array();

$sql = "SELECT filename FROM " . $dbprefix . "skinbase ORDER BY filename ASC";
$tem = $db->execute($sql);
if ($tem->rows > 0){ do {
	array_push($temlist, $tem->fields["filename"]);
} while ($tem->loop()); }

include("admin_header.php");
?>
<h1>Manage Skins</h1>

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="tbl">
	<tr>
		<th>ID</th>
		<th>Skin Name</th>
		<th>Visible?</th>
		<th>Options</th>
	</tr>
	<?php if ($rec->rows > 0){ do { ?>
	<tr>
		<td style="text-align: center;"><?=$rec->fields["skinid"]?></td>
		<td><?=$rec->fields["title"]?></td>
		<td style="text-align: center;">
			<a href="admin_skins.php?toggle=<?=$rec->fields["skinid"]?>"><?php
			if ($rec->fields["visible"] == 1){
				echo("Yes");
			} else {
				echo("No");
			}
			?></a>
		</td>
		<td style="text-align: center;">
			<a href="../?s=<?=$rec->fields["skinid"]?>" target="_blank">Preview</a> | 
			<a href="admin_editskin.php?skinid=<?=$rec->fields["skinid"]?>">Edit</a> | 
			<a href="admin_deleteskin.php?skinid=<?=$rec->fields["skinid"]?>">Delete</a> | 
			<a href="admin_skins.php?show=<?=$rec->fields["skinid"]?>" onClick="show_templates(<?=$rec->fields["skinid"]?>); return false;">Edit Templates</a>
		</td>
	</tr>
	<?php
	$extracode = ($_GET["show"] == $rec->fields["skinid"]) ? "" : "none";
	?>
	<tr style="display: <?=$extracode?>;" id="templates<?=$rec->fields["skinid"]?>">
		<td colspan="4">
			<form action="admin_skins.php?show=<?=$rec->fields["skinid"]?>" method="post">
			<table cellpadding="0" cellspacing="0" border="0" align="center"><tr><td>
			<?php
			$tem2list = $temlist;
			$sql = "SELECT filename FROM " . $dbprefix . "skinfiles WHERE skinid = " . dbSecure($rec->fields["skinid"]);
			$tem = $db->execute($sql);
			if ($tem->rows > 0){ do {
				
				$h = array_search($tem->fields["filename"], $temlist);
				if (!($h === FALSE)){
					$tem2list[$h] = "<strong>" . $tem->fields["filename"] . "</strong>";
				} else {
					array_push($tem2list, "<strong>" . $tem->fields["filename"] . "</strong>");
				}
				
			} while ($tem->loop()); }
			
			?>
			
			<select id="filename_<?=$rec->fields["skinid"]?>" name="filename" size="15">
				<?php
				foreach($tem2list as $x){
				
				if ($x <> strip_tags($x)){
					$cssc = "color: #CC0000;";
					$x = strip_tags($x);
				} else {
					$cssc = "color: #666666;";
				}
				?>
				<option value="<?=$x?>" style="<?=$cssc?>"><?=$x?></option>
				<?php } ?>
			</select>
			</td><td style="text-align: center; padding-left: 10px;">
				<input type="hidden" name="do" value="template" />
				<input type="hidden" name="skinid" value="<?=$rec->fields["skinid"]?>" />
				<input type="submit" name="act" value="Edit Selected Template" /><br />
				<input type="submit" name="act" value="View History" /><input type="submit" name="act" value="View Original" /><br />
				<input type="submit" name="act" value="Revert / Delete" onClick="return revert_template(<?=$rec->fields["skinid"]?>);" /><br /><br />
				
				Colour key:<br />
				<span style="color: #666666;">Uncustomised template</span><br />
				<span style="color: #CC0000;">Customised for this skinset</span>
			</td></tr></table>
			</form>
		</td>
	</tr>
	<?php } while ($rec->loop()); } ?>
</table>
<?php
include("admin_footer.php");
?>