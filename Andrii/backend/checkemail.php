<?php

require 'database_connection.php';

$select = $conn->query("SELECT Email FROM users;")->fetchAll();
foreach ($select as $row) {
    //echo $row[0]."\n";
    if ($row[0] == $_GET['email']) {
        echo "This e-mail has been already registered";
    }
}
