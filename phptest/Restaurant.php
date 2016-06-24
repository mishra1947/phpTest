<?php
$handle = fopen("php://stdin", "r");
$t = fgets($handle);

for($i=0; $i<$t; $i++){
    $dimensions_temp = fgets($handle);
    $dimensions = explode(" ", $dimensions_temp);
    $l = $dimensions[0];
    $b = $dimensions[1];
   $max_size = sqrs_of_max_size($l, $b);
   $max_size_sqr = ($l/$max_size)*($b/$max_size);
   echo $max_size_sqr."\n";
}

function sqrs_of_max_size($l,$b){
    // get gcd of two numbers
    while ($b != 0) {
            $t = $l % $b;
            $l = $b;
            $b = $t;
        }
        return $l;   
}