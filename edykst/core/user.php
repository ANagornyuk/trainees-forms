<?php

/**
 * Class User.
 */
class User {

  public $link;

  /**
   * Create connection link to DB.
   */
  public function connect() {
    return $this->link = new DBClass();
  }

  /**
   * Destruct connection link to DB.
   */
  public function disconnect() {
    $this->link = NULL;
  }

  /**
   * Start user session.
   */
  public function startSessionUser($result) {
    $_SESSION['user'] = $result;
  }

  /**
   * Create user.
   */
  public function create($fn, $ln, $email, $password1, $password_not_hash) {
    $sql = 'INSERT INTO users(firstname, lastname, email, password)
    VALUES (?, ?, ?, ?)';
    $this->connect()->prepare($sql)->execute([$fn, $ln, $email, $password1]);
    static::disconnect();
    static::login($email, $password_not_hash);
  }

  /**
   * Function test.
   */
  public function test($email) {
    $sql = 'SELECT COUNT(*) FROM users WHERE email=?';
    $result = $this->connect()->prepare($sql);
    $result->execute([$email]);
    static::disconnect();
    return $result->fetch();
  }

  /**
   * Function Login.
   */
  public function login($email, $password2) {
    $sql = 'SELECT password, id FROM users WHERE email=?';
    $ifLogin = $this->connect()->prepare($sql);
    $ifLogin->execute([$email]);
    $result = $ifLogin->fetch();
    static::disconnect();
    if (password_verify($password2, $result[0])) {
      static::startSessionUser($result[1]);
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Function AllUsers.
   */
  public function allUsers() {
    $sql = 'SELECT id, firstname, lastname, email FROM users';
    $result = $this->connect()->query($sql);
    $mass = $result->fetchAll(PDO::FETCH_ASSOC);
    $this->connect()->close();
    return $mass;
  }

  /**
   * Function My info.
   */
  public function userInfo($id) {
    $sql = 'SELECT id, firstname, lastname, email FROM users WHERE id=?';
    $result = $this->connect()->prepare($sql);
    $result->execute([$id]);
    static::disconnect();
    return $result->fetch();
  }

  /**
   * Change user.
   */
  public function changeUser($fn, $ln, $email, $id) {
    $sql = 'UPDATE users SET firstname=?, lastname=?, email=? WHERE id=?';
    $this->connect()->prepare($sql)->execute([$fn, $ln, $email, $id]);
    static::disconnect();
  }

  /**
   * Delete user.
   */
  public function deleteUser($id) {
    $sql = 'DELETE FROM users WHERE id=?';
    $this->connect()->prepare($sql)->execute([$id]);
    static::disconnect();
  }

}
