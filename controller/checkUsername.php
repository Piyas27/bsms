<?php
include("../model/db_connect.php");

$uname = trim($_GET['uname'] ?? '');

if ($uname === "") {
    echo "empty";
    exit();
}

$sql = "SELECT * FROM users WHERE uname='$uname'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo "taken";  
} else {
    echo "available"; 
}
?>