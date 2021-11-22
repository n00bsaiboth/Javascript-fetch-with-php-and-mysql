<?php
    require_once("src/php/functions.php");
    require_once("src/php/db.php");


    $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';

    if($contentType === 'application/json') {
        $get_content = trim(file_get_contents("php://input"));

        $content = json_decode($get_content, true);

        $id = sanitizeInputString($content['id']);

        $sql = "DELETE FROM users WHERE id = " . $id;

        $stmt = $conn->prepare($sql);

        // $stmt->bind_param(':id', $id);

        if($stmt->execute()) {
            $message = "User was removed succesfully.";
        } else {
            $message = "There was a problem. User has NOT been removed.";
        }

        $result = json_encode($message);
    
    }

    header("Content-Type: application/json");

    echo $result;
?>