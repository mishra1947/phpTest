<?php
$_fp = fopen("php://stdin", "r");
$t = fgets($_fp);
for($i=0; $i<$t; $i++){
    $count = 0;
    $s = fgets($_fp);
    for($j=1; $j<strlen($s); $j++){
        if($s[$j] == $s[$j-1]){
            $count++;
        }
    }
      echo $count . "\n";
}
?>