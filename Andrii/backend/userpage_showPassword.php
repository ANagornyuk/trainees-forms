<?php

require 'database_connection.php';

session_start();
if(!isset($_SESSION['username'])) {
    echo "Error";
    exit();
} else {
    $fname = $_SESSION["username"];
}

if(!isset($_SESSION['id'])) {
    echo "Error";
    exit();
} else {
    $user_id = $_SESSION["id"];
}

function showPassword($conn, $fname){
    $stmt = $conn->prepare("SELECT Password FROM users WHERE FirstName = ? ");
    $stmt->execute([$fname]);
    $select = $stmt->fetch();
    $password = $select[0];
    echo $select[0];
}

function changeFname($conn, $user_id, $table_fname){
    $sql = "UPDATE users SET FirstName=? WHERE id=?";
    $conn->prepare($sql)->execute([$table_fname, $user_id]);
    header('Location: ../userpage.html.php');
    exit();
}

if ($_GET['table_fname']){
    changeFname($conn, $user_id, $_GET['table_fname']);
    //echo $_GET['table_fname'];
    //exit();
}

if ($_GET['showpass']){
    showPassword($conn, $fname);
}

