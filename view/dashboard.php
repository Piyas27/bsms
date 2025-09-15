<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /bsms/view/login.php");
    exit();
}


$msg = $_SESSION['msg'] ?? '';
unset($_SESSION['msg']); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="/bsms/view/css/style.css">
</head>
<body>
<header>
  <h1>Dashboard</h1>
  <nav>
    <a href="/bsms/view/change-password.php">Change Password</a>
    <a href="/bsms/view/feedback.php">Feedback</a>
    <a href="/bsms/controller/logout.php">Logout</a>
  </nav>
</header>

<div class="dashboard-wrapper">
  <aside class="sidebar">
    <nav>
      <a href="/bsms/view/dashboard.php">Dashboard</a>
      <a href="/bsms/view/book-appointment.php">Book Appointment</a>
      <a href="/bsms/view/service-history.php">Service History</a>
      <a href="/bsms/view/available-services.php">Available Services</a>
      <a href="/bsms/view/appointment-history.php">Appointment History</a>
      <a href="/bsms/view/view-bill.php">View Bill</a>
    </nav>
  </aside>

  <div class="container">
    <?php if (!empty($msg)): ?>
      <p style="color:green"><?php echo $msg; ?></p>
    <?php endif; ?>

    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>From here you can manage all your bike workshop activities.</p>
  </div>
</div>
</body>
</html>