<?php
if(isset($_SESSION['last_search_results'])){
	$search->responseParts = $_SESSION['last_search_results'];
}
?>


<div class="main">

    
    
    <div class="text-box">
    <div class="titles">Rapid Order Search Page</div>
   	<form method="post">	
    Line Code:  <input type="text" name="linecode" style="margin-right:1em" size="5" />  Part Number:  <input type="text" name="partnumber" size="10" /><input type="image" src="images/buttons/submit.png" style="margin-left:1em;" value="Submit">
    </form>

    </div>


<?php

if(isset($search->responseParts) && !empty($search->responseParts)){
?>
<form method="post" action="index.php?p=cart">
<table width="100%" style="float:left; clear:left; text-align:center;">
<tr style="padding:1em; text-align:center; background-color:#efefef; font-size:9px">
<td>Line Code</td><td>Part Number</td><td>Description</td><td>Qty.<br />
Available</td><td>Retail</td><td>Jobber</td><td>Tru-Blu<br />
Jobber</td><td>Order</td>
</tr>


<?php
	foreach($search->responseParts as $k=>$v){
?>

<tr>
<td><?php echo $v[2]; ?></td><td><?php echo $v[3]; ?></td><td style="text-align:left"><?php echo $v[6]; ?></td><td><?php echo $v[7]; ?></td><td>$<?php echo $v[8]; ?></td><td>$<?php echo $v[10]; ?></td><td>$<?php echo $v[12]; ?></td><td><input type="text" size="2" name="parts[<?php echo $v[1];?>]" value="0" style="text-align:center"/></td>
<input type="hidden" name="part_additions" value="True" />
</tr>

<?php
	}
?>
<tr><td colspan="8" align="right"><input type="image" src="images/buttons/add_to_cart.png" style="margin:1em 0 0 1em;" value="Submit"></td></tr>
</table>
</form>
<?php
}

?>



</div>