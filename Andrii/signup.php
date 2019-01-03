<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "form";

$table = "CREATE TABLE IF NOT EXISTS users (
    ID int NOT NULL AUTO_INCREMENT,
    FirstName varchar(30) NOT NULL,
    LastName varchar(30) NOT NULL,
    Email varchar(255) NOT NULL UNIQUE,
    Password varchar(255) NOT NULL,
    PRIMARY KEY (ID)
    );";

try
{
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to host successfully \n";
    $conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
    $conn->query("use $dbname");
    echo "Connected to database successfully \n";
    $conn->query($table);
    $insert = $conn->prepare("INSERT INTO users (FirstName, LastName, Email, Password) VALUES
                              (:fname, :lname, :email, :password)");
    $insert->execute(array(
        ':fname' => $_POST['fname'],
        ':lname' => $_POST['lname'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password'],
    ));
    print ($_POST['fname'].$_POST['lname'].$_POST['email'].$_POST['password']);

}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}







