<?php
session_start();
// Establish a database connection
include 'db_info.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $obj5_1 = mysqli_real_escape_string($conn, $_POST['obj5_1']);
    $obj5_2 = mysqli_real_escape_string($conn, $_POST['obj5_2']);
    $obj5_3 = mysqli_real_escape_string($conn, $_POST['obj5_3']);
    $obj5_4 = mysqli_real_escape_string($conn, $_POST['obj5_4']);
    $obj5_5 = mysqli_real_escape_string($conn, $_POST['obj5_5']);
    $obj5_6 = mysqli_real_escape_string($conn, $_POST['obj5_6']);

    // Fetch department ID from session (assuming it's stored in $_SESSION['DepartmentID'])
    $departmentID = $_SESSION['DepartmentID'];

    // Get the current year
    $currentYear = date("Y");

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table54 (DepartmentID, year, field1, field2, field3, field4, field5, field6) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssss", $departmentID, $currentYear, $obj5_1, $obj5_2, $obj5_3, $obj5_4, $obj5_5, $obj5_6);

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
