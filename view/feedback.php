<?php
session_start();

$name = $_SESSION['fbname'] ?? '';
$email = $_SESSION['fbemail'] ?? '';
$message = $_SESSION['fbmsg'] ?? '';

$e1 = $_SESSION['e1'] ?? '';
$e2 = $_SESSION['e2'] ?? '';
$e3 = $_SESSION['e3'] ?? '';
$msg = $_SESSION['msg'] ?? '';

unset($_SESSION['fbname'], $_SESSION['fbemail'], $_SESSION['fbmsg'],
      $_SESSION['e1'], $_SESSION['e2'], $_SESSION['e3'], $_SESSION['msg']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Feedback</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js" defer></script>
</head>
<body>
<header><h1>Bike Workshop</h1>
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
  <h2>Feedback</h2>
  <form action="../controller/feedbackAction.php" method="post" onsubmit="return validateFeedback(this)">
    
    
    <input type="text" name="name" placeholder="Your Name" value="<?php echo htmlspecialchars($name); ?>">
    <span id="fbNameErr" style="color:red"><?php echo $e1; ?></span>

  
    <input type="email" name="email" placeholder="Your Email" value="<?php echo htmlspecialchars($email); ?>">
    <span id="fbEmailErr" style="color:red"><?php echo $e2; ?></span>

   
    <textarea name="message" placeholder="Your Feedback"><?php echo htmlspecialchars($message); ?></textarea>
    <span id="fbMsgErr" style="color:red"><?php echo $e3; ?></span>

    <button type="submit">Send</button>
  </form>

  <?php if (!empty($msg)): ?>
    <p style="color:green"><?php echo $msg; ?></p>
  <?php endif; ?>
</div>
</body>
</html>