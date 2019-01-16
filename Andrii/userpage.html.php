<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User page</title>
    <script src="scripts/userpage.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/userpage.css">
</head>
<body>
    <div class="cont">
        <?php
        require 'classes/Userpage.php';
        require 'classes/Database.php';
        require 'backend/evn_vars.php';

        $db_conn = new Database($servername, $username, $password, $dbname, $table);
        $userpage = new Userpage($db_conn);
        $userpage->printHello();
        $userpage->printUserlogo();
        $userpage->printCreditals();
        /*
            require 'backend/userpage.php';
            $uid = is_sess();
            $select = db_select($uid);
            print_hello($select);
            print_userlogo($select);
            print_creditals($select);
        */
        ?>
    </div>
</body>
</html>