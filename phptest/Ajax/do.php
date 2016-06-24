<?php
$n =6;
$pos = $n;
for($i=0; $i<=$n; $i++){
    for($j=0; $j<=$pos; $j++){
        echo $pos-$j;
    }
    $pos = $pos-1;
    echo "\n";    
}
