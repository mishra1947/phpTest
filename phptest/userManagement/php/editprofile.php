<?php
session_start();
include 'config.php';
$slect = "SELECT * FROM registration where username='" . $_SESSION["username"] . "'";
$result = mysql_query($slect);
if ($result && mysql_num_rows($result) > 0) {
    $data = mysql_fetch_assoc($result);
    $firstname = $data['first_name'];
    $lastname = $data['last_name'];
    $usernam = $data['username'];
    $em = $data['email'];
    $ph = $data['phone_number'];
    $dob = $data['date_of_birth'];
    $gen = $data['gender'];
    $add = $data['address'];
    //exploding date of birth string
    $dateOfBirth = explode(' ', $data['date_of_birth']);
    $day = $dateOfBirth[0];
    $month = $dateOfBirth[1];
    $year = $dateOfBirth[2];
}
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $DOB = $_POST['day'] . ' ' . $_POST['month'] . ',' . $_POST['year'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $update = "UPDATE registration SET first_name= '" . $fname . "', last_name= '" . $lname . "', username= '" . $uname . "', email= '" . $email . "', phone_number=$phone, date_of_birth='" . $DOB . "', gender='" . $gender . "', address='" . $address . "' WHERE username = '" . $_SESSION["username"] . "'";
    $query = mysql_query($update);
    if ($query) {
        $_SESSION["username"] = $uname;
        $msg = "Data updated successfuly";
    } else {
        $msg = 'Data Not updated successfuly';
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
                    <p>
                        <label for="firstname">First Name</label>
                        <input id="fname" type="text" name="fname" style="width: 23%" value="<?php echo $firstname; ?>"/>
                    </p>

                    <p>
                        <label for="lastname">Last Name</label>
                        <input id="lname" type="text" name="lname" style="width: 23%" value="<?php echo $lastname; ?>" />
                    </p>

                    <p>
                        <label for="username">Username</span></label>
                        <input id="uname" type="text" name="uname" style="width: 23%" value="<?php echo $usernam; ?>" />
                    </p>

                    <p>
                        <label for="email">Email</label>
                        <input id="email" type="text" name="email" style="width: 23%" value="<?php echo $em; ?>"/>
                    </p>
                    <p>
                        <label for="phone">Phone</label>
                        <input id="phone" type="text" name="phone" maxlength="10" style="width: 23%" value="<?php echo $ph; ?>" />
                    </p>

                    <p>
                        <label for="dob">Date of birth</label>
                        <select id="year" name="year">
                            <option value="">Year</option>
                            <script language="javascript">
                                for (var i = 1960; i < 2020; i++) {
                                    document.write("<option value=\"" + i + "\">" + i + "</option>\n");
                                }
                            </script>
                        </select>

                        <select id="month" name="month">
                            <option value="">Month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>

                        <select id="day" name="day">
                            <option value="">Day</option>
                            <script language="javascript">
                                for (var i = 1; i <= 31; i++) {
                                    if (i < 10) {
                                        i = "0" + i;
                                    }
                                    document.write("<option value=\"" + i + "\">" + i + "</option>\n");

                                }
                            </script>
                        </select>
                    </p>

                    <p>
                        <label for="gender">Gender</label>
                        <span><input type="radio" name="gender" value="male" id="gender" >Male</span>
                        <span><input type="radio" name="gender" value="female" id="gender">Female</span>                        
                    </p>

                    <p>
                        <label for="address">Address</label>
                        <textarea name="address" id="address" cols="05" rows="05" style="width: 23%" maxlength="200"><?php echo $add; ?></textarea>
                        <div id="counter"></div>
                    </p>

                    <p>
                        <button id="submit" type="submit" name="submit" >Update</button>
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
