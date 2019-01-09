<?php
require 'evn_vars.php';
require 'db-conn.php';

$conn = db_conn($servername, $username, $password, $dbname, $table);
$email = $_POST['email'];
$stmt = $conn->prepare("SELECT Password FROM users WHERE Email = ? ");
$stmt->execute([$email]);
$pass = $stmt->fetch();
if ($_POST['password'] == $pass[0]){
    echo "You successfully loged in!";
} else {
    echo "Check input data";
}
//print($_POST['email'].$pass[0]);