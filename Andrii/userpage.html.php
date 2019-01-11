<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User page</title>
    <script src="scripts/userpage.js"></script>
</head>
<body>
<!--    <p>Some text</p>-->
    <div>
    <?php
        session_start();
        //echo "hello";
        //echo PHP_EOL;
        $fname = $_SESSION["username"];
        if(!isset($_SESSION['username'])) {
            echo "Please log in or sign up";
            exit();
        }
        $infotable = '
            <div>
                <table>
                    <tr><td>First name</td><td>%s</td></tr>
                    <tr><td>Last name</td><td>%s</td></tr>
                    <tr><td>Email</td><td>%s</td></tr>
                    <tr><td>Password</td><td id="psw"><button onclick="showPassword()">Show</button></td></tr>
                </table>
            </div>
        ';
        //echo $fname;
        if ($fname){
            include_once 'backend/database_connection.php';
            //echo $conn;
            $stmt = $conn->prepare("SELECT * FROM users WHERE FirstName = ? ");
            $stmt->execute([$fname]);
            $select = $stmt->fetch();
            echo("<p> Hello, <span style='color: fuchsia'>" . $fname . "</span>!</p>");
//            echo("<div><table>");
//            echo("<tr><td>First name</td><td>" . $select['FirstName'] . "</td></tr>");
//            echo("<tr><td>Last name</td><td>" . $select['LastName'] . "</td></tr>");
//            echo("<tr><td>Email</td><td>" . $select['Email'] . "</td></tr>");
            echo sprintf($infotable, $select['FirstName'], $select['LastName'], $select['Email'], $fname);
//            foreach ($select as $key => $value) {
//                echo "{$key} => {$value}"."<br />\n";
//            }


        }
    ?>
    </div>
</body>
</html>