<form name="credit" method="post">
<?php $error_ct = "0"; 
$error_req = "0";?>
<div style="background:#FFFFFF; padding-top:2em;">
<div style="text-align:center; width:100%;font-size:12px; margin:1em; border:1px #666666 solid"><font color="#FF0000">Fields marked in red are required</font><br />
<font color="#33CC00">Fields marked in green are optional</font>


</div>

<div style="text-align:center; width:100%;font-size:24px;">General Information</div>
<div style="text-align:center; padding:.5em;"><p>Terms Requested: <?php echo "<b>$terms</b>"; ?> </p>
<input type="hidden" value="<?php echo $terms; ?>" name="terms"/> 
</div>
<div style="text-align:center; padding:.5em; margin-top:1em;"><p>Referred By: </p>
    <input type="text" name="salesman" value="<?php if (isset($_REQUEST['salesman'])){ echo $_REQUEST['salesman']; }?>" />
</div>
<div style="text-align:center; font-size:9px; margin:0; padding:0;"><p>Salesman Name</p></div>
	<?php if (!isset($taxid) || ($taxid  == "")){
				$class = "errorow_req";
				$error = "true"; 
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1; }
				  else {
				$class = "row";
				$error = "false";
				  } ?>
<div style="text-align:center; padding:.5em; margin-top:1em;" class="<?php echo $class; ?>"><p>State Tax ID#: </p>
    <input type="text" name="taxid" value="<?php echo $taxid;?>" />
</div>

    <div style="text-align:left; border-bottom:0; clear:both; width:100%; background:#FFFFCC; margin:.5EM" class="<?php if (isset($_REQUEST['noship'])){ echo "hide"; }?>"><input type="checkbox" align="top" onClick="ShowHide('mailaddy')"/>My mailing address is the same as my shipping address.</div>

		<div style="width:49%; float:left;">
			<fieldset id="general">
            <?php if (!isset($busname) || ($busname == "")){
				$class = "errorow_req";
				$error = "true"; 
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1; }
				  else {
				$class = "row";
				$error = "false";
				  } ?>
			<div class="<?php echo $class ?>"><p>Business Name:</p><input type="text" name="bus_name" value="<?php if (isset($busname)){ echo stripslashes($busname) ;} ?>"/></div>
            
            <?php if (!isset($bus_phone) || ($bus_phone == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

			<div class="<?php echo $class ?>"><p>Phone:</p><input type="text" name="bus_phone" <?php if (isset($bus_phone)){ echo "value=\"$bus_phone\"";} ?>/></div>
            
            <?php if (!isset($bus_fax) || ($bus_phone == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>				

			<div class="<?php echo $class ?>"><p>Fax:</p><input type="text" name="bus_fax" <?php if (isset($bus_fax)){ echo "value=\"$bus_fax\"";} ?>/></div>
            
            <?php if (!isset($bus_shipaddy) || ($bus_shipaddy == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

			<div class="<?php echo $class ?>"><p>Shipping Address:</p><input type="text" name="bus_shipaddy" <?php if (isset($bus_shipaddy)){ echo "value=\"$bus_shipaddy\"";} ?>/></div>
            
            <?php if (!isset($bus_city) || ($bus_city == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

			<div class="<?php echo $class ?>"><p>City:</p><input type="text" name="bus_city" <?php if (isset($bus_city)){ echo "value=\"$bus_city\"";} ?>/></div>
            
            <?php if (!isset($bus_state) || ($bus_state == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

			<div class="<?php echo $class ?>"><p>State (2 letter abbreviation):</p><input type="text" name="bus_state" <?php if (isset($bus_state)){ echo "value=\"$bus_state\"";} ?>/></div>
            
            <?php if (!isset($bus_zip) || ($bus_zip == "")){
            	$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

			<div class="<?php echo $class ?>"><p>Zipcode:</p><input type="text" name="bus_zip" <?php if (isset($bus_zip)){ echo "value=\"$bus_zip\"";} ?> /></div>

			<div class="row"><p>Type of Business</p><?php echo $bus_type;?><input type="hidden" name="bus_type" value="<?php echo $bus_type; ?>" />
				</div>

		</div>
<!-- END OF GENERAL (LEFT) -->

<div style="width:49%; float:right">

	<div id="mailaddy" class="<?php if (isset($_REQUEST['noship'])){ echo "hide";} else { echo "show";} ?>">
    
    	<?php if (!isset($bus_mailaddy) || ($bus_mailaddy == "")){
				$class = "errorow";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
		<div class="<?php echo $class; ?>"><p>Mailing Address:</p><input type="text" name="bus_mailaddy" <?php echo "value=\"$bus_mailaddy\""; ?> /></div>
		<?php if (!isset($bus_mailcity) || ($bus_mailcity == "")){
				$class = "errorow";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
		<div class="<?php echo $class;?>"><p>City:</p><input type="text" name="bus_mailcity" <?php echo "value=\"$bus_mailcity\""; ?>/></div>

		<?php if (!isset($bus_mailstate) || ($bus_mailstate == "")){
				$class = "errorow";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>


		<div class="<?php echo $class;?>"><p>State (2 letter abbreviation):</p><input type="text" name="bus_mailstate" <?php echo "value=\"$bus_mailstate\""; ?>/></div>
        
        <?php if (!isset($bus_mailzip) || ($bus_mailzip == "")){
				$class = "errorow";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

		<div class="<?php echo $class; ?>"><p>Zipcode:</p><input type="text" name="bus_mailzip" <?php echo "value=\"$bus_mailzip\""; ?>/></div>

	</div>

	<?php if (!isset($email1) || ($email1 == "")){
				$class = "errorow";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
	<div class="<?php echo $class; ?>"><p>Email Address:</p><input type="text" name="email1" <?php echo "value=\"$email1\""; ?>/></div>

	<?php if (!isset($buyername) || ($buyername == "")){
				$class = "errorow";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
	<div class="<?php echo $class; ?>"><p>Name of Buyer:</p><input type="text" name="buyername" <?php echo "value=\"$buyername\""; ?>/></div>


	<?php if (!isset($bus_mailaddy) || ($bus_mailaddy == "")){
				$class = "errorow";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
                
	<div class="<?php echo $class; ?>"><p>Website (if applicable):</p><input type="text" name="weburl" <?php echo "value=\"$website\"";?>/></div>

	<div class="row">Is a P.O. required?
        <select style="text-align:center; width:16em;" name="po_req">
			<option value="Yes">Yes</option>
			<option value="No">No</option>
		</select></div>
    </fieldset>
</div>

<!--  END OF GENERAL (RIGHT) -->

<div style="text-align:center; padding-top:1em; font-size:24px; clear:both;">Financial Information</div>


<div style="width:49%; float:left;">
<fieldset id="financial">
	<?php if (!isset($property) || ($property == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
	<div class="<?php echo $class; ?>"><p>Real Estate Property Owned (value):</p>$<input type="text" name="prop" <?php echo "value=\"$property\""; ?>/></div>
    
    <?php if (!isset($mort_val) || ($mort_val == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

	<div class="<?php echo $class; ?>"><p>Mortgage Amount:</p>$<input type="text" name="mort_val" <?php echo "value=\"$mort_val\""; ?>/></div>

	<?php 
		if (!isset($mortgagee) || ($mortgagee == "")) {
			if (($mort_val == "0") || ($mort_val == "0.00")) {
				$class = "row";
				$error = "false";
				 }
			else {
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;
				} 
			}
			
		else {
				$class = "row";
				$error = "false";
			} 
				
	?>
	<div class="<?php echo $class; ?>"><p>Mortgagee:</p><input type="text" name="mortgagee" <?php echo "value=\"$mortgagee\""; ?>/></div>

	<?php if (!isset($sales_vol) || ($sales_vol == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
                
	<div class="<?php echo $class;?>"><p>Approx Monthly Sales Volume:</p>$<input type="text" name="sales_vol" <?php echo "value=\"$sales_vol\"";?>/></div>

	<?php if (!isset($sales_vol) || ($sales_vol == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
                
	<div class="<?php echo $class;?>"><p>Approx Monthly Sales Volume:</p><input type="text" name="bus_years" <?php echo "value=\"$sales_vol\"";?>/></div>
    
	<?php if (!isset($bus_years) || ($bus_years == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
                
	<div class="<?php echo $class;?>"><p>Years in Business:</p><input type="text" name="bus_years" <?php echo "value=\"$bus_years\"";?>/></div>

</div>

<!-- END OF FINANCIAL (LEFT) -->

<div style="width:49%; float:right;">

	<?php if (!isset($bank_name) || ($bank_name == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

	<div class="<?php echo $class;?>"><p>Bank Name:</p><input type="text" name="bank" <?php echo "value=\"$bank_name\""; ?>/></div>

	<?php if (!isset($bank_contact) || ($bank_contact == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
	<div class="<?php echo $class;?>"><p>Bank Contact:</p><input type="text" name="bank_contact" <?php echo "value=\"$bank_contact\""; ?>/></div>
    
    <?php if (!isset($bank_phone) || ($bank_phone == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

	<div class="<?php echo $class;?>"><p>Bank Phone #:</p><input type="text" name="bank_phone" <?php echo "value=\"$bank_phone\""; ?>/></div>
    
    <?php if (!isset($bank_fax) || ($bank_fax == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

	<div class="<?php echo $class; ?>"><p>Bank Fax #:</p><input type="text" name="bank_fax" <?php echo "value=\"$bank_fax\""; ?>/></div>
    
    


</fieldset>
</div>

<!-- END OF FINANCIAL (RIGHT) -->

<div style="text-align:center; padding-top:1em; padding-bottom: 1em; font-size:24px; clear:both;">Personal Data of Owner
</div>


<div style="width:49%; float:left;">
<fieldset id="personal">

	<?php if (!isset($pres_name) || ($pres_name == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
                
	<div class="<?php echo $class; ?>"><p>Owner/Pres Name:</p><input type="text" name="pres_name"
<?php echo "value=\"$pres_name\"";?> /></div>	

<?php if (!isset($pres_phone) || ($pres_phone == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
                
	<div class="<?php echo $class; ?>"><p>Home Phone:</p><input type="text" name="pres_phone"
<?php echo "value=\"$pres_phone\"";?> /></div>

	<?php if (!isset($pres_phone) || ($pres_phone == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
                
	<div class="<?php echo $class; ?>"><p>Home Address</p><input type="text" name="pres_addy" <?php echo "value=\"$pres_addy\"";?>/></div>







</div>

<!-- END OF OWNER (LEFT) -->

<div style="width:49%; float:right;">

				<?php if (!isset($pres_city) || ($pres_city == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
	<div class="<?php echo $class; ?>"><p>City:</p><input type="text" name="pres_city" <?php echo "value=\"$pres_city\"";?>/></div>
    
	

	<div class="<?php echo $class; ?>">
        <p>State:</p>  
			<select name="pres_state">
		<option value="AL">Alabama</option>
		<option value="AK">Alaska</option>
		<option value="AZ">Arizona</option>
		<option value="AR">Arkansas</option>
		<option value="CA">California</option>
		<option value="CO">Colorado</option>
		<option value="CT">Connecticut</option>
		<option value="DE">Delaware</option>
		<option value="DC">District Of Columbia</option>
		<option value="FL">Florida</option>
		<option value="GA">Georgia</option>
		<option value="HI">Hawaii</option>
		<option value="ID">Idaho</option>
		<option value="IL">Illinois</option>
		<option value="IN">Indiana</option>
		<option value="IA">Iowa</option>
		<option value="KS">Kansas</option>
		<option value="KY">Kentucky</option>
		<option value="LA">Louisiana</option>
		<option value="ME">Maine</option>
		<option value="MD">Maryland</option>
		<option value="MA">Massachusetts</option>
		<option value="MI">Michigan</option>
		<option value="MN">Minnesota</option>
		<option value="MS">Mississippi</option>
		<option value="MO">Missouri</option>
		<option value="MT">Montana</option>
		<option value="NE">Nebraska</option>
		<option value="NV">Nevada</option>
		<option value="NH">New Hampshire</option>
		<option value="NJ">New Jersey</option>
		<option value="NM">New Mexico</option>
		<option value="NY">New York</option>
		<option value="NC">North Carolina</option>
		<option value="ND">North Dakota</option>
		<option value="OH">Ohio</option>
		<option value="OK">Oklahoma</option>
		<option value="OR">Oregon</option>
		<option value="PA">Pennsylvania</option>
		<option value="PR">Puerto Rico</option>
		<option value="RI">Rhode Island</option>
		<option value="SC">South Carolina</option>
		<option value="SD">South Dakota</option>
		<option value="TN">Tennessee</option>
		<option value="TX">Texas</option>
		<option value="UT">Utah</option>
		<option value="VT">Vermont</option>
		<option value="VA">Virginia</option>
		<option value="WA">Washington</option>
		<option value="WV">West Virginia</option>
		<option value="WI">Wisconsin</option>
		<option value="WY">Wyoming</option>
			</select></div>
            
          	<?php if (!isset($pres_zip) || ($pres_zip == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
                
                
         <div class="<?php echo $class; ?>"><p>Zipcode:</p>  <input type="text" name="pres_zip" <?php echo "value=\"$pres_zip\"";?> /></div>



</div>

<!-- END OF OWNER (RIGHT) -->
<a name="part"></a>
<div id="partner" class="<?php if (isset($_REQUEST['partnerbox'])){echo "show";}else{echo "hide";}?>">

	<div style="text-align:center; font-size:24px; clear:both; padding-top:1em">Personal Data of Partner</div>
    <div style="width:49%; float:left;">

			<?php if (!isset($part_name) || ($part_name == "")){
				$class = "errorow";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

		<div class="<?php echo $class; ?>"><p>Partner Name:</p><input type="text" name="part_name" <?php echo "value=\"$part_name\"";?> /></div>
 
 
 			<?php if (!isset($part_phone) || ($part_phone == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
                
	<div class="<?php echo $class; ?>"><p>Home Phone:</p><input type="text" name="part_phone"
<?php echo "value=\"$part_phone\"";?> /></div>
 
 

			<?php if (!isset($part_addy) || ($part_addy == "")){
				$class = "errorow";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
                
                
		<div class="<?php echo $class; ?>"><p>Home Address</p><input type="text" name="part_addy" <?php echo "value=\"$part_addy\"";?>/></div>
        

		



	</div>
    <!-- END OF PARTNER (LEFT) -->

	<div style="width:49%; float:right;">
    
            	<?php if (!isset($part_city) || ($part_city == "")){
				$class = "errorow";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>


		<div class="<?php echo $class; ?>"><p>City:</p><input type="text" name="part_city" <?php echo "value=\"$part_city\"";?> /></div>

		<div class="<?php echo $class; ?>"><p>State:</p>  
		<select name="part_state">
		<option value="AL">Alabama</option>
		<option value="AK">Alaska</option>
		<option value="AZ">Arizona</option>
		<option value="AR">Arkansas</option>
		<option value="CA">California</option>
		<option value="CO">Colorado</option>
		<option value="CT">Connecticut</option>
		<option value="DE">Delaware</option>
		<option value="DC">District Of Columbia</option>
		<option value="FL">Florida</option>
		<option value="GA">Georgia</option>
		<option value="HI">Hawaii</option>
		<option value="ID">Idaho</option>
		<option value="IL">Illinois</option>
		<option value="IN">Indiana</option>
		<option value="IA">Iowa</option>
		<option value="KS">Kansas</option>
		<option value="KY">Kentucky</option>
		<option value="LA">Louisiana</option>
		<option value="ME">Maine</option>
		<option value="MD">Maryland</option>
		<option value="MA">Massachusetts</option>
		<option value="MI">Michigan</option>
		<option value="MN">Minnesota</option>
		<option value="MS">Mississippi</option>
		<option value="MO">Missouri</option>
		<option value="MT">Montana</option>
		<option value="NE">Nebraska</option>
		<option value="NV">Nevada</option>
		<option value="NH">New Hampshire</option>
		<option value="NJ">New Jersey</option>
		<option value="NM">New Mexico</option>
		<option value="NY">New York</option>
		<option value="NC">North Carolina</option>
		<option value="ND">North Dakota</option>
		<option value="OH">Ohio</option>
		<option value="OK">Oklahoma</option>
		<option value="OR">Oregon</option>
		<option value="PA">Pennsylvania</option>
		<option value="PR">Puerto Rico</option>
		<option value="RI">Rhode Island</option>
		<option value="SC">South Carolina</option>
		<option value="SD">South Dakota</option>
		<option value="TN">Tennessee</option>
		<option value="TX">Texas</option>
		<option value="UT">Utah</option>
		<option value="VT">Vermont</option>
		<option value="VA">Virginia</option>
		<option value="WA">Washington</option>
		<option value="WV">West Virginia</option>
		<option value="WI">Wisconsin</option>
		<option value="WY">Wyoming</option>
		</select></div>
        
        	<?php if (!isset($part_zip) || ($part_zip == "")){
				$class = "errorow";
				$error = "true";
				$error_ct = $error_ct + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
        <div class="<?php echo $class; ?>"><p>Zipcode:</p>  <input type="text" <?php echo "value=\"$part_zip\"";?> /></div>
		


	</div>
    <!-- END OF PARTNER (RIGHT)-->

</fieldset>
</div>
<!-- END OF PARTNER HIDDEN BOX -->

<div style="text-align:left; border-bottom:0; clear:both; width:100%; background:#FFFFCC; margin:.5EM"><input type="checkbox" name="partnerbox" value="partner"  onClick="ShowHide('partner')" <?php if(isset($_REQUEST['partnerbox'])){ echo "checked=\"checked\"";}?> /><label for="partner">I have a partner</label></div>


<!-- BEGIN TERMS OF SVC -->
<div style="float:left; text-align:left">
<div style="text-align:center; padding-top:1em; font-size:24px; clear:both;">Terms of Service</div>
<fieldset id="agreement">
		<p style="padding:2em">
        The undersigned does hereby make application for a credit account to Performance and Electronics Distributors, Inc. and by doing so authorizes Performance and Electronics Distributors, Inc., in connection with the establishment and maintenance of this account, to investigate our credit worthiness and capacity. The undersigned warrants the foregoing answers are true and accurate in every respect. I affirm our firm is financially able to meet any commitments we have made and will pay your invoices according to your terms. In addition, it is mutually agreed and understood that this account is subject to a finance charge (the maximum percentage rate allowed by law), which may be imposed on any invoice or invoices not paid within terms. The undersigned agrees to pay all costs and expenses incident to the collection of past due invoices and unpaid remainders, including court costs and reasonable attorney fees. I have thoroughly read and do understand this credit agreement and by evidence of my signature, agree to said terms.
        </p>
        <div style="background:#FFFFCC; padding:1em;"><input type="checkbox" name="tos_agree" <?php if(isset($_REQUEST['tos_agree'])){ echo "checked=\"checked\""; }?> />By clicking this box, I agree that I am signing this document, and give the above Bank and Trade References the authority to release credit information to P & E Distributors, Inc. I understand that by signing this application, I am authorizing P & E Distributors, Inc. to obtain a credit report on my personal data from one or more credit reporting agencies.  All information provided is true and correct to the best of my knowledge.<br /><font color=#FF0000><?php if(!isset($_REQUEST['tos_agree'])){echo "You must check the box to agree to the above"; $error_req = $error_req + 1;}?></font></div>
</div>
<!-- END TERMS OF SVC -->

<!-- BEGIN GUARANTY -->
<div style="float:left; text-align:left">
<div style="text-align:left; padding-top:1em; font-size:24px; clear:both;">Individual, Limited Liability Corporation (LLC), or Partnership Personal Guaranty</div>

		<p style="padding:2em">
        In  consideration  of  P  &  E  DISTRIBUTORS,  INC.  AND  IT`S  SUBSIDIARY  OPERATIONS,  extending  credit  to   (name  of  company  to  which  credit  is  extended),  the  undersigned    unconditionally  guarantees  the  payments  of  and  all  indebtedness  owed  to  P  &  E  DISTRIBUTORS,  INC.  AND  IT`S  SUBSIDIARY  OPERATIONS,  and  the  undersigned  makes  such  guarantee  and  further  agrees  that  if  the  said  P  &  E  DISTRIBUTORS,  INC.  AND  ITS  SUBSIDIARY  OPERATIONS,  expends  any  monies  for  the  collection  of  said  indebtedness,  the  undersigned  will  pay,  in  addition,  all  attorney  fees  and  cost  of  collection  of  the  said  indebtedness.  I  further  agree  that  for  any  future  deliveries  of  goods  or  services,  I  agree  to  pay  all  costs  of  collection,  including  reasonable  attorney  fees  for  the  enforcement  of  any  indebtedness  against  the  undersigned.  This  shall  be  a  continuing  obligation  of  the  undersigned,  their  legal  representative,  successors  and  assignees.  Undersigned  also  agrees  that  any  litigation  necessary  to  enforce  collection  of  this  debt  will  be  governed  under  the  jurisdictin  of  the  State  of  Tennessee  and  jurisdiction  shall  be  specifically  vested  in  the  Courts  of  Davidson  County,  in  Nashville,  Tennessee.  This  obligations  shall  cover  the  renewal  of  any  claims  guaranteed  by  this  instrument  of  extensions  of  time  payment  thereof,  without  further  notice  thereof  to  the  guarantors.</p>
        <p style="padding:0 0 2em 2em">All  monthly  accounts  are  due  by  the  10th  of  the  month  following  purchase.  At  the  end  of  the  month,  any  balance  not  paid  will  be  subject  to  a  1.5%  finance  charge.  The  finance  charge  is  computed  by  applying  1.5%  per  month  simple  interest  on  all  unpaid  balances,  annual  percentage  rate,  18%.  
All  blanks  on  this  application  must  be  filled  out  complete  regardless  of  the  type  of  account  you  are  applying  for.   Check  to  make  sure  that  all  information  you  are  providing  is  complete  and  accurate.  Failure  to  do  so  will  result  in  delay  of  setting  up  your  account  or  non‐acceptance  of  your  request  for  an  account.  
        </p>
        <div style="background:#FFFFCC; padding:1em;"><input type="checkbox" name="guaranty" value="true" <?php if(isset($_REQUEST['guaranty'])){ echo "checked=\"checked\"";} ?>/>By checking this box, I/WE agree that I/WE have read and fully understand the aforementioned agreement<br /><font color="#FF0000"> <?php if (!isset($_REQUEST['guaranty'])){ echo "You must check the box to agree to the above"; $error_req = $error_req + 1;} ?> </font>    
</div>
</fieldset>
</div>
<!-- END GUARANTY -->
<div style="text-align:center; padding-top:1em; font-size:24px; clear:both;">Trade References #1</div>
<fieldset id="trade_ref">
    <div style="width:49%; float:left;">

        <?php if (!isset($trade1_name) || ($trade1_name == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

		<div class="<?php echo $class; ?>"><p>Name:</p><input type="text" name="trade1_name" <?php echo "value=\"$trade1_name\"";?> /></div>
        
                <?php if (!isset($trade1_city) || ($trade1_city == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

		<div class="<?php echo $class; ?>"><p>City</p><input type="text" name="trade1_city" <?php echo "value=\"$trade1_city\"";?> /></div>

        <?php if (!isset($trade1_state) || ($trade1_state == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
                
		<div class="<?php echo $class; ?>"><p>State:</p>  
		<input name="t_st1" value="<?php echo $_REQUEST['t_st1']; ?>">
		</div>

        <?php if (!isset($trade1_zip) || ($trade1_zip == "")){
				$class = "errorow_req";
				$error = "true";
				$error_req = $error_req + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>
        <div class="<?php echo $class; ?>"><p>Zipcode:</p>  <input type="text" name="trade1_zip" <?php echo "value=\"$trade1_zip\"";?>/></div>

	</div>
    <!-- END OF TRADE REF (LEFT) -->

	<div style="width:49%; float:right;">

        <?php if (!isset($trade1_acct) || ($trade1_acct == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

		<div class="<?php echo $class; ?>"><p>Account #:</p><input type="text" name="trade1_acct" <?php echo "value=\"$trade1_acct\"";?>/></div>

        <?php if (!isset($trade1_phone) || ($trade1_phone == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

		<div class="<?php echo $class; ?>"><p>Phone #</p><input type="text" name="trade1_phone" <?php echo "value=\"$trade1_acct\"";?>/></div>

        <?php if (!isset($trade1_fax) || ($trade1_fax == "")){
				$class = "errorow_req";
				$error = "true";
				$error_ct = $error_ct + 1;
				$error_req = $error_req + 1;}
					else {
				$class = "row";
				$error = "false";
				} ?>

		<div class="<?php echo $class; ?>"><p>Fax #:</p><input type="text" name="trade1_fax" <?php echo "value=\"$trade1_fax\"";?>/></div>


	</div>
    <!-- END OF TRADE REF (RIGHT) -->
    <div style="text-align:center; padding-top:1em; font-size:24px; clear:both;">Trade References #2</div>
    <div style="width:49%; float:left;">



        <?php if (!isset($trade2_name) || ($trade2_name == "")){
					if($terms == "Monthly (Net 10)") {
						$class = "errorow_req";
						$error = "true";
						$error_ct = $error_ct + 1;
						$error_req = $error_req + 1;}
					else{
						$class = "errorow";
						$error = "true";
						$error_ct = $error_ct + 1;} }
				else {
				$class = "row";
				$error = "false";
				} ?>

		<div class="<?php echo $class; ?>"><p>Name:</p><input type="text" name="trade2_name" <?php echo "value=\"$trade2_name\"";?> /></div>
        
                <?php if (!isset($trade2_city) || ($trade2_city == "")){
					if($terms == "Monthly (Net 10)") {
						$class = "errorow_req";
						$error = "true";
						$error_ct = $error_ct + 1;
						$error_req = $error_req + 1;}
					else{
						$class = "errorow";
						$error = "true";
						$error_ct = $error_ct + 1;} }
				else {
				$class = "row";
				$error = "false";
				}?>

		<div class="<?php echo $class; ?>"><p>City</p><input type="text" name="trade2_city" <?php echo "value=\"$trade2_city\"";?> /></div>

        <?php if (!isset($trade2_state) || ($trade2_state == "")){
					if($terms == "Monthly (Net 10)") {
						$class = "errorow_req";
						$error = "true";
						$error_ct = $error_ct + 1;
						$error_req = $error_req + 1;}
					else{
						$class = "errorow";
						$error = "true";
						$error_ct = $error_ct + 1;} }
				else {
				$class = "row";
				$error = "false";
				 } ?>
                
		<div class="<?php echo $class; ?>"><p>State:</p>  
		<input name="t_st2" value="<?php echo $_REQUEST['t_st2']; ?>"></div>

        <?php if (!isset($trade2_zip) || ($trade2_zip == "")){
					if($terms == "Monthly (Net 10)") {
						$class = "errorow_req";
						$error = "true";
						$error_ct = $error_ct + 1;
						$error_req = $error_req + 1;}
					else{
						$class = "errorow";
						$error = "true";
						$error_ct = $error_ct + 1;} }
				else {
				$class = "row";
				$error = "false";
				} ?>
        <div class="<?php echo $class; ?>"><p>Zipcode:</p>  <input type="text" name="trade2_zip" <?php echo "value=\"$trade2_zip\"";?>/></div>

	</div>
    <!-- END OF TRADE REF (LEFT) -->

	<div style="width:49%; float:right;">

        <?php if (!isset($trade2_acct) || ($trade2_acct == "")){
					if($terms == "Monthly (Net 10)") {
						$class = "errorow_req";
						$error = "true";
						$error_ct = $error_ct + 1;
						$error_req = $error_req + 1;}
					else{
						$class = "errorow";
						$error = "true";
						$error_ct = $error_ct + 1;} }
				else {
				$class = "row";
				$error = "false";
				} ?>

		<div class="<?php echo $class; ?>"><p>Account #:</p><input type="text" name="trade2_acct" <?php echo "value=\"$trade2_acct\"";?>/></div>

        <?php if (!isset($trade2_phone) || ($trade2_phone == "")){
					if($terms == "Monthly (Net 10)") {
						$class = "errorow_req";
						$error = "true";
						$error_ct = $error_ct + 1;
						$error_req = $error_req + 1;}
					else{
						$class = "errorow";
						$error = "true";
						$error_ct = $error_ct + 1;} }
				else {
				$class = "row";
				$error = "false";
				} ?>

		<div class="<?php echo $class; ?>"><p>Phone #</p><input type="text" name="trade2_phone" <?php echo "value=\"$trade2_acct\"";?>/></div>

        <?php if (!isset($trade2_fax) || ($trade2_fax == "")){
					if($terms == "Monthly (Net 10)") {
						$class = "errorow_req";
						$error = "true";
						$error_ct = $error_ct + 1;
						$error_req = $error_req + 1;}
					else{
						$class = "errorow";
						$error = "true";
						$error_ct = $error_ct + 1;} }
				else {
				$class = "row";
				$error = "false";
				} ?>

		<div class="<?php echo $class; ?>"><p>Fax #:</p><input type="text" name="trade2_fax" <?php echo "value=\"$trade2_fax\"";?>/></div>


	</div>
    <!-- END OF TRADE REF (RIGHT) -->
    <div style="text-align:center; padding-top:1em; font-size:24px; clear:both;">Trade References #3</div>
    <div style="width:49%; float:left;">



        <?php if (!isset($trade3_name) || ($trade3_name == "")){
					if($terms == "Monthly (Net 10)") {
						$class = "errorow_req";
						$error = "true";
						$error_ct = $error_ct + 1;
						$error_req = $error_req + 1;}
					else{
						$class = "errorow";
						$error = "true";
						$error_ct = $error_ct + 1;} }
				else {
				$class = "row";
				$error = "false";
				} ?>

		<div class="<?php echo $class; ?>"><p>Name:</p><input type="text" name="trade3_name" <?php echo "value=\"$trade3_name\"";?> /></div>
        
                <?php if (!isset($trade3_city) || ($trade3_city == "")){
					if($terms == "Monthly (Net 10)") {
						$class = "errorow_req";
						$error = "true";
						$error_ct = $error_ct + 1;
						$error_req = $error_req + 1;}
					else{
						$class = "errorow";
						$error = "true";
						$error_ct = $error_ct + 1;} }
				else {
				$class = "row";
				$error = "false";
				} ?>

		<div class="<?php echo $class; ?>"><p>City</p><input type="text" name="trade3_city" <?php echo "value=\"$trade3_city\"";?> /></div>

        <?php if (!isset($trade3_state) || ($trade3_state == "")){
					if($terms == "Monthly (Net 10)") {
						$class = "errorow_req";
						$error = "true";
						$error_ct = $error_ct + 1;
						$error_req = $error_req + 1;}
					else{
						$class = "errorow";
						$error = "true";
						$error_ct = $error_ct + 1;} }
				else {
				$class = "row";
				$error = "false";
				} ?>
                
		<div class="<?php echo $class; ?>"><p>State:</p> <input name="t_st3" value="<?php echo $_REQUEST['t_st3']; ?>"></div>

        <?php if (!isset($trade3_zip) || ($trade3_zip == "")){
					if($terms == "Monthly (Net 10)") {
						$class = "errorow_req";
						$error = "true";
						$error_ct = $error_ct + 1;
						$error_req = $error_req + 1;}
					else{
						$class = "errorow";
						$error = "true";
						$error_ct = $error_ct + 1;} }
				else {
				$class = "row";
				$error = "false";
				} ?>
        <div class="<?php echo $class; ?>"><p>Zipcode:</p>  <input type="text" name="trade3_zip" <?php echo "value=\"$trade3_zip\"";?>/></div>

	</div>
    <!-- END OF TRADE REF (LEFT) -->

	<div style="width:49%; float:right;">

        <?php if (!isset($trade3_acct) || ($trade3_acct == "")){
					if($terms == "Monthly (Net 10)") {
						$class = "errorow_req";
						$error = "true";
						$error_ct = $error_ct + 1;
						$error_req = $error_req + 1;}
					else{
						$class = "errorow";
						$error = "true";
						$error_ct = $error_ct + 1;} }
				else {
				$class = "row";
				$error = "false";
				} ?>

		<div class="<?php echo $class; ?>"><p>Account #:</p><input type="text" name="trade3_acct" <?php echo "value=\"$trade3_acct\"";?>/></div>

        <?php if (!isset($trade3_phone) || ($trade3_phone == "")){
					if($terms == "Monthly (Net 10)") {
						$class = "errorow_req";
						$error = "true";
						$error_ct = $error_ct + 1;
						$error_req = $error_req + 1;}
					else{
						$class = "errorow";
						$error = "true";
						$error_ct = $error_ct + 1;} }
				else {
				$class = "row";
				$error = "false";
				}  ?>

		<div class="<?php echo $class; ?>"><p>Phone #</p><input type="text" name="trade3_phone" <?php echo "value=\"$trade3_acct\"";?>/></div>

        <?php if (!isset($trade3_fax) || ($trade3_fax == "")){
					if($terms == "Monthly (Net 10)") {
						$class = "errorow_req";
						$error = "true";
						$error_ct = $error_ct + 1;
						$error_req = $error_req + 1;}
					else{
						$class = "errorow";
						$error = "true";
						$error_ct = $error_ct + 1;} }
				else {
				$class = "row";
				$error = "false";
				} ?>

		<div class="<?php echo $class; ?>"><p>Fax #:</p><input type="text" name="trade3_fax" <?php echo "value=\"$trade3_fax\"";?>/></div>


	</div>
    <!-- END OF TRADE REF (RIGHT) -->
</fieldset>

</fieldset>
<center><input type=submit name="sub" value="Register Now!"></center>


</div>
</div>
</form> 