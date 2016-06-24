<?php
$handle = fopen("php://stdin", "r");
$t = fgets($handle);
for($i=0; $i<$t; $i++){
    $m = fgets($handle);
    $n = fgets($handle);
    $c_tmp = fgets($handle);
    $c= explode(" ", $c_tmp);
    for($j=0; $j<$n; $j++){
        for($k=$j+1; $k<$n; $k++){
            if(($c[$j]+$c[$k])==$m){
                echo ($j+1)." ".($k+1)."\n";
                break;
            }
        }
    }
    
}

