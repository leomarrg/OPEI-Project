<?php
session_start();
// Establish a database connection
include 'db_info.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $reconType = mysqli_real_escape_string($conn, $_POST['reconType']);
    $cantEstRecon = mysqli_real_escape_string($conn, $_POST['cantEstRecon']);
    $reconDescrip = mysqli_real_escape_string($conn, $_POST['reconDescrip']);
    $calendar = mysqli_real_escape_string($conn, $_POST['calendar']);
    $otorgaRecon = mysqli_real_escape_string($conn, $_POST['otorgaRecon']);

    // Fetch department ID from session (assuming it's stored in $_SESSION['DepartmentID'])
    $departmentID = $_SESSION['DepartmentID'];

    // Get the current year
    $currentYear = date("Y");

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table31 (DepartmentID, year, field1, field2, field3, field4, field5) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisssss", $departmentID, $currentYear, $reconType, $cantEstRecon, $reconDescrip, $calendar, $otorgaRecon);

    // Execute the statement
    if ($stmt->execute()) {
        // Data inserted successfully
        echo "success";
    } else {
        // Error occurred while inserting data
        echo "Error: " . $stmt->error;
    }
    // Close the statement
    $stmt->close();
} else {
    // Request method is not POST
    echo "Invalid request method";
}
// Close the connection
$conn->close();
?>
