<?php

function next_move($_y, $_x, $b) {
    foreach ($b AS $y => $l) {
        foreach (str_split(trim($l)) AS $x => $p) {
            if ($p == 'd') {
                if ($_x < $x) {
                    $a = 'RIGHT';
                } else if ($_x > $x) {
                    $a = 'LEFT';
                } else if ($_y < $y) {
                    $a = 'DOWN';
                } else if ($_y > $y) {
                    $a = 'UP';
                } else {
                    $a = 'CLEAN';
                }
                $dirt[(abs($x - $_x) + abs($y - $_y))] = $a;
            }
        }
    }

    ksort($dirt);
    echo current($dirt);
}

$fp = fopen("php://stdin", "r");

$temp = fgets($fp);              //moves made by the second player
$position = explode(' ', $temp);

$board = array();

for ($i = 0; $i < 5; $i++) {
    fscanf($fp, "%s", $board[$i]);
}

next_move($position[0], $position[1], $board);
?>
