<?php
$conn = new mysqli("localhost", "root", "", "aero_dairy");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Count total logins
$total = $conn->query("SELECT COUNT(*) AS total_logins FROM user_logins")->fetch_assoc()['total_logins'];

// Group by day (last 7 days)
$daily = $conn->query("SELECT DATE(login_time) AS login_date, COUNT(*) AS logins 
                       FROM user_logins 
                       GROUP BY login_date 
                       ORDER BY login_date DESC 
                       LIMIT 7");

// Group by month
$monthly = $conn->query("SELECT DATE_FORMAT(login_time, '%Y-%m') AS month, COUNT(*) AS logins 
                         FROM user_logins 
                         GROUP BY month 
                         ORDER BY month DESC 
                         LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Website Traffic Report</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body { font-family: Arial, sans-serif; background: #e3f2fd; padding: 20px; }
    h2 { color: #1565c0; }
    table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 20px; }
    th, td { padding: 12px; border: 1px solid #ccc; text-align: left; }
    th { background: #1976d2; color: #fff; }
    tr:nth-child(even) { background: #f1f8e9; }
  </style>
</head>
<body>

<h2>📈 Website Login Traffic</h2>

<p><strong>Total Logins:</strong> <?= $total ?></p>

<h3>🗓️ Logins per Day (Last 7 Days)</h3>
<table>
  <tr><th>Date</th><th>Logins</th></tr>
  <?php while($row = $daily->fetch_assoc()): ?>
    <tr>
      <td><?= $row['login_date'] ?></td>
      <td><?= $row['logins'] ?></td>
    </tr>
  <?php endwhile; ?>
</table>

<h3>📅 Monthly Login Summary</h3>
<table>
  <tr><th>Month</th><th>Logins</th></tr>
  <?php while($row = $monthly->fetch_assoc()): ?>
    <tr>
      <td><?= $row['month'] ?></td>
      <td><?= $row['logins'] ?></td>
    </tr>
  <?php endwhile; ?>
</table>

</body>
</html>
