<?php
session_start();

$bike = trim($_POST['bike'] ?? '');
$service = trim($_POST['service'] ?? '');
$date = trim($_POST['date'] ?? '');
$time = trim($_POST['time'] ?? '');
$isValid = true;

if (empty($bike)) { $_SESSION['e1'] = "Bike type required"; $isValid = false; }
if (empty($service)) { $_SESSION['e2'] = "Service required"; $isValid = false; }
if (empty($date)) { $_SESSION['e3'] = "Date required"; $isValid = false; }
if (empty($time)) { $_SESSION['e4'] = "Time required"; $isValid = false; }

$_SESSION['bike'] = $bike;
$_SESSION['service'] = $service;
$_SESSION['date'] = $date;
$_SESSION['time'] = $time;

if ($isValid) {
    $_SESSION['msg'] = "Appointment booked successfully!";
    unset($_SESSION['bike'], $_SESSION['service'], $_SESSION['date'], $_SESSION['time']);
}

header("Location: /bsms/view/book-appointment.php");
exit();
?>