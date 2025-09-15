<?php
session_start();
require '../model/db_connect.php'; 

$email = trim($_POST['email'] ?? '');
$isValid = true;

if (empty($email)) {
    $_SESSION['e1'] = "Email required";
    $isValid = false;
}

$_SESSION['email'] = $email;

if ($isValid) {
    $sql = "SELECT * FROM users WHERE email='$email'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) === 1) {
        $_SESSION['msg'] = "Password reset instructions sent to your email (demo)";
    } else {
        $_SESSION['e1'] = "Email not found";
    }
}

header("Location: /bsms/view/forgot-password.php");
exit();
?>