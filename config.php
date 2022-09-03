<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_port = 3306;
$database = 'newsblog';

// create connection with db

$conn = mysqli_connect($db_host, $db_username, $db_password, $database);

//check connection

if (!$conn) {
    die("connection error: " . mysqli_connect_error());
}
