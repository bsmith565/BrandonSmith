<?php

 include('test_input.php');

$username = isset($_POST['username']) ? test_input($_POST['username']) : "";
$password = isset($_POST['password']) ? test_input($_POST['password']) : "";


if ((strlen($username) > 0) && ($username == $password)) {
    session_start();
    $_SESSION['username'] = $username; 
    $_SESSION['password'] = $password; 
    print "<script>location.href='index.php';</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    
    <form action="login.php" method="POST">
        <div>
            Username: <input type="text" name="username" >
        </div>
        <div>
            Password: <input type="password" name="password" >
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>