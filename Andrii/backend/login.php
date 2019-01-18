<?php

require '../classes/Database.php';
require 'evn_vars.php';


$database = Database::connect(DBcreditals());
$email = $_POST['email'];
$select = $database->LogIn($email);
if (password_verify($_POST['password'], $select[0])) {
    session_start();
    $_SESSION["username"] = $select[1];
    $_SESSION["id"] = $select[2];
    header('Location: ../userpage.html.php');
} else {
    echo "Check input data";
}
