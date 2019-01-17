<?php

require '../classes/Userpage.php';
require '../classes/Database.php';
require '../backend/evn_vars.php';


$db_conn = new Database($servername, $username, $password, $dbname, $table);
$userpage = new Userpage($db_conn);
$userpage->changePassword($_POST['password'], $_POST['newpass'],
                          $_POST['newpasscfm'],  $db_conn);


