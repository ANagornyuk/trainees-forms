<?php

require '../classes/Database.php';
require 'evn_vars.php';


$database = Database::connect(DBcreditals());
$database->SignUp($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password']);
$uid = $database->lastInsertId();
session_start();
$_SESSION["username"] = $_POST['fname'];
$_SESSION["id"] = $uid;
header('Location: ../userpage.html.php');







