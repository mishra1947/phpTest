<?php
$_fp = fopen("php://stdin", "r");
$t = fgets($_fp);
for($i=0; $i<$t; $i++){
    $s = trim(fgets($_fp));
    $r = trim(strrev($s));
    $a_s = array();
    $a_r = array();
    $len = strlen($r);
    for($j=0; $j< $len-1; $j++){
        $a_s[] = abs(ord($s[$j+1]) - ord($s[$j]));
        $a_r[] = abs(ord($r[$j+1]) - ord($r[$j]));
    }
    $a_ss = implode("", $a_s);
    $a_rs = implode("", $a_r);
    if(strcmp($a_ss, $a_rs)==0){
        echo "Funny"."\n";
    }else{
        echo "Not Funny"."\n";
    }
}

?>