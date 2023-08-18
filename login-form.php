<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php require_once 'login-handler.php'; ?>
  <form action="" method="get">
    <div>
      <label for="">Username</label>
      <input type="text" name="username" value="<?php echo !$success ? @$_GET['username'] : '' ?>" placeholder="Enter your username">
      <br>
      <span class="input-error"><?php echo $submitted ? @$usernameErr : '' ?></span>
    </div>
    <div>
      <label for="">Password</label>
      <input type="text" name="password" value="<?php echo !$success ? @$_GET['password'] : '' ?>" placeholder="Enter your password">
      <br>
      <span class="input-error"><?php echo $submitted ? @$passwordErr : '' ?></span>
    </div>
    <div>
      <input type="submit" name="submit" value="Login" />
      <br>
      <span class="input-error"><?php echo $submitted ? @$formErr : '' ?></span>
      <span class="input-success"><?php echo $success && $submitted ? 'User authenticated successfuly' : '' ?></span>
    </div>
  </form>
</body>

</html>