<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "form";

try
{
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
    $conn->query("use $dbname");
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}