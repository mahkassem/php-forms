<?php
$submitted = isset($_POST['submit']);
$success = true;

// Validation for username
if (!isset($_REQUEST['username']) || empty($_REQUEST['username'])) {
  $usernameErr = 'Username is required';
  $success = false;
}

$emailRegex = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';

if (!preg_match($emailRegex, $_REQUEST['username'])) {
  $usernameErr = 'Username is not a valid email';
  $success = false;
}

// Validation for password
if (!isset($_REQUEST['password']) || empty($_REQUEST['password'])) {
  $passwordErr = 'Password is required';
  $success = false;
}

if (strlen($_REQUEST['password']) < 6) {
  $passwordErr = 'Password must be at least 6 characters';
  $success = false;
}

// Validation for confirm password
if (!isset($_REQUEST['confirm_password']) || empty($_REQUEST['confirm_password'])) {
  $confirmPasswordErr = 'Confirm password is required';
  $success = false;
}

if ($_REQUEST['password'] !== $_REQUEST['confirm_password']) {
  $confirmPasswordErr = 'Confirm password must match password';
  $success = false;
}

// handle file upload
$targetDir = 'uploads/';

if (!file_exists($targetDir)) {
  mkdir($targetDir, 0777, true);
}

// check if file exists
if (isset($_FILES) && isset($_FILES['avatar'])) {
  move_uploaded_file($_FILES['avatar']['tmp_name'], $targetDir . $_FILES['avatar']['name']);
}

// return to register form if there is an error
$queryString = '';
if (!$success) {
  $queryString .= '?';
  $queryString .= 'success=false';
  $queryString .= '&username=' . $_REQUEST['username'];
  $queryString .= '&password=' . $_REQUEST['password'];
  $queryString .= '&confirm_password=' . $_REQUEST['confirm_password'];
  $queryString .= '&usernameErr=' . @$usernameErr;
  $queryString .= '&passwordErr=' . @$passwordErr;
  $queryString .= '&confirmPasswordErr=' . @$confirmPasswordErr;
} else {
  $queryString .= '?';
  $queryString .= 'success=true';
}
// ?
header('Location: register-form.php' . $queryString);
