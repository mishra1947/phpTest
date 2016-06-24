
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
<!--        <script src="../js/validation.js"></script>-->
    </head>
    <body>
        <div id="signup-form">
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
                <div>
                    <form id="send" action="" method="post">
                        <p>
                            <label> Write Something:</label>
                            <textarea name="address" id="address" cols="05" rows="05" maxlength="200"></textarea>
                            <br>
                            <label><b>Upload image</b>
                                <input type="file" name="image" id="image" width="10%">
                            </label>
                        </p>
                    </form>
                </div>
                <div>
                   <?php include 'footer.php'; ?>  
                </div>
            </div>
        </div>
    </body>
</html>

