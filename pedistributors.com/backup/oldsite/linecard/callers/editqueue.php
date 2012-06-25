<?php
require("../includes/global.php");

// run authoriser
$usr->auth(1);

// call function
endcaller(editqueue($_GET["queueid"], $_POST["title"], $_POST["description"], $_POST["url"], $_POST["email"], $_POST["topicid"]));
?>