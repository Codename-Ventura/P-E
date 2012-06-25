<?php
require("../includes/global.php");

// run authoriser
$usr->auth(1);

// call function
endcaller(deletelink($_GET["linkid"]));
?>