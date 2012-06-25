
<?php
if(isset($register->formResponse)){
?>
<div style="float:left; width:700px; margin:1em">
Thank for your submission.  Your application will be reviewed, and a salesman will contact you regarding your new account.  This process should take no more than 48 hours.  Thank you for choosing P&E Distributors
</div>
<?php
}else{
?>
<div class="main">

<div style="width:100%; float:left; text-align:center"><a href="includes/forms/online_order.php?height=400&width=400" title="" class="thickbox"><img src="images/headers/oo.png" border="0"/></a>  
</div>

	<div class="left-half-noborder">
    <div class="titles">Join P&E Today!</div>
    <p style="clear:left;">If you would like to apply for a P&E account, simply submit the form below.  We will then review your application, and contact you when your account has been established.  If you would prefer to download a form and fax it to us, please click here to download the PDF version.  Please fax all completed credit applications to (615) 851-4053.</p>
    </div>
    
    <div class="right-half" style="padding-left:2em">
    <div class="titles">Why Register?</div>
    <p style="clear:left; padding-left:1em; float:left">
    	<ul style style="margin-bottom:1em">
        	<li>Fast Delivery</li>
            <li>Thousands of In-Stock Items</li>
            <li>Lowest Prices</li>
            <li>Online Ordering</li>
            <li>Huge Selection</li>
        </ul>    
    </p>
    <a href="pdf/peapplication3.pdf"><img src="images/buttons/print_pdf.png" border="0" /></a>
        </div>

<div style="clear:both; float:left; padding:.5em; width:100%">
<span style="width:100%; text-align:center"><div class="titles">Apply for an account below...<br/>We'll also need a copy of your <a href="http://www.tn.gov/revenue/streamlined/exemptioncertificate.pdf">Tax Exemption Certificate</a></div></span>
<span style="width:100%; text-align:center"><div>All required fields are marked in <span style="color:#FF0000">red</span></div></span>
<div class="text-box" style="margin-top:1em">
<form name="creditapp" method="post" onsubmit="return CheckEmpty(this)">
<input type="hidden" name="form_action" value="submit_app" />
<div class="titles">Company Information</div>
<div class="row">
	<div class="col" style="color:#E80000">Business Name:</div>
    <div class="rcol"><input type="text" name="business_name" class="req" /></div>
</div>
<div class="row">
	<div class="col" style="color:#E80000">Business Type:</div>
    <div class="rcol"><select name="business_type">
    <option value="Propietorship">Propietorship</option><br>
	<option value="Partnership">Partnership</option>
    <option value="Corporation">Corporation</option>
    </select></div>
</div>
<div class="row">
	<div class="col" style="color:#E80000">Tax ID:</div>
    <div class="rcol"><input type="text" name="tax_id" class="req" /></div>
</div>
<div class="row">
	<div class="col" style="color:#E80000">Terms Requested (select one):</div>
    <div class="rcol"><select name="terms">
    <option value="C.O.D.">C.O.D.</option><br>
	<option value="C.O.D. Company Check">C.O.D. Company Check</option>
    <option value="Monthly (Net 10)">Monthly (Net 10)</option>
    <option value="Credit Card">Credit Card*</option>
    </select></div>
</div>

<div class="row">
	<div class="col">Website:</div>
    <div class="rcol"><input type="text" name="website" /></div>
</div>

<div class="row">
	<div class="col" style="color:#E80000">Referred By:</div>
    <div class="rcol"><input type="text" name="referred_by" class="req" />(salesman's name)</div>
</div>
<div class="row">
	<div class="col" style="color:#E80000">Years in Business:</div>
    <div class="rcol"><input type="text" name="years_in_business" class="req" /></div>
</div>
<div class="row">
	<div class="col" style="color:#E80000">Buyer's Name:</div>
    <div class="rcol"><input type="text" name="name_of_buyer" class="req" /></div>
</div>
<div class="row">
	<div class="col" style="color:#E80000">Do you require a purchase order?:</div>
    <div class="rcol"><select name="require_p_o"><option value="Yes">Yes</option><option value="No">No</option></select></div>
</div>
<div class="left-half-border" style="width:75%">
<strong>Mailing Address</strong>
<div class="row">
	<div class="col" style="color:#E80000">Address:</div>
    <div class="rcol"><input type="text" name="business_address" class="req" /></div>
</div>
<div class="row">
	<div class="col" style="color:#E80000">City:</div>
    <div class="rcol"><input type="text" name="business_city" class="req" /></div>
</div>
<div class="row">
	<div class="col" style="color:#E80000">State:</div>
    <div class="rcol"><select name="business_state">
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
</div>
<div class="row">
	<div class="col" style="color:#E80000">Zip:</div>
    <div class="rcol"><input type="text" name="business_zip" class="req"/></div>
</div>           
<div class="row">
	<div class="col" style="color:#E80000">Bus. Phone:</div>
    <div class="rcol"><input type="text" name="business_phone" class="req" /></div>
</div>
<div class="row">
	<div class="col">Fax:</div>
    <div class="rcol"><input type="text" name="business_fax" /></div>
</div>
<div class="row">
	<div class="col">Email:</div>
    <div class="rcol"><input type="text" name="business_email" /></div>
</div>
<div class="row">
	<div class="col" style="border:0; text-align:right"><input type="checkbox" name="different_shipping_address" value="true" onclick="$('#shipaddy').slideToggle();" /></div>
    <div class="rcol" style="font-size:12px">My Shipping Address Differs from my mailing address</div>

<div id="shipaddy" style="display:none; float:left; clear:left; width:100%; margin:1em 0 0 0">

<strong style="float:left; clear:left">Shipping Address</strong>
<div class="row">
	<div class="col" style="color:#E80000">Address:</div>
    <div class="rcol"><input type="text" name="shipping_address" /></div>
</div>
<div class="row">
	<div class="col" style="color:#E80000">City:</div>
    <div class="rcol"><input type="text" name="shipping_city" /></div>
</div>
<div class="row">
	<div class="col" style="color:#E80000">State:</div>
    <div class="rcol"><select name="shipping_state">
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
</div>
<div class="row">
	<div class="col" style="color:#E80000">Zip:</div>
    <div class="rcol"><input type="text" name="shipping_zip" /></div>
</div>

</div>




</div>




</div>



</div> <!-- CLOSE CONTAINER TEXT-BOX -->

<!--  START NEW BOX HERE -->

<div class="text-box">
	<div class="titles">Financial Information</div>
    
    	<div class="left-half-border" style="width:75%">
        	<div class="row">
				<div class="col" style="color:#E80000">Property Owned (value):</div>
    			<div class="rcol"><input type="text" name="property_value" class="req" /></div>
			</div>
        	<div class="row">
				<div class="col" style="color:#E80000">Mortgage Amount:</div>
    			<div class="rcol"><input type="text" name="mortgage_amt" class="req" /></div>
			</div>
        	<div class="row">
				<div class="col" style="color:#E80000">Mortgagee:</div>
    			<div class="rcol"><input type="text" name="mortgagee" class="req" /></div>
			</div>
        	<div class="row">
				<div class="col" style="color:#E80000">Monthly Sales Volume:</div>
    			<div class="rcol"><input type="text" name="sales_volume" class="req" /></div>
			</div>        
        
        </div>
    	<div class="left-half-border">
        	<div class="row">
				<div class="col" style="color:#E80000">Bank Name:</div>
    			<div class="rcol"><input type="text" name="bank_name" class="req" /></div>
			</div>
        	<div class="row">
				<div class="col" style="color:#E80000">Account #:</div>
    			<div class="rcol"><input type="text" name="bank_acct_no" class="req" /></div>
			</div>        
        </div> <!-- CLOSE CONTAINER LEFT-HALF-BORDER -->

    	<div class="left-half-border">
        	<div class="row">
				<div class="col">Contact:</div>
    			<div class="rcol"><input type="text" name="bank_contact" /></div>
			</div>
        	<div class="row">
				<div class="col" style="color:#E80000">Phone #:</div>
    			<div class="rcol"><input type="text" name="bank_phone" class="req"/></div>
			</div>
        	<div class="row">
				<div class="col">Fax:</div>
    			<div class="rcol"><input type="text" name="bank_fax" /></div>
			</div>        
        </div> <!-- CLOSE CONTAINER LEFT-HALF-BORDER -->
        
</div> <!-- CLOSE CONTAINER TEXT-BOX -->

<!--  START NEW BOX HERE -->

<div class="text-box">
	<div class="titles">Owner/Partner Information</div>
    	<div class="left-half-border">
        	<div class="row">
				<div class="col" style="color:#E80000">Name:</div>
    			<div class="rcol"><input type="text" name="name_of_owner" class="req" /></div>
			</div>
        	<div class="row">
				<div class="col" style="color:#E80000">Address:</div>
    			<div class="rcol"><input type="text" name="owner_address" class="req" /></div>
			</div>
        	<div class="row">
				<div class="col" style="color:#E80000">City:</div>
    			<div class="rcol"><input type="text" name="owner_city" class="req"/></div>
			</div>
        	<div class="row">
				<div class="col" style="color:#E80000">State:</div>
    			<div class="rcol"><select name="owner_state">
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
			</div>  
            <div class="row">
				<div class="col" style="color:#E80000">Zipcode:</div>
    			<div class="rcol"><input type="text" name="owner_zip" class="req"/></div>
			</div>   
			<div class="row">
				<div class="col" style="color:#E80000">Home Phone:</div>
    			<div class="rcol"><input type="text" name="owner_phone" class="req" /></div>
			</div>
			<div class="row">
				<div class="col" style="color:#E80000">Social Sec #:</div>
    			<div class="rcol"><input type="text" name="owner_social_security" class="req"/></div>
			</div>
                        
        </div> <!-- CLOSE CONTAINER LEFT-HALF-BORDER -->

    	<div class="left-half-border">
        	<div class="row">
				<div class="col" style="border:0; text-align:right"><input type="checkbox" name="partner" value="true" onclick="$('#partinfo').slideToggle();" /></div>
    			<div class="rcol" style="font-size:12px">I have a partner</div> <!-- SHOW/HIDE PARTNER INFO -->
			</div>
            <div class="hide" id="partinfo"> <!-- HIDDEN PARTNER CONTAINER -->
        	<div class="row">
				<div class="col">Name:</div>
    			<div class="rcol"><input type="text" name="name_of_partner" /></div>
			</div>
        	<div class="row">
				<div class="col">Address:</div>
    			<div class="rcol"><input type="text" name="partner_address" /></div>
			</div>
        	<div class="row">
				<div class="col">City:</div>
    			<div class="rcol"><input type="text" name="partner_city" /></div>
			</div>
        	<div class="row">
				<div class="col">State:</div>
    			<div class="rcol"><select name="partner_state">
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
			</div>
            <div class="row">
				<div class="col">Zipcode:</div>
    			<div class="rcol"><input type="text" name="partner_zip"/></div>
			</div>     
			<div class="row">
				<div class="col">Home Phone:</div>
    			<div class="rcol"><input type="text" name="partner_phone" /></div>
			</div>
			<div class="row">
				<div class="col">Social Sec #:</div>
    			<div class="rcol"><input type="text" name="partner_social_security" /></div>
			</div> </div>
        </div> <!-- CLOSE CONTAINER LEFT-HALF-BORDER -->
        
</div> <!-- CLOSE CONTAINER TEXT-BOX -->

<!--  START NEW BOX HERE -->

<div class="text-box">
	<div class="titles">Terms of Service</div>
    	The undersigned does hereby make application for a credit account to Performance and Electronics Distributors, Inc. and by doing so authorizes Performance and Electronics Distributors, Inc., in connection with the establishment and maintenance of this account, to investigate our credit worthiness and capacity. The undersigned warrants the foregoing answers are true and accurate in every respect. I affirm our firm is financially able to meet any commitments we have made and will pay your invoices according to your terms. In addition, it is mutually agreed and understood that this account is subject to a finance charge (the maximum percentage rate allowed by law), which may be imposed on any invoice or invoices not paid within terms. The undersigned agrees to pay all costs and expenses incident to the collection of past due invoices and unpaid remainders, including court costs and reasonable attorney fees. I have thoroughly read and do understand this credit agreement and by evidence of my signature, agree to said terms. 

	<div class="row" style="width:100%; margin-top:1em">
    	<div class="rcol" style="width:10%; text-align:right"><input type="checkbox" name="tos" class="req"/></div>
        <div class="col" style="width:85%; border:0">By clicking this box, I agree that I am electronically signing this document, and give the above Bank and Trade References the authority to release credit information to P & E Distributors, Inc. I understand that by signing this application, I am authorizing P & E Distributors, Inc. to obtain a credit report on my personal data from one or more credit reporting agencies. All information provided is true and correct to the best of my knowledge.</div>
    	
    
    </div>
        
</div> <!-- CLOSE CONTAINER TEXT-BOX -->


<!--  START NEW BOX HERE -->

<div class="text-box">
	<div class="titles">Individual, Limited Liability Corporation (LLC), or Partnership Personal Guaranty</div>
    	In consideration of P & E DISTRIBUTORS, INC. AND ITS SUBSIDIARY OPERATIONS, extending credit to (name of company to which credit is extended), the undersigned unconditionally guarantees the payments of and all indebtedness owed to P & E DISTRIBUTORS, INC. AND IT`S SUBSIDIARY OPERATIONS, and the undersigned makes such guarantee and further agrees that if the said P & E DISTRIBUTORS, INC. AND ITS SUBSIDIARY OPERATIONS, expends any monies for the collection of said indebtedness, the undersigned will pay, in addition, all attorney fees and cost of collection of the said indebtedness. I further agree that for any future deliveries of goods or services, I agree to pay all costs of collection, including reasonable attorney fees for the enforcement of any indebtedness against the undersigned. This shall be a continuing obligation of the undersigned, their legal representative, successors and assignees. Undersigned also agrees that any litigation necessary to enforce collection of this debt will be governed under the jurisdictin of the State of Tennessee and jurisdiction shall be specifically vested in the Courts of Davidson County, in Nashville, Tennessee. This obligations shall cover the renewal of any claims guaranteed by this instrument of extensions of time payment thereof, without further notice thereof to the guarantors.

All monthly accounts are due by the 10th of the month following purchase. At the end of the month, any balance not paid will be subject to a 1.5% finance charge. The finance charge is computed by applying 1.5% per month simple interest on all unpaid balances, annual percentage rate, 18%. All blanks on this application must be filled out complete regardless of the type of account you are applying for. Check to make sure that all information you are providing is complete and accurate. Failure to do so will result in delay of setting up your account or non-acceptance of your request for an account. 



	<div class="row" style="width:100%; margin-top:1em">
    	<div class="rcol" style="width:10%; text-align:right"><input type="checkbox" name="guaranty" class="req"/></div>
        <div class="col" style="width:85%; border:0">By checking this box, I/WE agree that I/WE have read and fully understand the aforementioned agreement, and am electronically signing this document </div>    
    </div>
        
</div> <!-- CLOSE CONTAINER TEXT-BOX -->

<!--  START NEW BOX HERE -->

<div class="text-box">
	<div class="titles">Trade Reference #1</div>
    	<div class="left-half-border">
        	<div class="row">
				<div class="col" style="color:#E80000">Name:</div>
    			<div class="rcol"><input type="text" name="trade_reference_1_name" class="req" /></div>
			</div>
            <div class="row">
				<div class="col" style="color:#E80000">City:</div>
    			<div class="rcol"><input type="text" name="trade_reference_1_city" class="req"/></div>
			</div>     
            <div class="row">
				<div class="col" style="color:#E80000">State:</div>
    			<div class="rcol"><select name="trade_reference_1_state">
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
			</div>
            <div class="row">
				<div class="col" style="color:#E80000">Zip:</div>
    			<div class="rcol"><input type="text" name="trade_reference_1_zip" class="req" /></div>
			</div>   
        </div> <!-- CLOSE CONTAINER LEFT-HALF-BORDER -->

    	<div class="left-half-border">
        	<div class="row">
				<div class="col" style="color:#E80000">Account #:</div>
    			<div class="rcol"><input type="text" name="trade_reference_1_acct_no" class="req" /></div>
			</div>
        	<div class="row">
				<div class="col" style="color:#E80000">Phone #:</div>
    			<div class="rcol"><input type="text" name="trade_reference_1_phone" class="req"/></div>
			</div>
        	<div class="row">
				<div class="col" style="color:#E80000">Fax #:</div>
    			<div class="rcol"><input type="text" name="trade_reference_1_fax" class="req" /></div>
			</div>       
        </div> <!-- CLOSE CONTAINER LEFT-HALF-BORDER -->
        
</div> <!-- CLOSE CONTAINER TEXT-BOX -->

<div class="text-box">
	<div class="titles">Trade Reference #2</div>
    	<div class="left-half-border">
        	        	<div class="row">
				<div class="col" style="color:#E80000">Name:</div>
    			<div class="rcol"><input type="text" name="trade_reference_2_name" class="req" /></div>
			</div>
            <div class="row">
				<div class="col" style="color:#E80000">City:</div>
    			<div class="rcol"><input type="text" name="trade_reference_2_city" class="req" /></div>
			</div>     
            <div class="row">
				<div class="col" style="color:#E80000">State:</div>
    			<div class="rcol"><select name="trade_reference_2_state">
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
			</div>
            <div class="row">
				<div class="col" style="color:#E80000">Zip:</div>
    			<div class="rcol"><input type="text" name="trade_reference_2_zip" class="req" /></div>
			</div>   
        </div> <!-- CLOSE CONTAINER LEFT-HALF-BORDER -->

    	<div class="left-half-border">
        	<div class="row">
				<div class="col" style="color:#E80000">Account #:</div>
    			<div class="rcol"><input type="text" name="trade_reference_2_acct_no" class="req"/></div>
			</div>
        	<div class="row">
				<div class="col" style="color:#E80000">Phone #:</div>
    			<div class="rcol"><input type="text" name="trade_reference_2_phone" class="req" /></div>
			</div>
        	<div class="row">
				<div class="col" style="color:#E80000">Fax #:</div>
    			<div class="rcol"><input type="text" name="trade_reference_2_fax" class="req" /></div>
			</div>  
        </div> <!-- CLOSE CONTAINER LEFT-HALF-BORDER -->
        
</div> <!-- CLOSE CONTAINER TEXT-BOX -->

<div class="text-box">
	<div class="titles">Trade Reference #3</div>
    	<div class="left-half-border">
        	<div class="row">
				<div class="col" style="color:#E80000">Name:</div>
    			<div class="rcol"><input type="text" name="trade_reference_3_name" class="req"/></div>
			</div>
            <div class="row">
				<div class="col" style="color:#E80000">City:</div>
    			<div class="rcol"><input type="text" name="trade_reference_3_city" class="req" /></div>
			</div>     
            <div class="row">
				<div class="col" style="color:#E80000">State:</div>
    			<div class="rcol"><select name="trade_reference_3_state">
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
			</div>
            <div class="row">
				<div class="col" style="color:#E80000">Zip:</div>
    			<div class="rcol"><input type="text" name="trade_reference_3_zip" class="req" /></div>
			</div>   
        </div> <!-- CLOSE CONTAINER LEFT-HALF-BORDER -->

    	<div class="left-half-border">
        	<div class="row">
				<div class="col" style="color:#E80000">Account #:</div>
    			<div class="rcol"><input type="text" name="trade_reference_3_acct_no" class="req" /></div>
			</div>
        	<div class="row">
				<div class="col" style="color:#E80000">Phone #:</div>
    			<div class="rcol"><input type="text" name="trade_reference_3_phone" class="req" /></div>
			</div>
        	<div class="row">
				<div class="col" style="color:#E80000">Fax #:</div>
    			<div class="rcol"><input type="text" name="trade_reference_3_fax" class="req" /></div>
			</div>       
        </div> <!-- CLOSE CONTAINER LEFT-HALF-BORDER -->
        
</div> <!-- CLOSE CONTAINER TEXT-BOX -->


<div class="left-half-border" style="text-align:center; width:730px">
<input type="image" src="images/buttons/submit.png" border="0" alt="Submit Form"/>

</div>

</div> 






<!-- END OF #MAIN --></div>

<?php
}
?>