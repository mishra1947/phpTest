<?php

$handle = fopen("php://stdin", "r");
fscanf($handle, "%d", $n);
fscanf($handle, "%s", $s);
fscanf($handle, "%d", $k);
for ($i = 0; $i < $n; $i++) {
    $ascii = ord($s[$i]);
    //echo $ascii . "\n";
    if (($ascii >= 32 && $ascii <= 64)|| ($ascii >= 91 && $ascii <= 96) || ($ascii >= 123 && $ascii <= 126)) {
        $fchar[] = chr($ascii);
    } else if (($ascii >= 65 && $ascii <= 90)){
        caesar(65,90);
    }else if (($ascii >= 97 && $ascii <= 122)){
        caesar(97, 122);
    }
}
$encrypt = implode("", $fchar);
echo $encrypt;


function caesar($l,$m){
    global $ascii,$k,$fchar;
    if($k>26){
            $rem = $k%26;
            $ascii = $ascii+$rem;
            if($ascii>$m){
                $ascii = $ascii - $m;
                $ascii = $l + $ascii - 1;
                $fchar[] = chr($ascii);
            }else{
                $fchar[] = chr($ascii);
            }
        }else{
           $ascii = $ascii+$k;
            if($ascii>$m){
                $ascii = $ascii - $m;
                $ascii = $l + $ascii - 1;
                $fchar[] = chr($ascii);
            }else{
                $fchar[] = chr($ascii);
            } 
        }
        return $fchar;
}
?>
