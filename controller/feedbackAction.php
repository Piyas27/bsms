<?php
session_start();

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');
$isValid = true;

if (empty($name)) { $_SESSION['e1'] = "Name required"; $isValid = false; }
if (empty($email)) { $_SESSION['e2'] = "Email required"; $isValid = false; }
if (empty($message)) { $_SESSION['e3'] = "Feedback cannot be empty"; $isValid = false; }

$_SESSION['fbname'] = $name;
$_SESSION['fbemail'] = $email;
$_SESSION['fbmsg'] = $message;

if ($isValid) {
    $_SESSION['msg'] = "Thank you for your feedback!";
    unset($_SESSION['fbname'], $_SESSION['fbemail'], $_SESSION['fbmsg']);
}

header("Location: /bsms/view/feedback.php");
exit();
?>