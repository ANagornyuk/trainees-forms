<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cabinet</title>
</head>
<body>
<!--    <p>Some text</p>-->
    <div>
    <?php
        session_start();
        echo "hello";
        //echo PHP_EOL;
        $fname = $_SESSION["usernane"];
        echo $fname;
        if ($fname){
            include_once 'backend/database_connection.php';
            //echo $conn;
            $stmt = $conn->prepare("SELECT * FROM users WHERE FirstName = ? ");
            $stmt->execute([$fname]);
            $select = $stmt->fetch();
            echo("<p> Hello, <span style='color: fuchsia'>" . $fname . "</span>!</p>");
            echo("<p></p>");
            foreach ($select as $key => $value) {
                echo "{$key} => {$value}"."<br />\n";
            }


        }
    ?>
    </div>
</body>
</html>