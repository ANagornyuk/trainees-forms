<?php

require 'database_connection.php';

session_start();
if(!isset($_SESSION['id'])) {
    echo "Please log in or sign up";
    exit();
} else {
    $uid = $_SESSION["id"];
}
$pass = $_POST['password'];
$select= "SELECT Password FROM users WHERE id = ? ";
$update = "UPDATE users SET Password = :password WHERE id= :id";
$stmt = $conn->prepare($select);
$stmt->execute([$uid]);
$sel = $stmt->fetch();
if (password_verify($pass, $sel[Password])) {
    if ($_POST['newpass'] == $_POST['newpasscfm']){
        $updt = $conn->prepare($update);
        $updt->execute(array(
            ':password' => password_hash($_POST['newpass'], PASSWORD_DEFAULT ),
            ':id' => $uid
        ));
        header('Location: ../userpage.html.php');
    } else {
        echo "New passwords don't match";
    }
} else {
    echo "Password is not correct.";
}
