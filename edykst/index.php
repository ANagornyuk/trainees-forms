<?php

  /**
   * @file
   * Created by PhpStorm.
   */

ini_set('display_errors', 1);

if (!isset($_SESSION['username'])) {
  session_start();
}

require_once 'core/core.php';
