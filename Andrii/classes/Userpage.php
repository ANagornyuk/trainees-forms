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
                            <td id="table_password"><button onclick="showPassword()">Show</button></td>
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
            <form method="post" enctype="multipart/form-data" action="backend/upload_image.php" >
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

}