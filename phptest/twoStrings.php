<?php
$handle = fopen("php://stdin", "r");
$t = fgets($handle);
for($i=0; $i<$t; $i++){
    fscanf($handle, "%s", $a);
    fscanf($handle, "%s", $b);
    $a_A = str_split($a);
    $b_B = str_split($b);
    $result=array_intersect($a_A,$b_B);
    if(count($result)!==0){
        echo "YES"."\n";
    }else{
        echo "NO"."\n";
    }
}
