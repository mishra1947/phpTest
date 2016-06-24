<?php
//important to check error in web page
//ini_set('display_errors',1);
//error_reporting(E_ALL);
session_start();
//connecting to server and database
include 'config.php';
$slect = "SELECT * FROM registration where username='".$_SESSION["username"]."'";
$result = mysql_query($slect);
if ($result && mysql_num_rows($result) > 0) {
    $data = mysql_fetch_assoc($result);
    $firstname = $data['first_name'];
    $lastname = $data['last_name'];
    $usernam = $data['username'];
    $email = $data['email'];
    $phone = $data['phone_number'];
    $dob = $data['date_of_birth'];
    $gender = $data['gender'];
    $address = $data['address'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>View Profile</title>
        <!---------- CSS ------------>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
            <script src="../js/jquery-1.9.0.js"></script>
<!--            <script src="../js/validation.js"></script>-->
    </head>

    <body>

        <!--BEGIN #signup-form -->
        <div id="signup-form" style="margin-top: -3px; margin-bottom: -100px">

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
                <form id="frm" action="" method="post">
                    <p>
                        <label for="firstname">First Name: <span style="font-weight:normal"><?php echo $firstname; ?> </span> </label>

                    </p>

                    <p>
                        <label for="lastname">Last Name:<span style="font-weight:normal"> <?php echo $lastname; ?></span> </label>

                    </p>

                    <p>
                        <label for="username">Username: <span style="font-weight:normal"><?php echo $usernam; ?> </span></label>

                    </p>

                    <p>

                        <label for="email">Email:<span style="font-weight:normal"> <?php echo $email; ?></span> </label>

                    </p>
                    <p>

                        <label for="phone">Phone: <span style="font-weight:normal"><?php echo $phone; ?></span></label>

                    </p>

                    <p>
                        <label for="dob">Date of birth:<span style="font-weight:normal"> <?php echo $dob; ?></span></label>

                    </p>

                    <p>
                        <label for="gender">Gender:<span style="font-weight:normal"> <?php echo $gender; ?></span></label>

                    </p>

                    <p>
                        <label for="address">Address: <span style="font-weight:normal"><?php echo $address; ?></span></label>

                    </p>

<!--                    <p>

                        <button id="submit" type="submit" >Submit</button>
                        
                    </p>-->

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
