<?php

$dir = "/mnt/web_out/";

    $mydir = opendir($dir);
    while(false !== ($file = readdir($mydir))) {
        if($file != "." && $file != "..") {
			echo $dir.$file."<br>";
            unlink($dir.$file);
        }
    }
    closedir($mydir);

?>