<?php
$busname = $_REQUEST['bus_name'];
$bus_phone = $_REQUEST['bus_phone'];
$bus_fax = $_REQUEST['bus_fax'];
$bus_shipaddy = $_REQUEST['bus_shipaddy'];
$bus_city = $_REQUEST['bus_city'];
$bus_state = $_REQUEST['bus_state'];
$bus_zip = $_REQUEST['bus_zip'];
$bus_type = $_REQUEST['bus_type'];
$email1 = $_REQUEST['email1'];
$buyername = $_REQUEST['buyername'];
$website = $_REQUEST['weburl'];
$terms = $_REQUEST['terms'];
$taxid = $_REQUEST['taxid'];
$po = $_REQUEST['po_req'];
$bus_years = $_REQUEST['bus_years'];

if (isset($_POST['mail_toggle']))
	{
		$bus_mailaddy = $bus_shipaddy;
		$bus_mailcity = $bus_city;
		$bus_mailstate = $bus_state;
		$bus_mailzip = $bus_zip;
	}
else
	{
		$bus_mailaddy = $_REQUEST['bus_mailaddy'];
		$bus_mailcity = $_REQUEST['bus_mailcity'];
		$bus_mailstate = $_REQUEST['bus_mailstate'];
		$bus_mailzip = $_REQUEST['bus_mailzip'];
	}

$property = $_REQUEST['prop'];
$mort_val = $_REQUEST['mort_val'];
$mortgagee = $_REQUEST['mortgagee'];
$sales_vol = $_REQUEST['sales_vol'];
$bank_name = $_REQUEST['bank'];
$bank_contact = $_REQUEST['bank_contact'];
$bank_phone = $_REQUEST['bank_phone'];
$bank_fax = $_REQUEST['bank_fax'];
$pres_name = $_REQUEST['pres_name'];
$pres_addy = $_REQUEST['pres_addy'];
$pres_phone = $_REQUEST['pres_phone'];
$pres_city = $_REQUEST['pres_city'];
$pres_state = $_REQUEST['pres_state'];
$pres_zip = $_REQUEST['pres_zip'];

$salesman = $_REQUEST['salesman'];

if (isset($_REQUEST['partnerbox'])) {
$part_name = $_REQUEST['part_name'];
$part_addy = $_REQUEST['part_addy'];
$part_phone = $_REQUEST['part_phone'];
$part_city = $_REQUEST['part_city'];
$part_state = $_REQUEST['part_state'];
$part_zip = $_REQUEST['part_zip'];

}
else {
$part_name = "None";
$part_addy = "None";
$part_city = "None";
$part_state = "None";
$part_phone = "None";
$part_zip = "None";

}



/* VALIDATE TOS AND GUARANTY */

/* END TOS & GUARANTY VALIDATION */

$trade1_name = $_REQUEST['trade1_name'];
$trade1_city = $_REQUEST['trade1_city'];
$trade1_state = $_REQUEST['t_st1'];
$trade1_zip = $_REQUEST['trade1_zip'];
$trade1_acct = $_REQUEST['trade1_acct'];
$trade1_phone = $_REQUEST['trade1_phone'];
$trade1_fax = $_REQUEST['trade1_fax'];

$trade2_name = $_REQUEST['trade2_name'];
$trade2_city = $_REQUEST['trade2_city'];
$trade2_state = $_REQUEST['t_st2'];
$trade2_zip = $_REQUEST['trade2_zip'];
$trade2_acct = $_REQUEST['trade2_acct'];
$trade2_phone = $_REQUEST['trade2_phone'];
$trade2_fax = $_REQUEST['trade2_fax'];

$trade3_name = $_REQUEST['trade3_name'];
$trade3_city = $_REQUEST['trade3_city'];
$trade3_state = $_REQUEST['t_st3'];
$trade3_zip = $_REQUEST['trade3_zip'];
$trade3_acct = $_REQUEST['trade3_acct'];
$trade3_phone = $_REQUEST['trade3_phone'];
$trade3_fax = $_REQUEST['trade3_fax'];


$today = date("F j, Y");


?>