<?php
session_start();
include 'config.php';
if (isset($_POST['submit'])) {
    $old_pass = md5($_POST['old_password']);
    $new_pass = md5($_POST['new_password']);
    $c_new_pass = md5($_POST['confirm_new_password']);
    // validating cgange password field
    if (empty($old_pass)) {
        $old_pass_error = "Old password must be required";
    } else if (empty($new_pass)) {
        $new_pass_error = "Please enter your new password";
    } else if (!preg_match('/^[a-zA-Z0-9]+$/', $new_pass)) {
        $new_pass_error = "Password must be alphanumeric";
        echo $new_pass_error;
    } else if (empty($c_new_pass) || $new_pass !== $c_new_pass) {
        $c_new_pass_error = "Please confirm your new password";
    } else {
        // slecting password from database
        $query = "SELECT password FROM registration WHERE username='" . $_SESSION["username"] . "' AND password = '$old_pass'";
        if (mysql_query($query) && mysql_num_rows(mysql_query($query)) > 0) {
            $update_password = "UPDATE registration SET password = '$new_pass' WHERE username='" . $_SESSION["username"] . "'";
            if (mysql_query($update_password)) {
                $msg = "Password updated successfuly";
            } else {
                $msg = "Password not updated";
            }
        } else {
            $msg = "Please type right old password";
        }
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
                <b style="color: red"><?php echo $msg; ?></b>
                <form id="frm" action="" method="post">
                    <b>Change Password:</b>
                    <p>
                        <label for="old_password">Old Password</label>
                        <input id="old_password" type="password" name="old_password" style="width: 23%"  value=""/>
                        <div style="color: red"><?php echo $old_pass_error; ?></div>
                    </p>

                    <p>
                        <label for="new_password">New Password</label>
                        <input id="new_password" type="password" name="new_password" style="width: 23%"  value=""/>
                        <div style="color: red"><?php echo $new_pass_error; ?></div>
                    </p>

                    <p>
                        <label for="confirm_new_password">Confirm New Password</label>
                        <input id="confirm_new_password" type="password" name="confirm_new_password" style="width: 23%"  value=""/>
                        <div style="color: red"><?php echo $c_new_pass_error; ?></div>
                    </p>
                    <p>
                        <button id="submit" type="submit" name="submit" >Change Password</button>
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