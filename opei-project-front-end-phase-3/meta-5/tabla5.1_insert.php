<?php
session_start();
// Establish a database connection
include 'db_info.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $tituloActividad = mysqli_real_escape_string($conn, $_POST['tituloActividad']);
    $classAct = mysqli_real_escape_string($conn, $_POST['classAct']);
    $calendar = mysqli_real_escape_string($conn, $_POST['calendar']);
    $lugar = mysqli_real_escape_string($conn, $_POST['lugar']);
    $recurso = mysqli_real_escape_string($conn, $_POST['recurso']);
    $cantParticipantes = mysqli_real_escape_string($conn, $_POST['cantParticipantes']);

    // Fetch department ID from session (assuming it's stored in $_SESSION['DepartmentID'])
    $departmentID = $_SESSION['DepartmentID'];

    // Get the current year
    $currentYear = date("Y");

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table51 (DepartmentID, year, field1, field2, field3, field4, field5, field6) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssss", $departmentID, $currentYear, $tituloActividad, $classAct, $calendar, $lugar, $recurso, $cantParticipantes);

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
