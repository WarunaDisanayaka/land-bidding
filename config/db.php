<?php
// Establish database connection
$db_host = 'localhost';
$db_name = 'land';
$db_user = 'root';
$db_pass = '';

$db_conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$db_conn) {
    die('Database connection error: ' . mysqli_connect_error());
}

?>