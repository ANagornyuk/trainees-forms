<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cabinet</title>
</head>
<body>
<!--    <p>Some text</p>-->
    <?php
        session_start();
        echo "hello";
        echo PHP_EOL;
        echo $_SESSION["usernane"];
    ?>
</body>
</html>