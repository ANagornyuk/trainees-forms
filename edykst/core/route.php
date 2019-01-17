<?php

  /**
   * Class Route.
   */
class Route {

  public $action;

  /**
   * Function start.
   */
  public static function start() {

    $file_name = 'main';

    if (isset($_POST['form'])) {
      Validation::loginSignUp();
    }

    $page_file = strtolower($file_name) . '.php';
    $page_path = 'view/' . $page_file;

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
