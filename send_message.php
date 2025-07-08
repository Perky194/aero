<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "aero_dairy");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get and sanitize inputs
  $name = trim($_POST["name"]);
  $email = trim($_POST["email"]);
  $subject = trim($_POST["subject"]);
  $message = trim($_POST["message"]);

  // Insert into database
  $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $subject, $message);

  if ($stmt->execute()) {
    echo "<script>alert('Message saved successfully!'); window.location.href='contact.html';</script>";
  } else {
    echo "<script>alert('Error saving message.'); window.location.href='contact.html';</script>";
  }

  $stmt->close();
  $conn->close();
} else {
  echo "Access Denied.";
}
?>
