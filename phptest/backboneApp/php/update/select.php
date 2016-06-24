<?php
include '../config.php';
$id = $_GET['id'];
$slect = "SELECT * FROM backbone where id = $id ";
$result = mysql_query($slect);
if ($result && mysql_num_rows($result) > 0) {
    $row = mysql_fetch_assoc($result);
    echo (json_encode($row));
} else {
    echo "Error in data fetching";
}
