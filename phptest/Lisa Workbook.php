<?php
$handle = fopen("php://stdin", "r");
fscanf($handle, "%d %d",$n, $k);
$t_temp = fgets($handle);
$t = explode(" ", $t_temp);
$pages = noOfPages($k, $n, $t);
$totalPages = array_sum($pages);

function noOfPages($k, $n, $t){
    $pages = array();
for($i = 0; $i<$n; $i++){
    if($t[$i]%$k === 0){
        $pages[] = $t[$i]/$k;
    }else if ($t[$i]%$k !== 0 && $t[$i]>$k){
        $p = floor($t[$i]/$k) + 1;
        $pages[] = $p;
    } else if($t[$i]<$k){
        $pages[] = 1;
    }
}
return $pages;
}
 