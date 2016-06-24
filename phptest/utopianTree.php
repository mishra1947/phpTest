<?php

$handle = fopen("php://stdin", "r");
fscanf($handle, "%d", $t);
for ($a0 = 0; $a0 < $t; $a0++) {
    fscanf($handle, "%d", $n);
    if ($n== 0) {
        echo 1 ."\n";
    } else if ($n % 2 != 0) {
        $h = 2;
        if ($n == 1) {
            echo $h ."\n";
        } else if ($n > 1) {
            for ($i = 3; $i <= $n; $i = $i + 2) {
                $h = ($h + 1) * 2;
            }
            echo $h ."\n";
        }
    } else if($n%2==0){
        $h=1;
        for($i=2; $i<=$n; $i = $i+2){
            $h = ($h*2)+1;
        }
        echo $h ."\n";
    }
}
?>
