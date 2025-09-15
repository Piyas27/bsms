<?php
session_start();
include("../model/db_connect.php"); 

$uname = trim($_POST['uname'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$confirm = trim($_POST['confirm'] ?? '');

$isValid = true;


if (empty($uname)) {
    $_SESSION['e1'] = "Username required";
    $isValid = false;
} else {
    $_SESSION['uname'] = $uname;
}

if (empty($email)) {
    $_SESSION['e2'] = "Email required";
    $isValid = false;
} else {
    $_SESSION['email'] = $email;
}

if (strlen($password) < 6) {
    $_SESSION['e3'] = "Password must be at least 6 characters";
    $isValid = false;
}

if ($password !== $confirm) {
    $_SESSION['e4'] = "Passwords do not match";
    $isValid = false;
}

if ($isValid) {
    
    $sql = "SELECT * FROM users WHERE email='$email' OR uname='$uname'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['e2'] = "Email or username already exists";
        $_SESSION['uname'] = $uname;
        $_SESSION['email'] = $email;
        header("Location: /bsms/view/register.php");
        exit();
    }

    
    $sql = "INSERT INTO users (uname, email, password) VALUES ('$uname', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['msg'] = "Registration successful! Please login.";
        header("Location: /bsms/view/login.php"); 
        exit();
    } else {
        $_SESSION['msg'] = "Error: " . mysqli_error($conn);
        header("Location: /bsms/view/register.php");
        exit();
    }
} else {
    header("Location: /bsms/view/register.php");
    exit();
}
?>