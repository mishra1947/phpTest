<?php

$handle = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
fscanf($handle, "%d %d", $r, $c);
$first_value_of_row = first_value($r);
$final_result = $first_value_of_row + 2 * ($c - 1);
echo $final_result;

function first_value($r) {
    if($r%2==0){
        $first_value_of_row = 1 + 10*(($r/2)-1);
    }else if($r%2!=0){
       $first_value_of_row  = 10*( ( ($r+1)/2 )-1 );
    }

    return $first_value_of_row;
}



//same but time taking
//function first_value($r) {
//    $first_value_of_row = 0;
//    for ($i = 1; $i < $r; $i++) {
//        if ($first_value_of_row % 2 == 0) {
//            $first_value_of_row = $first_value_of_row + 1;
//        } else if ($first_value_of_row % 2 != 0) {
//            $first_value_of_row = $first_value_of_row + 9;
//        }
//    }
//
//    return $first_value_of_row;
//}
