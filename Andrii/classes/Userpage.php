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
        $logout = '<span style="float: right">
        <form method="get" action="backend/logout.php">
            <input type="submit" value="Log out">
        </form>
    </span>';
        $block = '<header>
        <span>Hello, <span style="color: fuchsia"> %s </span>!</span>
         %s 
        </header>';

        echo sprintf($block, $this->fetch['FirstName'],  $logout);
    }

    public function printCreditals(){
        $infotable = '
                <div class="col" style="float: right;">
                    
                    <table>
                        <tr>
                            <td>First name</td>
                            <td id="table_fname">%s</td>
                            <td id="table_fname_button"><button onclick="changeField(table_fname, table_fname_button)">Change</button></td>
                        </tr>
                        <tr>
                            <td>Last name</td>
                            <td id="table_lname">%s</td>
                            <td id="table_lname_button"><button onclick="changeField(table_lname, table_lname_button)">Change</button></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td id="table_email">%s</td>
                            <td id="table_email_button"><button onclick="changeField(table_email, table_email_button)">Change</button></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td id="table_password"><!--<button onclick="showPassword()">Show</button>--></td>
                            <td id=""><a href="changePassword.html">Change</a></td>
                        </tr>
                    </table>
                    
                </div>
            ';
        echo sprintf($infotable, $this->fetch['FirstName'],  $this->fetch['LastName'], $this->fetch['Email']);
    }


    public function printUserlogo(){
        $block = '<div class="col" style="float: left;">
            %s
            <form method="post" enctype="multipart/form-data" action="backend/requests.php" >
                <fieldset>
                    <legend>Change image</legend>
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
                    <input type="file" name="upload">
                    <input type="submit" value="Load image">
                </fieldset>
            </form>
        </div>';
        $image = '<img src="images/%s" alt="" style="width: 400px; height: 400px">';
        if ($this->fetch['Image'] == null) {
            $image = sprintf($image, 'user.png');
        } else {
            $image = sprintf($image, $this->fetch['Image']);
        }
        echo sprintf($block, $image);
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