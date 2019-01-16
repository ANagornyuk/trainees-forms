<?php

function is_sess(){
    session_start();
    $sess_err = '<div><p>Please log in or sign up</p></div>';
    $fname = $_SESSION["username"];
    if(!isset($_SESSION['username'])) {
        echo $sess_err;
        exit();
    }
    $uid = $_SESSION["id"];
    if(!isset($_SESSION['id'])) {
        echo $sess_err;
        exit();
    }
    return $uid;
}

function db_select($uid){
    if ($uid) {
        include_once 'backend/database_connection.php';
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? ");
        $stmt->execute([$uid]);
        $select = $stmt->fetch();
        return $select;
    }
}

function print_hello ($select){
    $logout = '<span style="float: right">
        <form method="get" action="backend/logout.php">
            <input type="submit" value="Log out">
        </form>
    </span>';
    $block = '<header>
        <span>Hello, <span style="color: fuchsia"> %s </span>!</span>
         %s 
        </header>';

    echo sprintf($block, $select['FirstName'],  $logout);


}

function print_creditals ($select){
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
    echo sprintf($infotable, $select['FirstName'],  $select['LastName'], $select['Email']);
}

function print_userlogo ($select){
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
            if ($select['Image'] == null) {
                $image = sprintf($image, 'user.png');
            } else {
                $image = sprintf($image, $select['Image']);
            }
            echo sprintf($block, $image);
}