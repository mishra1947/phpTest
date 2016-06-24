<?php

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);
$a = array();
for($i = 0; $i < $n; $i++) {
   $a_temp = fgets($handle);
   $a[] = explode(" ",$a_temp); 
   $f[] = $a[$i][$i];
   $s[] = $a[$i][$n-$i-1];
}
$ad = array_sum($f) - array_sum($s);
echo abs($ad);
?>
