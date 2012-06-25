<?php


$get_staging = mysql_query("SELECT * FROM `staging`");
$count = mysql_num_rows($get_staging);
$get_staging = mysql_query("SELECT * FROM `staging` LIMIT 1, $count");
while($row = mysql_fetch_array($get_staging)){
	echo "<tr style=\"text-align:center\">";
	$parttype = $row['CATEGORY'];
	$id = $row['PRODUCTCODE'];
	$get_cat = mysql_fetch_array(mysql_query("SELECT * FROM `cat_list` WHERE `part_type` = '$parttype'"));
	echo "<td>".$id."</td>";
	echo "<td>".$parttype."</td>";
	$newcat = $get_cat['category'];
	if(empty($newcat)){
		echo "<td style=\"background-color:#FF3300\">None</td><td style=\"background-color:#FF3300\">Update Failed</td>";
		}
	else {
	if(mysql_query("UPDATE `staging` SET `CATEGORY` = '$newcat' WHERE `PRODUCTCODE` = '$id'")){
	echo "<td>".$get_cat['category']."</td><td>Category Updated</td>"; }
	else{ echo "<td style=\"background-color:#FF3300\">No Category Found</td><td style=\"background-color:#FF3300\">Update Failed</td>";}
		}

		echo "</tr>";
	}
?>