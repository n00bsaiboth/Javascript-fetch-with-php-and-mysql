<?php
    // common way to sanitize all variables

    function sanitizeInput($data = null) {
        $data = trim($data);
        
        // we "need" to use characters like ä, ö and å, so we comment out the htmlentities, but instead use htmlspecialchars.    

        // $data = htmlentities($data);

        $data = htmlspecialchars($data);

        $data = stripslashes($data);

        return $data;
    }

    // sanitize input strings

    function sanitizeInputString($data = null) {
        $data = sanitizeInput($data);

        $data = (string) $data;

        $data = filter_var($data, FILTER_SANITIZE_STRING);

        return $data;
    }

    // sanitize email addresses

    function sanitizeInputEmail($data = null) {
        $data = sanitizeInputString($data);

        $data = filter_var($data, FILTER_SANITIZE_EMAIL);

        $data = validateInputEmail($data);

        return $data;
    }

    // validate email addresses

    function validateInputEmail($data = null) {
        if(filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return $data;
        }
    }
?>