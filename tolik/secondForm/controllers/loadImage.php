<?php

class Images {

  public function loadImage() {
    if (isset($_FILES) && !empty($_FILES['image']['name'])) {

      $image = $_FILES['image'];

      $imageFormat = explode('.', $image['name']);
      $imageFormat = $imageFormat[1];

      $imageFullName = './images/' . self::makeRandomName() . '.' . $imageFormat;

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
  }

  private static function makeRandomName($max = 6) {
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

}
