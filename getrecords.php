<?php
    $host = "localhost";

    $username = "root";
    $password = "mysql";

    $dbname = "ajax";

    $result_array = array();

    $conn = new mysqli($host, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection to the database has failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, first_name, last_name, email FROM users";

    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($result_array, $row);
        }
    }

    header('Content-type: application/json');

    echo json_encode($result_array);

    $conn->close();

?>