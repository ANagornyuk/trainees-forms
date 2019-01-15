<?php

require 'database_connection.php';

try {
    $insert = $conn->prepare("INSERT INTO users (FirstName, LastName, Email, Password) VALUES
                              (:fname, :lname, :email, :password)");
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $insert->execute(array(
        ':fname' => $_POST['fname'],
        ':lname' => $_POST['lname'],
        ':email' => $_POST['email'],
        ':password' => $password,
    ));
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
//print ($_POST['fname'].$_POST['lname'].$_POST['email'].$_POST['password']);
//echo "You successfully signed up!";
session_start();
$id = $conn->lastInsertId();
$_SESSION["username"] = $_POST['fname'];
$_SESSION["id"] = $id;
header('Location: ../userpage.html.php');








