<!DOCTYPE html>
<html>
<head>
  <title>Appointment History</title>
  <link rel="stylesheet" href="/bsms/view/css/style.css">
</head>
<body>
<header>
  <h1>Appointment History</h1>
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
  <h2>My Appointments</h2>
  <ul id="appointmentList">
    <li>
      <strong>Oil Change</strong> - 5th Sept, 2025 @ 10:00 AM
      <button onclick="cancelAppointment(this)">Cancel</button>
    </li>
    <li>
      <strong>Brake Check</strong> - 12th Sept, 2025 @ 2:30 PM
      <button onclick="cancelAppointment(this)">Cancel</button>
    </li>
  </ul>
</div>

<script>
  function cancelAppointment(button) {
    if (confirm("Are you sure you want to cancel this appointment?")) {
      let li = button.parentElement;
      li.remove();
    }
  }
</script>
</body>
</html>