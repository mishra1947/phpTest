<?php
include 'config.php';
session_start();
$arr = array();
$data = json_decode(file_get_contents('php://input'));
$instruction = $data->instruction;
$sql = "UPDATE backbone_login SET userInstruction = '$instruction' WHERE userName = '" . $_SESSION["username"] . "'";
$query = mysql_query($sql, $conn);
if($query){
$session_Username = $_SESSION['username'];
$arr = array("session_Username"=>$session_Username,'instruction'=>$instruction );
echo json_encode($arr);
}else{
$session_Username = $_SESSION['username'];
$arr = array("session_Username"=>$session_Username);
echo json_encode($arr);
}