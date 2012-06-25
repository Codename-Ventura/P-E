<?
class Functions {



	function Functions(){
		$this->userdata->userid = "userid_".rand();
		$this->userdata->userip = $_SERVER['REMOTE_ADDR'];
		$this->userdata->referer = $_SERVER['SCRIPT_FILENAME'];
		$this->QuickLog();
		
	}


function QuickLog(){
	include('includes/db.php');
	$ip = $_SERVER['REMOTE_ADDR'];
	$date = date("Y-m-d H:i:s");
	if(!mysql_fetch_array(mysql_query("SELECT * FROM `log` WHERE `ip` = '$ip'"))){
		mysql_query("INSERT INTO `log` (`ip`, `date`) VALUES ('$ip', '$date')");
	}
	
}

function pageresponse($type, $extras){ //ADDS A PAGE RESPONSE BOX

	switch($type){
		case 'error';
		$message = '<div class="errorbox">There was an error processing your request, please try again</div>';
		break;
		case 'unauth';
		$message = '<div class="errorbox">You must be logged in to view this area.</div>';
		break;
		case 'form_complete';
		$message = '<div class="successbox">Your form was submitted successfully.  Thank You.</div>';
		break;
		case 'part_deleted';
		$message = '<div class="errorbox">Part # '.$extras.' was deleted from your Shopping Cart</div>';
		break;
		case 'part_updated';
		$message = '<div class="successbox">Part # '.$extras.' was updated in your Shopping Cart</div>';
		break;
		case 'login_error';
		$message = '<div class="errorbox">Invalid Username or Password, please try again.</div>';
		break;
		case 'search_error';
		$message = '<div class="errorbox">Your search produced no results, please try again.</div>';
		break;
		case 'qty_exceeded';
		$message = '<div class="errorbox">Insufficient quantity on hand for part #'.$extras.' <br>Maximum available has been added to your cart</div>';
		break;
		case 'order_fail';
		$message = '<div class="errorbox">There was a problem placing your order.  Please try again.</div>';
		break;
		case 'order_success';
		$message = '<div class="successbox">Your order has been placed.  Your order details are below.</div>';
		break;
		case 'clear_cart';
		$message = '<div class="successbox">Your shopping cart has been cleared.</div>';
		break;
		case 'address_not_found';
		$message = '<div class="errorbox">Address Not Found</div>';
		break;		
		case 'out_of_stock';
		$message = '<div class="errorbox">We are currently out of stock for part #'.$extras.' <br>Part may be special ordered, please call your salesperson to inquire.</div>';
		break;
		case 'over_credit';
		$message = '<div class="errorbox">Your credit limit has been reached. <br>Please contact your salesmen to correct your account</div>';
		break;
		case 'no_linecode';
		$message = '<div class="errorbox">That is not a valid line code, please try again.</div>';
		break;
		case 'no_email';
		$message = '<div class="errorbox">The email you entered is not on file.<br>Please try again, or call your salesman for assistance</div>';
		break;
	}
	
	if(isset($_SESSION['sitemessage'])){
		return $_SESSION['sitemessage'] .= $message;
		}
	else{
		return $_SESSION['sitemessage'] = $message;
		}
	
	


	
	
	

}//function pageresponse END


		


function strip_labels($lines){
	foreach($lines as $k=>$v){
			$temp_val = explode("|",$v);
			$lines[$k] = ucwords(strtolower($temp_val[1]));		
		}
	return $lines;
}


function zero($value){
	if($value > 0){
		return false;
		}
	else{
		return true;
		}
}








} //CLASS END

define("INCOMING_QUEUE", "webtest_out/");
define("OUTGOING_QUEUE", "webtest_in/");


$funcs = new Functions;
?>