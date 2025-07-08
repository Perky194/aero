<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'aero_dairy';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $FirstName = $conn->real_escape_string($_POST['FirstName']);
    $LastName = $conn->real_escape_string($_POST['LastName']);
    $RegNo = $conn->real_escape_string($_POST['RegistrationNo']);
    $Email = $conn->real_escape_string($_POST['Email']);
    $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $Gender = $conn->real_escape_string($_POST['Gender']);

    // Check if RegistrationNo already exists
    $check = "SELECT * FROM users WHERE RegistrationNo='$RegNo'";
    $result = $conn->query($check);
    if($result->num_rows > 0){
        echo "Registration No already exists!";
    } else {
        $sql = "INSERT INTO users (FirstName, LastName, RegistrationNo, Email, Password, Gender) 
                VALUES ('$FirstName', '$LastName', '$RegNo', '$Email', '$Password', '$Gender')";
        if ($conn->query($sql) === TRUE) {
            header('Location: login.php');
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
$conn->close();
?>
