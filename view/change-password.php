<?php
session_start();

$e1 = $_SESSION['e1'] ?? '';
$e2 = $_SESSION['e2'] ?? '';
$e3 = $_SESSION['e3'] ?? '';
$msg = $_SESSION['msg'] ?? '';

unset($_SESSION['e1'], $_SESSION['e2'], $_SESSION['e3'], $_SESSION['msg']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
  <link rel="stylesheet" href="/bsms/view/css/style.css">
  <script src="/bsms/view/js/script.js" defer></script>
</head>
<body>
<header>
  <h1>Change Password</h1>
  <nav>
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
  <?php if (!empty($msg)): ?><p style="color:green"><?php echo $msg; ?></p><?php endif; ?>

  <form action="/bsms/controller/changePasswordAction.php" method="post" onsubmit="return validateChangePassword(this)">
    <input type="password" name="old" placeholder="Old Password">
    <span id="oldPassErr" style="color:red"><?php echo $e1; ?></span>

    <input type="password" name="new" placeholder="New Password">
    <span id="newPassErr" style="color:red"><?php echo $e2; ?></span>

    <input type="password" name="confirm" placeholder="Confirm New Password">
    <span id="confirmPassErr" style="color:red"><?php echo $e3; ?></span>

    <button type="submit">Change Password</button>
  </form>
</div>
</body>
</html>