<?php
include 'config.php';
$data = json_decode(file_get_contents('php://input'));
$full_name = $data->full_name;
 $email = $data->email;
$phone = $data->phone;
$address = $data->address;
 if (!empty($full_name) && !empty($email) && !empty($phone) && !empty($address)){ 
$sql = "INSERT INTO backbone (full_name, email, phone, address)
           VALUES ('$full_name', '$email', '$phone', '$address')";
$query = mysql_query($sql, $conn);
        if ($query) {
            echo"successfull";
        } else {
            echo "Error in Data Insertion";
        }
 }else{
     echo 'Required field must be filled';
 }
 
