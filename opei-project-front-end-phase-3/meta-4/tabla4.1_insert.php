<?php
session_start();
// Establish a database connection
include 'db_info.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $tituloActividad = mysqli_real_escape_string($conn, $_POST['tituloActividad']);
    $classAct4 = mysqli_real_escape_string($conn, $_POST['classAct4']);
    $calendar = mysqli_real_escape_string($conn, $_POST['calendar']);
    $coordinadorAct = mysqli_real_escape_string($conn, $_POST['coordinadorAct']);
    $numPart = mysqli_real_escape_string($conn, $_POST['numPart']);

    // Fetch department ID from session (assuming it's stored in $_SESSION['DepartmentID'])
    $departmentID = $_SESSION['DepartmentID'];

    // Get the current year
    $currentYear = date("Y");

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO table41 (DepartmentID, year, field1, field2, field3, field4, field5) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisssss", $departmentID, $currentYear, $tituloActividad, $classAct4, $calendar, $coordinadorAct, $numPart);

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
