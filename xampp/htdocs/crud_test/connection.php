<?php
const DB_HOSTNAME = "localhost";
const DB_USERNAME = "root";
const DB_PASSWORD = "";
const DB_NAME = "crud_test";
const DB_PORT = 3306;
$connection = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
$test = "adadfsfasdf";
if (!$connection) {
    die("Connection Error " . mysqli_connect_error());
}

// echo "Connected successfully";

?>

<h1></h1>