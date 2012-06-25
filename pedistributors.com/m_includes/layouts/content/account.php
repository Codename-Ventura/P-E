
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
    
    

	<div class="text-box" id="allcredit">
    	<a name="allcredit"></a>
    	<div class="titles" style="width:100%">Credit Information<span style="float:right; font-size:9px"><a href="#allcredit" onclick="$('#creditinfo').slideToggle();">HIDE/SHOW CREDIT INFO</a></span></div>
        	
            <div style="float:left; display:none" id="creditinfo">
            
        	<div style="float:left;">
        	<ul style="padding:1em;">
            	<li><strong>Credit Limit:</strong> <?php echo $_SESSION[customer][cred_limit];?></li>
                <li><strong>Current Balance:</strong> <?php echo $_SESSION[customer][balance];?></li>
                <li><strong>Credit Available:</strong> <?php echo $_SESSION[customer][creditavailable];?></li>
                
                <?php
					if(isset($_SESSION[customer][over]) && $_SESSION[customer][over] !== "0.00"){
				?>
                <div class="notice">
                	You have an overdue balance of <?php echo $_SESSION[customer][over];?>.
                    <br />
					Please bring your account up to date
                </div>
                <?php		
					}				
				?>
            </ul>
            </div>
            
            </div> 
     
    
       
    </div>
   
  	<div class="text-box" id="allsettings">
    <a name="settings"></a>
    	<div class="titles" style="width:100%">Account Settings<span style="float:right; font-size:9px" ><a href="#settings" onclick="$('#acctsettings').slideToggle();">HIDE/SHOW ACCOUNT SETTINGS</a></span></div>
        	
            <div style="float:left; display:none" id="acctsettings">
            
        	<?php
				if(!isset($_SESSION['customer']['has_sql_data'])){
			?>
            
            <div class="notice">
            It appears your account is still using our old login system.  You must update your information in order to change your account settings online.
            </div>
            <ul style="padding:1em; text-align:right; width:50%">
            <form method="post" action="http://www.pedistributors.com/index.php?p=account">
            	<input type="hidden" name="update_acct" value="true"/>
            	<li style="margin:.5em; text-align:left; margin:1em"><strong>Login Number: </strong><?php echo $_SESSION[customer][login];?></li>
                <li style="margin:.5em"><strong>E-Mail Address: </strong><input type="text" name="new_email" /></li>
                <li style="margin:.5em"><strong>New Password: </strong><input type="text" name="newpass1" /></li>
                <li style="margin:.5em"><strong>Confirm Password: </strong><input type="text" name="newpass2" /></li>
                <li><input type="submit" value="Update Account" /></li>
            </form>
            </ul>
            
            <?php
				}else{
			?>
            <ul style="padding:1em; text-align:right;">
            <li style="margin:1em">Edit your account information below.</li>
            <form method="post" action="http://www.pedistributors.com/index.php?p=account">
            <input type="hidden" name="change_password" value="true" />
                <li><strong>Password: </strong><input type="password" size="20" name="newpass1" value="<?php echo $_SESSION[customer][pw];?>" /></li>
                <li><strong>Confirm Password: </strong><input type="password" size="20" name="newpass2" value="<?php echo $_SESSION[customer][pw];?>" /></li>
                <li><strong>Email: </strong><input type="text" size="20" name="email" value="<?php echo $_SESSION[customer][email];?>" />
                <li style="margin:.5em"><input type="submit" value="Update Information" /></li>
            </form>
            </ul>
            
            <?php
			}
			?>
            </div> 
     
    
       
    </div>    
</div>