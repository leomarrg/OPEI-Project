<?php
session_start();
// Establish a database connection
include 'db_info.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $obj4_1 = mysqli_real_escape_string($conn, $_POST['obj4_1']);
    $obj4_2 = mysqli_real_escape_string($conn, $_POST['obj4_2']);
    $obj4_3 = mysqli_real_escape_string($conn, $_POST['obj4_3']);
    $obj4_4 = mysqli_real_escape_string($conn, $_POST['obj4_4']);
    $obj4_5 = mysqli_real_escape_string($conn, $_POST['obj4_5']);

    // Fetch department ID from session (assuming it's stored in $_SESSION['DepartmentID'])
    $departmentID = $_SESSION['DepartmentID'];

    // Get the current year
    $currentYear = date("Y");

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table43 (DepartmentID, year, field1, field2, field3, field4, field5) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisssss", $departmentID, $currentYear, $obj4_1, $obj4_2, $obj4_3, $obj4_4, $obj4_5);

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
