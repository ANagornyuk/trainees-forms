<?php

class Userpage
{
    //private $uid;
    private $fetch;

    public function __construct($pdo_conn){
        session_start();
        $sess_err = '<div><p>Please log in or sign up</p></div>';
        $uid = $_SESSION["id"];
        if(!isset($_SESSION['id'])) {
            echo $sess_err;
            exit();
        }
        $this->fetch = $pdo_conn->getUserdata($uid);
    }

    public function printHello(){
        $name = $this->fetch['FirstName'];
        require './templates/block_hello.php';
    }

    public function printCreditals(){
        $tfname = $this->fetch['FirstName'];
        $tlname = $this->fetch['LastName'];
        $temail = $this->fetch['Email'];
        require './templates/block_creditals.php';
    }


    public function printUserlogo(){
        if ($this->fetch['Image'] == null) {
            $image = 'user.png';
        } else {
            $image = $this->fetch['Image'];
        }
        require './templates/block_logo.php';
    }

    public function changePassword($Password, $NewPassword, $NewPasswordConfirm, $pdo_conn){
        if (password_verify($Password, $this->fetch['Password'])) {
            if ($NewPassword == $NewPasswordConfirm){
                $NewPassword = password_hash($NewPassword, PASSWORD_DEFAULT );
                $pdo_conn->setUserdata($this->fetch, 'Password', $NewPassword);
                header('Location: ../userpage.html.php');
            } else {
                echo "New passwords don't match";
            }
        } else {
            echo "Password is not correct.";
        }
    }

    public function uploadImage($uploaddir, $pdo_conn){
        if (is_uploaded_file($_FILES['upload']['error']) == '0') {
            if (is_uploaded_file($_FILES['upload']['tmp_name'])){
                    if (getimagesize($_FILES['upload']['tmp_name'])[mime] == 'image/jpeg' ||
                        getimagesize($_FILES['upload']['tmp_name'])[mime] == 'image/png'){
                        $name = md5_file($_FILES['upload']['tmp_name']);
                        $extension = image_type_to_extension(getimagesize($_FILES['upload']['tmp_name'])[2]);
                        $filename = $name . $extension;
                        $uploadfile = $uploaddir . $name . $extension;
                        if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile)) {
                            chmod($uploadfile, 0777);
                            //write to db
                            $pdo_conn->setUserdata($this->fetch, 'Image', $filename);
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
    }

    public function changeUserdata($data, $col, $pdo_conn){
        $pdo_conn->setUserdata($this->fetch, $col, $data);
        header('Location: ../userpage.html.php');
    }

}