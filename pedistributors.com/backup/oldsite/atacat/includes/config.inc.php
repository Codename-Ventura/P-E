<?php # Script v1.0 - config.inc.php


/*  File Name: config.inc.php
 *  Created by Jonathan James for P&E Distributors
 *  Contact: jjames@pedistributors.com
 *  Created On: 5/26/2009
 *
 *  Description:
 *  The config file has site settings,
 *  defines the contants (URLs/URIs),
 *  and sets error handling.
*/

	#********************#
	#******SETTINGS******#
	
	//errors are emailed here
	$contact_email = 'jjames@pedistributors.com';
	
	//Get location (local/remote)
	if (stristr($_SERVER['HTTP_HOST'], 'local') || (substr($_SERVER['HTTP_HOST'], 0, 7) == '192.168') || ($_SERVER['HTTP_HOST']) == 'pedistributors.com') {
		$local = TRUE;
		}
	else {
		$local = FALSE;
		}
	
	
	//Determine location of files and site URL
	if ($local) {
		$debug = TRUE;
		define('BASE_URI', '/var/www/edrinks/dev/');
		define('BASE_URL', 'http://Ubuntulamp/edrinks/dev');
		define('MOD_BASE', '/var/www/edrinks/dev/includes/modules/');
		define('INC_BASE', '/var/www/edrinks/dev/includes/');
		define('DB', '/var/www/edrinks/dev/includes/pasties.php');
		}
	else {
		define('BASE_URI', '/var/www/edrinks/dev/');
		define('BASE_URL', 'http://raney.homeip.net/edrinks/dev/');
		define('MOD_BASE', '/var/www/edrinks/dev/includes/modules/');
		define('INC_BASE', '/var/www/edrinks/dev/includes/');
		define('DB', '/var/www/edrinks/dev/includes/pasties.php');
		}
		
/*  Most important setting...
 *  The $debug variable is used to set error management.
 *  To debug a specific page, ad this to the index.php page:


 *	if ($p == 'thismodule') $debug = TRUE;
 *	require_once('./include/config.inc.php');
 *

 *  To debug the entire site, do



*   Before this next conditional

	$debug = TRUE;
*/
	if (!isset($debug)) {
		$debug = FALSE;
		}

	//Set Timezone

/**@  END OF SETINGS @**/

	#********************#
	#*****ERROR MGT*****#

	//Creat Error Handler
		function my_error_handler ($e_number, $e_message, $e_file, $e_line, $e_vars) {
			global $debug, $contact_email;
	
	//Build the error message
		$message = "An error occured in script '$e-file' on line $e_line: \n<br />$e_message\n<br />";
	
	//Add Date Stamp
		$message .= "Date/Time:  " . date('n-j-Y H:i:s') . "\n<br />";
	
	//Append $e_vars to $message
		$message .= "<pre>" . print_r($e_vars, 1) . "</pre><br />";
	
		if ($debug) { //Show Error.
			echo '<p style="color:red; font-size=12px">' . $message . '</p>';
			}
	else {
		//Log the Error
		error_log($message, 1, $contact_email);  //Send Mail
		
		//Only print an error message if the error isn't a notice/strict
		if ( ($e_number != E_NOTICE) && ($_number < 2048) ) {
			echo '<p style="color:red; font-size=12px">A System Error Occured.  We aplogize for the inconvenience.</p>';
			}
		} //End of $debug if
	} //End of my_error_handler definition

	set_error_handler('my_error_handler');


//Call to functions
	include('includes/functions.inc.php');
	error_reporting(0);

			
/**@  END OF ERROR MGT @**/		

?>	
		
