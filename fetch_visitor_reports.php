<?php
// Database connection
$servername = "localhost";
$username = "username"; // Replace with your database username
$password = "password"; // Replace with your database password
$dbname = "aero_dairy"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch number of visits and other data
$sql = "SELECT 
            v1.id, 
            v1.visitor_name, 
            COUNT(v1.visit_time) AS number_of_visits, 
            v1.visitor_email, 
            v1.visitor_phone, 
            v1.entry_status, 
            v1.total_visits, 
            v1.program_viewed
        FROM 
            visitor_reports v1
        GROUP BY 
            v1.visitor_name
        ORDER BY 
            number_of_visits DESC";

$result = $conn->query($sql);
?>