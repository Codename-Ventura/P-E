<?php
include('includes/controllers/vendors.php');
include('includes/controllers/news.php');
?>


<div class="main">


	  
    <!-- LANDING PAGE STUFF -->
    
	<?php include('includes/layouts/content/vendors.php');?>
    
    <div class="divider">New Products</div>
    
    <div class="main"><?php $newstype = "p"; include('includes/layouts/content/news.php');?></div>

    <div class="divider">News & Events</div>
    
    <div class="main"><?php $newstype = "news"; include('includes/layouts/content/news.php');?></div>
    
</div>

