<div class="main">

<?php if(!isset($_SESSION['shopping_cart'])){
exit();
} ?>

<? if(isset($_POST['shipping'])){?>

<div class="titles">Ship To...</div>


<div class="text-box" style="width:650px">
<form method="post">
<input type="hidden" name="shipping" />

<div style="float:right; width:250px; margin:0 0 1em 0; border-left:1px #CCCCCC dashed; border-bottom:1px #CCCCCC dashed">
	<div style="padding-bottom:.25em; float:right; margin:0 0 1em 0">P.O. Number (optional): <input type="text" size="4" name="po_number" value="<?php if(isset($_POST[po_number])){ echo $_POST['po_number'];}?>"  /></div>

	<div style="float:right; margin-right:.25em; margin:0 0 1em 0">
    <div style="float:right; clear:right; font-size:9px">Notes (optional):</div>
	<textarea style="height:7em; width:100%; float:right; clear:right" name="notes"><?php if(isset($_POST[notes])){ echo $_POST['notes'];}?></textarea>
	</div>
</div>

<span style="float:left; margin:0 0 .5em 0;">Bill To</span>
	<div class="text-box-clear" style="margin-left:2em; font-size:12px">
    	<ul>
        <li style="font-size:14px; margin-left:-.25em; border-bottom:1px #000000 dashed; margin-bottom:.25em; width:300px">Current Address:</li>
		<?php
			echo "<li>Address: ".$_SESSION['customer']['streetAddress']."</li>";
			echo "<li>Address2: ".$_SESSION['customer']['streetAddress2']."</li>";
			echo "<li>City: ".$_SESSION['customer']['city']."</li>";
			echo "<li>State: ".$_SESSION['customer']['state']."</li>";
			echo "<li>Zip: ".$_SESSION['customer']['zip']."</li>";
		
		
		?>
        </ul>
    </div>
<?php if(!isset($checkout->responseAddress)){?>
<div style="float:left; clear:both; background-color:#CCCCCC; width:600px; padding:1em;">
<div style="float:left;">
<input type="radio" name="ship_to_loc" onclick="$('#location_box').slideUp();" value="billtoshipto">My Billing and Shipping Address are the Same
</div>
<div style="float:left; clear:left">
<input type="radio" name="ship_to_loc" onclick="$('#location_box').slideDown();" />I use an alternate Shipping Address 

</div>
<div style="float:left; clear:both; display:none" id="location_box">
<span style="float:left; margin:.5em 0 .5em 1.85em;">Use On-File Address: <input type="Text" size="10" name="ship_to_num"/><button type="submit">Get Store Location</button></span>
<?php
if($_SESSION['customer']['can_drop_ship'] == "1"){
?>

<?php
if($_SESSION['customer']['can_drop_ship'] == "1"){
?>
<div style="float:left; clear:left; margin:.5em 0 .5em 0; width:100%; border-bottom:1px #000000 dashed">Or Enter Drop Ship Address Below</div>

<table style="float:left; clear:left">
<tr><td style="text-align:right">c/o: </td><td><input type="Text" size="30" name="ship_to_careof"/></td></tr>
<tr><td style="text-align:right">Address: </td><td><input type="Text" size="30" name="ship_to_address"/></td></tr>
<tr><td style="text-align:right"></td><td><input type="Text" size="30" name="ship_to_address2"/></td></tr>
<tr><td style="text-align:right">City: </td><td><input type="Text" size="30" name="ship_to_city"/></td></tr>
<tr><td style="text-align:right">State: </td><td><input type="Text" size="30" name="ship_to_state"/></td></tr>
<tr><td style="text-align:right">Zip: </td><td><input type="Text" size="30" name="ship_to_zip"/></td></tr>
</table>

<?php
} }
?>

</div>

</div>




<div style="float:left; clear:both; margin:1em 0 0 0">


<input type="image" src="images/buttons/submit_order.png" value="submit" name="submit_order"><a href="index.php?p=checkout&a=clearcart"><img src="images/buttons/cancel_order.png" border="0" style="margin-left:.25em" /></a>

</div>


    
</div>
</form>
<?php }
else{ ?>
<div id="shipto_location" style="float:left; clear:both; margin:0 0 .5em 0">

<input type="radio" name="ship_to_loc" checked="checked" value="on_file_loc" value="on_file" onclick="$('#location_box').slideUp();"/>Ship To
</div>

<div class="text-box-clear" style="margin-left:2em; font-size:12px">
    	<ul>
        <li style="font-size:14px; margin-left:-.25em; border-bottom:1px #000000 dashed; margin-bottom:.25em; width:300px">Bill To</li>
		<?php
			echo "<li>Address: ".$checkout->responseAddress->address1."</li>";
			echo "<li>Address2: ".$checkout->responseAddress->address2."</li>";
			echo "<li>City: ".$checkout->responseAddress->city."</li>";
			echo "<li>State: ".$checkout->responseAddress->state."</li>";
			echo "<li>Zip: ".$checkout->responseAddress->zip."</li>";
		
		
		?>
        </ul>
    </div>


<div style="float:left; clear:both; background-color:#CCCCCC; width:600px; padding:1em;">

<div style="float:left">
<input type="radio" name="ship_to_loc" onclick="$('#location_box').slideUp();" value="billtoshipto">My Billing and Shipping Address are the Same
</div>
<div style="float:left; clear:left">
<input type="radio" name="ship_to_loc" onclick="$('#location_box').slideDown();">I want to change the "Ship To" Address</span>
</div>
<div style="float:left; clear:both; margin:0 0 .5em 1.85em; display:none" id="location_box">Enter Location Number: <input type="Text" size="10" name="ship_to_num"/><button type="submit">Get Store Location</button>
<?php
if($_SESSION['customer']['can_drop_ship'] == "1"){
?>
<div style="float:left; clear:left; margin-top:.5em; width:100%; border-bottom:1px #000000 dashed">Or Enter Drop Ship Address Below</div>
<table style="float:left; clear:left">
<tr><td style="text-align:right">c/o: </td><td><input type="Text" size="30" name="ship_to_careof"/></td></tr>
<tr><td style="text-align:right">Address: </td><td><input type="Text" size="30" name="ship_to_address"/></td></tr>
<tr><td style="text-align:right"></td><td><input type="Text" size="30" name="ship_to_address2"/></td></tr>
<tr><td style="text-align:right">City: </td><td><input type="Text" size="30" name="ship_to_city"/></td></tr>
<tr><td style="text-align:right">State: </td><td><input type="Text" size="30" name="ship_to_state"/></td></tr>
<tr><td style="text-align:right">Zip: </td><td><input type="Text" size="30" name="ship_to_zip"/></td></tr>
</table>
<?php
}
?>
</div>
</div>



<div style="float:left; clear:both; margin:1em 0 0 0; text-align:right">
<input type="image" src="images/buttons/submit_order.png" value="submit" name="submit_order"><a href="index.php?p=checkout&a=clearcart"><img src="images/buttons/cancel_order.png" border="0" style="margin-left:.25em" /></a>

</div>
</div>






</form>
<?php } }
	else{?>

<form name="checkout" method="post">
<input type="hidden" name="shipping" />





<div class="titles" style="font-size:22px">Checkout</div>



<div class="text-box">

<div class="titles">Your Shopping Cart</div>

<table width="99%" style="float:left; clear:left; text-align:center" cellpadding="5px">
<tr style="padding:1em; text-align:center; background-color:#dddddd; font-size:10px">
<td>Line Code</td><td>Part Number</td><td>Description</td><td>Price</td><td>Qty. Requested</td><td>Line Total</td>
</tr>

<?php


foreach($_SESSION['shopping_cart'] as $k=>$v){
?>

<tr>
<td><?php echo $v['2']; ?></td>
<td><?php echo $v['3']; ?></td>
<td><?php echo $v['4']; ?></td>
<td><?php echo $v['8']; ?></td>
<td><?php echo $v['quantity']; ?></td>
<td><?php echo $v['total_per']; ?></td>
</tr>

<?php
}

?>
</table>
<div style="float:left; width:100%">
<span style="float:right; text-align:right; clear:both; margin-top:.5em; padding:.5em .75em 0 0; width:100%; border-top:1px #000000 dashed; font-size:24px">Cart Total: <?php echo $_SESSION['cart_total'];?></span>
</div>



</div>


<div class="text-box">
<span style="float:left;"><a href="index.php?p=cart"><img src="images/buttons/make_changes.png" border="0" /></a></span>
<span style="float:right"><input type="image" src="images/buttons/looks_good.png" value="submit" style="margin-right:.5em"></span>

</div>

</form>


<?php }?>
</div>