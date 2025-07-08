<?php
header('Content-Type: application/json');

// Connect to DB
$conn = new mysqli("localhost", "root", "", "aero_dairy");
if ($conn->connect_error) {
  die(json_encode(['error' => 'Database connection failed']));
}

// 1. Fetch Admissions Report (program + total + latest application date)
$admissions = [];
$admission_query = "
  SELECT program, COUNT(*) AS total, MAX(application_date) AS latest_application
  FROM admissions
  GROUP BY program
";
$admission_result = $conn->query($admission_query);
if ($admission_result && $admission_result->num_rows > 0) {
  while ($row = $admission_result->fetch_assoc()) {
    $admissions[] = $row;
  }
}

// 2. Fetch Visitors Table (full details)
$submissions = [];
$visitor_query = "
  SELECT id, visitor_name AS name, visitor_email AS email, visitor_phone,
         entry_status, total_visits, program_viewed, visit_time AS submission_date
  FROM visitors
  ORDER BY visit_time DESC
";
$visitor_result = $conn->query($visitor_query);
if ($visitor_result && $visitor_result->num_rows > 0) {
  while ($row = $visitor_result->fetch_assoc()) {
    $submissions[] = $row;
  }
}

// Return combined JSON
echo json_encode([
  'admissions' => $admissions,
  'submissions' => $submissions
]);

$conn->close();
?>
