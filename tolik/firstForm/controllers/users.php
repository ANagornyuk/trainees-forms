<?php
include 'connection.php';

function checkUserData($login, $password) {
  $db = getConnection();
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

function getCurrentUser() {
  session_start();
  if ($_SESSION['user']) {
    $id = $_SESSION['user'];
    return getUserById($id);
  }
}

function getUserById($id) {
  $db = getConnection();
  $sql = 'SELECT * FROM users WHERE id = :id';
  $result = $db->prepare($sql);
  $result->bindParam(':id', $id, PDO::PARAM_INT);
  $result->setFetchMode(PDO::FETCH_ASSOC);
  $result->execute();
  return $result->fetch();
}

function insertIntoDatabase($userData) {
  $db = getConnection();
  $sql = ("INSERT INTO users(firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
  $result = $db->prepare($sql);
  $result->bindParam(':firstname', $userData['firstname'], PDO::PARAM_STR);
  $result->bindParam(':lastname', $userData['lastname'], PDO::PARAM_STR);
  $result->bindParam(':email', $userData['email'], PDO::PARAM_STR);
  $result->bindParam(':password', $userData['password'], PDO::PARAM_STR);
  return $result->execute();
}

function checkEmailExists($email) {
  $db = getConnection();
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

function edit($user) {
  $db = getConnection();
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

function editPassword($user) {
  $db = getConnection();
  $sql = "UPDATE users
                SET password = :password
                WHERE id = :id";
  $result = $db->prepare($sql);
  $result->bindParam(':id', $user['id'], PDO::PARAM_INT);
  $result->bindParam(':password', $user['password'], PDO::PARAM_STR);
  return $result->execute();
}

function updateUserImage($image) {
  session_start();
  if ($_SESSION['user']) {
    $id = $_SESSION['user'];
  }
  $db = getConnection();
  $sql = "UPDATE users
                SET image = :image
                WHERE id = :id";
  $result = $db->prepare($sql);
  $result->bindParam(':id', $id, PDO::PARAM_INT);
  $result->bindParam(':image', $image, PDO::PARAM_STR);
  return $result->execute();
}

function getUserImage() {
  session_start();
  if ($_SESSION['user']) {
    $id = $_SESSION['user'];
  }
  $db = getConnection();
  $sql = 'SELECT image FROM users WHERE id = :id';
  $result = $db->prepare($sql);
  $result->bindParam(':id', $id, PDO::PARAM_INT);
  $result->setFetchMode(PDO::FETCH_ASSOC);
  $result->execute();
  return $result->fetch();
}
