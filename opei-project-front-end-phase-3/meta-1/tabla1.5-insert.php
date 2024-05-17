<?php
session_start();
// Establish a database connection
include 'db_info.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $obj1_1 = $_POST['obj1_1'];
    $obj1_2 = $_POST['obj1_2'];
    $obj1_3 = $_POST['obj1_3'];
    $obj1_4 = $_POST['obj1_4'];
    $obj1_5 = $_POST['obj1_5'];
    $obj1_6 = $_POST['obj1_6'];

    // Fetch department ID from session (assuming it's stored in $_SESSION['DepartmentID'])
    $departmentID = $_SESSION['DepartmentID'];

    // Get the current year
    $currentYear = date("Y");

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table15 (DepartmentID, year, field1, field2, field3, field4, field5, field6) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssss", $departmentID, $currentYear,  $obj1_1, $obj1_2, $obj1_3, $obj1_4, $obj1_5, $obj1_6);

    // Execute the statement
    if ($stmt->execute()) {
        echo "success"; // Return "success" upon successful insertion
    } else {
        echo "error"; // Return "error" upon failure
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
