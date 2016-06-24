<?php

include 'config.php';
//insert data
if (isset($_POST)) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $phone = $_POST['phone'];
    $DOB = $_POST['day'] . ' ' . $_POST['month'] . ' ' . $_POST['year'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    if (!empty($fname) && !empty($lname) && !empty($uname) && !empty($email) && !empty($pass) && !empty($phone) && !empty($DOB) && !empty($gender) && !empty($address)) {
        echo $sql = "INSERT INTO registration (first_name, last_name, username, email, password, phone_number, date_of_birth, gender, address)
           VALUES ('$fname', '$lname', '$uname', '$email', '$pass', '$phone', '$DOB', '$gender', '$address')";
        $query = mysql_query($sql, $conn);
        if ($query) {
            //echo "Data Inserted Successfully";
            header('location: sign.php');
        } else {
            echo "Error in Data Insertion";
        }
    }else{
        echo "All field must be required";
    }
}
mysql_close($conn);


