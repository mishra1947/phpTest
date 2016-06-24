<?php
session_start();
include 'config.php';
$data = json_decode(file_get_contents('php://input'));
$in_email = $data->email;
$in_pass = md5($data->pwd);
$slect = "SELECT email,username FROM backbone_login WHERE email = '" . $in_email . "' AND password = '$in_pass'";
$result = mysql_query($slect);
if ($result && mysql_num_rows($result) > 0) {
    $selectData = mysql_fetch_assoc($result);
    $username = $selectData['username'];
    $_SESSION['username'] = $username;
    setcookie('remember_me', $in_email, time()+3600);
    echo TRUE;
} else {
    echo "Please signup first";
}