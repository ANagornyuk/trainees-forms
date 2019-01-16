<?php

function getConnection() {
  $params = dbParams();
  $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
  $db = new PDO($dsn, $params['user'], $params['password']);
  $db->exec("set names utf8");
  return $db;
}

function dbParams() {
  return [
    'host'     => 'localhost',
    'dbname'   => 'custom_form',
    'user'     => 'root',
    'password' => '159',
  ];
}
