<?php

class Logout {

  function __construct() {
    session_destroy();

    require_once "./views/secondForm.php";
  }
}
