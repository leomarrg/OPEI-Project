<?php
session_start();
// Establish a database connection
include 'db_info.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servicioEval = $_POST['servicioEval'];
    $indicExe = $_POST['indicExe'];
    $stratEval = $_POST['stratEval'];
    $resultObt = $_POST['resultObt'];
    $usoResultados = $_POST['usoResultados'];
    $accCorrectivas = $_POST['accCorrectivas']; // Added a semicolon here

    // Fetch department ID from session (assuming it's stored in $_SESSION['DepartmentID'])
    $departmentID = $_SESSION['DepartmentID'];

    // Get the current year
    $currentYear = date("Y");

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table14b (DepartmentID, year, field1, field2, field3, field4, field5, field6) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssss", $departmentID, $currentYear,  $servicioEval, $indicExe, $stratEval, $resultObt, $usoResultados, $accCorrectivas);

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
