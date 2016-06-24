<?php
setcookie("name", "Niteesh Tiwari", time() - 60, "/", "", 0);
setcookie("age", 75, time() + 60, "/", "", 0);
?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        if (isset($_COOKIE["name"])) {
            echo $_COOKIE["name"] . "ki Umar" . $_COOKIE["age"] . "sal hai";
        } else {
            echo "not set";
        }
        ?>


    </body>
</html>
