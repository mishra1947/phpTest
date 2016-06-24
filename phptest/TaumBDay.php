<?php
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$t);
for($a0 = 0; $a0 < $t; $a0++){
    fscanf($handle,"%d %d",$b,$w);
    fscanf($handle,"%d %d %d",$x,$y,$z);
    if($x>$y && $x>($y+$z)){
        $Tprice = $w*$y + $b*($y+$z); 
        echo $Tprice . "\n";
    }else if($y>$x && $y>($x+$z)){
        $Tprice = $b*$x + $w*($x+$z);
        echo $Tprice . "\n";
    }else if(($x>=$y && $x<=($y+$z)) || ($y>=$x && $y<=($x+$z))){
        $Tprice = $b*$x + $w*$y;
        echo $Tprice . "\n";
    }
}

?>
