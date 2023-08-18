<?php
$submitted = isset($_GET['submit']);
$success = true;
$userData = [
  'username' => 'admin@admin.com',
  'password' => '123456'
];

// Validation for username
if (!isset($_GET['username']) || empty($_GET['username'])) {
  $usernameErr = 'Username is required';
  $success = false;
}

$emailRegex = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';

if (!preg_match($emailRegex, $_GET['username'])) {
  $usernameErr = 'Username is not a valid email';
  $success = false;
}

// Validation for password
if (!isset($_GET['password']) || empty($_GET['password'])) {
  $passwordErr = 'Password is required';
  $success = false;
}

if (strlen($_GET['password']) < 6) {
  $passwordErr = 'Password must be at least 6 characters';
  $success = false;
}

// Check if username and password is correct
if ($success && ($_GET['username'] !== $userData['username'] ||
  $_GET['password'] !== $userData['password']
)) {
  $success = false;
  $formErr = 'Username or password is incorrect';
}
