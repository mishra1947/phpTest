<?php
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);
$fact= 1;
for($i=1; $i<=$n; $i++){
    $fact = $fact*$i;
}
echo $fact;
?>
