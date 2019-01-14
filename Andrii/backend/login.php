<?php

require 'database_connection.php';

//$conn = db_conn($servername, $username, $password, $dbname, $table);
$email = $_POST['email'];
$stmt = $conn->prepare("SELECT Password, FirstName, id FROM users WHERE Email = ? ");
$stmt->execute([$email]);
$select = $stmt->fetch();
if (password_verify($_POST['password'], $select[0])) {
    //echo "You successfully loged in!";
    session_start();
    $_SESSION["username"] = $select[1];
    $_SESSION["id"] = $select[2];
    //print($_SESSION["usernane"]);
    header('Location: ../userpage.html.php');
} else {
    echo "Check input data";
}
//print($_POST['email'].$pass[0]);