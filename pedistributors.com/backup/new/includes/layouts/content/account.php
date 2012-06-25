
<div class="main">
	
	<div class="text-box">
    	<div class="titles" style="width:100%">Your Account Information</div>
        
        	<div style="float:left;">
        	<ul style="padding:1em;">
            	<li><strong>Account Number</strong>: <?php echo $_SESSION['customer']['accountNumber'];?></li>
                <li><strong>Address</strong> : <?php echo $_SESSION['customer']['streetAddress'];?></li>
                <?php if(!empty($_SESSION['customer']['streetAddress2'])){?>
                <li><strong>Address 2</strong> : <?php echo $_SESSION['customer']['streetAddress2'];?></li>
                <?php } ?>
                <li><strong>City : </strong><?php echo $_SESSION['customer']['city'];?></li>
                <li><strong>State : </strong><?php echo $_SESSION['customer']['state'];?></li>
                <li><strong>Zip : </strong><?php echo $_SESSION['customer']['zip'];?></li>
            </ul>
            </div> 
     
    
       
    </div>    
</div>