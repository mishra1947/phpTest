<?php
include 'config.php';
$slect = "SELECT * FROM backbone";
$records = [];
$result = mysql_query($slect);
if($result && mysql_num_rows($result)>0){
   while($row = mysql_fetch_assoc($result)){ 
        $records[] = $row;
        }
   } 
echo(json_encode($records,TRUE));
