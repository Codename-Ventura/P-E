
<div class="main">

<?php
$order_details_info = explode("|",$details->responseLines[0]);
unset($details->responseLines[0]);
?>

<div class="text-box" style="color:#0964aa; font-size:18px; width:710px">

<span style="float:left; width:50%; font-size:24px;">Order Details</span>
<span style="float:left; clear:left; width:50%;">Order Number: <?php echo $order_details_info[1];?></span>
<span style="float:left; clear:left; width:50%;">Order Date: <?php echo $order_details_info[2];?></span>




</div>



<table width="100%" style="text-align:center" cellpadding="5px" id="details" style="float:left">
<tr style="background-color:#0964aa; color:#CCCCCC; font-size:10px"><td>Line Code</td><td>Part Number</td><td>Part Description</td><td>Quantity Ordered</td><td>Price per Unit</td><td>Totals</td></tr>
<?php
foreach($details->responseLines as $k=>$v){
$temp_array = explode("|",$v);
if($temp_array[2] == "COMMENT"){
	$comment[] = $temp_array;
}
else{

?>
<tr><td><?php echo $temp_array[1];?></td><td><?php echo $temp_array[2];?></td><td style="text-align:left; width:300px"><?php echo $temp_array[3];?></td><td><?php echo $temp_array[4];?></td><td><?php echo $temp_array[5];?></td><td><?php echo $temp_array[6];?></td></tr>

<?php } }?>
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

<?php } ?>
<div style="float:left; clear:both; width:100%">

<span style="float:left; clear:left; margin:1em 0 0 0"><a href="index.php?p=history"><img src="images/buttons/history_return.png" border="0" /></a></span>
<span style="float:right; clear:right; margin:1em .5em 0 0"><a href="JavaScript:window.print();"><img src="images/buttons/print_button_2.png" border="0" /></a></span>
</div>


</div>