<?php
require("../includes/global.php");

// run authoriser
$usr->auth(1);

// call function
endcaller(editlink($_GET["linkid"], $_POST["title"], $_POST["description"], $_POST["url"], $_POST["priority"], $_POST["topicid"]));
?>