
<div class="main">

<div class="history">
<table width="100%" cellpadding="5px" align="center" style="text-align:center" cellspacing="0">
<tr style="padding:1em; text-align:center; background-color:#efefef"><td style="width:30px">X</td><td>Status</td><td>Order Number</td><td>Date</td><td>Order Amt</td></tr>
<?php
	unset($history->responseLines[0]);
	foreach($history->responseLines as $k=>$v){
	$temp_array = explode("|",$v);
	?>
    <tr onclick="location.href='index.php?p=details&order=<?php echo $temp_array[1];?>';">
    	<td><a href="index.php?p=details&order=<?php echo $temp_array[1];?>"><img src="images/buttons/mag_glass.png" border="0" /></a></td>
    	<td><?php echo ucwords(strtolower($temp_array[0]));?></td>
    	<td><?php echo $temp_array[1];?></td>
        <td><?php echo $temp_array[2];?></td>
        <td><?php echo $temp_array[4];?></td>
    </tr>
    <?php
	}

?>
</table>
</div>
</div>