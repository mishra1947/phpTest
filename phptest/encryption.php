<?php
$handle = fopen ("php://stdin","r");
fscanf($handle,"%s",$s);
$l = strlen($s);
$row = floor(sqrt($l));
$col= ceil(sqrt($l));
if(($col*$row)>=$l){
    $data = Encryption($col, $row,$s);
}else{
    $row = $col;
    $data = Encryption($col, $row,$s);
}
print_r(implode(" ", $data));
function Encryption($col,$row,$s){
    $final = array();
     for($i=0;$i<$col;$i++){
        $enc = array();
        $enc[]=$s[$i];
        $grid = $i+$col;
        for($j=0;$j<$row-1;$j++){
            $enc[]=$s[$grid];
            $grid = $grid+$col;
        }
        $final[]= implode("", $enc);
    }
    return $final;
}

?>
