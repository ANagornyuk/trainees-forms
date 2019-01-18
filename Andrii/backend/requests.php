<?php

require '../classes/Userpage.php';
require '../classes/Database.php';
require '../backend/evn_vars.php';

$uploaddir = '../images/';

$db_conn = Database::connect(DBcreditals());
$userpage = new Userpage($db_conn);

if ($_GET){
    foreach ($_GET as $getKey => $getValue){
        switch ($getKey) {
            case "table_fname":
                $userpage->changeUserdata($_GET['table_fname'], 'FirstName', $db_conn);
                break;
            case "table_lname":
                $userpage->changeUserdata($_GET['table_lname'], 'LastName', $db_conn);
                break;
            case "table_email":
                $userpage->changeUserdata($_GET['table_email'], 'Email', $db_conn);
                break;
        }
    }
}

if ($_POST['newpass']) {
    $userpage->changePassword($_POST['password'], $_POST['newpass'], $_POST['newpasscfm'], $db_conn);
}

if ($_FILES['upload']){
    $userpage->uploadImage($uploaddir,  $db_conn);
}