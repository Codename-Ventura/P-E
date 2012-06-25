<?php
include('../includes/func.php');
include('../includes/controllers/index.php');
include('../includes/controllers/search.php');

$test = $search->checkDB('edl2101');

echo "<pre>";
print_r(get_defined_vars());
echo "</pre>";
?>

