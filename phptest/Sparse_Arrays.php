<?php

$handle = fopen("php://stdin", "r");
$n = fgets($handle);
for ($i = 0; $i < $n; $i++) {
    fscanf($handle, "%s", $s);
    $s_arr[] = $s;
}
$q = fgets($handle);
for ($j = 0; $j < $q; $j++) {
    fscanf($handle, "%s", $query);
    $count = 0;
    for ($i_1 = 0; $i_1 < $n; $i_1++) {
        if ($query === $s_arr[$i_1]) {
            $count = $count + 1;
        }
    }
     $occurence[] = $count;
}

foreach ($occurence as $value){
    echo $value."\n";
}
?>