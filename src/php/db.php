<?php

$host = "localhost";

$username = "root";
$password = "mysql";

$dbname = "ajax";

$result = 0;

$conn = new mysqli($host, $username, $password, $dbname);

if($conn->connect_error) {
    die("Connection to the database has failed: " . $conn->connect_error);
}

?>