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
    Image varchar(255) DEFAULT NULL,
    PRIMARY KEY (ID)
    );";