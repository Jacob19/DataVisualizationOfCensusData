<?php

/**
 * [getCsv : conver csv to array]
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