<?php
$handle = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
$t = fgets($handle);
for($i= 0; $i<$t; $i++){   
    $numberOfHandsake = 0;
    $boarMembers = fgets($handle);
    for($j=1; $j<$boarMembers; $j++){
        $numberOfHandsake = $numberOfHandsake + $j;
    }
    echo $numberOfHandsake."\n";
}
?>