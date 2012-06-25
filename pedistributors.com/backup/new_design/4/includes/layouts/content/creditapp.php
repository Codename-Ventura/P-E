<?php

//Process Credit Application Data
/*Waste of my fucking time - just do it the old fashioned way and move the FUCK ON!
$form_titles = array();

$form_titles[Business_Information] = array(
	"bus_name" => "Business Name",
	"Terms" => "terms",
	"Website" => "website",
	"Salesman" => "salesman",
	"Address" => "bus_address",
	"City" => "bus_city",
	"State" => "bus_state",
	"Zip Code" => "bus_zip",
	"Phone" => "bus_phone",
	"Fax" => "bus_fax",
	"Email" => "bus_email");

$form_titles[Financial_Information] = array(
	"Bank" => "bank_name",
	"Account #" => "bank_acct",
	"Contact" => "bank_contact",
	"Phone" => "bank_phone",
	"Fax" => "bank_fax");
	
$form_titles[Owner_Information] = array(
	"Name of Owner" => "owner_name",
	"Address" => "owner_address",
	"City" => "owner_city",
	"State" => "owner_state",
	"Zip Code" => "owner_zip",	
	"Phone #" => "owner_phone",
	"Social Security #" => "owner_ss");

$form_titles[Partner_Information] = array(
	"Name of Partner" => "partner_name",
	"Address" => "partner_address",
	"City" => "partner_city",
	"State" => "partner_state",
	"Zipcode" => "partner_zip",
	"Phone #" => "partner_phone",
	"Social Security #" => "partner_ss");

$form_titles[Trade_References][1] = array(
	"Name" => "ref1_name",
	"City" => "ref1_city",
	"State" => "ref1_state",
	"Zip" => "ref1_zip",
	"Phone #" => "ref1_phone",
	"Fax" => "ref1_fax");

$form_titles[Trade_References][2] = array(
	"Name" => "ref2_name",
	"City" => "ref2_city",
	"State" => "ref2_state",
	"Zip" => "ref2_zip",
	"Phone #" => "ref2_phone",
	"Fax" => "ref2_fax");

$form_titles[Trade_References][3] = array(
	"Name" => "ref3_name",
	"City" => "ref3_city",
	"State" => "ref3_state",
	"Zip" => "ref3_zip",
	"Phone #" => "ref3_phone",
	"Fax" => "ref3_fax");
*/






$app_table = 
'<table width="100%">
<tr>
<td width="25%" style="font-weight:600">Date:</td><td width="25%">'.date("m-d-Y").'</td>
<td colspan="2"><img src="http://www.pedistributors.com/images/app_logo.jpg" alt=""
width="255px"/></td>
</tr>
<tr>
<td width="25%" style="font-weight:600">Terms Requested:</td><td width="25%">'.$_POST[terms].'</td>
<td width="25%" style="font-weight:600"></td><td width="25%"></td>
</tr>
<tr>
<td style="font-weight:600">Referred By:</td><td>'.$_POST[salesman].'</td>
<td style="font-weight:600"></td><td></td>
</tr>
<tr>
<td style="font-weight:600">Tax ID#:</td><td>'.$_POST[taxid].'</td>
<td style="font-weight:600"></td><td></td>
</tr>
<tr>
<td style="font-weight:600">Type of Business:</td><td>'.$_POST[bus_type].'</td>
<td style="font-weight:600"></td><td></td>
</tr>
<tr>
<td style="font-weight:600">Need Purchase Order?:</td><td>'.$_POST[poreq].'</td>
<td style="font-weight:600"></td><td></td>
</tr>
<tr>
<td style="font-weight:600; text-align:center; width:100%; padding-top:1em; font-size:18px;" colspan="4">General Information</td>
</tr>
<tr>
<td style="font-weight:600">Firm Name:</td><td>'.$_POST[bus_name].'</td>
<td style="font-weight:600">Phone Number:</td><td>'.$_POST[bus_phone].'</td>
</tr>
<tr>
<td style="font-weight:600">Fax:</td><td>'.$_POST[bus_fax].'</td>
<td style="font-weight:600">Email:</td><td>'.$_POST[bus_email].'</td>
</tr>
<tr>
<td style="font-weight:600">Address:</td><td>'.$_POST[bus_address].'</td>
<td style="font-weight:600">City</td><td>'.$_POST[bus_city].'</td>
</tr>
<tr>
<td style="font-weight:600">State:</td><td>'.$_POST[bus_state].'</td>
<td style="font-weight:600">Zip Code:</td><td>'.$_POST[bus_zip].'</td>
</tr>
<tr>
<td style="font-weight:600">Mortgage Amount:</td><td>'.$_POST[mort_amt].'</td>
<td style="font-weight:600">Mortgagee:</td><td>'.$_POST[mortgagee].'</td>
</tr>
<tr>
<td style="font-weight:600">Years in Business:</td><td>'.$_POST[years_in_biz].'</td>
<td style="font-weight:600">Name of Buyer:</td><td>'.$_POST[buyer_name].'</td>
</tr>';
if(isset($_POST[shipaddy])){
$app_table .=
'<tr>
<td style="font-weight:600">Address:</td><td>'.$_POST[ship_address].'</td>
<td style="font-weight:600">City</td><td>'.$_POST[ship_city].'</td>
</tr>
<tr>
<td style="font-weight:600">State:</td><td>'.$_POST[ship_state].'</td>
<td style="font-weight:600">Zip Code:</td><td>'.$_POST[ship_zip].'</td>
</tr>';
}
$app_table .= '<tr>
<td style="font-weight:600; text-align:center; width:100%; padding-top:2em; font-size:18px;" colspan="4">Financial Information</td>
</tr>
<tr>
<td style="font-weight:600">Bank Name:</td><td>'.$_POST[bank_name].'</td>
<td style="font-weight:600">Bank Contact:</td><td>'.$_POST[bank_contact].'</td>
</tr>
<tr>
<td style="font-weight:600">Bank Phone:</td><td>'.$_POST[bank_phone].'</td>
<td style="font-weight:600">Bank Fax:</td><td>'.$_POST[bank_fax].'</td>
</tr>
<tr>
<td style="font-weight:600">Account #:</td><td>'.$_POST[bank_acct].'</td>
<td style="font-weight:600"></td><td></td>
</tr>
<tr>
<td style="font-weight:600; text-align:center; width:100%; padding-top:2em; font-size:18px;" colspan="4">Personal Information of Owner</td>
</tr>
<tr>
<td style="font-weight:600">Owner Name:</td><td>'.$_POST[owner_name].'</td>
<td style="font-weight:600">Address:</td><td>'.$_POST[owner_address].'</td>
</tr>
<tr>
<td style="font-weight:600">City</td><td>'.$_POST[owner_city].'</td>
<td style="font-weight:600">State:</td><td>'.$_POST[owner_state].'</td>
</tr>
<tr>
<td style="font-weight:600">Zip Code</td><td>'.$_POST[owner_zip].'</td>
<td style="font-weight:600"></td><td></td>
</tr>
<tr>
<td style="font-weight:600">Phone:</td><td>'.$_POST[owner_phone].'</td>
<td style="font-weight:600">SS#:</td><td>'.$_POST[owner_ss].'</td>
</tr>';

if($_POST['partner'] == "true"){
$app_table .='
<td style="font-weight:600; text-align:center; width:100%; padding-top:2em; font-size:18px;" colspan="4">Personal Information of Partner</td>
</tr>
<tr>
<td style="font-weight:600">Owner Name:</td><td>'.$_POST[partner_name].'</td>
<td style="font-weight:600">Address:</td><td>'.$_POST[partner_address].'</td>
</tr>
<tr>
<td style="font-weight:600">City</td><td>'.$_POST[partner_city].'</td>
<td style="font-weight:600">State:</td><td>'.$_POST[partner_state].'</td>
</tr>
<tr>
<td style="font-weight:600">Phone:</td><td>'.$_POST[partner_phone].'</td>
<td style="font-weight:600">SS#:</td><td>'.$_POST[partner_ss].'</td>
</tr>';}
$app_table .='
<tr>
<td style="font-weight:600; text-align:center; width:100%; padding-top:2em; font-size:18px;" colspan="4">Trade References</td>
</tr>
<tr>
<td style="font-weight:600">Name:</td><td>'.$_POST[ref1_name].'</td>
<td style="font-weight:600">Acct #:</td><td>'.$_POST[ref1_acct].'</td>
</tr>
<tr>
<td style="font-weight:600">Phone:</td><td>'.$_POST[ref1_phone].'</td>
<td style="font-weight:600">Fax:</td><td>'.$_POST[ref1_fax].'</td>
</tr>
<tr>
<td style="font-weight:600">City:</td><td>'.$_POST[ref1_city].'</td>
<td style="font-weight:600">State:</td><td>'.$_POST[ref1_state].'</td>
</tr>
<tr>
<td style="font-weight:600">Zip:</td><td>'.$_POST[ref1_zip].'</td>
<td style="font-weight:600"></td><td></td>
</tr>
<tr>
<td style="font-weight:600">Name:</td><td>'.$_POST[ref2_name].'</td>
<td style="font-weight:600">Acct #:</td><td>'.$_POST[ref2_acct].'</td>
</tr>
<tr>
<td style="font-weight:600">Phone:</td><td>'.$_POST[ref2_phone].'</td>
<td style="font-weight:600">Fax:</td><td>'.$_POST[ref2_fax].'</td>
</tr>
<tr>
<td style="font-weight:600">City:</td><td>'.$_POST[ref2_city].'</td>
<td style="font-weight:600">State:</td><td>'.$_POST[ref2_state].'</td>
</tr>
<tr>
<td style="font-weight:600">Zip:</td><td>'.$_POST[ref2_zip].'</td>
<td style="font-weight:600"></td><td></td>
</tr>
<tr>
<td style="font-weight:600">Name:</td><td>'.$_POST[ref3_name].'</td>
<td style="font-weight:600">Acct #:</td><td>'.$_POST[ref3_acct].'</td>
</tr>
<tr>
<td style="font-weight:600">Phone:</td><td>'.$_POST[ref3_phone].'</td>
<td style="font-weight:600">Fax:</td><td>'.$_POST[ref3_fax].'</td>
</tr>
<tr>
<td style="font-weight:600">City:</td><td>'.$_POST[ref3_city].'</td>
<td style="font-weight:600">State:</td><td>'.$_POST[ref3_state].'</td>
</tr>
<tr>
<td style="font-weight:600">Zip:</td><td>'.$_POST[ref3_zip].'</td>
<td style="font-weight:600"></td><td></td>
</tr>
</table>';

echo $app_table;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: <donotreply@pedistributors.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";
mail('jjames@pedistributors.com','Credit App',$app_table,$headers);
?>