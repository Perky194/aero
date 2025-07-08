<?php
$conn = new mysqli("localhost", "root", "", "aero_dairy");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM contact_messages ORDER BY sent_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AERO DAIRY – Report Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f1f8e9;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #33691e;
    }

    .report-buttons {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 15px;
      margin-bottom: 40px;
    }

    .report-buttons a {
      background: #558b2f;
      color: white;
      text-decoration: none;
      padding: 14px 24px;
      border-radius: 8px;
      font-weight: bold;
      font-size: 16px;
      transition: background 0.3s;
    }

    .report-buttons a:hover {
      background: #33691e;
    }

    .toggle-button {
      padding: 12px 24px;
      background: #33691e;
      color: white;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      margin-bottom: 20px;
    }

    .toggle-button:hover {
      background: #1b5e20;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
      margin-top: 10px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 12px;
      text-align: left;
      font-size: 15px;
    }

    th {
      background: #33691e;
      color: white;
    }

    tr:nth-child(even) {
      background: #f9fbe7;
    }

    @media(max-width: 600px) {
      .report-buttons a {
        width: 100%;
        text-align: center;
      }

      table, thead, tbody, th, td, tr {
        display: block;
      }

      tr {
        margin-bottom: 12px;
      }

      td {
        padding-left: 50%;
        position: relative;
      }

      td::before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        font-weight: bold;
      }

      th {
        display: none;
      }
    }
  </style>
</head>
<body>

  <h1>AERO DAIRY – Reports Dashboard</h1>

  <div class="report-buttons">
    <button class="toggle-button" onclick="toggleMessages()">📬 View Contact Messages</button>
    <a href="report_traffic.php">📈 Website Traffic</a>
    <a href="report_top_programs.html">🏆 Top Programs</a>
    <a href="report_engagement.html">🔍 User Engagement</a>
    <a href="report_monthly.php">📊 Monthly Traffic</a>
    <a href="report_questions.php">❓ FAQ Summary</a>
    <a href="report_conversion.php">📥 Conversion Rate</a>
    <a href="report_visuals.php">📊 Visual Charts</a>
    <a href="report_recommendations.php">✅ Recommendations</a>
  </div>

  <h2 style="color:#33691e;">📬 Messages Section</h2>



  <div id="messagesTable" style="display: none;">
   
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Sent At</th>
          </tr>
        </thead>
        <tbody>
       
          <tr>
            <td data-label="#"><?= $row['id'] ?></td>
            <td data-label="Name"><?= htmlspecialchars($row['name']) ?></td>
            <td data-label="Email"><?= htmlspecialchars($row['email']) ?></td>
            <td data-label="Subject"><?= htmlspecialchars($row['subject']) ?></td>
            <td data-label="Message"><?= nl2br(htmlspecialchars($row['message'])) ?></td>
            <td data-label="Sent At"><?= $row['sent_at'] ?></td>
          </tr>

        </tbody>
      </table>
    
      <p>No messages found.</p>
    
  </div>

  <script>
    function toggleMessages() {
      const box = document.getElementById("messagesTable");
      box.style.display = (box.style.display === "none") ? "block" : "none";
    }
  </script>

</body>
</html>
