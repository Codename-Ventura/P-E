<?php
include('includes/controllers/vendors.php');
include('includes/controllers/news.php'); 
?>


<div class="main">

		<div style="width:775px; color:#CCCCCC; padding:.5em; text-align:center; font-size:9px">Now available from P&E Distributors</div>
		<div id="main_content_header" style="height:188px">
        <img src="<?php echo $_SESSION[image_slice][1][src];?>" />
		</div>

	<div id="features_bar">
    <ul>
    	<?php
			foreach($_SESSION[image_slice] as $k=>$v){?>
    	<li id="feat<?php echo $k;?>" onclick="flip(<?php echo $k;?>);"><?php echo $v['manufacturer'];?></li>
        <?php } ?>
    </ul>
     
    </div>

    
    <!-- LANDING PAGE STUFF -->
    
	<?php include('includes/layouts/content/vendors.php');?>
    
    <div class="divider">New Products</div>
    
    <div class="main"><?php $newstype = "p"; include('includes/layouts/content/news.php');?></div>

    <div class="divider">News & Events</div>
    
    <div class="main"><?php $newstype = "news"; include('includes/layouts/content/news.php');?></div>
    
</div>

