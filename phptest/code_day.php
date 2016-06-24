<?php
$handle = fopen("php://stdin", "r");
$t = fgets($handle);
for($i=0; $i<$t; $i++){
    $s = fgets($handle);
    $eve = array();
    $odd = array();
    for($j=0; $j<strlen($s)-1; $j++){
        if($j%2===0){
            $eve[] = $s[$j];
        }else if($j%2!==0){
            $odd[] = $s[$j];
        }
    }
    $e = implode("", $eve);
    $o = implode("", $odd);
    echo $e." ".$o."\n"; 
}

?>