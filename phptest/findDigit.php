<?php
$handle = fopen("php://stdin", "r");
fscanf($handle, "%d", $t);
for ($a0 = 0; $a0 < $t; $a0++) {
    fscanf($handle, "%d", $n);
    $count = 0;
    $h = $n;
    for ($i = 0; $i < strlen($n); $i++) {
        $rem = $h % 10;
        $h = $h / 10;
        if ($rem == 0) {
            
        } else {
            if ($n % $rem == 0) {
                $count++;
            }
        }
    }
    echo $count . "\n";
}
?>