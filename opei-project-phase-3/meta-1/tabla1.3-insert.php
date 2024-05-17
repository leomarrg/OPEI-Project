<?php
session_start();
// Establish a database connection
include 'db_info.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreProgAcredit = $_POST['nombreProgAcredit'];
    $agenciaAcreditProg = $_POST['agenciaAcreditProg'];
    $lastYearAcredit = $_POST['lastYearAcredit'];
    $nextYearAcredit = $_POST['nextYearAcredit'];
    $numProgAcredit = $_POST['numProgAcredit'];
    $recomendaciones = $_POST['recomendaciones'];

    // Fetch department ID from session (assuming it's stored in $_SESSION['DepartmentID'])
    $departmentID = $_SESSION['DepartmentID'];

    // Get the current year
    $currentYear = date("Y");


    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table13 (DepartmentID, year, field1, field2, field3, field4, field5, field6) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssss", $departmentID, $currentYear, $nombreProgAcredit, $agenciaAcreditProg, $lastYearAcredit, $nextYearAcredit, $numProgAcredit, $recomendaciones);

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
