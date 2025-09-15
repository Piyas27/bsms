<?php
session_start();


$e1 = $_SESSION['e1'] ?? '';
$e2 = $_SESSION['e2'] ?? '';
$e3 = $_SESSION['e3'] ?? '';
$msg = $_SESSION['msg'] ?? '';


$username = $_SESSION['username_input'] ?? '';


unset($_SESSION['e1'], $_SESSION['e2'], $_SESSION['e3'], $_SESSION['msg'], $_SESSION['username_input']);


if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="/bsms/view/css/style.css">
  <script src="/bsms/view/js/script.js" defer></script>
</head>
<body>
<header>
  <h1>Bike Workshop</h1>
</header>

<div class="container">
  <h2>User Login</h2>

  <?php if (!empty($msg)): ?>
    <p style="color:green"><?php echo $msg; ?></p>
  <?php endif; ?>

  <form action="/bsms/controller/loginAction.php" method="post" onsubmit="return validateLogin(this)">
    <input type="text" name="username" placeholder="Username" 
           value="<?php echo htmlspecialchars($username); ?>">
    <span id="loginUserErr" style="color:red"><?php echo $e1; ?></span>

    <input type="password" name="password" placeholder="Password">
    <span id="loginPassErr" style="color:red"><?php echo $e2; ?></span>

    <label>
      <input type="checkbox" name="remember" <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>>
      Remember Me
    </label>

    <button type="submit">Login</button>
  </form>

  <span style="color:red"><?php echo $e3; ?></span>

  <p><a href="/bsms/view/forgot-password.php">Forgot Password?</a></p>
  <p>Don't have an account? <a href="/bsms/view/register.php">Register here</a></p>
</div>
</body>
</html>