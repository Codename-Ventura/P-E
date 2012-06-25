<?php

function get_random_image($path_to_files){
	if($handle = opendir($path_to_files)){
		while(false !== ($file = readdir($handle))){
			if ($file != "." && $file != ".." && $file != "Thumbs.db") {
				$files[] = $file;
				}
			}
			closedir($handle);
		}

$random_image = array_rand($files);
$random_image = "<img src=\"".$path_to_files.$files[$random_image]."\">";
return $random_image;


}
?>