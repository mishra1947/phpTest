<?php
$_fp = fopen("php://stdin", "r");
$n = fgets($_fp);
$pattern = '/([a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z, \s]+)/';
if(preg_match($pattern, $n)){
    echo 'pangram';
}else{
    echo 'not pangram';
}
?>