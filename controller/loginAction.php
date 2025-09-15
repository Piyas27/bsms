<?php
session_start();
include("../model/db_connect.php");

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$remember = $_POST['remember'] ?? '';

$isValid = true;


if (empty($username)) {
    $_SESSION['e1'] = "Please fill up the username properly";
    $isValid = false;
} else {
    $_SESSION['username_input'] = $username;
}

if (empty($password)) {
    $_SESSION['e2'] = "Please fill up the password properly";
    $isValid = false;
}

if ($isValid) {
    
    $sql = "SELECT * FROM users WHERE uname='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $_SESSION['username'] = $username; 
        $_SESSION['msg'] = "Login successful!";
        
       
        unset($_SESSION['username_input']);

       
        if (!empty($remember)) {
            setcookie("username", $username, time() + (86400 * 30), "/bsms/"); 
        } else {
            setcookie("username", "", time() - 3600, "/bsms/");
            setcookie("password", "", time() - 3600, "/bsms/");
        }

        header("Location: /bsms/view/dashboard.php");
        exit();
    } else {
        $_SESSION['e3'] = "Invalid username or password";
    }
}


header("Location: /bsms/view/login.php");
exit();
?>