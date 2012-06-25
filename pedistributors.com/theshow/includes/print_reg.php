<?php session_start(); 
foreach($_POST as $key=>$value){
    if(!empty($value)){
    	$_SESSION[registrar][$key] = $value;        
        }
	}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Show Registration for <?php echo $_SESSION[registrar][Company_Name];?></title>
</head>

<body onload="javascript:window.print()">
<table style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px" cellspacing="10" width="75%" align="center">
	<tr><td colspan="4" style="text-align:center; font-size:12px">Please review the information, print, and fax a copy to 615-851-4054</td></tr>
	<tr><td colspan="4" style="text-align:center; font-size:16px">Registration Information</td></tr>
    <tr>
    <td style="text-align:right">Company Name:</td><td style="text-align:left"><?php if(!empty($_SESSION[registrar][Company_Name])){ echo $_SESSION[registrar][Company_Name]; }?></td>
    <td style="text-align:right">Customer Number:</td><td style="text-align:left"><?php if(!empty($_SESSION[registrar][Customer_Number])){ echo $_SESSION[registrar][Customer_Number]; }?></td>
    </tr>
    <tr>
    <td style="text-align:right">Address:</td><td style="text-align:left" colspan="3"><?php if(!empty($_SESSION[registrar][Address])){ echo $_SESSION[registrar][Address]; } ?></td>
    </tr>
    <tr>
    <td style="text-align:right">City:</td><td style="text-align:left"><?php if(!empty($_SESSION[registrar][City])){ echo $_SESSION[registrar][City]; }?></td>
    <td style="text-align:right">State:</td><td style="text-align:left"><?php if(!empty($_SESSION[registrar][State])){ echo $_SESSION[registrar][State]; }?></td>
    </tr>
    <tr>
    <td style="text-align:right"></td><td style="text-align:left"></td>
    <td style="text-align:right">Zip Code:</td><td style="text-align:left"><?php if(!empty($_SESSION[registrar][Zip_Code])){ echo $_SESSION[registrar][Zip_Code]; }?></td>
    </tr>
     <tr>
    <td style="text-align:right">Contact Name:</td><td style="text-align:left"><?php if(!empty($_SESSION[registrar][Contact_Name])){ echo $_SESSION[registrar][Contact_Name]; }?></td>
    <td style="text-align:right">Phone Number:</td><td style="text-align:left"><?php if(!empty($_SESSION[registrar][Phone_Number])){ echo $_SESSION[registrar][Phone_Number]; }?></td>
    </tr>
    
</table>
<table cellpadding="10" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; margin-top:2em" width="100%">
<tr><td style="text-align:center; font-size:11px" colspan="4">Attendees</td></tr>
	<tr><td style="text-align:center">Name</td><td style="text-align:center">Title</td><td style="text-align:center" colspan="2">Has Authority to Purchase?</td></tr>
    <tr bgcolor="#A6A6A6"><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee1_name])){ echo $_SESSION[registrar][attendee1_name]; }?></td><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee1_title])){ echo $_SESSION[registrar][attendee1_title]; }?></td><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee1_auth])){ echo $_SESSION[registrar][attendee1_auth]; }?></td></tr>
    <tr><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee2_name])){ echo $_SESSION[registrar][attendee2_name]; }?></td><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee2_title])){ echo $_SESSION[registrar][attendee2_title]; }?></td><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee2_auth])){ echo $_SESSION[registrar][attendee2_auth]; }?></td></tr>
    <tr bgcolor="#A6A6A6"><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee3_name])){ echo $_SESSION[registrar][attendee3_name]; }?></td><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee3_title])){ echo $_SESSION[registrar][attendee3_title]; }?></td><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee3_auth])){ echo $_SESSION[registrar][attendee3_auth]; }?></td></tr>
    <tr><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee4_name])){ echo $_SESSION[registrar][attendee4_name]; }?></td><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee4_title])){ echo $_SESSION[registrar][attendee4_title]; }?></td><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee4_auth])){ echo $_SESSION[registrar][attendee4_auth]; }?></td></tr>
    <tr><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee5_name])){ echo $_SESSION[registrar][attendee5_name]; }?></td><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee5_title])){ echo $_SESSION[registrar][attendee5_title]; } ?></td><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee5_auth])){ echo $_SESSION[registrar][attendee5_auth]; }?></td></tr>
    <tr><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee6_name])){ echo $_SESSION[registrar][attendee1_name]; }?></td><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee6_title])){ echo $_SESSION[registrar][attendee1_name]; }?></td><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee6_auth])){ echo $_SESSION[registrar][attendee6_auth]; } ?></td></tr>
    <tr><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee7_name])){ echo $_SESSION[registrar][attendee7_name]; }?></td><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee7_title])){ echo $_SESSION[registrar][attendee7_title]; }?></td><td style="text-align:center"><?php if(!empty($_SESSION[registrar][attendee7_auth])){ echo $_SESSION[registrar][attendee7_auth]; } ?></td></tr>

</table>
</body>
</html>
