<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<?php 

include 'DA.php';
include "credentials.php";

session_start();

if(isset($_POST["register"])) {
  
    // Get username & password
    $uname = $_POST["username"];
    $passwd = $_POST["password"];

    $conn = database_connection($dsn, $user, $password);
    $result = check_user_exists($conn, $uname);

    if ($result == true) {
        insert_new_user($conn, $uname, $passwd);

        header("location: home.php");
        exit();
    } else {
        echo "Username/Password already exist!";

        header("location: registration.php");
        exit();
    }
} else {
    ?>

<form method="Post" action="">
    <h2>Register</h2>
    Username: 
    <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    <br />
    Password: 
    <input type="password" name="password" required />
    <br />
    <button type="submit" name="register" value="register">Register</button>
    <a href="login.php">Login</a>
</form>

<?php } ?>


</div>
</body>
</html>