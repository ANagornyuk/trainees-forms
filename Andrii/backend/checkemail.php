<?php


require 'evn_vars.php';
try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected to host successfully \n";
    $conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
    $conn->query("use $dbname");
    //echo "Connected to database successfully \n";
    $conn->query($table);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$select = $conn->query("SELECT Email FROM users;")->fetchAll();
foreach ($select as $row) {
    //echo $row[0]."\n";
    if ($row[0] == $_GET['email']) {
        echo "This e-mail has been already registered";
    }
}
