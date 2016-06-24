<?php
//$handle = fopen ("php://stdin","r");
//$n = 6; //fgets($handle);
//$pos = $n;
//first method
//for($i=1; $i<=$n; $i++){
//    for($j=1; $j<=$pos;$j++){
//         echo "";
//    }
//    for($k=1; $k<=$i; $k++){
//            echo'#';
//        }
//    echo "\n";
//    $pos = $pos-1;
//}
//second method
//$str = ' ';
//for($i=$n-1;$i>0;$i--){
//    $str[$i] = '#';
//    echo $str;
//    echo "</br>";
//}
//third method
$handle = fopen('php://stdin', 'r');
(getString(fgets($handle)));

function getString($number) {
    $a = horizonLine($number);
    for ($i = 1; $i <= $number; $i++) {
        $a[$number - $i] = '#';
        echo($a);
        echo "\n";
    }
}

function horizonLine($n) {
    $len = '';
    for ($i = 0; $i < $n; $i++) {
        $len .= ' ';
    }
    return $len;
}

?>
