<html>
<head>
<title>PricEr</title>
</head>
<body>
<form method="post">
<input name="pricefile" type="text">
<button type="submit">Submit</button>

<select>
<?php

function getpagecount($url){

$test = file_get_contents($url);
$test = htmlentities($test);
$test = explode("Page 1",$test);
$test = explode("of ", $test[1]);
$test = explode("&lt;", $test[1]);
$pagecount = $test[0];
return $pagecount;

}

/*  
-----------------------------------------
File uploader for Data/Price entry
Code written by Jonathan James
For P&E Distributors
-----------------------------------------

Summary:

After formatting using Excel macro, CSV will be uploaded to this script and matched to SQL database.
Script will search for part number/line code in master database list and UPDATE the price field accordingly

Actions:
---------------------------------------

if (!file_exists('temp/pricing.csv')){
	echo "File not found";
	}
	else{
		echo "File found";
		echo "<br>";
				}
$test = file_get_contents('temp/pricing.csv');
echo "<pre>";
print_r($test);
echo "</pre>";


if (isset($_POST['pricefile'])){
	echo "File Uploaded";
	$target = "temp/testing";
	$target = $target . basename($_FILES['pricefile']['name']); 
	$_FILES['pricefile']['tmp_name'];
	}

*/
if(isset($_REQUEST['page'])){
	echo $_REQUEST['page']."<br>";
	}
$brands = file_get_contents("http://www.summitracing.com/brands/ShowAll");
$brands = explode("brandname",$brands);
unset($brands[0]);

foreach($brands as $key=>$value){
	$value = explode("href",$value);
		foreach($value as $key => $value){
			$value = htmlentities($value);
			$value = explode("&quot;",$value);
				foreach($value as $key=>$value){
					$value = explode("/",$value);
					if($value[4] == "brand"){
					$brandname = $value[5];
					$link = implode("/",$value);
					echo "<option value=\"$link?RC=100\">$brandname</option>";
						}
					}
			}
	}
/*$test = str_replace("<","&lt",$test);
$test = str_replace(">","&gt",$test);
*/

?>

</select></form>
</body>
</html>
