<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php
  function submitIsSuccess()
  {
    if (isset($_GET['success'])) {
      return $_GET['success'] === 'true';
    }
    return false;
  }
  ?>
  <form action="register-handler.php" method="post" enctype="multipart/form-data">
    <div>
      <label for="username">Username</label>
      <input type="text" name="username" value="<?php echo !submitIsSuccess() ? @$_GET['username'] : '' ?>" placeholder="Enter your username">
      <br>
      <span class="input-error"><?php echo !submitIsSuccess() ? @$_GET['usernameErr'] : '' ?></span>
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" name="password" value="<?php echo !submitIsSuccess() ? @$_GET['password'] : '' ?>" placeholder="Enter your password"><br>
      <span class="input-error"><?php echo !submitIsSuccess() ? @$_GET['passwordErr'] : '' ?></span>
    </div>
    <div>
      <label for="confirm_password">Confirm Password</label>
      <input type="password" name="confirm_password" value="<?php echo !submitIsSuccess() ? @$_GET['confirm_password'] : '' ?>" placeholder="Enter your password again">
      <br>
      <span class="input-error"><?php echo !submitIsSuccess() ? @$_GET['confirmPasswordErr'] : '' ?></span>
    </div>
    <!-- avatar -->
    <div>
      <label for="">Avatar</label>
      <input type="file" name="avatar" />
    </div>
    <div>
      <input type="submit" name="submit" value="Register" /> <br>
      <span class="input-error"><?php echo !submitIsSuccess() ? 'Registration failed' : '' ?></span>
    </div>
  </form>
</body>

</html>