<?php
$handle = fopen("php://stdin", "r");
$n = fgets($handle);
for($i=1; $i<=$n; $i++){
    $str[] = fgets($handle);
}
for($j=0; $j<$n; $j++){
    if(preg_match('/^hackerrank$/',$str[$j])){
        echo 0 ."\n";
    }else if(preg_match('/^hackerrank/',$str[$j])){
        echo 1 ."\n";
    } else if(preg_match('/hackerrank$/',$str[$j])){
        echo 2 ."\n";
    }else if(preg_match('/hackerrank/',$str[$j])){
        echo -1 ."\n";
    }
}

?>