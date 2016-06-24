<?php

$handle = fopen ("php://stdin","r");
$n = fgets($handle);
$arr_temp = fgets($handle);
$arr = explode(" ",$arr_temp);
$ip = 0;
$im = 0;
$iz = 0;
foreach($arr as $val){
    if($val==0){
        $iz++;
    }else if($val>0){
        $ip++;
    }else if($val<0){
        $im++;
    }
}
$fp = $ip/$n;
$fm = $im/$n;
$fz = $iz/$n;
echo $fp."\n";
echo $fm."\n";
echo $fz."\n";





