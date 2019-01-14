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

function showPassword($conn, $user_id){
    $stmt = $conn->prepare("SELECT Password FROM users WHERE id = ? ");
    $stmt->execute([$user_id]);
    $select = $stmt->fetch();
    $password = $select[0];
    echo $select[0];
}

function changeUserdata($conn, $user_id, $data, $col){
    $sql = "UPDATE users SET ". $col ." =? WHERE id=?";
    $conn->prepare($sql)->execute([$data, $user_id]);
    header('Location: ../userpage.html.php');
    exit();
}

if ($_GET['table_fname']){
    $dbcol = "FirstName";
    changeUserdata($conn, $user_id, $_GET['table_fname'], $dbcol);
    //echo $_GET['table_fname'];
    //exit();
}

if ($_GET['table_lname']){
    $dbcol = "LastName";
    changeUserdata($conn, $user_id, $_GET['table_lname'], $dbcol);
    //echo $_GET['table_fname'];
    //exit();
}

if ($_GET['table_email']){
    $dbcol = "Email";
    changeUserdata($conn, $user_id, $_GET['table_email'], $dbcol);
    //echo $_GET['table_fname'];
    //exit();
}

if ($_GET['showpass']){
    showPassword($conn, $user_id);
}

