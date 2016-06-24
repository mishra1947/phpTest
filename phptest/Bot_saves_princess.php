<?php
function direction($steps,$d1, $d2){
    for($i=0; $i<$steps; $i++){
        echo $d1."\n";
    }
    for($i=0; $i<$steps; $i++){
        echo $d2."\n";
    }
}
function displayPathtoPrincess($n,$grid){
    $steps = floor($n/2);
    if($grid[0][0]==='p'){
        $d1="UP";
        $d2="LEFT";
        direction($steps, $d1, $d2);
    }else if($grid[0][$n-1]==='p'){
        $d1="UP";
        $d2="RIGHT";
        direction($steps, $d1, $d2);
    }else if($grid[$n-1][0]==='p'){
        $d1="DOWN";
        $d2="LEFT";
        direction($steps, $d1, $d2);
    }else if($grid[$n-1][$n-1]==='p'){
        $d1="DOWN";
        $d2="RIGHT";
        direction($steps, $d1, $d2);
    }
}
$fp = fopen("php://stdin", "r");

fscanf($fp, "%s", $m);

$grid = array();
for ($i=0; $i<$m; $i++) {
    fscanf($fp, "%s", $grid[$i]);
}
displayPathtoPrincess($m,$grid);

?>
