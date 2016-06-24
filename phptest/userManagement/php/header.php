<?php
session_start();
include 'config.php';
$select_image = "SELECT image_name, image_path FROM registration where username='" . $_SESSION["username"] . "'";
$query = mysql_query($select_image);
if($query && mysql_num_rows($query)>0){
   $data = mysql_fetch_assoc($query);
   if (!empty($_FILES["image"]["name"])){
    $imageUrl = $data['image_path'];
}else{
    $imageUrl = '../images/profilepic.jpg';
}
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
        <script src="../js/jquery-1.9.0.js"></script>
        <script src="../js/validation.js"></script>
    </head>
    <body>
        <header>
            <img id="signup-icon" src="../images/profile.jpg" alt=""/>   
            <h1><div>
                    <span><img id="profile_icon" src="<?php echo $imageUrl;?>" alt=""/></span>
                    <span>Username:
                        <?php
                        session_start();
                        echo $_SESSION['username'];
                        ?>
                    </span>    
                    <a href="logout.php" id="logout">Log Out</a>
                </div></h1>
        </header>
</html>



