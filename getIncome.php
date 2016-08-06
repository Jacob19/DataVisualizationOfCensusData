<?php

require_once ('readDataFromCsv.php');

$values = array();
$income = array();

$last = end(array_keys($arr));

echo "<pre>";
//print_r($arr);


for ($i=1; $i < $last; $i++) { 
	
	$income[] = ($arr[$i][14]);
}

print_r($income);