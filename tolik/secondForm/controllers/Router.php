<?php

class Router {

  public function run() {
    if ($_SESSION) {
      require_once('./models/UUsers.php');
      $user = Users::getCurrentUser();
      if (isset($_POST['edit'])) {
        require_once('edit.php');
        $edit = new Edit();
        $edit->editUser($user);
      } elseif (isset($_POST['logout'])) {
        require_once('logout.php');
        $logout = new Logout();
      } else {
        require_once('./views/cabinet.php');
      }
    } else {
      if (isset($_POST['login-button'])) {
        require_once('login.php');
        $login = new Login();
      } elseif (isset($_POST['register-button'])) {
        require_once('register.php');
        $register = new Register();
      } else {
        require_once('./views/secondForm.php');
      }
    }
  }
}
