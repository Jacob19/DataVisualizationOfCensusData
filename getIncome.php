<?php

require_once ('readDataFromCsv.php');
$sector = isset($_POST["sector"])?$_POST["sector"]:"";
$incomeDiffSector = array();

// $last = end(array_keys($arr));
$arr = getCsv();
$last = key(array_slice($arr, -1, 1, TRUE));

$count_state_gov1 = 0;
$count_state_gov2 = 0;
$count_state_gov3 = 0;
$count_state_gov4 = 0;
$count_state_gov5 = 0;

/**
 * [getIncomeBySector : this function is responsible for getting different sectors of income]
 * @param  [String] $sector [key value for array]
 * @param  [Size of array] $last
 * @param  [Array] $arr
 * @return [Array]
 */
function getIncomeBySector($sector, $last, $arr) {

    for ($i=1; $i < $last; $i++) {
        if (($arr[$i][14] > 50000 && $arr[$i][14] <= 60000) && $arr[$i][1] == $sector) {

            $count_state_gov1++;

        }

        if (($arr[$i][14] > 60001 && $arr[$i][14] <= 70000) && $arr[$i][1] == $sector) {

            $count_state_gov2++;
        }

        if (($arr[$i][14] > 70001 && $arr[$i][14] <= 80000) && $arr[$i][1] == $sector) {

            $count_state_gov3++;
        }

        if (($arr[$i][14] > 80001 && $arr[$i][14] <= 90000) && $arr[$i][1] == $sector) {

            $count_state_gov4++;
        }

        if (($arr[$i][14] > 90001 && $arr[$i][14] <= 100000) && $arr[$i][1] == $sector) {

            $count_state_gov5++;
        }

    }
    $incomeDiffSector = array('Income lie between 50K to 60K' => $count_state_gov1,
                            'Income lie between 60K to 70K' => $count_state_gov2,
                            'Income lie between 70K to 80K' => $count_state_gov3,
                            'Income lie between 80K to 90K' => $count_state_gov4,
                            'Income lie between 90K to 100K' => $count_state_gov5);

    return $incomeDiffSector;
}
echo(json_encode(getIncomeBySector($sector, $last , $arr)));