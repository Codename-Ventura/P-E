<form name="credit" method="post"> 
<div style="text-align:center; width:100%;font-size:24px;">General Information</div>
<div style="text-align:center; padding:.5em;"><p>Terms Requested (select one): </p>
    <select name="terms">
    <option value="C.O.D.">C.O.D.</option><br>
	<option value="C.O.D. Company Check">C.O.D. Company Check</option>
    <option value="Monthly (Net 10)">Monthly (Net 10)</option>
    <option value="Credit Card">Credit Card*</option>
    </select>
</div>
<div style="text-align:center; font-size:9px"><p>*there is a 3% convenience fee for credit cards </p>
</div>
<div style="text-align:center; padding:.5em; margin-top:1em;"><p>Referred By: </p>
    <input type="text" name="salesman" />
</div>
<div style="text-align:center; font-size:9px; margin:0; padding:0;"><p>Salesman Name</p></div>
<div style="text-align:center; padding:.5em; margin-top:1em;"><p>State Tax ID: </p>
    <input type="text" name="taxid" />
</div>


	<div style="text-align:left; border-bottom:0; clear:both; width:100%; background:#FFFFCC; margin:.5EM"><input type="checkbox" align="top" onClick="ShowHide('mailaddy')" name="noship"/>My mailing address is the same as my shipping address.</div>

		<div style="width:49%; float:left;">
			<fieldset id="general">
			<div class="row"><p>Business Name:</p><input type="text" name="bus_name" /></div>

			<div class="row"><p>Phone:</p><input type="text" name="bus_phone" /></div>

			<div class="row"><p>Fax:</p><input type="text" name="bus_fax" /></div>

			<div class="row"><p>Shipping Address:</p><input type="text" name="bus_shipaddy" /></div>

			<div class="row"><p>City:</p><input type="text" name="bus_city" /></div>

			<div class="row"><p>State (2 letter abbreviation):</p><input type="text" size="2" maxlength="2" name="bus_state" /></div>

			<div class="row"><p>Zipcode:</p><input type="text" name="bus_zip" /></div>

			<div class="row"><p>Type of Business</p>
					<select style="text-align:center" name="bus_type">
					<option value="Propietorship">Proprietorship</option>
					<option value="Partnership">Partnership</option>
					<option value="Corporation">Corporation</option>
					</select>
				</div>

		</div>
<!-- END OF GENERAL (LEFT) -->

<div style="width:47%; float:right">

	<div id="mailaddy" class="show">
		<div class="row"><p>Mailing Address:</p><input type="text" name="bus_mailaddy" /></div>

		<div class="row"><p>City</p><input type="text" name="bus_mailcity" /></div>

		<div class="row"><p>State (2 letter abbreviation):</p><input type="text" name="bus_mailstate" /></div>

		<div class="row"><p>Zipcode:</p><input type="text" name="bus_mailzip" /></div>

	</div>


	<div class="row"><p>Email Address:</p><input type="text" name="email1" /></div>

	<div class="row"><p>Name of Buyer:</p><input type="text" name="buyername" /></div>

	<div class="row"><p>Website (if applicable):</p><input type="text" name="weburl" /></div>

	<div class="row">Is a P.O. required?
        <select style="text-align:center; width:16em;" name="po_req">
			<option>Yes</option>
			<option>No</option>
		</select></div>
    </fieldset>
</div>

<!--  END OF GENERAL (RIGHT) -->

<div style="text-align:center; padding-top:1em; font-size:24px; clear:both;">Financial Information</div>


<div style="width:49%; float:left;">
<fieldset id="financial">
	<div class="row"><p>Real Estate Property Owned (value):</p>$<input type="text" name="prop" /></div>

	<div class="row"><p>Mortgage Amount:</p>$<input type="text" name="mort_val" /></div>

	<div class="row"><p>Mortgagee:</p><input type="text" name="mortgagee" /></div>

	<div class="row"><p>Approx Monthly Sales Volume:</p>$<input type="text" name="sales_vol" /></div>
    <div class="row"><p>Years in Business:</p><input type="text" name="bus_years" /></div>

</div>

<!-- END OF FINANCIAL (LEFT) -->

<div style="width:49%; float:right;">

	<div class="row"><p>Bank Name:</p><input type="text" name="bank" /></div>

	<div class="row"><p>Bank Contact:</p><input type="text" name="bank_contact" /></div>

	<div class="row"><p>Bank Phone #:</p><input type="text" name="bank_phone" /></div>

	<div class="row">
		<div class="leftcol"><p>Bank Fax #:</p></div>
        <div class="rightcol"><input type="text" name="bank_fax" /></div>
	</div>


</fieldset>
</div>

<!-- END OF FINANCIAL (RIGHT) -->

<div style="text-align:center; padding-top:1em; padding-bottom: 1em; font-size:24px; clear:both;">Personal Data of Owner
</div>


<div style="width:49%; float:left;">
<fieldset id="personal">

	<div class="row"><p>Owner/Pres Name:</p><input type="text" name="pres_name" /></div>
    <div class="row"><p>Home Phone:</p><input type="text" name="pres_phone" /></div>

	<div class="row"><p>Home Address</p><input type="text" name="pres_addy" /></div>







</div>

<!-- END OF OWNER (LEFT) -->

<div style="width:49%; float:right;">

	<div class="row"><p>City:</p><input type="text" name="pres_city" /></div>

	<div class="row">
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
         <div class="row"><p>Zipcode:</p>  <input type="text" name="pres_zip" /></div>




</div>

<!-- END OF OWNER (RIGHT) -->
<a name="part"></a>
<div id="partner" class="hide">

	<div style="text-align:center; font-size:24px; clear:both; padding-top:1em">Personal Data of Partner</div>
    <div style="width:49%; float:left;">


		<div class="row"><p>Partner Name:</p><input type="text" name="part_name" /></div>
        <div class="row"><p>Home Phone:</p><input type="text" name="part_phone" /></div>

		<div class="row"><p>Home Address</p><input type="text" name="part_addy" /></div>

		



	</div>
    <!-- END OF PARTNER (LEFT) -->

	<div style="width:49%; float:right;">

<div class="row"><p>City:</p><input type="text" name="part_city" /></div>

		<div class="row"><p>State:</p>  
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
        <div class="row"><p>Zipcode:</p>  <input type="text" name="part_zip"/></div>



	</div>
    <!-- END OF PARTNER (RIGHT)-->

</fieldset>
</div>
<!-- END OF PARTNER HIDDEN BOX -->

<div style="text-align:left; border-bottom:0; clear:both; width:100%; background:#FFFFCC; margin:.5EM"><input type="checkbox" name="partnerbox" value="partner" onClick="ShowHide('partner')" /><label for="partner">I have a partner</label></div>


<!-- BEGIN TERMS OF SVC -->
<div style="float:left; text-align:left">
<div style="text-align:center; padding-top:1em; font-size:24px; clear:both;">Terms of Service</div>
<fieldset id="agreement">
		<p style="padding:2em">
        The undersigned does hereby make application for a credit account to Performance and Electronics Distributors, Inc. and by doing so authorizes Performance and Electronics Distributors, Inc., in connection with the establishment and maintenance of this account, to investigate our credit worthiness and capacity. The undersigned warrants the foregoing answers are true and accurate in every respect. I affirm our firm is financially able to meet any commitments we have made and will pay your invoices according to your terms. In addition, it is mutually agreed and understood that this account is subject to a finance charge (the maximum percentage rate allowed by law), which may be imposed on any invoice or invoices not paid within terms. The undersigned agrees to pay all costs and expenses incident to the collection of past due invoices and unpaid remainders, including court costs and reasonable attorney fees. I have thoroughly read and do understand this credit agreement and by evidence of my signature, agree to said terms.
        </p>
        <div style="background:#FFFFCC; padding:1em;"><input type="checkbox" name="tos_agree" />By clicking this box, I agree that I am electronically signing this document, and give the above Bank and Trade References the authority to release credit information to P & E Distributors, Inc. I understand that by signing this application, I am authorizing P & E Distributors, Inc. to obtain a credit report on my personal data from one or more credit reporting agencies.  All information provided is true and correct to the best of my knowledge.</div>
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
        <div style="background:#FFFFCC; padding:1em;"><input type="checkbox" name="guaranty" />By checking this box, I/WE agree that I/WE have read and fully understand the aforementioned agreement, and am electronically signing this document  
</div>
</fieldset>
</div>
<!-- END GUARANTY -->
<div style="text-align:center; padding-top:1em; font-size:24px; clear:both;">Trade References #1</div>
<fieldset id="trade_ref">
    <div style="width:49%; float:left;">


		<div class="row"><p>Name:</p><input type="text" name="trade1_name" /></div>

		<div class="row"><p>City</p><input type="text" name="trade1_city" /></div>

		<div class="row"><p>State:</p>  
		<select name="t_st1">
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
        <div class="row"><p>Zipcode:</p>  <input type="text" name="trade1_zip" /></div>

	</div>
    <!-- END OF TRADE REF (LEFT) -->

	<div style="width:49%; float:right;">

		<div class="row"><p>Account #:</p><input type="text" name="trade1_acct" /></div>

		<div class="row"><p>Phone #</p><input type="text" name="trade1_phone"/></div>

		<div class="row"><p>Fax #:</p><input type="text" name="trade1_fax"/></div>


	</div>
    <!-- END OF TRADE REF (RIGHT) -->
    <div style="text-align:center; padding-top:1em; font-size:24px; clear:both;">Trade References #2</div>
    <div style="width:49%; float:left;">


		<div class="row"><p>Name:</p><input type="text" name="trade2_name" /></div>

		<div class="row"><p>City</p><input type="text" name="trade2_city" /></div>

		<div class="row"><p>State:</p>
		<select name="t_st2">
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
		</select> 			</div>
            <div class="row"><p>Zipcode:</p>  <input type="text" name="trade2_zip" /></div>

	</div>
    <!-- END OF TRADE REF (LEFT) -->

	<div style="width:49%; float:right;">

		<div class="row"><p>Account #:</p><input type="text" name="trade2_acct" /></div>

		<div class="row"><p>Phone #</p><input type="text" name="trade2_phone" /></div>

		<div class="row"><p>Fax #:</p><input type="text" name="trade2_fax" /></div>


	</div>
    <!-- END OF TRADE REF (RIGHT) -->
    <div style="text-align:center; padding-top:1em; font-size:24px; clear:both;">Trade References #3</div>
    <div style="width:49%; float:left;">


		<div class="row"><p>Name:</p><input type="text" name="trade3_name" /></div>

		<div class="row"><p>City</p><input type="text" name="trade3_city" /></div>

		<div class="row"><p>State:</p>
		<select name="t_st3">
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
		</select>
 			</div>
            <div class="row"><p>Zipcode:</p>  <input type="text" name="trade3_zip" /></div>

	</div>
    <!-- END OF TRADE REF (LEFT) -->

	<div style="width:49%; float:right;">

		<div class="row"><p>Account #:</p><input type="text" name="trade3_acct" /></div>

		<div class="row"><p>Phone #</p><input type="text" name="trade3_phone" /></div>
        
		<div class="row"><p>Fax #:</p><input type="text" name="trade3_fax" /></div>


	</div>
    <!-- END OF TRADE REF (RIGHT) -->
</fieldset>

</fieldset>
<center><input type=submit name="sub" value="Register Now!""></center>



</div>
</form> 