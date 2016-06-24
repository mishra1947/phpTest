<?php

$handle = fopen("php://stdin", "r");
fscanf($handle, "%d", $h);
fscanf($handle, "%d", $m);
$hour = array(
    '1' => 'one',
    '2' => 'two',
    '3' => 'three',
    '4' => 'four',
    '5' => 'five',
    '6' => 'six',
    '7' => 'seven',
    '8' => 'eight',
    '9' => 'nine',
    '10' => 'ten',
    '11' => 'eleven',
    '12' => 'twelve',
);
$minute = array(
    '1' => 'one',
    '2' => 'two',
    '3' => 'three',
    '4' => 'four',
    '5' => 'five',
    '6' => 'six',
    '7' => 'seven',
    '8' => 'eight',
    '9' => 'nine',
    '10' => 'ten',
    '11' => 'eleven',
    '12' => 'twelve',
    '13' => 'thirteen',
    '14' => 'fourteen',
    '15' => 'quarter',
    '16' => 'sixteen',
    '17' => 'seventeen',
    '18' => 'eighteen',
    '19' => 'nineteen',
    '20' => 'twenty',
    '21' => 'twenty one',
    '22' => 'twenty two',
    '23' => 'twenty three',
    '24' => 'twenty four',
    '25' => 'twenty five',
    '26' => 'twenty six',
    '27' => 'twenty seven',
    '28' => 'twenty eight',
    '29' => 'twenty nine',
);
if ($m == 00) {
    echo $hour[$h] . " o' clock";
} else if ($m == 30) {
    echo "half past " . $hour[$h];
} else if ($m > 00 && $m < 30) {
    if ($m == 15) {
        echo $minute[$m] . " past " . $hour[$h];
    } else {
        echo $minute[$m] . " minutes past " . $hour[$h];
    }
} else if ($m > 30 && $m < 60) {
    $m = 60 - $m;
    if ($m == 15) {
        echo $minute[$m] . " to " . $hour[$h + 1];
    } else {
        echo $minute[$m] . " minutes to " . $hour[$h + 1];
    }
} else if ($m == 60) {
    echo $hour[$h + 1] . " o' clock";
}
?>
