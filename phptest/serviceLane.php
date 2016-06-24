<?php
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d %d",$n,$t);
$width_temp = fgets($handle);
$width = explode(" ",$width_temp);
array_walk($width,'intval');
for($a0 = 0; $a0 < $t; $a0++){
    $vehicle_type = array();
    fscanf($handle,"%d %d",$i,$j);
    for($k=$i; $k<=$j; $k++){
     $vehicle_type[]=$width[$k];
    }
    echo trim(min($vehicle_type))."\n";
}

?>
