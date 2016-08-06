<?php

require_once ('readDataFromCsv.php');

$arr = getCsv();
$state_gov_income = array();
$income = array();

// $last = end(array_keys($arr));
$last = key(array_slice($arr, -1, 1, TRUE));
$count_state_gov1 = 0;
$count_state_gov2 = 0;
$count_state_gov3 = 0;
$count_state_gov4 = 0;
$count_state_gov5 = 0;

//print_r($arr);


for ($i=1; $i < $last; $i++) { 
	
	$income[] = $arr[$i][14];
	if (($arr[$i][14] > 50000 && $arr[$i][14] <= 60000) && $arr[$i][1] == ' State-gov') {

		$count_state_gov1++;
	}

	if (($arr[$i][14] > 60001 && $arr[$i][14] <= 70000) && $arr[$i][1] == ' State-gov') {

		$count_state_gov2++;
	}

	if (($arr[$i][14] > 70001 && $arr[$i][14] <= 80000) && $arr[$i][1] == ' State-gov') {

		$count_state_gov3++;
	}

	if (($arr[$i][14] > 80001 && $arr[$i][14] <= 90000) && $arr[$i][1] == ' State-gov') {

		$count_state_gov4++;
	}

	if (($arr[$i][14] > 90001 && $arr[$i][14] <= 100000) && $arr[$i][1] == ' State-gov') {

		$count_state_gov5++;
	}
}
$state_gov_income = array('State Government 50K to 60K' => $count_state_gov1,
													'State Government 60K to 70K' => $count_state_gov2,
													'State Government 70K to 80K' => $count_state_gov3,
													'State Government 80K to 90K' => $count_state_gov4,
													'State Government 90K to 100K' => $count_state_gov5);

// print_r($low_income);
echo(json_encode($state_gov_income));