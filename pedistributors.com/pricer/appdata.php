<?php
ini_set('display_errors', 1);
ini_set ('allow_url_fopen', 1);
error_reporting(E_ALL);

class AppData{


function curl($url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            return curl_exec($ch);
            curl_close($ch);
        }
	
function get_summit_line($linecode){
	$query = db_query("SELECT sumt FROM summit_lines WHERE line = '".$linecode."'");
	while($row = mysql_fetch_array($query)){
		return $row[sumt]."-";
	}

}

function get_years(){//PRICER FUNCTION

$url = "http://www.summitracing.com/";
$url_code = $this->curl($url);

$break_string_1 = '<option value="">Choose a Year</option>';
$break_string_2 = '</select>';
$break_string_3 = '</option>';

//Breaks out list of years from rest of page data
$url_code = explode($break_string_1,$url_code);
$url_code = explode($break_string_2,$url_code[1]);
$url_code = explode($break_string_3,$url_code[0]);

//After 3rd break we need to run the array and pull out just the years
	$auto_years = array();

	foreach($url_code as $k=>$v){
		if(strlen(substr(htmlentities($v),-4)) == "4"){
			$auto_years[] = substr(htmlentities($v),-4);
		}
	}

return $auto_years;
} //END FUNCTION

function get_makes($url){//PRICER FUNCTION


$url_code = $this->curl($url);

$break_string_1 = '<ul class="column-first">';
$break_string_2 = '</ul>';
$break_string_3 = '</a>';
$break_string_4 = '>';

//Breaks out list of years from rest of page data
$url_code = explode($break_string_1,$url_code);
$url_code = explode($break_string_2,$url_code[1]);
$url_code = $url_code[0].$url_code[1];
$url_code = explode($break_string_3,$url_code);

//After 4th break we need to run the array and pull out just the years

$auto_makes = array();

foreach($url_code as $k=>$v){
	$temp_array = explode($break_string_4,$v);
	$temp_make = end($temp_array);
		if(!empty($temp_make)){
			$auto_makes[] = end($temp_array);
		}
}

return $auto_makes;
} //END FUNCTION

function get_models($year,$make){

}//END FUNCTION

function get_parts($year,$make,$model){
$model = str_replace(" ","-",$model);
//URL TO BUILD :: http://www.summitracing.com/search/year/2011/make/TOYOTA/model/Choose-a-Model-TUNDRA/?Ns=Rank|Asc
$url = "http://www.summitracing.com/search/year/".$year."/make/".$make."/Model/".$model."/?RC=100";

$test = $this->curl($url);
$NumOfParts = explode("results-scale",$test);
$NumOfParts = explode("Results Found",$NumOfParts[1]);
$NumOfParts = explode("h2",$NumOfParts[0]);
$NumOfParts = str_replace(">","",end($NumOfParts));
$NumOfParts = str_replace(",","",$NumOfParts);

$NumOfPages = ceil($NumOfParts/100);




$test = explode("partno", htmlentities($test));

$count = "1";
$partnums = array();
while($count <= $NumOfPages){
$url = "http://www.summitracing.com/search/year/".$year."/make/".$make."/Model/".$model."/?RC=100&page=".$count;
$test = $this->curl($url);
$test = explode("partno", htmlentities($test));
unset($test[0]);
$lastrec = explode("/li",end($test));
$test[count($test)] = $lastrec[0];
$test = str_replace(" ", '', $test);

	foreach ($test as $div){
		$div = explode("/li",$div);
		$raw = substr($div[0],108,20);
		$getnumber = explode("&lt;",$raw);
		$getnumber = explode("-",$getnumber[0]);
		$line = $getnumber[0];
		$partnumber = $getnumber[1]; 
		if(!empty($getnumber[2])){ $partnumber .= "-".$getnumber[2];} 
		if(!empty($getnumber[3])){ $partnumber .= "-".$getnumber[3];}
		if(!empty($getnumber[4])){ $partnumber .= "-".$getnumber[4];}
		if(!empty($getnumber[5])){ $partnumber .= "-".$getnumber[5];}
		if($line !== "SUM"){
		$this->write_appdata($year,$make,$model,$line,$partnumber);
		$partnums[] = $line.$partnumber;
		}
		
	}
$count++;
} //END WHILE LOOP
return $partnums;
}//END FUNCTION


function write_appdata($year, $make, $model, $line, $partnum){
	include('../includes/db.php');
	$query = "INSERT INTO  `fit_data` (`id` ,`year` ,`make` ,`model` ,`linecode` ,`partnum`) VALUES (NULL ,  '$year',  '$make',  '$model',  '$line',  '$partnum');";
	mysql_query($query);
} //END FUNCTION

} //END CLASS

$appdata = new AppData();

if(!isset($_GET) || empty($_GET)){
$data = $appdata->get_years();

}

if(isset($_GET['year']) && !isset($_GET['make'])){
$url = "http://www.summitracing.com/search/year/".$_GET['year'];
$data = $appdata->get_makes($url);


}

if(isset($_GET['year']) && isset($_GET['make']) && !isset($_GET['model'])){
$url = "http://www.summitracing.com/search/year/".$_GET['year']."/make/".$_GET['make']."/model/Choose-a-Model/";
$data = $appdata->get_makes($url);
}	

if(isset($_GET['year']) && isset($_GET['make']) && isset($_GET['model'])){

$data = $appdata->get_parts($_GET['year'],$_GET['make'],$_GET['model']);
}
include("includes/appdata.php");
?> 