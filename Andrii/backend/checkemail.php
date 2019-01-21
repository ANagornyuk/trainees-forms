<?php

require 'db_conn.php';

$conn = db_conn();
$select = $conn->selectAllEmail();
foreach ($select as $row) {
    //echo $row[0]."\n";
    if ($row[0] == $_GET['email']) {
        echo "This e-mail has been already registered";
    }
}
