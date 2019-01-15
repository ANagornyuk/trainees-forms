<?php

include 'users.php';

session_start();

$userData["firstname"] = $_POST["firstname"];
$userData["lastname"] = $_POST["lastname"];
$userData["email"] = $_POST["email"];
$userData["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT);

if (!$_SESSION['user']) {
  if (!checkEmailExists($userData["email"])) {
    insertIntoDatabase($userData);
    $user = checkUserData($userData["email"], $userData["password"]);
    $_SESSION['user'] = $user['id'];

    include("../views/cabinet.php");
  } else {
    $message = "Such email is already exist";

    include "../views/form.php";
  }
} else {
  $message = "You are already logged";

  $id = $_SESSION['user'];
  $user = getUserById($id);

  include("../views/cabinet.php");
}

$a = 2;
