<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Signup Form</title>
        <link rel="stylesheet" type="text/css" href="css/dashboard.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" type="image/x-icon" href="images/images.png" />
        <script type="text/javascript" src="jslibs/jquery-1.9.0.js"></script>
        <script type="text/javascript" src="jslibs/underscore-min.js"></script>
        <script type="text/javascript" src="jslibs/backbone-min.js"></script>
    </head>
    <body>
        <?php include_once 'template/signupTemplate.php'; ?>
        <?php include_once 'template/signinTemplate.php'; ?>
        <?php include_once 'template/dashboardTemplate.php'; ?>
        <div id="logIn"></div>
        <script type="text/javascript" src="js/router.js"></script>
        <script type="text/javascript" src="js/helper.js"></script>
        <script type="text/javascript" src="js/model/signup.js"></script>
        <script type="text/javascript" src="js/model/signin.js"></script>
        <script type="text/javascript" src="js/model/dashboard.js"></script>
        <script type="text/javascript" src="js/view/signupView.js"></script>
        <script type="text/javascript" src="js/view/signinView.js"></script>
        <script type="text/javascript" src="js/view/dashboardView.js"></script>
    </body>
    <script type="text/javascript">
        $(document).ready(function(){  
            var router = new App.routers.route();
            Backbone.history.start(); 
        });
    </script>
</html>


