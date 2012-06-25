<?php
class Cron {

function Cron(){
	//$this->msg = "SYSTEM TEST - CRON MESSAGE LOG";
	//$this->type = "Catalog Rack File Transfer";
	//$this->func_ftp();
	$this->backup_home();
	

}


function Cron_log($type,$msg){
	include('../includes/db.php');
	$time = date("h:i:s");
	$date = date("Y-m-d");
	mysql_query("INSERT INTO cronjobs (`date`,`time`,`type`,`message`) VALUES ('$date','$time','$type','$msg')");
}

function func_ftp(){
	//File resides in /home/dciftp directory
	//example filename: rpe12010121001.txt
	// ---------------: 
	//Build naming convention for date of file transfer
	$file_prefix = "rpe1"; //Tells DCi the file type and our warehouse code
	$file_suffix = "01";
	$year = date("Y");
	$month = date("m");
	$day = date("d") - 1;
	$file = $file_prefix.$year.$month.$day.$file_suffix.".txt";
	$filename = "/home/dciftp/".$file_prefix.$year.$month.$day.$file_suffix.".txt";
	


	
	//BEGIN IF
	if(file_exists($filename)){
	


		$ip = "stockftp.catalograck.com";
		$user = "PAE";
		$password = "Pedist";
		$connection = ftp_connect($ip);
		$login = ftp_login($connection,$user,$password);
			if((!$connection) || (!$login)){
				$this->Cron_log("DCi Inventory Transfer","Connection Failed");}
			else{
				$upload = ftp_put($connection, $file, $filename, FTP_BINARY);
				}
	// check upload status
		if (!$upload) { 
    		$this->Cron_log("DCi Inventory Transfer","Upload Failed");
		} else {
	    	$this->Cron_log("DCi Inventory Transfer","Uploaded $filename to $ip as $file");
		}

	// close the FTP stream 
	ftp_close($conn_id); 
	}else{
		echo $filename." Not Found";
		exit();
		$this->Cron_log("DCi Inventory Transfer","No File Found");
	}//END IF
}//END FUNCTION func_ftp()
	

function backup_home(){
	//first clean up old backups
	$backup_dir = "/mnt/backupdrive";
	$root_to_copy = array(
	'/home'
	);
	
	if(is_dir($backup_dir)){
		echo "GOT IT";
	}else{
		echo "No";
	}
	print_r($root_to_copy);
	
}


//end Cron class
}

$cron = new Cron;

//include('RSS_Maker/rss_manufacturers.php');
?>