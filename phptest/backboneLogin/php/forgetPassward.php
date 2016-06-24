<?php
include 'config.php';
$data = json_decode(file_get_contents('php://input'));
$in_email = $data->email;
$in_pass = md5($data->newPassword);
$update = "UPDATE backbone_login SET password = '$in_pass' WHERE email='" . $in_email . "'";
$query = mysql_query($update);
if($query){
    echo TRUE;
}else{
    echo "Password not updated";
}