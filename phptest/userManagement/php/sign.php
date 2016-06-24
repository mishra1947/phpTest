<?php
session_start();
include 'config.php';
if (isset($_POST)) {
    $in_email = $_POST['email'];
    $in_pass = md5($_POST['password']);
}
//echo $in_pass;die;
$slect = "SELECT email,username FROM registration WHERE email = '" . $in_email . "' AND password = '$in_pass'";
$result = mysql_query($slect);
if ($result && mysql_num_rows($result) > 0) {
    $data = mysql_fetch_assoc($result);
    $username = $data['username'];
    //echo $username; die;
    $_SESSION['username'] = $username;
    setcookie('remember_me', $in_email, time()+3600);
    header('location:dashboard.php');
    //echo 'The following email is already in use: ' . $in_email;
} else {
    $msg = 'Please sign up first';
}
//if($_POST['remember']){
//    setcookie('remember_me', $in_email, time()+3600);
//}

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sign In Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <script src="../js/jquery-1.9.0.js"></script>
        <script src="../js/validation.js"></script>
    </head>
    <body>
        <div id="signup-form">
            <div id="signup-inner">
                <div class="clearfix" id="header">
                    <img id="signup-icon" src="../images/signup.png" alt=""/>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                    <h1>User Sign In Form</h1>
                </div>
                
                <form id="send" action="" method="post">
                    <b style="color: red"><?php echo $msg; ?> </b>
                    <p>

                        <label for="email">Email <span style="color: red">*</span></label>
                        <input id="email" type="text" name="email" value="<?php echo $_COOKIE['remember_me']?>"/>
                    <div id="email_error" style="color: red"></div>
                    <!--                    </p>-->
                    <p>
                        <label for="password">Password <span style="color: red">*</span></label>
                        <input id="logInPassword" type="password" name="password" value=""/>
                    <div id="logInPassword_error" style="color: red"></div>
                    <input type="checkbox" id="check" name="remember" value="1" style="width: 3%"/><b>Remember me</b>
                    <!--</p>-->

                    <p>
                        <button id="submit" type="submit">Submit</button>
                        <a href="#">Forget password</a> |
                        <a href="../index.html">New user register here</a>
                        <!--                    </p>-->

                </form>
            </div>
        </div>
    </body>
</html>
