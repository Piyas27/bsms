<?php
session_start();

$bike = $_SESSION['bike'] ?? '';
$service = $_SESSION['service'] ?? '';
$date = $_SESSION['date'] ?? '';
$time = $_SESSION['time'] ?? '';

$e1 = $_SESSION['e1'] ?? '';
$e2 = $_SESSION['e2'] ?? '';
$e3 = $_SESSION['e3'] ?? '';
$e4 = $_SESSION['e4'] ?? '';
$msg = $_SESSION['msg'] ?? '';

unset($_SESSION['bike'], $_SESSION['service'], $_SESSION['date'], $_SESSION['time'],
      $_SESSION['e1'], $_SESSION['e2'], $_SESSION['e3'], $_SESSION['e4'], $_SESSION['msg']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Appointment</title>
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
  <h2>Book Appointment</h2>
  <form action="../controller/bookAppointmentAction.php" method="post" onsubmit="return validateAppointment(this)">
    
   
    <input type="text" name="bike" placeholder="Bike Type" value="<?php echo htmlspecialchars($bike); ?>">
    <span id="bikeErr" style="color:red"><?php echo $e1; ?></span>

  
    <input type="text" name="service" placeholder="Service Type" value="<?php echo htmlspecialchars($service); ?>">
    <span id="serviceErr" style="color:red"><?php echo $e2; ?></span>

  
    <input type="date" name="date" value="<?php echo htmlspecialchars($date); ?>">
    <span id="dateErr" style="color:red"><?php echo $e3; ?></span>

  
    <input type="time" name="time" value="<?php echo htmlspecialchars($time); ?>">
    <span id="timeErr" style="color:red"><?php echo $e4; ?></span>

    <button type="submit">Book Appointment</button>
  </form>

  <?php if (!empty($msg)): ?>
    <p style="color:green"><?php echo $msg; ?></p>
  <?php endif; ?>
</div>
</body>
</html>