<?php

require_once ('readDataFromCsv.php');
$gender = isset($_POST["gender"]) ? $_POST["gender"] : "Male";
$incomeDiffGender = array();

// $last = end(array_keys($arr));

/**
 * [getIncomeBySector : this function is responsible for getting different genders based on sectors of income]
 * @param  [String] $gender [key value for array]
 * @return [Array]
 */
function getIncomeBySector($gender) {
    $getGender = [
        'Male' => ' Male',
        'Female' => ' Female'
    ];
    $count_income0 = 0;
    $count_income1 = 0;
    $count_income2 = 0;
    $count_income3 = 0;
    $count_income4 = 0;
    $count_income5 = 0;
    $genderLevel = $getGender[$gender];

    $arr = getCsv();
    $last = key(array_slice($arr, -1, 1, TRUE));
    for ($i = 1; $i < $last; $i++) {

        if (($arr[$i][14] > 40000 && $arr[$i][14] <= 50000) && $arr[$i][1] == $sectorLevel && $arr[$i][9] == $genderLevel) {

            $count_income0++;
        }

        if (($arr[$i][14] > 50000 && $arr[$i][14] <= 60000) && $arr[$i][1] == $sectorLevel && $arr[$i][9] == $genderLevel) {

            $count_income1++;
        }

        if (($arr[$i][14] > 60001 && $arr[$i][14] <= 70000) && $arr[$i][1] == $sectorLevel && $arr[$i][9] == $genderLevel) {

            $count_income2++;
        }

        if (($arr[$i][14] > 70001 && $arr[$i][14] <= 80000) && $arr[$i][1] == $sectorLevel && $arr[$i][9] == $genderLevel) {

            $count_income3++;
        }

        if (($arr[$i][14] > 80001 && $arr[$i][14] <= 90000) && $arr[$i][1] == $sectorLevel && $arr[$i][9] == $genderLevel) {

            $count_income4++;
        }

        if (($arr[$i][14] > 90001 && $arr[$i][14] <= 100000) && $arr[$i][1] == $sectorLevel && $arr[$i][9] == $genderLevel) {

            $count_income5++;
        }
    }
    $incomeDiffSectorGender = array('Income lies between 40k to 50k' => $count_income0,
        'Income lies between 50K to 60K' => $count_income1,
        'Income lies between 60K to 70K' => $count_income2,
        'Income lies between 70K to 80K' => $count_income3,
        'Income lies between 80K to 90K' => $count_income4,
        'Income lies between 90K to 100K' => $count_income5);

    return $incomeDiffSectorGender;
}

echo(json_encode(getIncomeBySector($gender)));
?>