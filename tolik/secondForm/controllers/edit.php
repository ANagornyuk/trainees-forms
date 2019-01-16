<?php

class Edit {

  public function editUser($currentUser) {
    $user = $_POST;
    $user['id'] = $currentUser['id'];
    $user['image'] = $currentUser['image'];

    //
    if ($currentUser['login'] != $user['login']) {
      $loginExist = Users::checkLoginExists($user['login']);

      // Check login exist
      if ($loginExist) {
        $message = "<div class='err-check-login'>Sorry such login is already exist please enter other login</div>";
      } else {
        $this->setValue($user);
      }
    } else {
      $this->setValue($user);
    }

    require_once("./views/cabinet.php");
  }

  public function setValue($user) {
    Users::edit($user);
    if (!empty($_POST['password'])) {
      $user['password'] = password_hash($_POST['password'],
        PASSWORD_BCRYPT);
      Users::editPassword($user);
    }

    if (isset($_FILES) && !empty($_FILES['image']['name'])) {
      require_once('loadImage.php');
      $images = new Images();
      $user['image'] = $images->loadImage();
    }
  }
}

