<?php

class Login {

  function __construct() {
    require_once 'users.php';

    $login = $_POST['login'];
    $password = $_POST['password'];

    if (isset($_SESSION['user'])) {
      $user = Users::getCurrentUser();
      require_once("../views/cabinet.php");
    } else {
      $user = Users::checkUserData($login, $password);
      if ($user) {
        $_SESSION['user'] = $user['id'];

        require_once("./views/cabinet.php");
      } else {
        $message = "<div class='err-login'>You have entered the wrong login or password</div>";

        require_once './views/secondForm.php';
      }
    }
  }
}
