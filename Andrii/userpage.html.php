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
        require 'backend/db_conn.php';

        $db_conn = db_conn();
        $userpage = new Userpage($db_conn);


        $userpage->printHello();
        $userpage->printUserlogo();
        $userpage->printCreditals();

        ?>
    </div>
</body>
</html>