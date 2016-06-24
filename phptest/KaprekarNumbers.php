<?php
$handle = fopen ("php://stdin","r");
$p = (int)fgets($handle);
$q = (int)fgets($handle);
$count = 0;
for($i=$p; $i<=$q; $i++){
    $rd = strlen($i);
    $sqr = $i*$i;
    $totalDigit=  strlen($sqr);
    $ld = $totalDigit-$rd;
    $rp = substr($sqr, $ld);
    $lp = substr($sqr,0,$ld);
    if(($rp+$lp)==$i){
        echo $i ."\n";
        $count++;
    }
}
if($count==0){
    echo "INVALID RANGE";
}
