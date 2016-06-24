<?php

$handle = fopen("php://stdin", "r");
$n = fgets($handle);
$a_temp = fgets($handle);
$b = explode(" ", $a_temp);
$q = fgets($handle);
for ($i = 0; $i < $q; $i++) {
    $query_temp = fgets($handle);
    $query = explode(" ", $query_temp);
    $x = $query[0];
    $y = $query[1];
    find($x, $y);
//    echo $ans;die;
//    if ($ans % 2 == 0) {
//        echo "Even" . "\n";
//    } else {
//        echo "Odd" . "\n";
//    }
}

function find($x, $y) {
    global $b;
    for($i=0; $i< count($b); $i++){
        $a[$i+1] = $b[$i];
    }
    if ($x > $y) {
       echo "Odd" . "\n";
    } else if ($a[$x] == 0 && $a[$x + 1] != 0) {
        echo "Even" . "\n";
    } else if ($a[$x + 1] == 0) {
        echo "Odd" . "\n";
    } else if ($a[$x + 1] != 0) {
        if($a[$x]%2==0){
            echo "Even" . "\n";
        }else{
            echo "Odd" . "\n";
        }
    }
}

?>