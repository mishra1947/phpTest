<?php
$handle = fopen("php://stdin", "r");
$t = fgets($handle);
for ($a0 = 0; $a0 < $t; $a0++) {
    fscanf($handle, "%d %d", $n, $k);
    $a_temp = fgets($handle);
    $a = explode(" ", $a_temp);
    $i = 0;
    foreach ($a as $val) {
        if ($val <= 0) {
            $i++;
        }
    }
    if($i>=$k){
        echo 'NOT';
    }else{
        echo 'YES';
    }
}

?>