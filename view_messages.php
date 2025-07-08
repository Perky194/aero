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
  <title>Contact Messages – AERO DAIRY</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f4f8;
      padding: 20px;
    }

    h2 {
      text-align: center;
      color: #00695c;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: left;
      font-size: 15px;
    }

    th {
      background-color: #004d40;
      color: #fff;
    }

    tr:nth-child(even) {
      background-color: #e0f2f1;
    }

    @media (max-width: 600px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      tr {
        margin-bottom: 15px;
        border-bottom: 2px solid #ccc;
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
        color: #00695c;
      }

      th {
        display: none;
      }
    }
  </style>
</head>
<body>

<h2>Contact Messages</h2>

<?php if ($result->num_rows > 0): ?>
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
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td data-label="#"><?= $row['id'] ?></td>
        <td data-label="Name"><?= htmlspecialchars($row['name']) ?></td>
        <td data-label="Email"><?= htmlspecialchars($row['email']) ?></td>
        <td data-label="Subject"><?= htmlspecialchars($row['subject']) ?></td>
        <td data-label="Message"><?= nl2br(htmlspecialchars($row['message'])) ?></td>
        <td data-label="Sent At"><?= $row['sent_at'] ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
<?php else: ?>
  <p>No messages found.</p>
<?php endif; ?>

<?php $conn->close(); ?>

</body>
</html>
