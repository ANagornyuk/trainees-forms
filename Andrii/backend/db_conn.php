<?php

require '/var/www/html/trainees-forms/Andrii/classes/Database.php';
require 'evn_vars.php';

function db_conn () {
     return Database::connect(DBcreditals());
}
