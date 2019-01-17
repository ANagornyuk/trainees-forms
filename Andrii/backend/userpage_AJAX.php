<?php

//require 'database_connection.php';
require '../classes/Userpage.php';
require '../classes/Database.php';
require '../backend/evn_vars.php';


$db_conn = new Database($servername, $username, $password, $dbname, $table);
$userpage = new Userpage($db_conn);
//$userpage->changePassword($_POST['password'], $_POST['newpass'],    $_POST['newpasscfm'],  $db_conn);


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
        default:
            echo "error";


    }

}






//function showPassword($conn, $user_id){
//    $stmt = $conn->prepare("SELECT Password FROM users WHERE id = ? ");
//    $stmt->execute([$user_id]);
//    $select = $stmt->fetch();
//    $password = $select[0];
//    echo $select[0];
//}
//
//function changeUserdata($conn, $user_id, $data, $col){
//    $sql = "UPDATE users SET ". $col ." =? WHERE id=?";
//    $conn->prepare($sql)->execute([$data, $user_id]);
//    header('Location: ../userpage.html.php');
//    exit();
//}
//
//if ($_GET['table_fname']){
//    $dbcol = "FirstName";
//    changeUserdata($conn, $user_id, $_GET['table_fname'], $dbcol);
//    //echo $_GET['table_fname'];
//    //exit();
//}
//
//if ($_GET['table_lname']){
//    $dbcol = "LastName";
//    changeUserdata($conn, $user_id, $_GET['table_lname'], $dbcol);
//    //echo $_GET['table_fname'];
//    //exit();
//}
//
//if ($_GET['table_email']){
//    $dbcol = "Email";
//    changeUserdata($conn, $user_id, $_GET['table_email'], $dbcol);
//    //echo $_GET['table_fname'];
//    //exit();
//}
//
//if ($_GET['showpass']){
//    showPassword($conn, $user_id);
//}

