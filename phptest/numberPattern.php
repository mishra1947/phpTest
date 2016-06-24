<?php
$handle = fopen("php://stdin","r");
$n = fgets($handle);
$pos = $n;
for($i=0; $i<=$n; $i++){
    for($j=0; $j<=$pos; $j++){
        echo $pos-$j;
    }
    $pos = $pos-1;
    echo "\n";    
}

//for($i=1; $i<=$n; $i++){
//    for($j=0; $j<=$n-$i; $j++){
//        echo $n-$j;
//    }
//    echo "\n";    
//}
//    