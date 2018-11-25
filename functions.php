<?php

$langs = [
    'php',
    'python',
    'c++',
    'c',
    'java',
    'javascript',
    '.net',
    'html',
    '',
];

function find_by_location($result, $location) {
    $data = array();
    foreach ($result as $row) {
        $loc     = (isset($row['location'])) ? $row['location'] : $row['address'];
        $loctemp = preg_replace('/\s+/', '', strtolower($loc));
        $city    = preg_replace('/\s+/', '', strtolower($location));
        if (!empty($location)) {
            if (strpos($loctemp, $city) !== false) {
                $data[] = $row;
            }
        } else {
            $data[] = $row;
        }
    }
    return $data;
}

function find_by_salary($result, $salary) {
    // Salary part
    $data   = array();
    $min    = 0;
    $sorted = array();

    foreach ($result as $row) {

        $saltemp = preg_replace('/\s+/', '', strtolower($row['salary']));
        preg_match_all('([0-9]{1,3}(,[0-9]{3})*(\.[0-9]+)?|\.[0-9]+)', $saltemp, $matches); //Check for all possible matches for thousands with commas e.g. 1,000 2,000 50,000 100,000

        $sals = $matches[0];
        if (!empty($sals)) {
            $x = array();
            foreach ($sals as $sal) {
                $temp = str_replace(',', '', $sal);
                $x[]  = (int)$temp;
            }
            $bt = (int)$salary;
            if (sizeof($x) === 1) {
                if ($x[0] <= $salary) {
                    $data[]   = $row;
                    $sorted[] = $x[0];
                }
            } elseif (sizeof($x) === 2) {
                if ($bt >= $x[0] && $bt <= $x[1]) {
                    $data[]   = $row;
                    $sorted[] = $x[1];
                }
            }
        }
    }
    $final = array();
    for ($g = 0;!empty($sorted) && $g < sizeof($sorted); $g++) {
        $max_index = array_keys($sorted, max($sorted));
        $var       = $max_index[0];
        unset($sorted[$var]);
        $final[] = $data[$var];
    }
    return $final;

}
function find_by_exp($result, $exp) {
    // ([0-9]\Wyear)$|\W+
    // foreach($result as $row){
    // preg_match_all('(([0-9])*( )*\byear(s)\b)', $row['description'], $matched);
    // }
    // print_r($matched);

}
/* 
    Related terms

    Data

    Languages

    


*/