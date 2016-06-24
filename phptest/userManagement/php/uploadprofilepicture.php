<?php
// important to check error in web page
//ini_set('display_errors',1);
//error_reporting(E_ALL);     
session_start();
include 'config.php';
$allowed_file = array("jpg", "jpeg", "png");
$upload_dir = "upload/";
// getting file name
$file_name = $_FILES["image"]["name"];
// get extention of file
$ext = substr($file_name, strrpos($file_name, '.') + 1);
$upload_file = $upload_dir .time().($_FILES["image"]["name"]);
echo $upload_file;
if (isset($_POST['submit'])) {
    if (!empty($_FILES["image"]["name"])) {
        if (file_exists($upload_file)) {
            $error_Upload = "This image is already exsits";
        } else if (!in_array($ext, $allowed_file)) {
            $error_Upload = "Image type not supported";
        } else if (($_FILES["image"]["size"]) > 500000) {
            $error_Upload = "Image size is greater than specified limit";
        }else if(move_uploaded_file($_FILES["image"]["tmp_name"], $upload_file)){
           $update_image = "UPDATE registration SET image_name = '" . $file_name . "', image_path = '" . $upload_file . "' WHERE username='" . $_SESSION["username"] . "'";
           if(mysql_query($update_image)){
               $error_Upload = "Image uploaded successfully";
           }else{
               unlink($upload_file);
               $error_Upload = "Error in image uploading";
           }
        }
    }else {
         $error_Upload = "No image chosen";
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Edit Profile</title>
        <!---------- CSS ------------>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
            <script src="../js/jquery-1.9.0.js"></script>
            <script src="../js/validation.js"></script>
    </head>

    <body>

        <!--BEGIN #signup-form -->
        <div id="signup-form">

            <!--BEGIN #subscribe-inner -->
            <div id="signup-inner">

                <div class="clearfix" id="header">
                    <?php include 'header.php'; ?>
                </div>
                <div id="menu">
                    <ul>
                        <li><a href="dashboard.php">Home</a></li>
                        <li><a href="viewprofile.php">View Profile</a></li>
                        <ul><li><a href="editprofile.php">Edit Profile</a></li>
                            <li><a href="uploadprofilepicture.php">Upload Profile Picture</a></li>
                            <li><a href="settings.php">Settings</a></li>
                        </ul>
                    </ul>
                </div>
                <b style="color: red"><?php echo $error_Upload; ?></b>
                <form id="frm" action="" method="post" enctype="multipart/form-data">
                    <p>
                        <label><div><b>Change profile picture</b></div>
                            <div><input type="file" name="image" id="image" style="width: 184px"> </div> <b>File size must be les than 2MB</b>
                        </label>
                    </p>
                    <p>
                        <button id="submit" type="submit" name="submit" >Upload image</button>
                    </p>

                </form>
                <div>
                    <?php include 'footer.php'; ?>  
                </div>

            </div>

            <!--END #signup-inner -->
        </div>

        <!--END #signup-form -->   
        </div>

    </body>
</html>