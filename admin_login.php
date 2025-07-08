<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

// Replace this with a secure DB call
if ($username === "admin" && $password === "aerodairy123") {
  $_SESSION['admin'] = true;
  header("Location: admin_dashboard.php");
} else {
  echo "<script>alert('Invalid Credentials'); window.location.href='admin_login.html';</script>";
}
?>
