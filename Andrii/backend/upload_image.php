<?php

$uploaddir = '../images/';
$uploadfile = $uploaddir . basename($_FILES['upload']['name']);

if (is_uploaded_file($_FILES['upload']['tmp_name'])){
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile)) {
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }
}