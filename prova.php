<?php
ini_set('error_reporting', E_ALL);
include 'classes.php';

$year = date('Y');
$quarter = ceil(date('m') / 3);
$q = $year.".Q".$quarter;
echo $q;
?>