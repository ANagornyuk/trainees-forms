<?php

require 'database_connection.php';

$uploaddir = '../images/';
//$uploadfile = $uploaddir . basename($_FILES['upload']['name']);

if (is_uploaded_file($_FILES['upload']['error']) == '0') {
    if (is_uploaded_file($_FILES['upload']['tmp_name'])){
        if (getimagesize($_FILES['upload']['tmp_name'])[mime] == 'image/jpeg' ||
            getimagesize($_FILES['upload']['tmp_name'])[mime] == 'image/png'){
            $name = md5_file($_FILES['upload']['tmp_name']);
            $extension = image_type_to_extension(getimagesize($_FILES['upload']['tmp_name'])[2]);
            $filename = $name . $extension;
            $uploadfile = $uploaddir . $name . $extension;
            if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile)) {
                chmod($imageFullName, 0777);
                //write to db
                session_start();
                if(!isset($_SESSION['id'])) {
                    echo "Unable define user";
                    exit();
                }
                $sql_update = "UPDATE users SET Image=? WHERE id=?";
                try {
                    $conn->prepare($sql_update)->execute([$filename, $_SESSION['id']]);
                    echo "New record created successfully";
                }
                catch(PDOException $e) {
                    echo $e->getMessage();
                }

                echo "File was uploaded";
                header('Location: ../userpage.html.php');
            } else {
                echo "Upload error";
            }
        } else {
            echo "File type must be only image!";
        }
    }
     echo "Upload error";
}