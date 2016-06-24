<?php
include 'config.php';
$id = $_GET['id'];
$delete = "DELETE FROM backbone where id = $id ";
$result = mysql_query($delete);
if($result){
    echo TRUE;
}  else {
    echo FALSE;
}

