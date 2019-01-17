<?php

  require_once 'db.php';

/**
 * Class DBClass.
 */
class DBClass extends DatabaseSettings {
  public $classQuery;
  public $link;
  public $errno = '';
  public $error = '';

  /**
   * Connects to the database.
   */
  public function __construct() {

    $settings = parent::getSettings();

    $host = $settings['dbhost'];
    $name = $settings['dbname'];
    $user = $settings['dbusername'];
    $pass = $settings['dbpassword'];

    $this->link = new PDO("mysql:host=$host;dbname=$name", $user, $pass);
  }

  /**
   * Function prepare.
   */
  public function prepare($query) {
    return $this->link->prepare($query);
  }

  /**
   * Function lastInsertedId.
   */
  public function lastInsertId() {
    return $this->link->lastInsertId();
  }

  /**
   * Function Query.
   */
  public function query($sql) {
    return $this->link->query($sql);
  }

  /**
   * Closes the database connection.
   */
  public function close() {
    $this->link = NULL;
  }

  /**
   * Function sqlError.
   */
  public function sqlError() {
    if (empty($error)) {
      $errno = $this->link->errorCode();
      $error = $this->link->errorInfo();
    }
    return $errno . ' : ' . $error[2];
  }

}
