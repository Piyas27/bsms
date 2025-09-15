<?php
session_start();


$e1 = $_SESSION['e1'] ?? '';
$e2 = $_SESSION['e2'] ?? '';
$e3 = $_SESSION['e3'] ?? '';
$e4 = $_SESSION['e4'] ?? '';
$msg = $_SESSION['msg'] ?? '';

$uname = $_SESSION['uname'] ?? '';
$email = $_SESSION['email'] ?? '';

unset($_SESSION['e1'], $_SESSION['e2'], $_SESSION['e3'], $_SESSION['e4'], $_SESSION['uname'], $_SESSION['email'], $_SESSION['msg']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="/bsms/view/css/style.css">
  <script src="/bsms/view/js/script.js" defer></script>
</head>
<body>
<header>
  <h1>Bike Workshop</h1>
</header>

<div class="container">
  <h2>Create Account</h2>

  <?php if (!empty($msg)): ?>
    <p style="color:green"><?php echo $msg; ?></p>
  <?php endif; ?>

  <form action="/bsms/controller/registerAction.php" method="post" onsubmit="return validateRegister(this)">
    <input type="text" name="uname" placeholder="Username" value="<?php echo htmlspecialchars($uname); ?>">
    <span id="regNameErr" style="color:red"><?php echo $e1; ?></span>

    <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>">
    <span id="regEmailErr" style="color:red"><?php echo $e2; ?></span>

    <input type="password" name="password" placeholder="Password">
    <span id="regPassErr" style="color:red"><?php echo $e3; ?></span>

    <input type="password" name="confirm" placeholder="Confirm Password">
    <span id="regConfirmErr" style="color:red"><?php echo $e4; ?></span>

    <button type="submit">Register</button>
  </form>

  <p>Already have an account? <a href="/bsms/view/login.php">Login</a></p>
</div>
</body>
</html>