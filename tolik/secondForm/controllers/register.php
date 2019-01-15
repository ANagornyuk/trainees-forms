<?php

class Register {

  function __construct() {
    require_once 'users.php';

    $userData["firstname"] = $_POST["firstname"];
    $userData["lastname"] = $_POST["lastname"];
    $userData["email"] = $_POST["email"];
    $userData["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT);

    if (!isset($_SESSION['user'])) {
      if (!Users::checkEmailExists($userData["email"])) {
        Users::insertIntoDatabase($userData);
        $user = Users::checkUserData($userData["email"], $userData["password"]);
        $_SESSION['user'] = $user['id'];

        require_once("./views/cabinet.php");
      } else {
        $message = "<div class='err-register'>Such email is already exist</div>";

        require_once "./views/secondForm.php";
      }
    } else {
      $message = "You are already logged";

      $id = $_SESSION['user'];
      $user = Users::getUserById($id);

      require_once("./views/cabinet.php");
    }
  }
}
