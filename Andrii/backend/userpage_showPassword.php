<?php

require 'database_connection.php';

//echo "It's works!";
session_start();
$fname = $_SESSION["username"];
if(!isset($_SESSION['username'])) {
    echo "Error";
    exit();
}
$stmt = $conn->prepare("SELECT Password FROM users WHERE FirstName = ? ");
$stmt->execute([$fname]);
$select = $stmt->fetch();
$password = $select[0];
echo $select[0];