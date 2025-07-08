<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: admin_login.html");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AERO DAIRY – Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body { margin: 0; font-family: 'Segoe UI'; background: #eafbea; }
    header {
      background: #014d00; color: #fff;
      padding: 12px; text-align: center;
    }
    .sidebar {
      width: 250px; background: #800080; color: #fff;
      height: 100vh; position: fixed; top: 0; left: 0; padding-top: 60px;
    }
    .sidebar a {
      display: block; padding: 12px 20px; color: #fff;
      text-decoration: none; border-bottom: 1px solid #eee;
    }
    .sidebar a:hover { background: #5a005a; }
    .main {
      margin-left: 250px; padding: 20px;
    }
  </style>
</head>
<body>

<header>
  <h1><i class="fas fa-tools"></i> Admin Dashboard – AERO DAIRY</h1>
</header>

<div class="sidebar">
  <a href="view_admissions.php"><i class="fas fa-user-plus"></i> Admissions</a>
  <a href="view_reports.php"><i class="fas fa-chart-line"></i> Reports</a>
  <a href="view_messages.php"><i class="fas fa-envelope"></i> Messages</a>
  <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<div class="main">
  <h2>Welcome, Admin</h2>
  <p>Use the sidebar to manage your website content and operations.</p>
</div>

</body>
</html>
