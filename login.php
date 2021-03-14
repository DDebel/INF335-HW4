<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<?php 
include 'DA.php';
include "credentials.php";

session_start();

if(isset($_POST["login"])) {
  
    // Get username & password
    $uname = $_POST["username"];
    $passwd = $_POST["password"];

    echo $uname;
    $conn = database_connection($dsn, $user, $password);
    $result = check_user_registered($conn, $uname, $passwd);

    if ($result == true) {
        $_SESSION['username'] = $uname;

        header("Location: home.php");
        exit();
    } else {
        echo "Username/Password do not match!";

        header("Location: registration.php");
        exit();
    }
} else {
    ?>

<form method="POST" action=""> 
    <h2>Log In</h2>
    Username: 
    <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    <br />
    Password: 
    <input type="password" name="password" required />
    <br />
    <button type="submit" name="login" value="login">Log In</button>
    <a href="registration.php">Register</a>
</form>
<?php } ?>

</body>
</html>