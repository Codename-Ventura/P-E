
<div class="main">

<div class="history">
<table width="100%" cellpadding="5px" align="center" style="text-align:center" cellspacing="0">
<tr style="padding:1em; text-align:center; background-color:#efefef">
<td style="width:30px"></td>
<td>Status</td>
<td><a href="http://www.pedistributors.com/index.php?p=history">Date</a></td>
<td><a href="http://www.pedistributors.com/index.php?p=history&sortby=orderno">Order Number</a></td>
<td><a href="http://www.pedistributors.com/index.php?p=history&sortby=po_number">PO Number</a></td>
<td><a href="http://www.pedistributors.com/index.php?p=history&sortby=price">Order Amt</a></td></tr>
<?php
	foreach($responseArray as $k=>$v){
	?>
    <tr onclick="location.href='index.php?p=details&order=<?php echo $responseArray[$k]['orderno'];?>';">
    	<td><a href="index.php?p=details&order=<?php echo $responseArray[$k]['orderno'];?>"><img src="images/buttons/mag_glass.png" border="0" /></a></td>
    	<td><?php echo ucwords(strtolower($responseArray[$k]['status']));?></td>
    	<td><?php echo $responseArray[$k]['date'];?></td>
        <td><?php echo $responseArray[$k]['orderno'];?></td>
        <td><?php echo $responseArray[$k]['po_number'];?></td>
        
        <td><?php echo $responseArray[$k]['price'];?></td>
    </tr>
    <?php
	}

?>

    
</table>
</div><H2><?php echo $total;?></H2>
</div>