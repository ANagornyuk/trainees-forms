<?php

include "users.php";
$user = $_POST;
$currentUser = getCurrentUser();
$user['id'] = $currentUser['id'];
$user['image'] = $currentUser['image'];

edit($user);
if (!empty($_POST['password'])) {
  $user['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
  editPassword($user);
}

if (isset($_FILES) && !empty($_FILES['image']['name'])) {
  include 'loadImage.php';
}

include "../views/cabinet.php";
