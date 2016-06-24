<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Signup Form</title>
        <link rel="shortcut icon" type="image/x-icon" href="jslibs/images.png" />
        <script type="text/javascript" src="jslibs/jquery-1.9.0.js"></script>
        <script type="text/javascript" src="jslibs/underscore-min.js"></script>
        <script type="text/javascript" src="jslibs/backbone-min.js"></script>
    </head>
    <body>
        <?php include_once 'template/signup.php'; ?>
        <div id="search_container"></div>
        <script type="text/javascript" src="js/app.js"></script>
        <script type="text/javascript" src="js/create.js"></script>
        <script type="text/javascript" src="js/list.js"></script>
        <script type="text/javascript" src="js/update.js"></script>
        <script type="text/javascript" src="js/delete.js"></script>
    </body>
    <script type="text/javascript">
        $(document).ready(function(){  
            var router = new route();
            Backbone.history.start();     
        });
    </script>
</html>


