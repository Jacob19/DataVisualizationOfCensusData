<?php

require_once ('readDataFromCsv.php');

$arr = getCsv();
$low_income = array();
$income = array();

$last = end(array_keys($arr));

echo "<pre>";
//print_r($arr);


for ($i=1; $i < $last; $i++) { 
	
	$income[] = $arr[$i][14];
	if ($arr[$i][14] > 50000 && $arr[$i][14]<= 60000) {
		$low_income[$i]['Age'] 							= $arr[$i][0];
		$low_income[$i]['Work Class'] 			= $arr[$i][1];									
		$low_income[$i]['Aadhar'] 					= $arr[$i][2];
		$low_income[$i]['Education'] 				= $arr[$i][3];
		$low_income[$i]['Education Number'] = $arr[$i][4];
		$low_income[$i]['Marital Status'] 	= $arr[$i][5];
		$low_income[$i]['Occupation'] 			= $arr[$i][6];
		$low_income[$i]['Relationship'] 		= $arr[$i][7];
		$low_income[$i]['Race'] 						= $arr[$i][8];
		$low_income[$i]['Sex'] 							= $arr[$i][9];
		$low_income[$i]['Capital Gain'] 		= $arr[$i][10];
		$low_income[$i]['Capital Loss'] 		= $arr[$i][11];
		$low_income[$i]['Hr/Week'] 					= $arr[$i][12];
		$low_income[$i]['Country'] 					= $arr[$i][13];
		$low_income[$i]['Income'] 					= $arr[$i][14];
	}
}

// print_r($low_income);
print_r(json_encode($low_income));