<?php

/**
 * [getCsv : conver csv to array]
 * @return [type] [description]
 */
function getCsv() {
    $file = fopen("CensusVisulalization/census1.csv","r");
    while(! feof($file)) {
        echo "<pre>";
        $arr[] = fgetcsv($file);
    }
    echo json_encode($arr);
    fclose($file);
    return $arr;
}

getCsv();