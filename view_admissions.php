<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: admin_login.html"); exit(); }

$conn = new mysqli("localhost", "root", "", "aero_dairy");
$result = $conn->query("SELECT * FROM admissions");
?>
<!DOCTYPE html>
<html>
<head><title>Admissions</title></head>
<body>
<h2>Admissions Table</h2>
<table border="1" cellpadding="10">
  <tr><th>ID</th><th>Name</th><th>Email</th><th>Program</th></tr>
  <?php while($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['program'] ?></td>
  </tr>
  <?php endwhile; ?>
</table>
</body>
</html>
