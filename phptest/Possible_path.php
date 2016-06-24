<?php

$handle = fopen("php://stdin", "r");
$t = fgets($handle);

for ($i = 0; $i < $t; $i++) {
    $points_temp = fgets($handle);
    $points = explode(" ", $points_temp);
    
    $p_gcd = gcd($points[0], $points[1]);
    $q_gcd = gcd($points[2], $points[3]);
    if($p_gcd==$q_gcd){
        echo "YES"."\n";
    }else {
        echo "NO"."\n";
    }
}

function gcd($num1, $num2) {
    // $num2 must be less than or equal to $num1
    if ($num1 >= $num2) {
        while ($num2 != 0) {
            $t = $num1 % $num2;
            $num1 = $num2;
            $num2 = $t;
        }
        return $num1;
    } else {
        while ($num1 != 0) {
            $t = $num2 % $num1;
            $num2 = $num1;
            $num1 = $t;
        }
        return $num2;
    }
}
