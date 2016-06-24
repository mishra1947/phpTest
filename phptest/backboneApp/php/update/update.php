<?php
include '../config.php';
$id = $_GET['id'];
$data = json_decode(file_get_contents('php://input'));
$full_name = $data->full_name;
$email = $data->email;
$phone = $data->phone;
$address = $data->address;
if (!empty($full_name) && !empty($email) && !empty($phone) && !empty($address)) {
    $update = "UPDATE backbone SET full_name= '" . $full_name . "', email= '" . $email . "', phone=$phone, address='" . $address . "' WHERE id = $id";
    $query = mysql_query($update);
    if ($query) {
      echo  $msg = "Data updated successfuly";
    } else {
       echo $msg = 'Data Not updated successfuly';
    }
}