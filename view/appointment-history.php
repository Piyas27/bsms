<?php
session_start();
include("../model/db_connect.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];


$sql = "SELECT * FROM appointments WHERE username='$username' ORDER BY date, time";
$result = mysqli_query($conn, $sql);


$msg = $_SESSION['msg'] ?? '';
unset($_SESSION['msg']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Appointment History</title>
  <link rel="stylesheet" href="css/style.css">
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
  <h2>Your Appointment History</h2>
  
  <?php if (!empty($msg)): ?>
    <p style="color:green"><?php echo $msg; ?></p>
  <?php endif; ?>
  
  <?php if (mysqli_num_rows($result) > 0): ?>
    <table border="1" cellpadding="8" cellspacing="0" width="100%">
      <tr>
        <th>Bike</th>
        <th>Service</th>
        <th>Date</th>
        <th>Time</th>
        <th>Booked At</th>
        <th>Action</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo htmlspecialchars($row['bike']); ?></td>
          <td><?php echo htmlspecialchars($row['service']); ?></td>
          <td><?php echo htmlspecialchars($row['date']); ?></td>
          <td><?php echo htmlspecialchars($row['time']); ?></td>
          <td><?php echo htmlspecialchars($row['created_at']); ?></td>
          <td>
            <form action="../controller/cancelAppointment.php" method="post" style="display:inline;">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <button type="submit" onclick="return confirm('Cancel this appointment?')">Cancel</button>
            </form>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p>No appointments found.</p>
  <?php endif; ?>
</div>
</body>
</html>