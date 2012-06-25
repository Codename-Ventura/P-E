<html>
<head>
</head>
<body>
<div style="font-family:Verdana; padding:5px; border: 1px solid black; float:left">
<?php
if(isset($search->responseParts) && !empty($search->responseParts)){
?>
Here
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
</div>
</body>
