<?php
    include "credentials.php";

    function database_connection($dsn, $user, $password) {
        // Database connection function
        $connection = new PDO($dsn, $user, $password);
        return $connection;
    }

    // Check if user exists function
    function check_user_exists($conn, $uname) {
        $CheckUserExist =  $conn->prepare("SELECT username FROM users WHERE username = '$uname'");
        $CheckUserExist->execute(['username']); // run the username row 

        if ($CheckUserExist->rowCount() > 0) { // if any row is found
            return true;
        } else {
            return false;
        }
    }

    // Create new user function
    function insert_new_user($conn, $uname, $passwd) {
        $insert_query = "INSERT INTO users (username, password) VALUES (?, ?)";
        
        $statement = $conn->prepare($insert_query);

        $statement->bindValue(1, $uname);
        $statement->bindValue(2, $passwd);

        $statement->execute();
    }

    // Check user on register
    function check_user_registered($conn, $uname, $passwd) {

        $CheckUserExist = $conn->prepare("SELECT username, password FROM users WHERE username = '$uname' AND password = '$passwd'");

        $CheckUserExist->execute(['username']); // run the username row 
        $CheckUserExist->execute(['password']); // run the username row 

        if ($CheckUserExist->rowCount() > 0) { // if any row is found
            return true;
        } else {
            return false;
        }
    }
?>