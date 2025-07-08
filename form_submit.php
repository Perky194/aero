<?php
// Database connection settings
$servername = "localhost";
$username = "root";  // Use your database username
$password = "";      // Use your database password
$dbname = "aero_dairy"; // The existing database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the input data

    // Sanitize and validate the name
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    if (empty($name)) {
        die("Name is required.");
    }

    // Sanitize and validate the email
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Sanitize the message (to prevent XSS)
    $message = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);
    if (empty($message)) {
        die("Message is required.");
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO submissions (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute the query
    if ($stmt->execute()) {
        // Success message
        $success_message = "Your submission has been successfully recorded!";
    } else {
        // Error message
        $error_message = "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Status</title>
</head>
<body>

    <h2>Submission Status</h2>

    <?php
    // Display success or error message
    if (isset($success_message)) {
        echo "<p style='color: green;'>$success_message</p>";
    } elseif (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>

    <!-- Provide a link to go back to the form -->
    <br>
    <a href="form.html">Go back to the form</a>

</body>
</html>
