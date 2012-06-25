<?php

/*
DOCUMENTATION

Relevant Layout file ->

- includes/layouts/topnav.php
- includes/layouts/topblock.php
- includes/layouts/actionbar.php

*/
session_start();
include('m_includes/config/main_config.php');
require_once('includes/func.php');
include('includes/controllers/index.php');


unset($_SESSION[image_array]);
//Homepage Data
/*
$_SESSION[image_array][0]['src'] = "images/flipads/luverne.jpg";
$_SESSION[image_array][0]['manufacturer'] = "Luverne";
$_SESSION[image_array][0]['date'] = date("m-d-Y");

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

$_SESSION[image_array][5]['src'] = "images/flipads/airlift.jpg";
$_SESSION[image_array][5]['manufacturer'] = "Airlift";
$_SESSION[image_array][5]['date'] = date("m-d-Y");

$_SESSION[image_array][6]['src'] = "images/flipads/airaid.jpg";
$_SESSION[image_array][6]['manufacturer'] = "Airaid";
$_SESSION[image_array][6]['date'] = date("m-d-Y");

$_SESSION[image_array][7]['src'] = "images/flipads/auto_meter.jpg";
$_SESSION[image_array][7]['manufacturer'] = "Auto Meter";
$_SESSION[image_array][7]['date'] = date("m-d-Y");
*/

$_SESSION[image_array][0]['src'] = "images/flipads/rhinorack.jpg";
$_SESSION[image_array][0]['manufacturer'] = "Rhino Rack";
$_SESSION[image_array][0]['date'] = date("m-d-Y");

$_SESSION[image_array][1]['src'] = "images/flipads/FABflipbanner.png";
$_SESSION[image_array][1]['manufacturer'] = "n-Fab";
$_SESSION[image_array][1]['date'] = date("m-d-Y");

$_SESSION[image_array][2]['src'] = "images/flipads/scorpionliner.jpg";
$_SESSION[image_array][2]['manufacturer'] = "Scorpion";
$_SESSION[image_array][2]['date'] = date("m-d-Y");

$_SESSION[image_array][3]['src'] = "images/flipads/alsliner.jpg";
$_SESSION[image_array][3]['manufacturer'] = "Al's Liner";
$_SESSION[image_array][3]['date'] = date("m-d-Y");

$_SESSION[image_array][4]['src'] = "images/flipads/percys.jpg";
$_SESSION[image_array][4]['link'] = "http://www.percyshp.com/PercysCatalog.pdf";
$_SESSION[image_array][4]['manufacturer'] = "Percy's Performance";
$_SESSION[image_array][4]['date'] = date("m-d-Y");

$_SESSION[image_array][5]['src'] = "images/flipads/fiaseatcovers.jpg";
$_SESSION[image_array][5]['manufacturer'] = "Fia Seat Covers";
$_SESSION[image_array][5]['date'] = date("m-d-Y");

$_SESSION[image_array][6]['src'] = "images/flipads/diablosport.jpg";
$_SESSION[image_array][6]['manufacturer'] = "Diablo Sport";
$_SESSION[image_array][6]['date'] = date("m-d-Y");

$_SESSION[image_array][7]['src'] = "images/flipads/visionxlighting.jpg";
$_SESSION[image_array][7]['manufacturer'] = "VisionX Lighting";
$_SESSION[image_array][7]['date'] = date("m-d-Y");


/*
$_SESSION[image_array][8]['src'] = "images/flipads/arp.jpg";
$_SESSION[image_array][8]['manufacturer'] = "ARP";
$_SESSION[image_array][8]['date'] = date("m-d-Y");

$_SESSION[image_array][9]['src'] = "images/flipads/auburn_gear.jpg";
$_SESSION[image_array][9]['manufacturer'] = "Auburn Gear";
$_SESSION[image_array][9]['date'] = date("m-d-Y");

$_SESSION[image_array][10]['src'] = "images/flipads/bedrug.jpg";
$_SESSION[image_array][10]['manufacturer'] = "Bedrug";
$_SESSION[image_array][10]['date'] = date("m-d-Y");

$_SESSION[image_array][11]['src'] = "images/flipads/belltech.jpg";
$_SESSION[image_array][11]['manufacturer'] = "Belltech";
$_SESSION[image_array][11]['date'] = date("m-d-Y");

$_SESSION[image_array][12]['src'] = "images/flipads/bestop.jpg";
$_SESSION[image_array][12]['manufacturer'] = "Bestop";
$_SESSION[image_array][12]['date'] = date("m-d-Y");

$_SESSION[image_array][13]['src'] = "images/flipads/bullydog.jpg";
$_SESSION[image_array][13]['manufacturer'] = "Bully Dog";
$_SESSION[image_array][13]['date'] = date("m-d-Y");

$_SESSION[image_array][14]['src'] = "images/flipads/carr.jpg";
$_SESSION[image_array][14]['manufacturer'] = "Carr";
$_SESSION[image_array][14]['date'] = date("m-d-Y");

$_SESSION[image_array][15]['src'] = "images/flipads/compcams.jpg";
$_SESSION[image_array][15]['manufacturer'] = "Comp Cams";
$_SESSION[image_array][15]['date'] = date("m-d-Y");

$_SESSION[image_array][16]['src'] = "images/flipads/deezee.jpg";
$_SESSION[image_array][16]['manufacturer'] = "Dee Zee";
$_SESSION[image_array][16]['date'] = date("m-d-Y");

$_SESSION[image_array][17]['src'] = "images/flipads/egr.jpg";
$_SESSION[image_array][17]['manufacturer'] = "EGR";
$_SESSION[image_array][17]['date'] = date("m-d-Y");

$_SESSION[image_array][18]['src'] = "images/flipads/hypertech.jpg";
$_SESSION[image_array][18]['manufacturer'] = "Hypertech";
$_SESSION[image_array][18]['date'] = date("m-d-Y");

$_SESSION[image_array][19]['src'] = "images/flipads/weathertech.jpg";
$_SESSION[image_array][19]['manufacturer'] = "WeatherTech";
$_SESSION[image_array][19]['date'] = date("m-d-Y");

$_SESSION[image_array][20]['src'] = "images/flipads/mickey.jpg";
$_SESSION[image_array][20]['manufacturer'] = "Mickey Thompson";
$_SESSION[image_array][20]['date'] = date("m-d-Y");

$_SESSION[image_array][21]['src'] = "images/flipads/xspower.jpg";
$_SESSION[image_array][21]['manufacturer'] = "XS Power";
$_SESSION[image_array][21]['date'] = date("m-d-Y");

$_SESSION[image_array][22]['src'] = "images/flipads/motive.jpg";
$_SESSION[image_array][22]['manufacturer'] = "Motive Gear";
$_SESSION[image_array][22]['date'] = date("m-d-Y");

$_SESSION[image_array][23]['src'] = "images/flipads/piaa.jpg";
$_SESSION[image_array][23]['manufacturer'] = "PIAA";
$_SESSION[image_array][23]['date'] = date("m-d-Y");

$_SESSION[image_array][24]['src'] = "images/flipads/readylift.jpg";
$_SESSION[image_array][24]['manufacturer'] = "ReadyLift";
$_SESSION[image_array][24]['date'] = date("m-d-Y");

$_SESSION[image_array][25]['src'] = "images/flipads/skyjacker.jpg";
$_SESSION[image_array][25]['manufacturer'] = "Skyjacker";
$_SESSION[image_array][25]['date'] = date("m-d-Y");

$_SESSION[image_array][26]['src'] = "images/flipads/taylor.jpg";
$_SESSION[image_array][26]['manufacturer'] = "Taylor";
$_SESSION[image_array][26]['date'] = date("m-d-Y");

$_SESSION[image_array][27]['src'] = "images/flipads/truxedo.jpg";
$_SESSION[image_array][27]['manufacturer'] = "Truxedo";
$_SESSION[image_array][27]['date'] = date("m-d-Y");

$_SESSION[image_array][28]['src'] = "images/flipads/tuff_stuff.jpg";
$_SESSION[image_array][28]['manufacturer'] = "Tuff Stuff";
$_SESSION[image_array][28]['date'] = date("m-d-Y");

$_SESSION[image_array][29]['src'] = "images/flipads/viair.jpg";
$_SESSION[image_array][29]['manufacturer'] = "Viair";
$_SESSION[image_array][29]['date'] = date("m-d-Y");

$_SESSION[image_array][30]['src'] = "images/flipads/bullydogtv.jpg";
$_SESSION[image_array][30]['manufacturer'] = "Bully Dog TV";
$_SESSION[image_array][30]['date'] = date("m-d-Y");
$_SESSION[image_array][30]['link'] = "http://www.pedistributors.com/?p=bullydogtv";

*/

shuffle($_SESSION[image_array]);



//To avoice uneeded data, take a slice, then unset the "0" value to avoid confusion in the javascript
$_SESSION[image_slice] = array_slice($_SESSION[image_array],2,7);
unset($_SESSION[image_slice][0]);


 

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
	Rebates and Promotions
	P&E TV
	News and Events
*/
switch($p)
{
	case 'home';
		$main = "home";
		$mod_type = "layouts";
		$layout = "homepage.php";
		include('m_includes/controllers/home.php');
		//Load Class
		$leftbar_on = "false";
		break;
	case 'login';
		$main = "login";
		$mod_type = "layouts";
		$layout = "login.php";
		$leftbar_on = "false";
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
		$leftbar_on = "false";
		break;
	case 'specials';
		$main = "specials";
		$mod_type = "layouts";
		$layout = "specials.php";
		$leftbar_on = "false";
		include('includes/controllers/specials.php');
		$auth = "true";
		break;
	case 'ups';
		$main = "ups";
		$mod_type = "layouts";
		$layout = "ups.php";
		$leftbar_on = "false";
		break;
	case 'about';
		$main = "about";
		$mod_type = "layouts";
		$layout = "about.php";
		$leftbar_on = "false";
		break;
	case 'contact';
		$main = "contact";
		$mod_type = "layouts";
		$layout = "contact.php";
		$leftbar_on = "false";
		break;
	case 'linecard';
		$main = "vendors";
		$mod_type = "layouts";
		$layout = "linecard.php";
		$leftbar_on = "false";
		break;
	case 'vendors';
		$mod_type = "layouts";
		$main = "vendors";
		$layout = "vendors.php";
		$leftbar_on = "false";
		include('includes/controllers/vendors.php');
		break;
	case 'catalog';
		$mod_type = "layouts";
		$main = "catalog";
		$layout = "catalog.php";
		$leftbar_on = "false";
		break;
	case 'news';
		$main = "news";
		$mod_type = "layouts";
		$layout = "news.php";
		$leftbar_on = "false";
		include('includes/controllers/news.php');
		break;
	case 'admin';
		$main = "admin";
		$mod_type = "layouts";
		$layout = "admin.php";
		$leftbar_on = "false";
		include('includes/controllers/admin.php');
		break;
	case 'feedback';
		$main = "feedback";
		$mod_type = "layouts";
		$layout = "feedback.php";
		$leftbar_on = "false";
		$auth = "true";
		include('includes/controllers/feedback.php');
		break;
	case 'account';
		$main = "account";
		$mod_type = "layouts";
		$layout = "account.php";
		$leftbar_on = "false";
		$auth = "true";
		include('includes/controllers/account.php');
		break;
	case 'search';
		$main = "search";
		$mod_type = "layouts";
		$layout = "search.php";
		$leftbar_on = "false";
		$auth = "true";
		include('includes/controllers/search.php');
		break;	
	case 'history';
		$main = "history";
		$mod_type = "layouts";
		$layout = "history.php";
		$leftbar_on = "false";
		$auth = "true";
		include('includes/controllers/history.php');
		break;
	case 'details';
		$main = "details";
		$mod_type = "layouts";
		$layout = "details.php";
		$leftbar_on = "false";
		$auth = "true";
		include('includes/controllers/details.php');
		break;	
	case 'cart';
		$main = "cart";
		$mod_type = "layouts";
		$layout = "cart.php";
		$leftbar_on = "false";
		$auth = "true";
		include('includes/controllers/search.php');
		include('includes/controllers/cart.php');		
		break;	
	case 'checkout';
		$main = "checkout";
		$mod_type = "layouts";
		$layout = "checkout.php";
		$leftbar_on = "false";
		$auth = "true";
		include('includes/controllers/checkout.php');
		break;	
	case 'ymm';
		$main = "inventory";
		$mod_type = "layouts";
		$layout = "inventory.php";
		$leftbar_on = "false";
		$auth = "true";
		include('includes/controllers/inventory.php');
		break;	
	case 'members';
		$main = "members";
		$mod_type = "layouts";
		$layout = "members.php";
		$leftbar_on = "false";
		$auth = "true";
		include('includes/controllers/members.php');
		break;
	case 'bullydogtv';
		$main = "bdtv";
		$mod_type = "layouts";
		$layout = "bdtv.php";
		$leftbar_on = "false";
		include('includes/controllers/feedback.php');
		break;	
	default;
		$main = "home";
		$mod_type = "layouts";
		$layout = "homepage.php";
		$leftbar_on = "false";
		include('includes/controllers/home.php');
		break;
}
	

include('m_frontend.php');

?>