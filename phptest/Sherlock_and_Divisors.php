<?php
//
//$handle = fopen("php://stdin", "r");
//$t = fgets($handle);
//for ($i = 0; $i < $t; $i++) {
//    fscanf($handle, "%d", $number);
//    $count = number_of_even_factors($number);
//    echo $count . "\n";
//}
//
//function number_of_even_factors($number) {
//    if($number%2==0){
//    $last_digit = $number % 10;
//    $num = floor($number/10);
//    $num_even_factors = ($last_digit/2) + ($num*5);
//    }else{
//       $num_even_factors=0; 
//    }
//    return $num_even_factors;
//    
//}

$handle = fopen("php://stdin", "r");
$t = fgets($handle);
for ($i = 0; $i < $t; $i++) {
    fscanf($handle, "%d", $number);
    if ($number % 2 == 0) {
    $count = number_of_even_factors($number);
    }else{
        $count =0;
    }
    echo $count . "\n";
}

function number_of_even_factors($number) {
    $count = 0;
        for ($j = 2; $j <= $number; $j = $j + 2) {
            if ($number % $j == 0) {
                $count = $count + 1;
            }
        }
    return $count;
}