<?php


if (isset($_FILES) && isset($_FILES['image'])) {

  $image = $_FILES['image'];

  $imageFormat = explode('.', $image['name']);
  $imageFormat = $imageFormat[1];

  $imageFullName = '../images/' . makeRandomName() . '.' . $imageFormat;

  $imageType = $image['type'];

  if ($imageType == 'image/jpeg' || $imageType == 'image/png') {
    if (move_uploaded_file($image['tmp_name'], $imageFullName)) {
      chmod($imageFullName, 0777);
      include "users.php";
      $oldImage = getUserImage();
      unlink($oldImage['image']);
      updateUserImage($imageFullName);
      echo 'success';
    } else {
      echo 'error';
    }
  }
}

function makeRandomName($max = 6) {
  $i = 0; //Reset the counter.
  $possible_keys = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $keys_length = strlen($possible_keys);
  $str = ""; //Let's declare the string, to add later.
  while ($i < $max) {
    $rand = mt_rand(1, $keys_length - 1);
    $str .= $possible_keys[$rand];
    $i++;
  }
  return $str;
}
