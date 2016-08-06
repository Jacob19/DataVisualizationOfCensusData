<?php

/**
 * [getCsv : convert csv to array]
 * @return [type] [description]
 */
function getCsv() {
    $file = fopen("CensusVisulalization/census1.csv","r");
    while(! feof($file)) {
        
        $arr[] = fgetcsv($file);
    }
    fclose($file);
    return $arr;
}

$la_result1 = getkeyvaluepair ($file);

function getkeyvaluepair ($file) 
{
	$temp =0;
	while(! feof($file))
	  {
		echo "<pre>";
		$arr[] = fgetcsv($file);
		
		$la_result[$temp]['Age'] = $arr[$temp][0];
		$la_result[$temp]['work-class'] = $arr[$temp][1];
		$la_result[$temp]['Adhar card number'] = $arr[$temp][2];
		$la_result[$temp]['education'] = $arr[$temp][3];
		$la_result[$temp]['edu-num'] = $arr[$temp][4];
		$la_result[$temp]['maritual-status'] = $arr[$temp][5];
		$la_result[$temp]['occupation'] = $arr[$temp][6];
		$la_result[$temp]['relationship'] = $arr[$temp][7];
		$la_result[$temp]['race'] = $arr[$temp][8];
		$la_result[$temp]['sex'] = $arr[$temp][9];
		$la_result[$temp]['capital-gain'] = $arr[$temp][10];
		$la_result[$temp]['capital-loss'] = $arr[$temp][11];
		$la_result[$temp]['hr/week'] = $arr[$temp][12];
		$la_result[$temp]['country'] = $arr[$temp][13];
		$la_result[$temp]['income'] = $arr[$temp][14];
		$temp++;
	  }

	  return $la_result;
}
?>