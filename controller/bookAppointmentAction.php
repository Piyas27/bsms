<?php
session_start();
include("../model/db_connect.php");

$username = $_SESSION['username'] ?? ''; // logged in user
$bike = trim($_POST['bike'] ?? '');
$service = trim($_POST['service'] ?? '');
$date = trim($_POST['date'] ?? '');
$time = trim($_POST['time'] ?? '');

$_SESSION['bike'] = $bike;
$_SESSION['service'] = $service;
$_SESSION['date'] = $date;
$_SESSION['time'] = $time;

$valid = true;

if (empty($bike)) {
    $_SESSION['e1'] = "Please enter bike type";
    $valid = false;
}
if (empty($service)) {
    $_SESSION['e2'] = "Please enter service type";
    $valid = false;
}
if (empty($date)) {
    $_SESSION['e3'] = "Please choose a date";
    $valid = false;
}
if (empty($time)) {
    $_SESSION['e4'] = "Please choose a time";
    $valid = false;
}

if ($valid) {
    $sql = "INSERT INTO appointments (username, bike, service, date, time) 
            VALUES ('$username', '$bike', '$service', '$date', '$time')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['msg'] = "Appointment booked successfully!";
        unset($_SESSION['bike'], $_SESSION['service'], $_SESSION['date'], $_SESSION['time']);
    } else {
        $_SESSION['msg'] = "Error: " . mysqli_error($conn);
    }
}

header("Location: ../view/book-appointment.php");
exit();
?>