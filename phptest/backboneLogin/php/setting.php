<?php

session_start();
include 'config.php';
$data = json_decode(file_get_contents('php://input'));
$oldPwd = md5($data->oldPwd);
$newPwd = md5($data->newPwd);
$query = "SELECT password FROM backbone_login WHERE userName='" . $_SESSION["username"] . "' AND password = '$oldPwd'";
if (mysql_query($query) && mysql_num_rows(mysql_query($query)) > 0) {
    $update = "UPDATE backbone_login SET password = ' $newPwd ' WHERE userName='" . $_SESSION["username"] . "'";
    if ($query) {
        echo TRUE;
    } else {
        echo "Password not updated successfully";
    }
} else {
    echo "Please fill your correct old password";
}

