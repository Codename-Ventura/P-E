<?php
ini_set('display_errors', 1); 
error_reporting(E_WARNING);
include('../includes/tss_db.php');

function cleantext($string) {
    // Replace other special chars
    $specialCharacters = array(
    '#' => '',
    '$' => '',
    '%' => '',
    '&' => '',
    '@' => '',
    '+' => '',
    '=' => '',
    '\\' => '',
    '/' => '',
    '•' => '*',
    '—' => '-',
	chr(176) => ' degrees',
	chr(8221) => 'in. '
    );
    
    while (list($character, $replacement) = each($specialCharacters)) {
    $string = str_replace($character, $replacement, $string);
    }
    
    // Strip tags and trim
    $string = trim(strip_tags($string));
    
    return $string;
}



 
$man = mysql_query("SELECT manufacturerid
FROM xcart_manufacturers");

while($man_id = mysql_fetch_array($man)){
	
$id = $man_id['manufacturerid'];
if(strlen($id) == "1"){
	$id = "0".$id;
	}


$results = mysql_query("SELECT productid, productcode, product, xcart_products.fulldescr, xcart_products.descr, price, manufacturer, weight, image_path 
FROM xcart_products
LEFT JOIN xcart_pricing USING(productid)
LEFT JOIN xcart_manufacturers USING(manufacturerid)
LEFT JOIN xcart_images_P ON xcart_products.productid = xcart_images_P.id
WHERE forsale='Y' AND manufacturerid='".$id."'
ORDER BY manufacturer");


while($row = mysql_fetch_array($results)){
$xml.= "<item>\n\r";
$xml.= "<title>".$row[product]."</title>\n\r";
$xml.= "<g:brand>".$row[manufacturer]."</g:brand>\n\r";
$xml.= "<g:condition>new</g:condition>\n\r";
$xml.= "<description>".cleantext(utf8_decode($row[descr]))."</description>\n\r";
$xml.= "<g:id>".$row[productcode]."</g:id>\n\r";
$xml.= "<g:image_link>http://www.tennesseespeedsport.com".substr($row[image_path],1)."</g:image_link>\n\r";
$xml.= "<link>http://www.tennesseespeedsport.com/product.php?productid=".$row[productid]."</link>\n\r";
$xml.= "<g:price>".$row[price]."</g:price>\n\r";
$xml.= "<g:type>Performance Auto Parts</g:type>\n\r";
$xml.= "</item>\n\r";

}





$ourFileName = "RSS_Maker/google_file_parts/googlebase_".$id.".xml";

$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");

/*
fwrite($ourFileHandle, "<?xml version=\"1.0\" encoding=\"UTF-8\" ?><rss version =\"2.0\" xmlns:g=\"http://base.google.com/ns/1.0\">");
*/

fwrite($ourFileHandle, $xml);

if(isset($master_xml)){
	$master_xml .= $xml; 
	}
else{ $master_xml = $xml; }

unset($xml);
fclose($ourFileHandle);

}

$xml_head  = "<channel>\n\r";
$xml_head .= "<title>Tennesseespeedsport.com Products</title>\n\r";
$xml_head .= "<description>Products from Tennessee Speed Sport</description>\n\r";
$xml_head .= "<link>http://www.tennesseespeedsport.com</link>\n\r";

$xml_foot = "</channel>\n\r</rss>";

if($get_xml_bodies = opendir('RSS_Maker/google_file_parts/')){
	
	while(false !== ($file = readdir($get_xml_bodies))){
		if($file !== "." && $file !== ".."){
			$file_list[] = $file;
			}
		}
}

closedir($get_xml_bodies);

sort($file_list);

$FileName = "RSS_Maker/google_assembled/googlebase_full.xml";
$FileHandle = fopen($FileName, 'w') or die("can't open file");

fwrite($FileHandle, "<?xml version=\"1.0\" encoding=\"UTF-8\" ?><rss version =\"2.0\">");

fwrite($FileHandle, $xml_head);

$path = "RSS_Maker/google_file_parts/";
foreach($file_list as $k=>$v){
	$current_file = $path.$v;
	$xml = file_get_contents($current_file);
	if(fwrite($FileHandle, $xml)){
		echo $current_file." has been processed<br>";
		}
}
fwrite($FileHandle, $xml_foot);
fclose($FileHandle);

?>