
<div class="main">



<?php
if(isset($cart->cart) && !empty($cart->cart)){
?>

<div class="text-box">
    <div class="titles">Rapid Order Search Page</div>
   	<form method="post" action="?p=search">	
    Line Code:  <input type="text" name="linecode" style="margin-right:1em" size="5" />  Part Number:  <input type="text" name="partnumber" size="10" /><input type="image" src="images/buttons/submit.png" style="margin-left:1em;" value="Submit">
    </form>

    </div>
<div class="titles">Your Shopping Cart</div>
<div class="text-box">
<form method="post" action="index.php?p=cart">
<input type="hidden" name="modify_cart" value="True" />
<table width="100%" style="float:left; clear:left; text-align:center" cellpadding="5px">
<tr style="padding:1em; text-align:center; background-color:#dddddd; font-size:10px">
<td>Line Code</td>
<td>Part Number</td>
<td>Description</td>
<td>Retail</td>
<td>Your Price</td>
<td>Tru-Blu Jobber</td>
<td>Qty</td>
</tr>


<?php
	foreach($cart->cart as $k=>$v){
?>

<tr>
<td><?php echo $v[2];?></td>
<td><?php echo $v[3];?></td>
<td><?php echo $v[6];?></td>
<td><?php echo $v[8];?></td>
<td><?php echo $v[10];?></td>
<td><?php echo $v[12];?></td>
<td><input type="text" size="2" name="parts[<?php echo $v[1];?>]" value="<?php echo $v['quantity'];?>" style="text-align:center" /></td>


</tr>



<?php
	}

?>
<tr><td colspan="7" style="text-align:right; font-size:16px; padding:1em; width:100%; border-top:1px #000000 dashed">Shopping Cart Total: <?php echo money_format('%i',$_SESSION['cart_total']);?></td></tr>
</table><div style="width:100%; float:left; text-align:right; padding:2em 0 0 0;"><input type="image" src="images/buttons/apply.png" value="submit"></div>

<div style="width:100%; float:left; text-align:right; clear:both; padding:1em 0 0 0; border-top:1px #000000 dashed; margin-top:1em">
<a href="index.php?p=checkout"><img src="images/buttons/checkout.png" style="margin-right:1em" border="0"></a><a href="index.php?p=checkout&a=clearcart"><img src="images/buttons/cancel_order.png" border="0" style="margin-left:.25em" /></a>
</form>
</div>
</div>
<?php
}
else{

?>
<div class="errorbox">Your Shopping Cart is Currently Empty</div>
<?php
}
?>
</div>