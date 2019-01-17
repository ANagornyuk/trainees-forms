<?php

require '../classes/Userpage.php';
require '../classes/Database.php';
require '../backend/evn_vars.php';

$uploaddir = '../images/';

$db_conn = new Database($servername, $username, $password, $dbname, $table);
$userpage = new Userpage($db_conn);
$userpage->uploadImage($uploaddir,  $db_conn);
