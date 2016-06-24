<?php

$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
$n = fgets($_fp);
$result = array();
for ($i = 0; $i < $n; $i++) {
    $c[] = fgets($_fp);
}
$match = str_split(trim($c[0]));
echo count($match);
die;
for ($k = 1; $k < $n; $k++) {
    $temp = array();
    $temp = str_split(trim($c[$k]));
    $result[] = array_intersect($match, $temp);
}
print_r($result);
?>