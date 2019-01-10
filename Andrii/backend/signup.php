<?php

require 'evn_vars.php';
require 'db-conn.php';

$conn = db_conn($servername, $username, $password, $dbname, $table);
$insert = $conn->prepare("INSERT INTO users (FirstName, LastName, Email, Password) VALUES
                              (:fname, :lname, :email, :password)");
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$insert->execute(array(
    ':fname' => $_POST['fname'],
    ':lname' => $_POST['lname'],
    ':email' => $_POST['email'],
    ':password' => $password,
));
//print ($_POST['fname'].$_POST['lname'].$_POST['email'].$_POST['password']);
echo "You successfully signed up!";








