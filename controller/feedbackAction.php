<?php
session_start();
include("../model/db_connect.php");

$username = $_SESSION['username'] ?? 'Guest';
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

$_SESSION['fbname'] = $name;
$_SESSION['fbemail'] = $email;
$_SESSION['fbmsg'] = $message;

$valid = true;

if (empty($name)) {
    $_SESSION['e1'] = "Please enter your name";
    $valid = false;
}
if (empty($email)) {
    $_SESSION['e2'] = "Please enter your email";
    $valid = false;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['e2'] = "Invalid email format";
    $valid = false;
}
if (empty($message)) {
    $_SESSION['e3'] = "Please enter feedback";
    $valid = false;
}

if ($valid) {
    $sql = "INSERT INTO feedback (username, name, email, message) 
            VALUES ('$username', '$name', '$email', '$message')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['msg'] = "Thank you for your feedback!";
        unset($_SESSION['fbname'], $_SESSION['fbemail'], $_SESSION['fbmsg']);
    } else {
        $_SESSION['msg'] = "Error: " . mysqli_error($conn);
    }
}

header("Location: ../view/feedback.php");
exit();
?>