<?php
session_start();
include("../model/db_connect.php");

if (!isset($_SESSION['username'])) {
    header("Location: ../view/login.php");
    exit();
}

$username = $_SESSION['username'];
$id = intval($_POST['id'] ?? 0);

if ($id > 0) {
   
    $sql = "DELETE FROM appointments WHERE id=$id AND username='$username'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['msg'] = "Appointment cancelled successfully!";
    } else {
        $_SESSION['msg'] = "Error cancelling appointment: " . mysqli_error($conn);
    }
}

header("Location: ../view/appointment-history.php");
exit();
?>