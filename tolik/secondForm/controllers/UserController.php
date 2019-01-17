<?php


class UserController {

  public function actionRegister() {

    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
      $currentUser = Users::getCurrentUser();

      if (empty($currentUser)) {
        session_destroy();
        require_once ROOT . "/views/secondForm.php";
      } else {
        header("Location: /tolik/secondForm/index.php/user/cabinet");
      }
      return TRUE;
    }

    if (isset($_POST['register-button'])) {

      $userData["firstname"] = $_POST["firstname"];
      $userData["lastname"] = $_POST["lastname"];
      $userData["email"] = $_POST["email"];
      $userData["password"] = password_hash($_POST["password"],
        PASSWORD_BCRYPT);

      if (!isset($_SESSION['user'])) {
        if (!Users::checkEmailExists($userData["email"])) {
          Users::insertIntoDatabase($userData);
          $user = Users::checkUserData($userData["email"],
            $userData["password"]);
          $_SESSION['user'] = $user['id'];

          header("Location: /tolik/secondForm/index.php/user/cabinet");
        } else {
          $message = "<div class='err-register'>Such email is already exist</div>";

          require_once ROOT . "/views/secondForm.php";
        }
      } else {
        $message = "You are already logged";

        $id = $_SESSION['user'];
        $user = Users::getUserById($id);

        header("Location: /tolik/secondForm/index.php/user/cabinet");
      }
    } else {

      require_once ROOT . "/views/secondForm.php";
    }

    return TRUE;
  }

  public function actionLogin() {

    $login = $_POST['login'];
    $password = $_POST['password'];

    if (isset($_SESSION['user'])) {
      $user = Users::getCurrentUser();
      require_once ROOT . "/views/cabinet.php";
    } else {
      $user = Users::checkUserData($login, $password);
      if ($user) {
        $_SESSION['user'] = $user['id'];

        require_once ROOT . "/views/cabinet.php";
      } else {
        $message = "<div class='err-login'>You have entered the wrong login or password</div>";

        require_once ROOT . '/views/secondForm.php';
      }
    }

    return TRUE;
  }

  public function actionLogout() {
    session_destroy();
    header("Location: /tolik/secondForm/index.php/");

    return TRUE;
  }

  public function actionCabinet() {
    $currentUser = Users::getCurrentUser();

    if (!empty($currentUser)) {
      if (isset($_POST['edit'])) {
        $this->edit($currentUser);
      }
      $user = $currentUser;

      require_once ROOT . "/views/cabinet.php";
    } else {
      header("Location: /tolik/secondForm/index.php/user/register");
    }

    return TRUE;
  }

  // Update user in database

  /**
   * @param $currentUser
   * @return bool
   */
  public function edit($currentUser) {
    $user = $_POST;
    $user['id'] = $currentUser['id'];
    $user['image'] = $currentUser['image'];

    //Check Login exists
    if ($currentUser['login'] != $user['login']) {
      $loginExist = Users::checkLoginExists($user['login']);
    }
    if ($currentUser['email'] != $user['email']) {
      $emailExist = Users::checkEmailExists($user['email']);
    }
    // Check login or email taken
    if (!empty($loginExist) || !empty($emailExist)) {
      $message = "<div class='err-check-login'>Sorry such login or email is already taken please enter other login</div>";
    } else {
      $updateImage = $this->setValue($user);
      if (!empty($updateImage)) {
        $user['image'] = $updateImage;
      }
      $message = "<div class='scs-save'>Save success</div>";
    }

    require_once ROOT . "/views/cabinet.php";
    return TRUE;
  }

  // Insert into database
  public function setValue($user) {
    Users::edit($user);
    if (!empty($_POST['password'])) {
      $user['password'] = password_hash($_POST['password'],
        PASSWORD_BCRYPT);
      Users::editPassword($user);
    }

    if (isset($_FILES) && !empty($_FILES['image']['name'])) {
      return $this->loadImage();
    }
  }

  public function loadImage() {
    if (isset($_FILES) && !empty($_FILES['image']['name'])) {

      $image = $_FILES['image'];

      $imageFormat = explode('.', $image['name']);
      $imageFormat = $imageFormat[1];

      $imageFullName = 'images/' . $this->makeRandomName() . '.' . $imageFormat;

      $imageType = $image['type'];

      if ($imageType == 'image/jpeg' || $imageType == 'image/png') {
        if (move_uploaded_file($image['tmp_name'], $imageFullName)) {
          chmod($imageFullName, 0777);
          $oldImage = Users::getUserImage();
          if (file_exists($oldImage['image'])) {
            unlink($oldImage['image']);
          }

          Users::updateUserImage($imageFullName);
        }
      }

      return $imageFullName;
    }

    return FALSE;
  }

  private function makeRandomName($max = 6) {
    $i = 0;
    $possible_keys = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $keys_length = strlen($possible_keys);
    $str = "";
    while ($i < $max) {
      $rand = mt_rand(1, $keys_length - 1);
      $str .= $possible_keys[$rand];
      $i++;
    }

    return $str;
  }
}
