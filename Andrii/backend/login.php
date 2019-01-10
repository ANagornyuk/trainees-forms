<?php
require 'evn_vars.php';
require 'db-conn.php';

$conn = db_conn($servername, $username, $password, $dbname, $table);
$email = $_POST['email'];
$stmt = $conn->prepare("SELECT Password, FirstName FROM users WHERE Email = ? ");
$stmt->execute([$email]);
$pass = $stmt->fetch();
if (password_verify($_POST['password'], $pass[0])) {
    echo "You successfully loged in!";
    session_start();
    $_SESSION["usernane"] = $pass[1];
    print($_SESSION["usernane"]);
    header('Location: ../cabinet.html.php');
} else {
    echo "Check input data";
}
//print($_POST['email'].$pass[0]);