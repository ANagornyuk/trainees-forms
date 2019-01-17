<?php

/**
 * Class Validation.
 */
class Validation {

  /**
   * Function loginSignUp.
   */
  public static function loginSignUp() {

    $user = new User();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if ($_POST['form'] == '0') {

        if (empty($_POST["fn"])) {
          $err[] = "Name is required";
        }
        else {
          $fn = self::input($_POST["fn"]);
          if (!preg_match("/^[a-zA-Z ]*$/", $fn)) {
            $err[] = 'Only letters and white space allowed';
          }
        }

        if (empty($_POST["ln"])) {
          $err[] = 'Name is required';
        }
        else {
          $ln = self::input($_POST["ln"]);
          if (!preg_match("/^[a-zA-Z ]*$/", $ln)) {
            $err[] = 'Only letters and white space allowed';
          }
        }

        if (empty($_POST["email"])) {
          $err[] = 'Email is required';
        }
        else {
          $email = self::input($_POST["email"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err[] = 'Invalid email format';
          }
        }

        if ((empty($_POST["password1"]) || empty($_POST["password2"])) && ($_POST["password1"] === $_POST["password2"])) {
          $err[] = 'Password is required and must be the same';
        }
        else {
          $password1 = password_hash($_POST["password1"], PASSWORD_DEFAULT);
        }

        if (empty($err)) {

          $test_if_exec = $user->Test($email);

          if ($test_if_exec[0] == '0') {
            $user->Create($fn, $ln, $email, $password1, $_POST["password1"]);
          }
          else {
            echo 'This user already exists';
          }

        }

      }
      elseif ($_POST['form'] == '1') {

        if (empty($_POST["email"])) {
          $err[] = 'Email is required';
        }
        else {
          $email = self::input($_POST["email"]);

          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err[] = 'Invalid email format';
          }

        }

        if (empty($err)) {
          $test_if_exec = $user->test($email);

          if ($test_if_exec[0] == '1') {
            $password = $_POST["password"];

            if ($user->login($email, $password)) {
              TRUE;
            }
            else {
              echo 'User or password is wrong';
            }

          }

        }

      }

    }

  }

  /**
   * Function input.
   */
  public static function input($text) {
    $text = trim($text);
    $text = stripslashes($text);
    $text = htmlspecialchars($text);
    return $text;
  }

}
