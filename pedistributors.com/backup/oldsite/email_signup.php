<?php

if(isset($_POST['signup'])){
	//include('https://app.icontact.com/icp/signup.php');
$to1      = 'jjames@pedistributors.com';
$to2 = 'm.harris@pedistributors.com';
$subject = 'Online Ordering Request Received';
if(isset($_POST['eblast'])){
	$eblast = "Yes";}
else{
	$eblast = "No";
}
if(!empty($_POST['address2'])){
	$address = $_POST['address']." ".$_POST['address2'];
	}
else{
	$address = $_POST['address'];
}

if(!empty($_POST['alt_phone'])){
	$phone = $_POST['phone']."
	 
Alternate Phone Number: ".$_POST['alt_phone'];
	}
else{
	$phone = $_POST['phone'];
}

if(!empty($_POST['fax'])){
	$phone = $phone."
	
Fax Number:".$_POST['fax'];
}

$message = "
Company Name: ".$_POST['comp_name']."

Customer Number: ".$_POST['cust_number']."

Password Request: ".$_POST['password']."

First Name: ".$_POST['first_name']."

Last Name: ".$_POST['last_name']."

Job Title: ".$_POST['jobtitle']."

Phone Number: ".$phone."

Address: ".$address."

City: ".$_POST['city']."

State: ".$_POST['state']."

Zip Code: ".$_POST['zip']."

Email Address: ".$_POST['fields_email']."

";

if(!empty($_POST['website'])){
	$message = $message."Website Address: ".$_POST['website'];
}

$headers = 'From: Online Ordering Signup' . "\r\n" .
    'Reply-To: jjames@pedistributors.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to1, $subject, $message, $headers);
mail($to2, $subject, $message, $headers);
include('includes/vagoo3.php');
mysql_query("INSERT INTO `online_ordering` (`comp_name`,`cust_num`,`first_name`,`last_name`,`title`,`phone`,`alt_phone`,`fax`,`address`,`address2`,`city`,`state`,`zip`,`email`,`website`,`eblast`) VALUES ('$_POST[comp_name]','$_POST[cust_number]','$_POST[first_name]','$_POST[last_name]','$_POST[jobtitle]','$_POST[phone]','$_POST[alt_phone]','$_POST[fax]','$_POST[address]','$_POST[address2]','$_POST[city]','$_POST[state]','$_POST[zip]','$_POST[fields_email]','$_POST[website]','$eblast')");
	
	
//include('https://app.icontact.com/icp/signup.php');
header("Location: http://www.pedistributors.com/thanks.php");

}
	
	
	


?>

<style>
.link,
.signupframe {
	color: #226699;
	font-family: Arial, Helvetica, sans-serif;
	}
	.link {
		text-decoration: none;
		}
	.signupframe {
		border: 1px solid #000000;
		background: #ffffff;
		}
	
tr {
	width:50%;
	}
</style>
<form method=post name="icpsignup" id="icpsignup4643" accept-charset="UTF-8" onsubmit="return verifyRequired4643();" >
<input type=hidden name=redirect value="http://www.icontact.com/www/signup/thanks.html" />
<input type=hidden name=errorredirect value="http://www.icontact.com/www/signup/error.html" />

<div id="SignUp">
<table width="100%" class="signupframe" border="0" cellspacing="0" cellpadding="5">
<tr><td colspan="2" style="font-size:10px">Sign up for our ordering below.  All you need is a valid email and P&E Distributors customer number.  If you do not have a P&E customer number, please <a href="javascript:window.close()">click here</a> to close this window and fill out a P&E credit application online.<br />
All fields marked with a <span style="color:#FF0000; font-size:12px">*</span> are required</td></tr>
	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"><span style="color:#FF0000; font-size:12px">*</span></font> <font size="2">Email</font>
      </td>
      <td align=left>
        <input type=text name="fields_email">
      </td>
    </tr>
    
   	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"><span style="color:#FF0000; font-size:12px">*</span></font> <font size="2">Customer Number:</font>
      </td>
      <td align=left>
        <input type=text name="cust_number">
      </td>
    </tr>
   	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"><span style="color:#FF0000; font-size:12px">*</span></font> <font size="2">Choose a Password:</font>
      </td>
      <td align=left>
        <input type=text name="password">
      </td>
    </tr>
   	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"><span style="color:#FF0000; font-size:12px">*</span></font> <font size="2">Company Name:</font>
      </td>
      <td align=left>
        <input type=text name="comp_name">
      </td>
    </tr>
   	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"><span style="color:#FF0000; font-size:12px">*</span></font> <font size="2">First Name:</font>
      </td>
      <td align=left>
        <input type=text name="first_name">
      </td>
    </tr>
   	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"><span style="color:#FF0000; font-size:12px">*</span></font> <font size="2">Last Name:</font>
      </td>
      <td align=left>
        <input type=text name="last_name">
      </td>
    </tr>
   	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"><span style="color:#FF0000; font-size:12px">*</span></font> <font size="2">Job Title:</font>
      </td>
      <td align=left>
        <input type=text name="jobtitle">
      </td>
    </tr>
   	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"><span style="color:#FF0000; font-size:12px">*</span></font> <font size="2">Address:</font>
      </td>
      <td align=left>
        <input type=text name="address">
      </td>
    </tr>
   	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"></font> <font size="2">Address (line 2):</font>
      </td>
      <td align=left>
        <input type=text name="address2">
      </td>
    </tr>
   	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"><span style="color:#FF0000; font-size:12px">*</span></font> <font size="2">City:</font>
      </td>
      <td align=left>
        <input type=text name="city">
      </td>
    </tr>
   	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"><span style="color:#FF0000; font-size:12px">*</span></font> <font size="2">State:</font>
      </td>
      <td align=left>
        <select name="state"> 
<option value="" selected="selected">Select a State</option> 
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

      </td>
    </tr>
   	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"><span style="color:#FF0000; font-size:12px">*</span></font> <font size="2">Zipcode:</font>
      </td>
      <td align=left>
        <input type=text name="zip">
      </td>
    </tr>
   	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"><span style="color:#FF0000; font-size:12px">*</span></font> <font size="2">Phone Number:</font>
      </td>
      <td align=left>
        <input type=text name="phone">
      </td>
    </tr>
   	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"></font> <font size="2">Alternate Phone Number:</font>
      </td>
      <td align=left>
        <input type=text name="alt_phone">
      </td>
    </tr>
   	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"></font> <font size="2">Fax Number:</font>
      </td>
      <td align=left>
        <input type=text name="fax">
      </td>
    </tr>
   	<tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"></font> <font size="2">Website Address:</font>
      </td>
      <td align=left>
        <input type=text name="website">
      </td>
    </tr>

    <tr>
      <td valign=top align=right>
        <font size="1" face="Arial,Helvetica, sans-serif"></font> <font size="1">Yes, I would like to receive the P&E Weekly Newsletter filled with the current weeks deals and specials:</font>
      </td>
      <td align=left>
        <input type=checkbox name="eblast" value="true">
      </td>
    <input type=hidden name="listid" value="64004">
    <input type=hidden name="specialid:64004" value="0SSQ">

    <input type=hidden name=clientid value="454027">
    <input type=hidden name=formid value="4643">
    <input type=hidden name=reallistid value="1">
    <input type=hidden name=doubleopt value="0">
    <input type="hidden" name="signup" value="submit"/>
    <TR>
      <TD> </TD>
      <TD><font size="1"><span style="color:#FF0000; font-size:12px">*</span></font><font size="2"> = Required Field</FONT></TD>
    </TR>
    <tr>
      <td> </td>
      <td><input type="submit" name="Submit" value="Submit"></td>
    </tr>
    </table>
</div>
</form>
<script type="text/javascript">

var icpForm4643 = document.getElementById('icpsignup4643');

if (document.location.protocol === "https:")

	icpForm4643.action = "https://app.icontact.com/icp/signup.php";
function verifyRequired4643() {
  if (icpForm4643["fields_email"].value == "") {
    icpForm4643["fields_email"].focus();
    alert("The Email field is required.");
    return false;
  }
if (icpForm4643["cust_number"].value == "") {
    icpForm4643["cust_number"].focus();
    alert("Customer Number is required.");
    return false;
  }
if (icpForm4643["password"].value == "") {
    icpForm4643["password"].focus();
    alert("Please enter your desired password.");
    return false;
  }
if (icpForm4643["comp_name"].value == "") {
    icpForm4643["comp_name"].focus();
    alert("Company Name is required.");
    return false;
  }
if (icpForm4643["first_name"].value == "") {
    icpForm4643["first_name"].focus();
    alert("First Name is required.");
    return false;
  }
if (icpForm4643["last_name"].value == "") {
    icpForm4643["last_name"].focus();
    alert("Last Name is required.");
    return false;
  }
if (icpForm4643["jobtitle"].value == "") {
    icpForm4643["jobtitle"].focus();
    alert("Job Title is required.");
    return false;
  }
if (icpForm4643["address"].value == "") {
    icpForm4643["address"].focus();
    alert("Address is required.");
    return false;
  }
if (icpForm4643["city"].value == "") {
    icpForm4643["city"].focus();
    alert("City is required.");
    return false;
  }
if (icpForm4643["state"].value == "") {
    icpForm4643["state"].focus();
    alert("State is required.");
    return false;
  }
if (icpForm4643["zip"].value == "") {
    icpForm4643["zip"].focus();
    alert("Zipcode is required.");
    return false;
  }
if (icpForm4643["phone"].value == "") {
    icpForm4643["phone"].focus();
    alert("Phone Number is required.");
    return false;
  }


return true;
}
</script>


