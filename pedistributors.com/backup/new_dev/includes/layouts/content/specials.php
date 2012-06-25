<div class="main">
<?php
foreach($specials->specials as $k=>$v){

if(isset($_GET['id'])){
	if($_GET['id'] == $v['id']){
?>
<div class="text-box">

	
	<img src="<?php echo $v[image]; ?>" style="width:200px; border:2px #000000 solid; float:left" />
    <div style="float:left; margin-left:1em">
    	<?php
		if(isset($manufacturers[$v['manufacturer']]['logo'])){
		?>
        <img src="<?php echo $manufacturers[$v['manufacturer']]['logo']; ?>" style="width:200px; margin-bottom:1em; float:left" />
        <?	
		}
		?>
    	<div style="float:left; clear:left; width:400px; font-size:16px; font-weight:600; border-bottom:1px #000000 solid; padding-bottom:.25em;"><?php echo $v[title];?></div>
        <div style="float:left; clear:left; width:400px; margin-top:.25em"><?php echo $v[fulldescr];?></div>        
    </div>
    <?php
	if(!empty($v['parts'])){
		$parts_array = explode(",",$v[parts]);
		foreach($parts_array as $key=>$val){
			$parts_array[$key]['info'] = $search->queryPart($v['manufacturer'], $val);			
		}
		
	?>
    <div style="float:left; clear:left">
    PARTS
    </div>
    <?php
	}
	?>
    
</div>
<?php
	}
}else{	



?>
<div class="text-box">

	
	<img src="<?php echo $v[image]; ?>" style="width:200px; border:2px #000000 solid; float:left" />
    <div style="float:left; margin-left:1em">
    	<div style="float:left; clear:left; width:400px; font-size:16px; font-weight:600; border-bottom:1px #000000 solid; padding-bottom:.25em;"><?php echo $v[title];?></div>
        <div style="float:left; clear:left; width:400px; margin-top:.25em"><?php echo $v[descr];?></div>
        <?php if(!empty($v[link])){?>
        <div style="float:left; clear:left; width:400px; margin-top:.25em"><a href="<?php echo $v[link];?>" target="_parent">Click here for more</a></div>
        <?php } ?>
        
    </div>
</div>
<?php
	}
}


?>


</div>