
<?php





 
include('addcredit.php');
$name = "m.harris@pedistributors.com";
$name2 = "jjames@pedistributors.com";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: Credit Dept. <jonathan@home.pedistributors.com>\n";
$subj = "P&E Credit Application";

$message = "
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"612px\">
  <tr bgcolor=\"#f4f4f4\">
    <td rowspan=\"3\" align=\"center\"><p><img src=\"http://www.pedistributors.com/images/app_logo.jpg\" alt=\"\" width=\"255px\"/></p>
    <p style=\"text-align:left;\">Date: $today<br />
      <strong>Terms Requested:</strong> $terms<br />
    <strong>Referred By:</strong> $salesman<br />
	<strong>Tax ID#:</strong> $taxid</p></td>
    <td><div align=\"center\"><p style=\"font:Verdana, Arial, Helvetica, sans-serif; font-size:10px; margin:0; padding:0\"><strong>Goodlettsville, TN</strong><br />
    (800) 251-2034<br />
    Local: (615) 851-8060<br />
    Fax: (615) 851-4053</p>
    </div></td>
  </tr>
  <tr bgcolor=\"#f4f4f4\">
    <td><div align=\"center\"><p style=\"font:Verdana, Arial, Helvetica, sans-serif; font-size:10px; margin:0; padding:0\"><strong>Chattanooga, TN</strong><br />
      (800) 243-6251<br />
      Local: (423) 499-2941<br />
      Fax: (423) 499-2945</p>
    </div></td>
  </tr>
  <tr bgcolor=\"#f4f4f4\">
    <td><div align=\"center\"><p style=\"font:Verdana, Arial, Helvetica, sans-serif; font-size:10px; margin:0; padding:0\"><strong>Marietta, GA</strong><br />
      (800) 882-3035<br />
      Local: (770) 427-3802<br />
      Fax: (770) 427-3810</p>
    </div></td>
  </tr>
  <br>
  <tr>
    <td colspan=\"2\" valign=\"middle\" bgcolor=\"#FFFFCC\" style=\"font:Verdana, Arial, Helvetica, sans-serif; font-size:16px; padding:1em;\"><div align=\"center\">
      <p><strong>General Information</strong></p>
      </div></td>
  </tr>
  <tr>
    <td height=\"37\"><span><strong>Firm Name:</strong> $busname</span></td>
    <td><span><strong>Phone Number:</strong> $bus_phone</span></td>
  </tr>
  <tr>
    <td><strong>Fax:</strong> $bus_fax</td>
    <td><strong>Email Address: </strong>$email1</td>
  </tr>
  <tr>
    <td><strong>Street Address:</strong> $bus_shipaddy</td>
    <td><strong>City:</strong> $bus_city State:   $bus_state Zip: $bus_zip</td>
  </tr>
  <tr>
    <td><strong>Mailing Address:</strong> $bus_mailaddy</td>
    <td><strong>City:</strong> $bus_mailcity <strong>State:</strong> $bus_mailstate <strong>Zip:</strong>   $bus_mailzip</td>
  </tr>
  <tr>
    <td><strong>Business Type:</strong> $bus_type</td>
    <td><strong>Mortgage Amount:</strong> $mort_val</td>
  </tr>
  <tr>
    <td><strong>Real Estate Owned</strong> (<em>Value</em>): $property</td>
    <td><strong>Approx Monthly Sales Volume:</strong>   $sales_vol</td>
  </tr>
  <tr>
  	<td><strong>Years in Business:</strong>  $bus_years</td>
	<td><strong>P.O. (Purchase Order) Required?:</strong> $po</td>
  <tr>
    <td><strong>Buyer:</strong> $buyername</td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan=\"2\" bgcolor=\"#FFFFCC\" style=\"font:Verdana, Arial, Helvetica, sans-serif; font-size:16px; padding:1em;\"><div align=\"center\">
      <p><strong>Bank Reference</strong></p>
      </div></td>
  </tr>
  <tr>
    <td><strong>Bank Name:</strong> $bank_name</td>
    <td><strong>Bank Contact:</strong> $bank_contact</td>
  </tr>
  <tr>
    <td><strong>Bank Phone:</strong> $bank_phone</td>
    <td><strong>Bank Fax:</strong> $bank_fax</td>
  </tr>
  <tr>
    <td colspan=\"2\">
	<br>
    <p align=\"center\"><strong>Account #:</strong>__________________________________________________</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan=\"2\" bgcolor=\"#FFFFCC\" style=\"font:Verdana, Arial, Helvetica, sans-serif; font-size:16px; padding:1em;\"><div align=\"center\">
      <p><strong>Personal Data of Owner/Partner</strong></p>
      </div></td>
  </tr>
  <tr>
    <td><strong>Owner/Pres:</strong> $pres_name</td>
    <td><strong>Partner Name:</strong> $part_name</td>
  </tr>
  <tr>
    <td><strong>Address:</strong> $pres_addy</td>
    <td><strong>Address:</strong> $part_addy</td>
  </tr>
  <tr>
    <td><strong>City, State, Zip:</strong> $pres_city, $pres_state, $pres_zip</td>
    <td><strong>City, State, Zip:</strong> $part_city, $part_state, $part_zip</td>
  </tr>
  <tr>
    <td><strong>Phone:</strong> $pres_phone</td>
    <td><strong>Phone:</strong> $part_phone</td>
  </tr>
  <tr>
    <td>
      <strong>Social Security #:</strong>_______________________</td>
    <td>
      <strong>Social Security #:</strong>______________________ </td>
  </tr>
  <br /><br /><br />
  <tr>
    <td colspan=\"2\" bgcolor=\"#FFFFCC\" style=\"font:Verdana, Arial, Helvetica, sans-serif; font-size:16px; padding:1em;\"><div align=\"center\">
	
      <p><strong>Terms of Service</strong></p>
      </div></td>
  </tr>
  <tr>
    <td colspan=\"2\" style=\"font-size:10px\">“The undersigned does hereby make  application for a credit account to Performance and Electronics Distributors,  Inc. and by doing so authorizes Performance and Electronics Distributors, Inc.,  in connection with the establishment and maintenance of this account, to  investigate our credit worthiness and capacity. The undersigned warrants the  foregoing answers are true and accurate in every respect. I affirm our firm is  financially able to meet any commitments we have made and will pay your  invoices according to your terms. <span &_
vbNewLine &
></span>In addition, it is mutually agreed and  understood that this account is subject to a finance charge (the maximum percentage  rate allowed by law), which may be imposed on any invoice or invoices not paid  within terms. The undersigned agrees to pay all costs and expenses incident to  the collection of past due invoices and unpaid remainders, including court  costs and reasonable attorney fees.  I have read and do understand this credit agreement and by evidence of my signature, agree to said terms.<br /><hr />
[X] I agree that I am electronically signing this document, and give the above Bank and Trade References the authority to release credit information to P & E Distributors, Inc. I understand that by signing this application, I am authorizing P & E Distributors, Inc. to obtain a credit report on my personal data from one or more credit reporting agencies.  All information provided is true and correct to the best of my knowledge.</td>

  </tr>

  <tr>
    <td><div align=\"center\">

      
      <p>___________________________________<br />
        Additional Signatures</p>
      
    </div></td>
    <td><div align=\"center\">
      
      <p>___________________________________<br />
Additional Signatures</p>
      
    </div></td>
  </tr>
  <tr>
    <td colspan=\"2\" bgcolor=\"#FFFFCC\" style=\"font:Verdana, Arial, Helvetica, sans-serif; font-size:16px; padding:1em;\"><p align=\"center\"><strong>Individual, Limited Liability Corporation (LLC), or  Partnership Personal Guaranty</strong></p>
    </td>
  </tr>
  <tr>
    <td colspan=\"2\" style=\"font-size:10px\">In consideration of P &amp; E  DISTRIBUTORS, INC. AND ITS SUBSIDIARY OPERATIONS, extending credit to (name of  company to which credit is extended), the undersigned unconditionally  guarantees the payments of and all indebtedness owed to P &amp; E DISTRIBUTORS,  INC. AND IT’S SUBSIDIARY OPERATIONS, and the undersigned makes such guarantee  and further agrees that if the said P &amp; E DISTRIBUTORS, INC. AND ITS  SUBSIDIARY OPERATIONS, expends any monies for the collection of said  indebtedness, the undersigned will pay, in addition, all attorney fees and cost  of collection of the said indebtedness. I further agree that for any future  deliveries of goods or services, I agree to pay all costs of collection,  including reasonable attorney fees for the enforcement of any indebtedness  against the undersigned. This shall be a continuing obligation of the  undersigned, their legal representative, successors and assignees. Undersigned also agrees that any litigation necessary to enforce collection of this debt  will be governed under the jurisdiction of the State of Tennessee and  jurisdiction shall be specifically vested in the Courts of Davidson County, in  Nashville, Tennessee. This obligations shall cover the renewal of any claims  guaranteed by this instrument of extensions of time payment thereof, without  further notice thereof to the guarantors.<br /><hr />
[X] I/WE agree that I/WE have read and fully understand the aforementioned agreement, and am electronically signing this document </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align=\"center\">
      
      <p>_____________________________________<br />
        Additional Signature</p>
    </div></td>
    <td><div align=\"center\">
      
      <p>_____________________________________<br /> 
        Witness
</p>
    </div></td>
  </tr>
  <tr>
    <td><div align=\"center\">
      <p>&nbsp;</p>
      <p>Address: ___________________________</p>
    </div></td>
    <td><div align=\"center\">
      <p>&nbsp;</p>
      <p>City, State, Zip:________________________</p>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align=\"center\">
      
      <p>_____________________________________<br />
Additional Signature</p>
    </div></td>
    <td><div align=\"center\">
      
      <p>_____________________________________<br /> 
        Witness
</p>
    </div></td>
  </tr>
  <tr>
    <td><div align=\"center\">
      <p>&nbsp;</p>
      <p>Address: ___________________________</p>
    </div></td>
    <td><div align=\"center\">
      <p>&nbsp;</p>
      <p>City, State, Zip:________________________</p>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan=\"2\" style=\"font-size:10px\">All monthly accounts are due by the 10th of the month  following purchase. At the end of the month, any balance not paid will be  subject to a 1.5% finance charge. The finance charge is computed by applying  1.5% per month simple interest on all unpaid balances, annual percentage rate,  18%. All blanks on this application must be filled out complete regardless of  the type of account you are applying for. Check to make sure that all  information you are providing is complete and accurate. Failure to do so will  result in delay of setting up your account or non-acceptance of your request  for an account.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan=\"2\" bgcolor=\"#FFFFCC\" style=\"font:Verdana, Arial, Helvetica, sans-serif; font-size:16px; padding:1em;\"><div align=\"center\">
      <p><strong>Trade References</strong></p>
      </div></td>
  </tr>
  <tr>
    <td><strong>Name:</strong> $trade1_name</td>
    <td><strong>Account#:</strong> $trade1_acct <strong>Phone#:</strong> $trade1_phone</td>
  </tr>
  <tr>
    <td><strong>City, State, Zip:</strong> $trade1_city, $trade1_state, $trade1_zip</td>
    <td><strong>Fax#:</strong> $trade1_fax</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Name:<strong> $trade2_name</td>
    <td><strong>Account#:<strong> $trade2_acct Phone#: $trade2_phone</td>
  </tr>
  <tr>
    <td><strong>City, State, Zip:</strong> $trade2_city, $trade2_state, $trade2_zip</td>
    <td><strong>Fax#:</strong> $trade2_fax</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Name:</strong> $trade3_name</td>
    <td><strong>Account#:</strong> $trade3_acct Phone#: $trade3_phone</td>
  </tr>
  <tr>
    <td><strong>City, State, Zip:</strong> $trade3_city, $trade3_state, $trade3_zip</td>
    <td><strong>Fax#:</strong> $trade3_fax</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>";

mail($name,$subj,$message,$headers);
mail($name2,$subj,$message,$headers);
?>
<font color="#005ca3" size="+2">Thank You</font><br />
Your form was submitted to P&E Distributors.  A salesman will contact you as soon as your account information has been verified.  Please give us at least 24 hours to set up your account.  Thank you for choosing P&E Distributors<br />
Click <A href="http://www.pedistributors.com">here</A> to return to the home page.
<br />













