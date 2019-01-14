<?php

function db_conn($servername, $username, $password, $dbname, $table)
{
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
    return $conn;
}