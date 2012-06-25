<?php
$host="localhost"; //Host Name
$uname="root";
$pword="sql_pass2666";
$db_name="pande";


//SET SITES MANUALLY
//OUT FIRST IN FILE
$sites_manual = 
".google.com
.catalograck.com
.pedistributors.com
.192.168.1.105
.metradealers.com
.usaepay.com
.zipexpress.com
.hackbarthdelivery.net
.ups.com
.jegs.com
.summitracing.com
.oreillyauto.com
.images.oreillyauto.com
.corporate.oreillyauto.com
.yellow.com
.xpresskit.com
.yellowpages.com
.openclick.com
.superpages.com
.sylvania.com
.metradealer.com
.iwebcat.com
.msdmvp.com
.egclassicsinc.com
";

//$filename = '/usr/local/etc/allowed-sites.squid';

$filename = '/home/files/squid/allowed_sites.squid';

mysql_connect("$host", "$uname", "$pword")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$query = mysql_query("SELECT * FROM `linecard` WHERE `url` != ''");
while($row = mysql_fetch_array($query)){
	$sites[$row[name]] = explode(".",$row['url']);
}

sort($sites);

foreach($sites as $k=>$v){
	$tempurl =$sites[$k][1].".".substr($sites[$k][2],0,3);
	if(strlen($tempurl) > 5){
	$url_list[$k] = $tempurl;
	$raw_urls .= ".".$tempurl."\n";	
	}
	else{
	$bad_urls[$k] = $tempurl;
	}	
}

$raw_urls = $sites_manual.$raw_urls;
echo "<pre>";
echo $raw_urls;
echo "</pre>";



if(file_exists('temp_file.txt')){
	unlink('temp_file.txt');
}

$file = "temp_file.txt";
$fh = fopen($file, 'w') or die("can't open file");
fwrite($fh,$raw_urls);
fclose($fh);


if(!copy($file,$filename)){
	echo "Copy Not Completed";
}

//  Linux Squid Command
shell_exec('squid -k reconfig');
echo exec('whoami');
?>