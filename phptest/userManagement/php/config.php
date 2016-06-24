<?php
$servername = "localhost";
$username = "root";
$password = "india@123";
$database = "demo";

$conn = mysql_connect($servername,$username,$password);
// Check connection

if (!$conn) {
    echo "connection not stablish";
}
$db = mysql_select_db($database);
if (!$db) {
    echo "Database not Connected";
}


