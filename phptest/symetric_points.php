<?php
$handle = fopen("php://stdin", "r");
$t = fgets($handle);
for($i=0; $i<$t; $i++){
    $points = array();
    $points_temp = fgets($handle);
    $points = explode(" ", $points_temp);
    $x = ($points[2] * 2 )- $points[0];
    $y = ($points[3] * 2 )- $points[1];
    echo $x." ".$y."\n";
}
