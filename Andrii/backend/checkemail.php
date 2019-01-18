<?php

require '../classes/Database.php';
require 'evn_vars.php';

$conn = Database::connect(DBcreditals());

$select = $conn->selectAllEmail();
foreach ($select as $row) {
    //echo $row[0]."\n";
    if ($row[0] == $_GET['email']) {
        echo "This e-mail has been already registered";
    }
}
