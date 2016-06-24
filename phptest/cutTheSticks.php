<?php

$handle = fopen("php://stdin", "r");
$n = fgets($handle);
$arr_temp = fgets($handle);
$arr = explode(" ", $arr_temp);
for ($i = 0; $i <= $n; $i++) {
    $k = count($arr);
    echo $k."\n";
    if ($k == 1) {
        break;
    }
    $smallest = min($arr);
    for ($j = 0; $j < $k; $j++) {
        $dii = ($arr[$j] - $smallest);
        $arr[$j] = $dii;
    }
    foreach (array_keys($arr, 0) as $key) {
    unset($arr[$key]);
     }
     $arr = array_values($arr);
     //print_r($arr);
}