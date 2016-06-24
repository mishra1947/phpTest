<?php

$handle = fopen("php://stdin", "r");
$t = fgets($handle);
for ($i = 0; $i < $t; $i++) {
   $n = fgets($handle);
    $Sn = $n*$n;
    echo $Sn."\n";
}

