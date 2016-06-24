<?php $handle = fopen("php://stdin", "r");
$t = fgets($handle);
for($i=1; $i<=$t;$i++){
    fscanf($handle, "%d %d", $a, $b);
    $w = (floor(sqrt($b))-ceil(sqrt($a)))+1;
      echo $w ."\n";
    }
?>