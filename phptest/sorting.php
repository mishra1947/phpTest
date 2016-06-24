<?php

$_fp = fopen("php://stdin", "r");
$v = fgets($_fp);
$n = fgets($_fp);
$arr_temp = fgets($_fp);
$arr = explode(" ", $arr_temp);
$key = in_array($v, $arr);
for ($i = 0; $i < $n; $i++) {
    if ((int)$v == $arr[$i]) {
        print_r($i);
    }
}
?>