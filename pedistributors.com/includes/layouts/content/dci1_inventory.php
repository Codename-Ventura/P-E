<html>
<head>
</head>
<body>
<div style="font-family:Verdana; padding:5px; border: 1px solid black; float:left">
<?php
if(isset($search->responseParts) && !empty($search->responseParts)){
?>

<?php
	foreach($search->responseParts as $k=>$v){
		if($v[7] > 0){
			echo "In Stock.  Ships Today!";
		}else{
			echo "Not In Stock.  Please Call";
		}	
	}

}else{
			echo "Not In Stock.  Please Call";
		}

?>
<table width="100%" style="float:left; clear:left; text-align:center;">
<tr style="padding:1em; text-align:center; background-color:#efefef; font-size:9px">
<td>Qty.<br />
Available</td><td>Retail</td><td class="hide_price">Your Price</td>
</tr>


<?php
	foreach($search->responseParts as $k=>$v){
?>

<tr>

<td><?php echo $v[7]; ?></td><td>$<?php echo $v[8]; ?></td><td class="hide_price">$<?php echo $v[10]; ?></td>

</tr>

<?php
	}
?>
</table>
</div><br /> 
</body>
</html>