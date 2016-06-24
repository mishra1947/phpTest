<?php
session_start();
include 'config.php';
$slect = "SELECT * FROM backbone_login where username='".$_SESSION["username"]."'";
$result = mysql_query($slect);
if($result && mysql_num_rows($result)>0){
    $data = mysql_fetch_assoc($result);
   echo json_encode($data);
}else {
    echo "Error in data fetching";
}