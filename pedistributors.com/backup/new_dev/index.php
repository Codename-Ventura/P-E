<?php

/*
DOCUMENTATION

Relevant Layout file ->

- includes/layouts/topnav.php
- includes/layouts/topblock.php
- includes/layouts/actionbar.php

*/
session_start();
include('includes/config/main_config.php');
require_once('includes/func.php');
include('includes/controllers/index.php');



//Homepage Data


$_SESSION[image_array][1]['src'] = "images/flipads/magnaflow.jpg";
$_SESSION[image_array][1]['manufacturer'] = "Magnaflow";
$_SESSION[image_array][1]['date'] = date("m-d-Y");

$_SESSION[image_array][2]['src'] = "images/flipads/edelbrock.jpg";
$_SESSION[image_array][2]['manufacturer'] = "Edelbrock";
$_SESSION[image_array][2]['date'] = date("m-d-Y");

$_SESSION[image_array][3]['src'] = "images/flipads/k&n.jpg";
$_SESSION[image_array][3]['manufacturer'] = "K&N";
$_SESSION[image_array][3]['date'] = date("m-d-Y");

$_SESSION[image_array][4]['src'] = "images/flipads/hurst.jpg";
$_SESSION[image_array][4]['manufacturer'] = "Hurst";
$_SESSION[image_array][4]['date'] = date("m-d-Y");

/*
$_SESSION[image_array][5]['src'] = "images/flipads/online.jpg";
$_SESSION[image_array][5]['manufacturer'] = "Hurst";
$_SESSION[image_array][5]['date'] = date("m-d-Y");
*/
//Page Loader
if(isset($_GET['p'])){
	$p = $_GET['p'];
	}
else{
	$p = "home";
	}


/*
Variables:
	$layout = page to load into content window
	$leftbar_on = Set to "true" if left navigation colum is to be placed on page


Pages that use classes:
	Home
	Login
	Register/New Accounts
	Specials
	Featured Vendors
	New Products
	Reabates and Promotions
	P&E TV
	News and Events
*/
switch($p)
{
	case 'home';
		$main = "home";
		$mod_type = "layouts";
		$layout = "homepage.php";
		include('includes/controllers/home.php');
		//Load Class
		$leftbar_on = "true";
		break;
	case 'login';
		$main = "login";
		$mod_type = "layouts";
		$layout = "login.php";
		$leftbar_on = "true";
		include('includes/controllers/login.php');
		break;
	case 'logout';
		session_destroy();
		header('Location: index.php?p=login');
		break;
	case 'register';
		$main = "register";
		$mod_type = "layouts";
		$layout = "register.php";
		include('includes/controllers/register.php');
		$leftbar_on = "true";
		break;
	case 'specials';
		$main = "specials";
		$mod_type = "layouts";
		$layout = "specials.php";
		$leftbar_on = "true";
		include('includes/controllers/specials.php');
		$auth = "true";
		break;
	case 'ups';
		$main = "ups";
		$mod_type = "layouts";
		$layout = "ups.php";
		$leftbar_on = "true";
		break;
	case 'about';
		$main = "about";
		$mod_type = "layouts";
		$layout = "about.php";
		$leftbar_on = "true";
		break;
	case 'contact';
		$main = "contact";
		$mod_type = "layouts";
		$layout = "contact.php";
		$leftbar_on = "true";
		break;
	case 'linecard';
		$main = "vendors";
		$mod_type = "layouts";
		$layout = "linecard.php";
		$leftbar_on = "true";
		break;
	case 'vendors';
		$mod_type = "layouts";
		$main = "vendors";
		$layout = "vendors.php";
		$leftbar_on = "true";
		include('includes/controllers/vendors.php');
		break;
	case 'catalog';
		$mod_type = "layouts";
		$main = "catalog";
		$layout = "catalog.php";
		$leftbar_on = "true";
		break;
	case 'news';
		$main = "news";
		$mod_type = "layouts";
		$layout = "news.php";
		$leftbar_on = "true";
		include('includes/controllers/news.php');
		break;
	case 'admin';
		$main = "admin";
		$mod_type = "layouts";
		$layout = "admin.php";
		$leftbar_on = "true";
		$auth = "true";
		include('includes/controllers/admin.php');
		break;
	case 'account';
		$main = "account";
		$mod_type = "layouts";
		$layout = "account.php";
		$leftbar_on = "true";
		$auth = "true";
		include('includes/controllers/account.php');
		break;
	case 'members';
		$main = "members";
		$mod_type = "layouts";
		$layout = "members.php";
		$leftbar_on = "true";
		$auth = "true";
		include('includes/controllers/members.php');
		break;
	case 'search';
		$main = "search";
		$mod_type = "layouts";
		$layout = "search.php";
		$leftbar_on = "true";
		$auth = "true";
		include('includes/controllers/search.php');
		break;	
	case 'history';
		$main = "history";
		$mod_type = "layouts";
		$layout = "history.php";
		$leftbar_on = "true";
		$auth = "true";
		include('includes/controllers/history.php');
		break;
	case 'details';
		$main = "details";
		$mod_type = "layouts";
		$layout = "details.php";
		$leftbar_on = "true";
		$auth = "true";
		include('includes/controllers/details.php');
		break;	
	case 'cart';
		$main = "cart";
		$mod_type = "layouts";
		$layout = "cart.php";
		$leftbar_on = "true";
		$auth = "true";
		include('includes/controllers/search.php');
		include('includes/controllers/cart.php');		
		break;	
	case 'checkout';
		$main = "checkout";
		$mod_type = "layouts";
		$layout = "checkout.php";
		$leftbar_on = "true";
		$auth = "true";
		include('includes/controllers/checkout.php');
		break;	
	case 'ymm';
		$main = "inventory";
		$mod_type = "layouts";
		$layout = "inventory.php";
		$leftbar_on = "true";
		$auth = "true";
		include('includes/controllers/inventory.php');
		break;
	case 'feedback';
		$main = "feedback";
		$mod_type = "layouts";
		$layout = "feedback.php";
		$leftbar_on = "true";
		$auth = "true";
		include('includes/controllers/feedback.php');
		break;	
	default;
		$main = "home";
		$mod_type = "layouts";
		$layout = "homepage.php";
		$leftbar_on = "true";
		include('includes/controllers/home.php');
		break;
}
	

include('frontend.php');

?>