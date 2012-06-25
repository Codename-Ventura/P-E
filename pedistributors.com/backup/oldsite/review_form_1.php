
<?php
$busname = stripslashes($_REQUEST['bus_name']);
$bus_phone = stripslashes($bus_phone);
$bus_fax = stripslashes($bus_fax);
$bus_shipaddy = stripslashes($bus_addy);
$bus_city = stripslashes($bus_city);
$bus_state = stripslashes($bus_state);
$bus_zip = stripslashes($bus_zip);
$bus_type = stripslashes($bus_type);
$email1 = stripslashes($email1);
$buyername = stripslashes($buyername);




 
include('addcredit.php');
$name = "jjames@pedistributors.com";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: newonlineuser.pedistributors.com <noreply@pedistributors.com>\n";
$headers .= "X-Mailer: PHP's mail() Function\n";
$subj = "P&E Credit Application";

$message = "
<table width=\"100%\" border=\"3\" align=\"center\" bordercolor=\"#CCCCCC\" bordercolordark=\"#CCCCCC\" bordercolorlight=\"#CCCCCC\">
<tr><td>
<table width=\"75%\" align=\"center\">
  <tr bgcolor=\"#F4F4F4\">
    <td colspan=\"2\" bgcolor=\"#F4F4F4\"><div align=\"center\" class=\"style2\">
      <div align=\"center\"><img src=\"http://www.pedistributors.com/images/app_logo.jpg\" /><br />General Information</div>
    </div></td>
  </tr>
  <tr>
    <td width=\"39%\" bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Type of Account Requested:</div>
    </div></td>
    <td width=\"61%\" bgcolor=\"#FFFFCC\"><span class=\"style1\">$terms</span></td>
  </tr>
    <tr>
    <td width=\"39%\" bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Referred By:</div>
    </div></td>
    <td width=\"61%\" bgcolor=\"#FFFFCC\"><span class=\"style1\">$salesman</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Business Name:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$busname</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Buyer Name:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$buyername</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Phone Number:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$bus_phone</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Fax Number:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$bus_fax</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Website:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$website</span></td>
  </tr> 
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Email:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$email1</span></td>
  </tr>  
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Business Type:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$bus_type</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Shipping Address:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$bus_shipaddy</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">City:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$bus_city</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">State:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$bus_state</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Zip Code:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$bus_zip</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Mailing Address:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$bus_mailaddy</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">City:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$bus_mailcity</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">State:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$bus_mailstate</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Zip Code:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$bus_mailzip</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Is a P.O. Required?</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$po</span></td>
  </tr>
  <tr bgcolor=\"#F4F4F4\">
    <td colspan=\"2\"><div align=\"center\" class=\"style2\">
      <div align=\"center\">Financial Information</div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Real Estate Property Value:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$property</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Mortgage Amount:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$mort_val</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Mortgagee:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$mortgagee</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Sales Volume:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$sales_vol</span></td>
  </tr>
  <tr bgcolor=\"#F4F4F4\">
    <td colspan=\"2\"><div align=\"center\" class=\"style2\">
      <div align=\"center\">Personal Info of Owner</div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Name:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$pres_name</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Address:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$pres_addy</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">City:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$pres_city</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">State:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$pres_state</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Zip Code:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$pres_zip</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Bank Name:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$pres_bank</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Bank Contact:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$pres_bank_contact</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Bank Phone #:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$pres_bank_phone</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Bank Fax #:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$pres_bank_fax</span></td>
  </tr>
  <tr bgcolor=\"#F4F4F4\">
    <td colspan=\"2\"><div align=\"center\" class=\"style2\">
      <div align=\"center\">Personal Data of Partner</div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Name:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$part_name</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Address:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$part_addy</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">City:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$part_city</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">State:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$part_state</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Zip Code:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$part_zip</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Bank Name:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$part_bank</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Bank Contact:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$part_bank_contact</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Bank Phone #:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$part_bank_phone</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Bank Fax #:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$part_bank_fax</span></td>
  </tr>
  <tr>
    <td colspan=\"2\" bgcolor=\"#F4F4F4\"><div align=\"center\" class=\"style2\">
      <div align=\"center\">Trade Reference #1</div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Name:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade1_name</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Account Number:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade1_acct</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Phone Number:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade1_phone</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">City:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade1_city</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">State:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade1_state</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Zip Code:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade1_zip</span></td>
  </tr>
  <tr>
    <td colspan=\"2\" bgcolor=\"#F4F4F4\"><div align=\"center\" class=\"style2\">
      <div align=\"center\">Trade Reference #2</div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Name:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade2_name</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Account Number:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade2_acct</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Phone Number:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade2_phone</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">City:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade2_city</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">State:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade2_state</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Zip Code:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade2_zip</span></td>
  </tr>
  <tr>
    <td colspan=\"2\" bgcolor=\"#F4F4F4\"><div align=\"center\" class=\"style2\">
      <div align=\"center\">Trade Reference #3</div>
    </div></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Name:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade3_name</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Account Number:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade3_acct</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Phone Number:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade3_phone</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">City:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade3_city</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">State:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade3_state</span></td>
  </tr>
  <tr>
    <td bgcolor=\"#FFFFCC\"><div align=\"right\" class=\"style1\">
      <div align=\"left\">Zip Code:</div>
    </div></td>
    <td bgcolor=\"#FFFFCC\"><span class=\"style1\">$trade3_zip</span></td>
  </tr>
</table>
</td></tr>
</table>";

mail($name,$subj,$message,$headers);
?>
<font color="#005ca3" size="+2">Thank You</font><br />
Your form was submitted to P&E Distributors.  A salesman will contact you as soon as your account information has been verified.  Please give us at least 24 hours to set up your account.  Thank you for choosing P&E Distributors<br />
Click <A href="http://www.pedistributors.com">here</A> to return to the home page.












