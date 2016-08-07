<?php

require_once ('readDataFromCsv.php');
$sector = isset($_POST["sector"]) ? $_POST["sector"] : "State Government";
$incomeDiffSector = array();

// $last = end(array_keys($arr));

/**
 * [getIncomeBySector : this function is responsible for getting different sectors of income]
 * @param  [String] $sector [key value for array]
 * @return [Array]
 */
function getIncomeBySector($sector) {
    $getSector = [
        'State Government' => " State-gov",
        'Self Employed Not Inc' => ' Self-emp-not-inc',
        'Private' => ' Private',
        'Never Worked' => ' Never-worked',
        'Self Employed Inc' => ' Self-emp-inc',
        'Federal Government' => ' Federal-gov'
    ];
    $count_income0 = 0;
    $count_income1 = 0;
    $count_income2 = 0;
    $count_income3 = 0;
    $count_income4 = 0;
    $count_income5 = 0;
	$masters_50to60=0;
	$masters_60to70 =0;
	$masters_70to80 =0;
	$masters_80to90 =0;
	$masters_90to100 =0;
	$Bachelors_50to60=0;
	$Bachelors_60to70 =0;
	$Bachelors_70to80 =0;
	$Bachelors_80to90 =0;
	$Bachelors_90to100 =0;



    $sectorLevel = $getSector[$sector];

    $arr = getCsv();
    $last = key(array_slice($arr, -1, 1, TRUE));
    for ($i = 1; $i < $last; $i++) {

        if (($arr[$i][14] > 40000 && $arr[$i][14] <= 50000) && $arr[$i][1] == $sectorLevel) {

            $count_income0++;
        }

        if (($arr[$i][14] > 50000 && $arr[$i][14] <= 60000) && $arr[$i][1] == $sectorLevel) {

            $count_income1++;
			//echo $arr[$i][3];
			if ($arr[$i][3] ==' Masters')
				$masters_50to60++;

			if ($arr[$i][3] ==' Bachelors'){
				$Bachelors_50to60++;
				 
			}
				 
			

        }

        if (($arr[$i][14] > 60001 && $arr[$i][14] <= 70000) && $arr[$i][1] == $sectorLevel) {

            $count_income2++;
			if ($arr[$i][3] ==' Masters')
				$masters_60to70++;

			if ($arr[$i][3] ==' Bachelors'){
				$Bachelors_60to70++;
				 
			}
        }

        if (($arr[$i][14] > 70001 && $arr[$i][14] <= 80000) && $arr[$i][1] == $sectorLevel) {

            $count_income3++;
			if ($arr[$i][3] ==' Masters')
				$masters_70to80++;

			if ($arr[$i][3] ==' Bachelors'){
				$Bachelors_70to80++;
				 
			}
        }

        if (($arr[$i][14] > 80001 && $arr[$i][14] <= 90000) && $arr[$i][1] == $sectorLevel) {

            $count_income4++;
			if ($arr[$i][3] ==' Masters')
				$masters_80to90++;

			if ($arr[$i][3] ==' Bachelors'){
				$Bachelors_80to90++;
				 
			}
        }

        if (($arr[$i][14] > 90001 && $arr[$i][14] <= 100000) && $arr[$i][1] == $sectorLevel) {

            $count_income5++;
			if ($arr[$i][3] ==' Masters')
				$masters_90to100++;

			if ($arr[$i][3] ==' Bachelors'){
				$Bachelors_90to100++;
				 
			}
        }
    }
    $incomeDiffSector = array(
      /*'Income lies between 50K to 60K' => $count_income1,
        'Income lies between 60K to 70K' => $count_income2,
        'Income lies between 70K to 80K' => $count_income3,
        'Income lies between 80K to 90K' => $count_income4,
        'Income lies between 90K to 100K' => $count_income5,*/
		'label'=>array('Income lies between 50K to 60K' ,
					   'Income lies between 60K to 70K' ,
					   'Income lies between 70K to 80K' ,
					   'Income lies between 80K to 90K' ,
					   'Income lies between 90K to 100K'),
		'master'=>array($masters_50to60,$masters_60to70,$masters_70to80,$masters_80to90,$masters_90to100),
		'bachelors'=>array($Bachelors_50to60,$Bachelors_60to70,$Bachelors_70to80,$Bachelors_80to90,$Bachelors_90to100),

		);

    return $incomeDiffSector;
}

echo(json_encode(getIncomeBySector($sector)));
?>