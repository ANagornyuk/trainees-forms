<?php

class Users {

  public static function connection() {
    require_once("connection.php");
    return Db::getConnection();
  }

  public static function checkUserData($login, $password) {
    $db = self::connection();
    $sql = 'SELECT * FROM users WHERE email = :email OR login = :login';
    $result = $db->prepare($sql);
    $result->bindParam(':email', $login, PDO::PARAM_STR);
    $result->bindParam(':login', $login, PDO::PARAM_STR);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    $user = $result->fetch();
    if ($user) {
      if (password_verify($password,
          $user['password']) || $password == $user['password']) {
        return $user;
      }
    }
    return FALSE;
  }

  public static function getCurrentUser() {
    if ($_SESSION['user']) {
      $id = $_SESSION['user'];
      return self::getUserById($id);
    }
  }

  public static function getUserById($id) {
    $db = self::connection();
    $sql = 'SELECT * FROM users WHERE id = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    return $result->fetch();
  }

  public static function insertIntoDatabase($userData) {
    $db = self::connection();
    $sql = ("INSERT INTO users(firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
    $result = $db->prepare($sql);
    $result->bindParam(':firstname', $userData['firstname'], PDO::PARAM_STR);
    $result->bindParam(':lastname', $userData['lastname'], PDO::PARAM_STR);
    $result->bindParam(':email', $userData['email'], PDO::PARAM_STR);
    $result->bindParam(':password', $userData['password'], PDO::PARAM_STR);
    return $result->execute();
  }

  public static function checkEmailExists($email) {
    $db = self::connection();
    $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';
    $result = $db->prepare($sql);
    $result->bindParam(':email', $email, PDO::PARAM_STR);
    $result->execute();
    $a = $result->fetchColumn();
    if ($a) {
      return TRUE;
    }
    return FALSE;
  }

  public static function checkLoginExists($login) {
    $db = self::connection();
    $sql = 'SELECT COUNT(*) FROM users WHERE login = :login';
    $result = $db->prepare($sql);
    $result->bindParam(':login', $login, PDO::PARAM_STR);
    $result->execute();
    $a = $result->fetchColumn();
    if ($a) {
      return TRUE;
    }
    return FALSE;
  }

  public static function edit($user) {
    $db = self::connection();
    $sql = "UPDATE users
                SET login = :login, firstname = :firstname, lastname = :lastname, email = :email
                WHERE id = :id";
    $result = $db->prepare($sql);
    $result->bindParam(':id', $user['id'], PDO::PARAM_INT);
    $result->bindParam(':login', $user['login'], PDO::PARAM_STR);
    $result->bindParam(':firstname', $user['firstname'], PDO::PARAM_STR);
    $result->bindParam(':lastname', $user['lastname'], PDO::PARAM_STR);
    $result->bindParam(':email', $user['email'], PDO::PARAM_STR);
    return $result->execute();
  }

  public static function editPassword($user) {
    $db = self::connection();
    $sql = "UPDATE users
                SET password = :password
                WHERE id = :id";
    $result = $db->prepare($sql);
    $result->bindParam(':id', $user['id'], PDO::PARAM_INT);
    $result->bindParam(':password', $user['password'], PDO::PARAM_STR);
    return $result->execute();
  }

  public static function updateUserImage($image) {
    if ($_SESSION['user']) {
      $id = $_SESSION['user'];
    }
    $db = self::connection();
    $sql = "UPDATE users
                SET image = :image
                WHERE id = :id";
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->bindParam(':image', $image, PDO::PARAM_STR);
    return $result->execute();
  }

  public static function getUserImage() {
    if ($_SESSION['user']) {
      $id = $_SESSION['user'];
    }
    $db = self::connection();
    $sql = 'SELECT image FROM users WHERE id = :id';
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    return $result->fetch();
  }

}
