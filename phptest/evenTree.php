<?php
$handle = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
fscanf($handle, "%d %d",$n,$m);
for($i=0; $i<$m;$i++){
    fscanf($handle, "%d %d",$ut,$vt);
    $u[] = $ut;
    $v[] = $vt;
}
foreach ($v as $key => $value) {
    
}
?>