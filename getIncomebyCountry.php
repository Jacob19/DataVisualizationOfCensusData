<?php

require_once ('readDataFromCsv.php');
$Country = isset($_POST["Country"]) ? $_POST["Country"] : "India";
$incomeDiffCountry = array();

// $last = end(array_keys($arr));

/**
 * [getIncomeByCountry : this function is responsible for getting different Countrys of income]
 * @param  [String] $Country [key value for array]
 * @return [Array]
 */
function getIncomeByCountry($Country) {
    $getCountry = [
        'Cambodia' => ' Cambodia',
        'Cuba' => ' Cuba',
        'Greece' => ' Greece',
        'India' => ' India',
        'United-States' => ' United-States',
        'Mexico' => ' Mexico'
    ];
    $count_income0 = 0;
    $count_income1 = 0;
    $count_income2 = 0;
    $count_income3 = 0;
    $count_income4 = 0;
    $count_income5 = 0;
    $CountryLevel = $getCountry[$Country];

    $arr = getCsv();
    $last = key(array_slice($arr, -1, 1, TRUE));
    for ($i = 1; $i < $last; $i++) {

        if (($arr[$i][14] > 40000 && $arr[$i][14] <= 50000) && $arr[$i][13] == $CountryLevel) {

            $count_income0++;
        }

        if (($arr[$i][14] > 50000 && $arr[$i][14] <= 60000) && $arr[$i][13] == $CountryLevel) {

            $count_income1++;
        }

        if (($arr[$i][14] > 60001 && $arr[$i][14] <= 70000) && $arr[$i][13] == $CountryLevel) {

            $count_income2++;
        }

        if (($arr[$i][14] > 70001 && $arr[$i][14] <= 80000) && $arr[$i][13] == $CountryLevel) {

            $count_income3++;
        }

        if (($arr[$i][14] > 80001 && $arr[$i][14] <= 90000) && $arr[$i][13] == $CountryLevel) {

            $count_income4++;
        }

        if (($arr[$i][14] > 90001 && $arr[$i][14] <= 100000) && $arr[$i][13] == $CountryLevel) {

            $count_income5++;
        }
    }
    $incomeDiffCountry = array('Income lies between 40k to 50k' => $count_income0,
        'Income lies between 50K to 60K' => $count_income1,
        'Income lies between 60K to 70K' => $count_income2,
        'Income lies between 70K to 80K' => $count_income3,
        'Income lies between 80K to 90K' => $count_income4,
        'Income lies between 90K to 100K' => $count_income5);

    return $incomeDiffCountry;
}

echo(json_encode(getIncomeByCountry($Country)));
?>