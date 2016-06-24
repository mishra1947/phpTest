<?php
//function  insertionSort($ar,$m) {
//    $e= $ar[$m-1];
//for($i=$m-2; $i>=0; $i--){
//    if($ar[$i] > $e){
//       $k = $ar[$i];
//       $ar[$i] = $e;
//        $ar[$i+1]=$k;
//        echo implode(" ", $ar) . "\n";
//    }
//}
function  insertionSort($ar,$m) {
    $e= $ar[$m-1];
for($i=$m-2; $i>=0; $i--){
    if($ar[$i] > $e){
        if($i==0 && $ar[0]>$e){
            $f = $ar[0];
            $ar[1]=$f;
            $ar[0]=$e;
            echo implode(" ", $ar) . "<br>";
        }else {
        $ar[$i+1]=$ar[$i];
        echo implode(" ", $ar) . "<br>";
        }
      } else if($ar[$i] < $e){
        $ar[$i+1] = $e;
        echo implode(" ", $ar) . "<br>";
        die;
    }else if($i == 0){
        $ar[1] = $ar[0];
        $ar[0]= $e;
        echo implode(" ", $ar);
        die;
    }
}
}
$fp = fopen("php://stdin", "r");
fscanf($fp, "%d", $m); // defines array length
$s=fgets($fp);
$ar =explode(" ", $s);
insertionSort($ar,$m);
?>