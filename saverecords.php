<?php
    require_once("src/php/functions.php");
    require_once("src/php/db.php");


    $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';

    if($contentType === 'application/json') {
        $get_content = trim(file_get_contents("php://input"));

        $content = json_decode($get_content, true);

        $first_name = sanitizeInputString($content['first_name']);
        $last_name = sanitizeInputString($content['last_name']);
        $email = sanitizeInputString($content['email']);

        $sql = "INSERT INTO users (first_name, last_name, email) VALUES (?,?,?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('sss', $first_name, $last_name, $email);

        if($stmt->execute()) {
            $message = "User added succesfully.";
        } else {
            $message = "There was a problem. User has NOT been added.";
        }

        $result = json_encode($message);
    
    }

    header("Content-Type: application/json");

    echo $result;
?>