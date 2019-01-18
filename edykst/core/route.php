<?php

  /**
   * Class Route.
   */
class Route {

  public static $action;

  /**
   * Function start.
   */
  public static function start() {
    $file_name = 'main';

    if (isset($_REQUEST['exit'])) {
      unset($_SESSION['user']);
    }

    if (isset($_POST['form'])) {
      $err = Validation::loginSignUp();
      if (!$err) {
        $err[] = '';
      }
    }

    $page_file = strtolower($file_name) . '.php';
    $page_path = 'view/' . $page_file;

    if (!isset($_SESSION['user'])) {
      $action_file = 'form.php';
    }
    elseif (isset($_REQUEST['p'])) {
      $action_file = strtolower($_REQUEST['p']) . '.php';
      $action_path = 'view/' . $action_file;
      if (!file_exists($action_path)) {
        $action_file = 'user.php';
      }
    }
    else {
      $action_file = 'user.php';
    }

    self::$action = $action_file;

    if (file_exists($page_path)) {
      include 'view/' . $page_file;
    }
    else {
      self::errorPage404();
    }

  }

  /**
   * Function errorPage404.
   */
  public static function errorPage404() {
    $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
    header('HTTP/1.1 404 Not Found');
    header("Status: 404 Not Found");
    header('Location:' . $host . '404');
  }

}
