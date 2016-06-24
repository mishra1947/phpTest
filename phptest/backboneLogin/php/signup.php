<?php
include 'config.php';
$data = json_decode(file_get_contents('php://input'));
$firstName = $data->firstName;
$lastName = $data->lastName;
$userName = $data->userName;
$email = $data->email;
$pwd = md5($data->pwd);
$phoneNo = $data->phoneNo;
$gender = $data->gender;
$address = $data->address;
$sql = "INSERT INTO backbone_login (firstName, lastName, userName, email, password, phoneNo, gender, address)
           VALUES ('$firstName', '$lastName', '$userName', '$email', '$pwd', '$phoneNo', '$gender', '$address')";
$query = mysql_query($sql, $conn);
if ($query) {
    echo"successfull";
} else {
    echo "Error in Data Insertion";
}
