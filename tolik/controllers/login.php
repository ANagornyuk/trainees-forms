<?php

include 'users.php';

session_start();

$login = $_POST['login'];
$password = $_POST['password'];

if (isset($_SESSION['user'])) {
  $user = getCurrentUser();
  include("../views/cabinet.php");
} else {
  $user = checkUserData($login, $password);
  if ($user) {
    $_SESSION['user'] = $user['id'];

    include("../views/cabinet.php");
  } else {
    $message = "You have entered the wrong login or password";

    include '../views/form.php';
  }
}
