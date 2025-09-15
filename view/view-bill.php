<!DOCTYPE html>
<html>
<head>
  <title>View Bill</title>
  <link rel="stylesheet" href="/bsms/view/css/style.css">
</head>
<body>
<header>
  <h1>Bike Workshop</h1>
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
  <h2>Your Bill</h2>
  <table border="1" width="100%" cellpadding="10" cellspacing="0">
    <tr>
      <th>Service</th>
      <th>Date</th>
      <th>Cost</th>
    </tr>
    <tr>
      <td>Oil Change</td>
      <td>5 Sept, 2025</td>
      <td>500 tk</td>
    </tr>
    <tr>
      <td>Brake Check</td>
      <td>12 Sept, 2025</td>
      <td>500 tk</td>
    </tr>
    <tr>
      <td colspan="2"><strong>Total</strong></td>
      <td><strong>1000 tk </strong></td>
    </tr>
  </table>
</div>
</body>
</html>