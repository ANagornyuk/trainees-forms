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
            require 'backend/userpage.php';
            $uid = is_sess();
            $select = db_select($uid);
            print_hello($select);
            print_userlogo($select);
            print_creditals($select);
        ?>
    </div>
</body>
</html>