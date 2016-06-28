<?php
function direction($d){
    for($i=0; $i<1; $i++){
        echo $d;
    }
}

function nextMove($n, $m_r, $m_c, $p_row, $p_col, $grid) {
    if ($p_col < $m_c && $p_row==$m_r) {
        echo "LEFT" . "\n";
    } else if ($p_col > $m_c && $p_row==$m_r ) {
        echo "RIGHT"."\n";
    }else if ($m_r > $p_row ||$p_col==$m_c ) {
        $d = "UP";
        direction($d);
    }else if ($m_r < $p_row||$p_col==$m_c) {
        $d = "DOWN";
        direction($d);
    }
}

$fp = fopen("php://stdin", "r");

fscanf($fp, "%d", $n);
$pos = fgets($fp);
$pos = explode(" ", $pos);
$grid = array();
for ($i = 0; $i < $n; $i++) {
    fscanf($fp, "%s", $grid[$i]);
    $pos1 = strpos($grid[$i], "p");
    if ($pos1 !== FALSE) {
        $p_row = $i;
        $p_col = $pos1;
    }
}
nextMove($n, $pos[0], $pos[1], $p_row, $p_col, $grid);
?>
