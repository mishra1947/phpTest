<?php
$handle = fopen("php://stdin", "r");
fscanf($handle, "%d", $t);
for ($a0 = 0; $a0 < $t; $a0++) {
    fscanf($handle, "%d", $n);
    $z = $n;
    while ($z % 3 != 0) {
    $z = $z - 5;
    }if ($z < 0) {
            echo -1 ."\n";
        } else {
           $decent5 =  five_no($z);
           $decent3 =   three_no($n - $z);
           echo $decent5.$decent3."\n";
        }
    }


function three_no($no3s) {
    $three = '';
    for ($i = 0; $i < $no3s; $i++) {
        $three .= 3;
    }
    return $three;
}

function five_no($no5s) {
    $five = '';
    for ($i = 0; $i < $no5s; $i++) {
        $five .= 5;
    }
    return $five;
}

?>
