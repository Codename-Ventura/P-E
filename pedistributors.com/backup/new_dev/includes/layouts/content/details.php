
<div class="main">
<div id="invoice">

<?php
$order_details_info = explode("|",$details->responseLines[0]);
unset($details->responseLines[0]);
?>

<div class="text-box" style="color:#0964aa; font-size:18px; width:670px">

<span style="float:left; width:50%; font-size:24px;">Order Details</span>
<span style="float:left; clear:left; width:50%;">Order Number: <?php echo $order_details_info[1];?></span>
<span style="float:left; clear:left; width:50%;">Order Date: <?php echo $order_details_info[2];?></span>




</div>



<table width="100%" cellpadding="5px" id="details" style="float:left; clear:left; text-align:center" >
<tr style="background-color:#0964aa; color:#CCCCCC; font-size:10px"><td>Line Code</td><td>Part Number</td><td>Part Description</td><td>Quantity Ordered</td><td>Price per Unit</td><td>Totals</td></tr>
<?php
$c = "1";
foreach($details->responseLines as $k=>$v){
$temp_array = explode("|",$v);
if($temp_array[2] == "COMMENT"){
	$comment[] = $temp_array;
}
else{
	if($c == "1"){
		$bgcolor = "#CCCCCC";
		$c = "0";
	}else{
		$bgcolor = "#efefef";
		$c = "1";
		}
?>
<tr style="background-color:<?php echo $bgcolor;?>"><td><?php echo $temp_array[1];?></td><td><?php echo $temp_array[2];?></td><td style="text-align:left; width:300px"><?php echo $temp_array[3];?></td><td><?php echo $temp_array[4];?></td><td><?php echo $temp_array[5];?></td><td><?php echo $temp_array[6];?></td></tr>

<?php } }
?>
<tr style="border-bottom:1px #000000 dashed; background-color:<?php if($c == "1"){ echo "#CCCCCC"; }else{ echo "#efefef";}?>"><td></td><td></td><td style="text-align:left">Shipping</td><td></td><td></td><td><?php echo $order_details_info[5];?></td></tr>
<tr style="font-size:24px;"><td colspan="6" style="text-align:right">Total:<?php echo $order_details_info[4];?></td></tr>
</table>

<?php

if(isset($comment) && ($comment !== "")){
?>
<div class="text-box">
<div class="titles">Comments</div>
<?php
foreach($comment as $k=>$v){
	
	echo ucwords(strtolower($v[3]))."<br>";
	
	
}
?>


</div>
</div>
<?php } ?>
<div style="float:left; clear:both; width:100%">

<span style="float:left; clear:left; margin:1em 0 0 0"><a href="index.php?p=history"><img src="images/buttons/history_return.png" border="0" /></a></span>
<span style="float:right; clear:right; margin:1em .5em 0 0"><a href="JavaScript:CallPrint('invoice');"><img src="images/buttons/print_button_2.png" border="0" /></a></span>
</div>


</div>