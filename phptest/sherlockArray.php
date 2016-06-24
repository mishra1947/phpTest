<?php
$fp = fopen("php://stdin", "r");
$t = fgets($fp);
for($a_0=1; $a_0<=$t; $a_0++){
fscanf($fp, "%d", $n); // defines array length
$s=fgets($fp);
$ar = explode(" ", $s);
$count = 0;
for($i = 0; $i < $n; $i++){
    $ar_r = array();
    $ar_l = array();
    for($j=$i+1; $j<$n ; $j++){
        if($j<$n){
        $ar_r[]=$ar[$j];
        }else{
           $ar_r[]=0;
           die;
        }
    }
    for($k=$i-1; $k>=0; $k--){
        if($k>=0){
        $ar_l[]=$ar[$k];
        }else{
            $ar_l[]=0;
            die;
        }
    }
    if((array_sum($ar_r))== (array_sum($ar_l))){
        $count++;
    }
}
if($count>0){
    echo "YES"."\n";
}else{
    echo "NO"."\n";
}
}
