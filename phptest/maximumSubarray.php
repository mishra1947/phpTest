<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
$t = fgets($_fp);
for($i=0; $i<$t; $i++){
    $n = fgets($_fp);
    $arr_temp = fgets($_fp);
    $arr = explode(" ", $arr_temp);
    $pos_arr=array(); $neg_arr=array();
 foreach ($arr as $val){
     ($val<0) ?  $neg_arr[]=$val : $pos_arr[]=$val;
 }
 if(count($neg_arr)==0){
    $sum = array_sum($pos_arr);
     echo $sum . " " . $sum . "\n";
 }else if((count($neg_arr)!=0 )&& (count($pos_arr)!=0)){
     $neg= array();
     $sum = array_sum($pos_arr);
     for($k=0; $k<count($neg_arr); $k++){
         $neg[] = $sum+$neg_arr[$k];
     }
     echo abs(max($neg)) ." " . $sum . "\n";
 }else if(count($pos_arr)==0){
     $neg1 = array();
     for($j=0; $j<count($neg_arr); $j++){
         $neg1[]= abs($neg_arr[$j]);
     }
     echo -(min($neg1)) . " " . -(min($neg1)) . "\n";
 }
}
?>