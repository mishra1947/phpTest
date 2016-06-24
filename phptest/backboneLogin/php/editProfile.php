<?php
session_start();
include 'config.php';
$data = json_decode(file_get_contents('php://input'));
$firstName = $data->firstName;
$lastName = $data->lastName;
$userName = $data->userName;
$email = $data->email;
$phoneNo = $data->phoneNo;
$address = $data->address;
$update = "UPDATE backbone_login SET firstName= '" . $firstName . "', lastName= '" . $lastName . "', userName= '" . $userName . "', email= '" . $email . "', phoneNo=$phoneNo, address='" . $address . "' WHERE userName = '" . $_SESSION["username"] . "'";
$query = mysql_query($update);
if ($query) {
    $_SESSION["username"] = $userName;
    echo TRUE;
} else {
   echo $msg = 'Data Not updated successfuly';
}