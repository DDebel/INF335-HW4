<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>

<?php
    session_start();
    // Check that user has logged in
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
    else {
        session_unset();
        session_destroy();
    }
?>

<div>
    <h1>Welcome to the Homepage</h1>
    <img src="https://images-na.ssl-images-amazon.com/images/I/41GsZ8i8%2BqL._SL960_AA960_.jpg" heigth="400" width="400" alt="PHP cup">
    <br>
</div>
    
</body>
</html>