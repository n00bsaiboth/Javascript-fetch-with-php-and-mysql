<?php
    require_once("src/php/functions.php");
    require_once("src/php/db.php");


    $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';

    if($contentType === 'application/json') {
        $get_content = trim(file_get_contents("php://input"));

        $content = json_decode($get_content, true);


        $id = sanitizeInputString($content['updateId']);
        $first_name = sanitizeInputString($content['updated_first_name']);
        $last_name = sanitizeInputString($content['updated_last_name']);
        $email = sanitizeInputString($content['updated_email']);

        $sql = "UPDATE `users` SET `first_name` = '" . $first_name . "', `last_name` = '" . $last_name . "', `email` = '" . $email . "' WHERE `users`.`id` = ". $id;

        // UPDATE `users` SET `last_name` = 'Saukko', `email` = 'pekka.saukko@gmail.com' WHERE `users`.`id` = 3 

        if(mysqli_query($conn, $sql)) {
            $message = "User updated succesfully.";
        } else {
            $message = "There was a problem. User has NOT been updated.";
        }

        // $stmt = $conn->prepare($sql);

        // $stmt->bind_param(":id", $id);
        // $stmt->bind_param(":first_name", $first_name);
        // $stmt->bind_param(":last_name", $last_name);
        // $stmt->bind_param(":email", $email);


        // $stmt->bind_param('sss', $first_name, $last_name, $email);

        // if($stmt->execute()) {
        //    $message = "User updated succesfully.";
        // } else {
        //    $message = "There was a problem. User has NOT been updated.";
        // }

        // $message = "you have given the following info: id, " . $id . " firstname: " . $first_name . " and lastname: " . $last_name . " and the email " . $email;

        $result = json_encode($message);
    
    } else {
        $message = "wrong content type";

        $result = json_encode($message);
    }

    header("Content-Type: application/json");

    echo $result;
?>