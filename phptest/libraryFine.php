<?php
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d %d %d",$d1,$m1,$y1);//actual
fscanf($handle,"%d %d %d",$d2,$m2,$y2);//expected
if($y1<$y2){
    echo 0;
}else if($y1==$y2){
    if($m1<$m2 || ($m1==$m2 && $d1<=$d2)){
        echo 0;
    }else if($m1==$m2 && $d1>$d2){
        echo (15*($d1-$d2));
    }else if($m1>$m2){
        echo(500*($m1-$m2));
    }
}else if($y1>$y2){
    echo 10000;
}

?>
