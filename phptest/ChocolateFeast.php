<?php
// $n = money in pocket
// $c = price of one chocklet
// $m = required no of wrappers for one chocklet
$handle = fopen ("php://stdin","r");
$t = fgets($handle);
for($a0 = 0; $a0 < $t; $a0++){
    fscanf($handle,"%d %d %d",$n,$c,$m);
    //no of choclate
    $noch = floor($n/$c);
    if($noch%$m==0){
        $noch = $noch + ($noch/$m);
        echo $noch . "\n";
    }else if($m>$noch){
        echo $noch . "\n";
    }else if($m<$noch){
        
        $rem = $noch%$m;
        $wrapper = floor($noch/$m);
        if(($rem+$wrapper)< $m){
            $noch = $noch+$wrapper;
            echo $noch . "\n";
        }else if(($rem+$wrapper)==$m){
            $noch = $noch+$wrapper+1;
            echo $noch . "\n";
        }else if(($rem+$wrapper)>$m){
            $noch = $noch + $wrapper + floor(($rem+$wrapper)/$m);
            echo $noch;
        }
    }
}

?>
