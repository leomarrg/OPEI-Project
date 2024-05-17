<?php
session_start();
// Establish a database connection
include 'db_info.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $studName = mysqli_real_escape_string($conn, $_POST['studName']);
    $initProject = mysqli_real_escape_string($conn, $_POST['initProject']);
    $descrBreve = mysqli_real_escape_string($conn, $_POST['descrBreve']);
    $yearCreated = mysqli_real_escape_string($conn, $_POST['yearCreated']);
    $dirFisiEmpre = mysqli_real_escape_string($conn, $_POST['dirFisiEmpre']);
    $empreType = mysqli_real_escape_string($conn, $_POST['empreType']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $commentOp = mysqli_real_escape_string($conn, $_POST['commentOp']);

    // Fetch department ID from session (assuming it's stored in $_SESSION['DepartmentID'])
    $departmentID = $_SESSION['DepartmentID'];

    // Get the current year
    $currentYear = date("Y");

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table53 (DepartmentID, year, field1, field2, field3, field4, field5, field6, field7, field8) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssssss", $departmentID, $currentYear, $studName, $initProject, $descrBreve, $yearCreated, $dirFisiEmpre, $empreType, $comment, $commentOp);

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
