<?php
include 'config.php';
if (isset($_POST)) {
    $signup_email = $_POST['email'];
}
$find = "SELECT email FROM backbone_login WHERE email = '" . $signup_email . "'";
$result = mysql_query($find);
if ($result && mysql_num_rows($result) > 0) {
   echo json_encode(array('data'=>'failure','msg'=>'This email id already exist.'));
} else {
   echo json_encode(array('data'=>'success'));
}