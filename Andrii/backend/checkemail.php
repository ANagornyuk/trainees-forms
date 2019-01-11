<?php

require 'database_connection.php';

//echo("Hello from php file!");
//$conn = db_conn($servername, $username, $password, $dbname, $table);
$select = $conn->query("SELECT Email FROM users;")->fetchAll();
foreach ($select as $row) {
    //echo $row[0]."\n";
    if ($row[0] == $_GET['email']) {
        echo "This e-mail has been already registered";
    }
}
//echo $_GET['email'];
//echo gettype($_GET['email']);
//echo gettype($select);
//echo gettype($select[0]);
//
//
//if (in_array($_GET['email'], $select)) {
//    echo "This e-mail has been registered";
//
//}