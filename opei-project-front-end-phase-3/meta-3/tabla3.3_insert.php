<?php
session_start();
// Establish a database connection
include 'db_info.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $obj3_1 = mysqli_real_escape_string($conn, $_POST['obj3_1']);
    $obj3_2 = mysqli_real_escape_string($conn, $_POST['obj3_2']);
    $obj3_3 = mysqli_real_escape_string($conn, $_POST['obj3_3']);
    $obj3_4 = mysqli_real_escape_string($conn, $_POST['obj3_4']);
    $obj3_5 = mysqli_real_escape_string($conn, $_POST['obj3_5']);

    // Fetch department ID from session (assuming it's stored in $_SESSION['DepartmentID'])
    $departmentID = $_SESSION['DepartmentID'];

    // Get the current year
    $currentYear = date("Y");

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table33 (DepartmentID, year, field1, field2, field3, field4, field5) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisssss", $departmentID, $currentYear,  $obj3_1, $obj3_2, $obj3_3, $obj3_4, $obj3_5);

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