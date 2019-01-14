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
        $uid = $_SESSION["id"];
        if(!isset($_SESSION['id'])) {
            echo "Please log in or sign up";
            exit();
        }
        $infotable = '
            <div>
                <table>
                    <tr>
                        <td>First name</td>
                        <td id="table_fname">%s</td>
                        <td id="table_fname_button"><button onclick="changeField(table_fname, table_fname_button)">Change</button></td>
                    </tr>
                    <tr>
                        <td>Last name</td>
                        <td id="table_lname">%s</td>
                        <td id="table_lname_button"><button onclick="changeField(table_lname, table_lname_button)">Change</button></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td id="table_email">%s</td>
                        <td id="table_email_button"><button onclick="changeField(table_email, table_email_button)">Change</button></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td id="table_password"><button onclick="showPassword()">Show</button></td>
                        <td id=""><a href="changePassword.html">Change</a></td>
                    </tr>
                </table>
            </div>
        ';
        //echo $fname;
        if ($uid){
            include_once 'backend/database_connection.php';
            //echo $conn;
            $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? ");
            $stmt->execute([$uid]);
            $select = $stmt->fetch();
            echo("<p> Hello, <span style='color: fuchsia'>" . $select['FirstName'] . "</span>!</p>");
//            echo("<div><table>");
//            echo("<tr><td>First name</td><td>" . $select['FirstName'] . "</td></tr>");
//            echo("<tr><td>Last name</td><td>" . $select['LastName'] . "</td></tr>");
//            echo("<tr><td>Email</td><td>" . $select['Email'] . "</td></tr>");
            echo sprintf($infotable, $select['FirstName'],  $select['LastName'], $select['Email']);
//            foreach ($select as $key => $value) {
//                echo "{$key} => {$value}"."<br />\n";
//            }


        }
    ?>
    </div>
</body>
</html>