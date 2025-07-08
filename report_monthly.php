<?php
$conn = new mysqli("localhost", "root", "", "aero_dairy");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Set the target month
$targetMonth = '2025-07'; // format YYYY-MM

$sql = "SELECT DATE(login_time) AS login_date, COUNT(*) AS logins
        FROM user_logins
        WHERE DATE_FORMAT(login_time, '%Y-%m') = ?
        GROUP BY login_date
        ORDER BY login_date ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $targetMonth);
$stmt->execute();
$result = $stmt->get_result();

$labels = [];
$data = [];

while ($row = $result->fetch_assoc()) {
    $labels[] = $row['login_date'];
    $data[] = $row['logins'];
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Monthly Traffic – July 2025</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; background: #fce4ec; }
    h2 { text-align: center; color: #ad1457; }
    canvas { max-width: 100%; display: block; margin: auto; }
  </style>
</head>
<body>

<h2>📅 Daily Logins – July 2025</h2>
<canvas id="monthlyChart" height="100"></canvas>

<script>
const ctx = document.getElementById('monthlyChart').getContext('2d');
const monthlyChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
            label: 'Login Count',
            data: <?= json_encode($data) ?>,
            backgroundColor: '#ec407a',
            borderColor: '#ad1457',
            borderWidth: 1,
            hoverBackgroundColor: '#d81b60'
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});
</script>

</body>
</html>
